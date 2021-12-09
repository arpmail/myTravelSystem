<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Covid;
use App\Models\Product;
use App\Models\destination;
use App\Imports\Productimport;
use Excel;


class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype=='1')
        {
            $data = product::all();
            return view('admin.home',compact('data'));
        }
        else
        {
            $data = destination::paginate(3);
            return view('user.home',compact('data'));
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
            $data = destination::paginate(3);
            return view('user.home',compact('data'));
        }
        
    }

    public function allstate()
    {
        $Selangor = Covid::all()->where('state', "Selangor" );
        $Kl = Covid::all()->where('state', "Kuala Lumpur" );
        $Johor = Covid::all()->where('state', "Johor" );
        $Sabah = Covid::all()->where('state', "Sabah" );
        $Sarawak = Covid::all()->where('state', "Sarawak" );
        $Negeris = Covid::all()->where('state', "Negeri Sembilan" );
        $PPinang = Covid::all()->where('state', "P. Pinang" );
        $Kelantan = Covid::all()->where('state', "Kelantan" );
        $Perak = Covid::all()->where('state', "Perak" );
        $Kedah = Covid::all()->where('state', "Kedah" );
        $Melaka = Covid::all()->where('state', "Melaka" );
        $Pahang = Covid::all()->where('state', "Pahang" );
        $Terengganu = Covid::all()->where('state', "Terengganu" );
        $Labuan = Covid::all()->where('state', "Labuan" );
        $Putrajaya = Covid::all()->where('state', "Putrajaya" );
        $Perlis = Covid::all()->where('state', "Perlis" );

        return view('user.allstate', compact('Selangor','Kl','Johor','Sabah','Sarawak','Negeris','PPinang','Kelantan','Perak','Kedah','Melaka','Pahang','Terengganu','Labuan','Putrajaya','Perlis'));
    }

    public function state($state)
    {
        $data = destination::all()->where('state', $state );
        return view('user.state',compact('data'));
    }

    public function location($id)
    {
        $data=destination::find($id);
        return view('user.location', compact('data'));
    }

    public function preference()
    {
        return view('user.preference');
    }

    public function importUploadForm()
    {
        return view('user.import-form');
    }

    public function importForm(Request $request)
    {
        Excel::import(new ProductImport,$request->file);
        return "Records are imported";
    }
}
