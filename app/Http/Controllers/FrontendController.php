<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Contact;
use App\Models\ContactMail;
use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function service()
    {
        return view('frontend.service');
    }

    public function serviceDetails($id)
    {
        $service = Service::where('id','=',$id)->first();
        return view('frontend.servicedetails', compact('service'));
    }

    public function project()
    {
        return view('frontend.project');
    }

    public function projectDetails($id)
    {
        $projects = Project::where('id','=',$id)->orderby('id','DESC')->first();
        return view('frontend.projectdetails', compact('projects','id'));
    }

   

    public function contactMessageStore(Request $request)
    {

        $this->validate($request,[
            'subject' => 'required',
            'name' => 'required',
            'message' => 'required',
            'email' => 'required',
            'captcha' => 'required|captcha'
            ],
            [  
                'captcha.captcha' => 'This captcha doesn\'t match !!'
            ]
        );

    $contactmail = ContactMail::where('id', 1)->first()->email;
            
            $mail['subject']=$request->subject;
            $mail['name']=$request->name;
            $mail['email']=$request->email;
            $mail['message']=$request->message;
            $mail['from'] = 'info@homexcontracting.com';


            $email_to = $contactmail;
            Mail::send('mail', compact('mail'), function($message)use($mail,$email_to) {
                $message->from($mail['from'], 'Home X Contracting');
                $message->to($email_to)
                ->replyTo($mail['email'], '')
                ->subject($mail["subject"]);
                });

            $message ="Message Send Successfully";
            return back()->with('message', $message);
        
        return back()->with(['status'=> 303,'message'=>'Server Error!!']);


    }
    
    public function reviews()
    {
        return view('frontend.reviews');
    }

    
}
