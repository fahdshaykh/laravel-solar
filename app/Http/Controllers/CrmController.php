<?php

namespace App\Http\Controllers;

use App\Models\Deals;
use App\Models\Leadactivity;
use App\Models\LeadEmail;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Proposal;
use App\Models\Projects;
use App\Models\Leads;
use App\Models\Osprojects;
use App\Models\Proposalfront;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CrmController extends Controller
{
    
    public function analytics(){
        $title = 'CRM Analytics';
        return view('admin.crm.analytics',compact('title'));
    }

    public function myleads(Request $request){
        $title = 'CRM Leads';
        $projectsQuery = Proposalfront::where('sts',1);
        if ($request->has('search')) {
            $search = $request->input('search');
            $sby = $request->input('sby');
            $projectsQuery->where($sby, 'like', '%' . $search . '%');
        }

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $projectsQuery->whereBetween('created_at', [$fromDate, $toDate]);
        }
    
        $leads = $projectsQuery->latest()->paginate(10);
       
        return view('admin.crm.leads',compact('title','leads'));
    }

    public function deletelead($id){ 
        $myusers = Proposalfront::findOrFail($id);
	    $myusers->delete();
	    return redirect()->back()->with('destroy', 'Lead deleted successfully');
	}

    public function leadsdetails($id){
      
        $title = 'CRM Leads Details';
        $lead = Proposalfront::where('id', $id)->first();
        $lactivity = Leadactivity::where('leadid', $id)->latest()->get();
        return view('admin.crm.leadsdetails',compact('title','lead','lactivity'));

    }
    public function leadedit($id){
        $title = 'CRM Leads Edit';
        $lead = Leads::where('id', $id)->first();
        $users = User::latest()->get();
        return view('admin.crm.leadedit',compact('title','lead','users'));
    }

    public function sendEmail(Request $request)
    {
        $to = $request->email;
        $subject = $request->subject;
        $message = $request->content;
        
        // Send the email
        Mail::raw($message, function ($email) use ($to, $subject) {
            $email->to($to)
                ->subject($subject);
        });
        LeadEmail::create(['subject' => $request->subject,
        'content' => $request->content,'email'=>$request->email,'type'=>'Sent']);
        return redirect()->back()->with('success', 'Email Sent Successfully');
    }

    public function deals(){
        $title = 'CRM Deals';
        $leads = Deals::latest()->get();
        return view('admin.crm.deals',compact('title','leads'));
    }

    public function dealsdetails(){
        $title = 'CRM Deals Details';
        return view('admin.crm.dealsdetails',compact('title'));
    }

    public function reports(){
        $title = 'CRM Reposts';
        return view('admin.crm.reports',compact('title'));
    }

    public function reportsdetails(){
        $title = 'CRM Reposts Details';
        return view('admin.crm.reportsdetails',compact('title'));
    }

    public function contacts(){
        $title = 'CRM Contacts';
        $users = User::latest()->get();
        return view('admin.crm.contacts',compact('users','title'));
    }
//updatemylead
public function updatemylead(Request $request){
    $id = $request->input('id');
    $user = Leads::where('id',$id)->first();
    $user -> update([
        'photo' => '',
        'assigned_to' => $request->assigned_to,
		'first_name' => $request->first_name,
		'last_name' => $request->last_name,
		'company' => $request->company,
		'title' => $request->title,
		'email' => $request->email,
		'phone' => $request->phone,
		'website' => $request->website,
		'status' => $request->status,
		'source' => $request->source,
		'street' => $request->street,
		'city' => $request->city,
		'state' => $request->state,
		'country' => $request->country,
		'zipcode' => $request->zipcode,
		'description' => $request->description,
        'created_by'=>auth()->user()->id
    ]);
    $userd = Osprojects::where('lead_id',$id)->first();
    $full_name = $request->first_name .' '. $request->last_name;
   // echo $full_name;exit;
    $userd -> update([
		'full_name' => $full_name,
		'email' => $request->email,
		'phone' => $request->phone,
		'street' => $request->street,
		'city' => $request->city,
		'state' => $request->state,
		'zipcode' => $request->zipcode,
    ]);
   
    return redirect()->to('leadsdetails/'.$id)->with('success','Lead Created Successfully');
}
public function updatemyleadsts(Request $request){
    $id = $request->input('id');
    $user = Proposalfront::where('id',$id)->first();
    $user -> update([
       
		'final_status' => $request->status,
		
    ]);
   
    return redirect()->to('leadsdetails/'.$id)->with('success','Lead Status Updated Successfully');
}
    public function createlead(Request $request){

      
    $user = Leads::create([
        'photo' => '',
        'assigned_to' => $request->assigned_to,
		'first_name' => $request->first_name,
		'last_name' => $request->last_name,
		'company' => $request->company,
		'title' => $request->title,
		'email' => $request->email,
		'phone' => $request->phone,
		'website' => $request->website,
		'status' => $request->status,
		'source' => $request->source,
		'street' => $request->street,
		'city' => $request->city,
		'state' => $request->state,
		'country' => $request->country,
		'zipcode' => $request->zipcode,
		'description' => $request->description,
        'created_by'=>auth()->user()->id
    ]);
   
    return redirect()->to('myleads')->with('success','Lead Created Successfully');
}


public function adddeal(Request $request){
   
$user = Deals::create([
    'dealowner' => $request->dealowner,
    'name' => $request->name,
    'amount' => $request->amount,
    'currency' => $request->currency,
    'stage' => $request->stage,
    'priority' => $request->priority,
    'contact_name' => $request->contact_name,
    'phone' => $request->phone,
    'email' => $request->email,
    'lead_source' => $request->lead_source,
    'create_date' => $request->create_date,
    'create_time' => $request->create_time,
    'close_date' => $request->close_date,
    'close_time' => $request->close_time,
]);

return redirect()->to('deals')->with('success','Lead Created Successfully');
}



}
