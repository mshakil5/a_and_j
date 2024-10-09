<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id','DESC')->get();
        return view('admin.projects.index',compact('projects'));
    }

    public function store(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please Fill title field.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

        

        if(!$request->hasFile('fimage')){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please select  feature image.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }
                $project = new Project();
                $project->title= $request->title;
                $project->description= $request->description;
                if ($request->fimage) {
                    $request->validate([
                        'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$request->fimage->extension();
                    $request->fimage->move(public_path('images'), $imageName);
                    $project->image= $imageName;
                }

                $project->created_by= Auth::user()->id;

            if ($project->save()) {

                if ($request->fimage) {
                    $fpic = new ProjectImage();
                    $fpic->image= $imageName;
                    $fpic->project_id = $project->id;
                    $fpic->created_by= Auth::user()->id;
                    $fpic->save();
                }

                //image upload start
                if ($request->hasfile('media')) {
                    // $media= [];
                    foreach ($request->file('media') as $image) {
                        $rand = mt_rand(100000, 999999);
                        $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                        //move image to postimages folder
                        $image->move(public_path() . '/images/', $name);
                        $data[] = $name;
                        //insert into picture table

                        $pic = new ProjectImage();
                        $pic->image = $name;
                        $pic->project_id = $project->id;
                        $pic->created_by= Auth::user()->id;
                       $pic->save();
                    }
                }

                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);
            }else {
                return response()->json(['status'=> 303,'message'=>$request->category_id]);

            }



    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Project::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->title= $request->title;
        $project->description= $request->description;
        if ($request->fimage != 'null') {
            $image_path = public_path('images').'/'.$project->fimage;
            if (!empty($data->image) && file_exists($image_path)) {
                unlink($image_path);
            }
            // unlink($image_path);
            $request->validate([
                'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images'), $imageName);
            $project->image= $imageName;
        }
        $project->save();

        if ($project->id) {

                //image upload start
                if ($request->hasfile('media')) {
                    // $media= [];
                    foreach ($request->file('media') as $image) {
                        $rand = mt_rand(100000, 999999);
                        $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                        //move image to postimages folder
                        $image->move(public_path() . '/images/', $name);
                        $data[] = $name;
                        //insert into picture table

                        $pic = new ProjectImage();
                        $pic->image = $name;
                        $pic->project_id = $project->id;
                       $pic->save();
                    }
                }

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        $project_id = $id;
        $images = ProjectImage::where('project_id', '=', $id)->get();
    
        foreach ($images as $simage) {
            $imagePath = public_path() . '/images/' . $simage->image;
    
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        if (Project::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Update Failed']);
        }
    }    

    public function image($id)
    {
        $project_id = $id;
        $image = ProjectImage::where('project_id','=', $id)->orderBy('id','DESC')->get();
        return view('admin.projects.image',compact('image','project_id'));
    }

    public function imageStore(Request $request)
    {

        if(!$request->hasFile('media')){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please select  image or video.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

            try{
                //image upload start
                if ($request->hasfile('media')) {
                    // $media= [];
                    foreach ($request->file('media') as $image) {
                        $rand = mt_rand(100000, 999999);
                        $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                        //move image to postimages folder
                        $image->move(public_path() . '/images/', $name);
                        $data[] = $name;
                        //insert into picture table

                        $pic = new ProjectImage();
                        $pic->image = $name;
                        $pic->project_id = $request->project_id;
                        $pic->created_by= Auth::user()->id;
                       $pic->save();
                    }
                }

                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);

            }catch (\Exception $e){
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);

            }

    }

    public function imageDelete($id)
    {
        $image = ProjectImage::where('id', $id)->first();
        $path = public_path() . '/images/' . $image->image;

        if (file_exists($path)) {
            unlink($path);
        }

        if ($image->delete()) {
            return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Update Failed']);
        }
    }
}
