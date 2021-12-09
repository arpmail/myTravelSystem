<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
    {
        $data=new product;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->state=$request->state;

        $data->location=$request->location;

        $data->description=$request->description;

        $data->totalCases=$request->totalCases;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');


    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function updateproduct($id)
    {
        $data=product::find($id);
        return view('admin.updateproduct', compact('data'));
    }

    public function updateproduct2(Request $request, $id)
    {
        $data=product::find($id);

        $image=$request->file;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage',$imagename);

            $data->image=$imagename;
        }

        $data->state=$request->state;

        $data->location=$request->location;

        $data->description=$request->description;

        $data->totalCases=$request->totalCases;

        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully');

    }

    public function showuser()
    {
        $data=user::all();
        return view('admin.showuser',compact('data'));
    }

    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();

        return redirect()->back()->with('message','User Deleted Successfully');
    }

    public function updateuser($id)
    {
        $data=user::find($id);
        return view('admin.updateuser', compact('data'));
    }

    public function updateuser2(Request $request, $id)
    {
        $data=user::find($id);

        $data->name=$request->name;

        $data->email=$request->email;

        $data->phone=$request->phone;

        $data->save();

        return redirect()->back()->with('message','User Updated Successfully');

    }

}
