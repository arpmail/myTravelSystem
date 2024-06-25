<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Covid;
use App\Models\Product;
use App\Models\destination;
use App\Models\CovidNew;
use App\Models\State;
use App\Models\Pref;
use App\Imports\Productimport;
use Illuminate\Support\Arr;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Excel;


class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $userEmail = Auth::user()->email;

        if ($usertype=='1')
        {
            $tcases     = State::where('totalCases','>=','200')->get()->count();
            $user       = User::where('id', '!=', auth()->id())->paginate(3);
            $dest       = Destination::all()->count();
            $dc         = State::all()->count();
            $userPref   = Pref::all()->count();
            $state      = CovidNew::all();

            $johor = Destination::where('state','like','Johor')->get()->count();
            $kedah = Destination::where('state','like','Kedah')->get()->count();
            $kelantan = Destination::where('state','like','Kelantan')->get()->count();
            $melaka = Destination::where('state','like','Melaka')->get()->count();
            $ns = Destination::where('state','like','Negeri Sembilan')->get()->count();
            $pahang = Destination::where('state','like','Pahang')->get()->count();
            $perak = Destination::where('state','like','Perak')->get()->count();
            $perlis = Destination::where('state','like','Perlis')->get()->count();
            $pp = Destination::where('state','like','Pulau Pinang')->get()->count();
            $sabah = Destination::where('state','like','Sabah')->get()->count();
            $sarawak = Destination::where('state','like','Sarawak')->get()->count();
            $selangor = Destination::where('state','like','Selangor')->get()->count();
            $terengganu = Destination::where('state','like','Terengganu')->get()->count();
            $KL = Destination::where('state','like','Kuala Lumpur')->get()->count();
            $labuan = Destination::where('state','like','Labuan')->get()->count();
            $putrajaya = Destination::where('state','like','Putrajaya')->get()->count();



            return view('admin.home',compact('state','user','userPref','tcases','dc','dest','johor','kedah','kelantan','melaka','ns','pahang','perak','perlis','pp','sabah','sarawak','selangor','terengganu','KL','labuan','putrajaya'));
        }
        else
        {
            
            $pref = Pref::where('user',$userEmail)->first();
            $covid = Covidnew::orderBy('cases', 'DESC')->get();

            if($pref)
            {
                $location = json_decode($pref->location);

                $stateDataMore = State::whereIn('stateCase',$location)->where("totalCases",">=",$pref->numCases)->get();
        
                $arrS = [];
                foreach($stateDataMore as $c)
                {
                    array_push($arrS, $c->district);
                }
                
                $data = destination::where("destPrice",">=",$pref->lowPrice)->where("destPrice","<=",$pref->highPrice)->where("descRate",">=",$pref->rate-2)->where("descRate","<=",$pref->rate)->whereNotIn('destAddress',$arrS)->whereIn('state',$location)->paginate(4);
        
                
            }
            else
            {
                $data = destination::paginate(4);
            }

            // if ($data->isEmpty())
            // {
            //     $data = destination::paginate(4);
            // }
            
            return view('user.home',compact('data','covid'));
        }
    }

    public function index()
    {
        if(Auth::id())
        {          
            return redirect('redirect');
        }
        else
        {
            $data = destination::paginate(4);
            $covid = Covidnew::orderBy('cases', 'DESC')->get();
            return view('user.home',compact('data','covid'));
        }
        
    }

    public function allstate()
    {
        $dataState = Covidnew::all();    
        return view('user.allstate', compact('dataState'));
    }

    public function state($state)
    {
        $dest = destination::where('state', $state )->paginate(12);
        $table = State::where('stateCase', 'like', '%' . $state . '%')->get();
        return view('user.state',compact('dest','table','state'));
    }

    public function risk($state)
    {
        $data=$state;
        return view('user.risk', compact('data'));
    }

    public function high($state)
    {
        $cov = 200;
        $table = State::where('stateCase', 'like', "%$state%")->where("totalCases",">=",$cov)->get();
        $arr = [];

        foreach($table as $d)
        {
            $myArray = explode(',', $d->district);
            $arr = array_merge($arr,$myArray);

        }
        $dest = destination::whereIn('destAddress',$arr)->paginate(12);
        return view('user.state',compact('arr','dest','table','state'));
    }

    public function low($state)
    {
        $cov = 200;
        $diti = State::where('stateCase', 'like', "%$state%")->where("totalCases",">",$cov)->get();
        $table = State::where('stateCase', 'like', "%$state%")->where("totalCases","<",$cov)->get();
        $arr = [];

        foreach($diti as $d)
        {
            $myArray = explode(',', $d->district);
            $arr = array_merge($arr,$myArray);

        }
        $dest = destination::whereNotIn('destAddress',$arr)->where('state', 'like', "%$state%")->paginate(12);
        return view('user.state',compact('arr','dest','state','table'));
    }

    public function preference()
    {
        if(!Auth::check())
        {
            return redirect('login')->with('alert','Please Login to Your Account to continue');
        }   
        $userEmail = Auth::user()->email;
        $pref = Pref::where('user',$userEmail)->first();
        
        // dd(gettype($pref));
        // if (!$pref)
        // {
        //     $pref = [];
            
        // }
        return view('user.preference',compact('pref'));
    }
    
    public function pref(Request $request)
    {
        if(!$request->filled('location')){
            return "<script>alert('Please Select At least One State!');window.location.href='/preference'</script>";
        }

        $email = Auth::user()->email;
        $exist = Pref::where('user',$email)->first();
        if (!$exist)
        {
            $pref = new Pref;
        }
        else
        {
            $pref = $exist;
        }
       

        $data=$request->input('price');
        $low=$request->input('low');
        $high=$request->input('high');
        $numCases=$request->input('numCases');
        $rate=$request->input('rate');
        $cov=$request->input('cov');

        $location = $request->input('location');
        $locat = json_encode($location);


        $pref->user = $email;
        $pref->lowPrice = $low;
        $pref->highPrice = $high;
        $pref->numCases = $numCases;
        $pref->rate = $rate;
        $pref->location = $locat;
        $pref->save();

        $stateDataMore = State::whereIn('stateCase',$location)->where("totalCases",">=",$numCases)->get();

        $stateData = State::whereIn('stateCase',$location)->where("totalCases","<=",$numCases)->get();

        $arrS = [];
        foreach($stateDataMore as $c)
        {
            array_push($arrS, $c->district);
        }
        
        $destFilter = destination::where("destPrice",">=",$low)->where("destPrice","<=",$high)->where("descRate",">=",$rate-2)->where("descRate","<=",$rate)->whereNotIn('destAddress',$arrS)->whereIn('state',$location)->paginate(12);
        // dd($destFilter);
        return view('user.tt', compact('data','low','high','destFilter','rate','numCases','stateData','location'));
    }

    
    public function updateUser($email)
    {
        $data=User::where('email',$email)->first();
       
        // dd($data);
        
        $u=0;
        $a=1;

        $ut = $data->usertype;
        if ($ut==0)
        {
            $data->usertype = $a;
            $data->save();
        }
        else
        {
            $data->usertype = $u;
            $data->save();
        }


        return redirect()->back()->with('message','Product Updated Successfully');
    }
    

}
