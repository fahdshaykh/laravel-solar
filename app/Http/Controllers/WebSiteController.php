<?php

namespace App\Http\Controllers;
use App\Mail\NewBookingEmail;
use App\Models\Aboutus;
use App\Models\Award;
use App\Models\History;
use App\Models\Leads;
use App\Models\Osprojects;
use App\Models\Projectimages;
use App\Models\Proposalfront;
use App\Models\User;
use App\Models\Webelieve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class WebSiteController extends Controller
{

    public function index(){
        $title = 'Home';

        $webdata = Webelieve::where('id', '1')->first();

        return view('welcome', compact('title','webdata'));
    }

    //new design
    public function finance(Request $request)
    {
        session(['steps' => 'address']);


        if (request('address')) {

            session(['form_address' => request('address')]);
            session(['steps' => 'payment']);
        }

        if (request('payment')) {
            
            session(['form_payment' => request('payment')]);
            session(['steps' => 'detail']);
        }

        if (request('phone')) {
            
            session(['form_detail' => request('phone')]);

            $total_payment = request('payment') / 2.85;

            session(['form_toal_payment' => $total_payment]);

            Session::forget('personal_detail');

            $fields = [
                'firstname', 'lastname', 'phone', 'email', 
                'systemsize', 'offset', 'monthlybill', 'annualusage'
            ];
            
            foreach ($fields as $field) {
                Session::push('personal_detail', request($field));
            }

            session(['steps' => 'proposal']);
        }

        return view('welcome');
    }
    //stepTwo
    public function stepTwo($id, $address){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step2', compact('title','id','address','webdata'));
    }
    public function stepThree($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step3', compact('title','id','webdata'));
    }
    public function stepFour($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step4', compact('title','id','webdata'));
    }
    public function stepFive($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step5', compact('title','id','webdata'));
    }
    public function stepSix($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step6', compact('title','id','webdata'));
    }
    public function stepSeven($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        return view('step7', compact('title','id','webdata'));
    }
    //results
    public function results($id){
        $title = 'Home';
        $webdata = Webelieve::where('id', '1')->first();
        $project = Proposalfront::where('id',$id)->first();
        return view('result', compact('title','project','webdata'));
    }

    public function shoaib(){
        $title = 'Home';
        //return view('welcome',compact('title'));
        return view('auth.shoaib', compact('title'));
    }

    public function signAuth(){
        $title = 'Signature Authentication';
        return view('signauthpage', compact('title'));
    }
    public function signnonw(Request $data){
		$email = $data->input('email');
        $cellno = $data->input('cellno');
        $leadinfo = Leads::where('email', $email)->where('phone', $cellno)->first();
        if($leadinfo){
        $lid = $leadinfo->id;
        $proinfo = Osprojects::where('lead_id', $lid)->first();
        if($proinfo){
        $proid = $proinfo->os_id;
        $id = $proinfo->os_id;
        if($proid > 0){
        $title = 'Projects List';
        $projects = Osprojects::where('os_id',$proid)->first();
        $users = User::where('id', $projects->sale_rep)->first();
        $leadinfo = Leads::where('id', $projects->lead_id)->first();
        $proimages = Projectimages::where('os_id',$proid)->latest()->get();
        $about = Aboutus::where('id',1)->first();
        $history = History::where('id',1)->first();
        $award = Award::where('id',1)->first();
        return view('admin.opensolar.detailsofprojectcustomersign',compact('projects','id','leadinfo','about','history','award','proimages','users','title'))->with('i',1);
        }else{  return redirect()->back()->with('success','No contract for this email and cellno');  }
        }else{  return redirect()->back()->with('success','No contract for this email and cellno');  }
    
    }else{  return redirect()->back()->with('success','No contract for this email and cellno');  }
		
       
    }

	

}
