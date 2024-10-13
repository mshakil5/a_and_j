<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
Use Image;
use Illuminate\support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::all();
        return view('admin.client.index',compact('data'));
    }

    public function store(Request $request)
    {
        

            try{
                $data = new Client();
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->address = $request->address; 
                // intervention
                if ($request->image != 'null') {
                    $originalImage= $request->file('image');
                    $thumbnailImage = Image::make($originalImage);
                    $thumbnailPath = public_path().'/images/thumbnail/';
                    $originalPath = public_path().'/images/';
                    $time = time();
                    $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
                    $thumbnailImage->resize(150,150);
                    $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
                    $data->image= $time.$originalImage->getClientOriginalName();
                }
                // end

                $data->created_by= Auth::user()->id;
                $data->save();
                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);

            }catch (\Exception $e){
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);

            }

    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Client::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $data = Client::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->image != 'null'){
            $oldimg = Client::where('id','=', $id)->first();
            if ($oldimg->image == '') {
            }else{
                $image_path = public_path('images').'/'.$data->image;
                if (file_exists($image_path)) {
                    // unlink($image_path);
                }
                $thumbnail_path = public_path('images/thumbnail').'/'.$data->image;
                if (file_exists($thumbnail_path)) {
                // unlink($thumbnail_path);
                }
            }
            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/thumbnail/';
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
            $data->image= $time.$originalImage->getClientOriginalName();
        }
        
        $data->updated_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {

        $data = Client::where('id','=', $id)->first();
        if ($data->image != '') {
            $image_path = public_path('images').'/'.$data->image;
            unlink($image_path);
            $thumbnail_path = public_path('images/thumbnail').'/'.$data->image;
            unlink($thumbnail_path);
        }

        if(Client::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
