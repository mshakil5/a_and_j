<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('id','DESC')->get();
        return view('admin.reviews.index',compact('reviews'));
    }

    public function store(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please Fill title field.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

        

        if(!$request->hasFile('image')){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please select an image.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }
                $data = new Review();
                $data->title= $request->title;
                $data->description= $request->description;
                if ($request->image) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$request->image->extension();
                    $request->image->move(public_path('images'), $imageName);
                    $data->image= $imageName;
                }

                $data->created_by= Auth::user()->id;

            if ($data->save()) {

                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);
            }else {
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);

            }



    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Review::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $data = Review::find($id);
        $data->title= $request->title;
        $data->description= $request->description;
        if ($request->image != 'null') {
            $image_path = public_path('images').'/'.$data->image;

            if (!empty($data->image) && file_exists($image_path)) {
                unlink($image_path); // Remove the old image file
            }
            // unlink($image_path);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data->image= $imageName;
        }
        $data->save();

        if ($data->id) {

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        
        if(Review::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
