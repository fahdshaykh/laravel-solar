<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Proposal;
use App\Models\Projects;
use App\Models\Roofs;
use App\Models\Boards;
use App\Models\Designs;
use App\Models\Electricity;
use App\Models\Financings;
use App\Models\Leadactivity;
use App\Models\Leads;
use App\Models\Proposalfront;
use App\Models\Solarvaluessetting;
use App\Models\Ucompany;
use App\Models\Tasks;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Bool_;
use Illuminate\Support\Facades\Http;
class AdminController extends Controller
{
    
    public function allusers(){
        $title = 'Users Management';
        $users = User::where('usertype','staff')->latest()->get();
        return view('admin.users.index',compact('users','title'))->with('i',1);
    }
	
	public function allsalereps(){
        $title = 'Sale Reps Management';
        $users = User::where('usertype','sale_reps')->latest()->get();
        return view('admin.users.salereps',compact('users','title'))->with('i',1);
    }
	public function allcustomers(){
        $title = 'Customers Management';
        $users = Leads::latest()->get();
        return view('admin.users.customers',compact('users','title'))->with('i',1);
    }
	public function allcontractirs(){
        $title = 'Contractors Management';
        $users = User::where('usertype','contractor')->latest()->get();
        return view('admin.users.contractors',compact('users','title'))->with('i',1);
    }
	
	 public function showprofile(){
        $title = 'My Profile';
        $user = auth()->user();
        return view('admin.profile',compact('user','title'));
    }
	 public function editprofile(){
        $title = 'Update Profile';
        $user = auth()->user();
        return view('admin.editprofile',compact('user','title'));
    }
	public function updateprofile(Request $request){
       
        
		 $input = $request->except(['_token','profile_photo']);
        if ($image = $request->file('profile_photo')) {
            request()->validate([
                'profile_photo' => 'image|mimes:jpg,png,jpeg|max:50000',
            ]);
            $destinationPath = public_path('profile/');
            $profileImage = 'cover'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profilephot = "$profileImage";
            User::where('id',auth()->user()->id)->update(['image'=>$profilephot]);
        }
		
		
        UserDetail::where('user_id',auth()->user()->id)->update($input);
      //  BankInformation::updateOrCreate(['user_id'=>auth()->user()->id],['bank_name'=>$request->bank_name,'bank_account'=>$request->bank_account]);
        return redirect()->route('users.editprofile')->with('success','Profile Updated Successfully');
    }
	public function deleteuser($id)
	{
	//	dd($id);
    $myusers = User::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'User deleted successfully');
	
	}
	//deleteproposal
	
	public function deleteproposal($id)
	{
    $myusers = Proposal::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'User deleted successfully');
	}
	
	public function userEdit($id){
        $user=User::find($id);
        return view('admin.users.edit', compact('user'));
    }
	
	public function proposalEdit($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.edit', compact('proposals','customers'));
    }
//**** */
    public function proposalInfo($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.info', compact('proposals','customers'));
    }
    public function proposalEnergy($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.energy', compact('proposals','customers'));
    }
    public function proposalDesign($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.design', compact('proposals','customers'));
    }
    public function proposalPayment($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.payment', compact('proposals','customers'));
    }
    public function proposalOnline($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.online', compact('proposals','customers'));
    }
    public function proposalManage($id){
        $proposals=Proposal::find($id);
		$customers = User::where('usertype','customer')->latest()->get();
        return view('admin.proposals.manage', compact('proposals','customers'));
    }
    //**** */


	
	public function usersts($id, $sts){
		$newStatus = ($sts == 'active') ? 'inactive' : 'active';
		$myuser=User::where('id', $id)->update(['is_active' => $newStatus]);
        return redirect()->back()->with('success','Status Changed successfully');
    }
	
	public function updateuser(Request $data){
        //dd('haji ruk');
		$id = $data->input('id');
		$user = User::findOrFail($id);
        if ($image = $data->file('profile_photo')) {
            request()->validate([
                'profile_photo' => 'image|mimes:jpg,png,jpeg|max:50000',
            ]);
            $destinationPath = public_path('profile/');
            $profileImage = 'cover'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profilephot = "$profileImage";
            $user->update(['image'=>$profilephot]);
            //exit;
        }
    $user->update([
        'first_name' => $data->first_name,
        'last_name' => $data->last_name,
        'email' => $data->email,
        'usertype' => $data->usertype,
        'show_proposal'=> $data->show_proposal,
        'intro'=> $data->intro,
    ]);

    $user->userDetail->update([
        'contact_number' => $data->contact_number,
		'address' => $data->address,
    ]);
	 //return redirect()->to('/allusers')->with('success', 'User updated successfully');
	            if($data->usertype=='staff'){return redirect()->to('/allusers')->with('success','Staff added Successfully');}
			elseif($data->usertype=='customer'){return redirect()->to('/allcustomers')->with('success','Customer added Successfully');}
			elseif($data->usertype=='sale reps'){return redirect()->to('/allsalereps')->with('success','Sale rep added Successfully');}
			elseif($data->usertype=='contractor'){return redirect()->to('/allcontractors')->with('success','Contractor added Successfully');}
			else{return redirect()->back()->with('success','Status Changed successfully');}
	// return redirect()->back()->with('success','User Updated successfully');
       
    }
	
	public function updateproposal(Request $data){
        //dd('haji ruk');
		$id = $data->input('id');
		$user = Proposal::findOrFail($id);

    $user->update([
        'title' => $data->title,
        'amount' => $data->amount,
        'customer' => $data->customer,
        'description' => $data->description,
    ]);
		return redirect()->to('/proposals')->with('success','Proposal Updated Successfully');
       
    }
	public function saveimage(Request $request)
    {
        $timestamp = time();
        if ($request->has('imgData')) {
            $imgData = $request->imgData;
            $imgData = str_replace('data:image/png;base64,', '', $imgData);
            $imgData = str_replace(' ', '+', $imgData);
            $data = base64_decode($imgData);
            $fileName = 'mapimages/'.$timestamp.'.png'; 
            file_put_contents(public_path($fileName), $data); 
            return $timestamp.".png";
        } else {
            return "Error: No image data received!";
        }
    }
	public function addnewuser($type){
        $title = 'Add New User';
        return view('admin.users.addnew', compact('title','type'));
    }
	//newproposaltesting
	public function newproposaltesting(){
        $title = 'Add New Proposal';
		$salereps = User::where('usertype','sale_reps')->latest()->get();
        $roofs = Roofs::latest()->get();
        $designs = Designs::latest()->get();
        $ucompanys = Ucompany::latest()->get();
        $systems = System::latest()->get();
        $financings = Financings::latest()->get();
        return view('admin.proposals.addnewtesting', compact('title','roofs','designs','ucompanys','systems','salereps','financings'));
    }
    public function newproposal(){
        $title = 'Add New Proposal';
		$salereps = User::where('usertype','sale_reps')->latest()->get();
        $roofs = Roofs::latest()->get();
        $designs = Designs::latest()->get();
        $ucompanys = Ucompany::latest()->get();
        $systems = System::latest()->get();
        $financings = Financings::latest()->get();
        return view('admin.proposals.addnew', compact('title','roofs','designs','ucompanys','systems','salereps','financings'));
    }
	
	

    public function speakerprofile($id){
        $user = User::FindorFail($id);
        return view('speakers.profile',compact('user'));
    }

    public function changepassword($id){
        $user = User::FindorFail($id);
        return view('admin.changepassword',compact('user'))->render();
    }

    public function updatepassword(Request $request){
        
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        $member = User::FindorFail($request->id); 
        // Update the user's password
        
        $member->password = bcrypt($request->new_password);
        $member->save();
    
        return response()->json(['message' => 'Password changed successfully.']);
    }

    public function systemprice(Request $request)
    {
        $id = $request->val;
        $system = System::where('name',$id)->first();
        if($system){$price=$system->systemprice;}else{$price=0;}
        return response()->json(['price' => $price]);
    }

    public function financeres(Request $request)
    {

        $financecompany = $request->financecompany;

        $total_amount = $request->total_amount;
        $financing = Financings::where('name',$financecompany)->first();
        if($financing){
            $interest=$financing->interest;
            $interest_decimal = $interest / 100;
            $interest = $total_amount * $interest_decimal;
            $new_amount = $total_amount + $interest;
            $months=$financing->months;
            //
            $month = $months;
            $permonth = $new_amount/$month;
            $newtotal =  $new_amount;
        }else{
            $month = 0;
            $permonth = 0;
            $newtotal =  0;
        }
        return response()->json(['month' => $month,'permonth' => $permonth,'newtotal' => $newtotal,]);
    }

    public function addproposalfront(Request $request){
       $address = $request->inputaddress; 
    //    $apiKey = 'AIzaSyAz5z8de2mOowIGRREyHc3gT1GgmJ3whDg';
    //    $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $apiKey;
    //    $geocodeResponse = Http::get($geocodeUrl);
    //    if ($geocodeResponse->failed() || empty($geocodeResponse['results'])) {
    //        return response()->json(['error' => 'Failed to get geocode data'], 500);
    //    }
    //    $location = $geocodeResponse['results'][0]['geometry']['location'];
    //    $buildingInsightsUrl = "https://solar.googleapis.com/v1/buildingInsights:findClosest";
    //    $buildingInsightsResponse = Http::get($buildingInsightsUrl, [
    //        'location.latitude' => $location['lat'],
    //        'location.longitude' => $location['lng'],
    //        'key' => $apiKey,
    //    ]);
    //    if ($buildingInsightsResponse->failed()) {
    //        return response()->json(['error' => 'Failed to get building insights'], 500);
    //    }
    //    $buildingInsights = $buildingInsightsResponse->json();

     
            $user = Proposalfront::create([
                'inputaddress'=> $request->inputaddress,
                'sunshine'=> $request->sunshine,
                'roofarea'=> $request->roofarea,
                'co2'=> $request->co2,
                'panelcount'=> $request->panelcount,
                'yenergy'=> $request->yenergy,
                'sqfeet'=> $request->sqfeet,
                'city' => $request->city,
                'zip' => $request->zip,
                'state' => $request->state,
                'country' => $request->country,
                'lati' => $request->lati,
                'longi' => $request->longi,
            ]);
            $id = $user->id;
            $address = $user->inputaddress;
            
            return redirect()->to('stepTwo/'.$id.'/'.$address)->with('success','Proposal added Successfully');
      }
      public function updateproposalfront(Request $request){
     
       $elect_bill = $request->input_47;
       $id = $request->id;
       $user = Proposalfront::findOrFail($id);
       $solar_values = Solarvaluessetting::where('id', '1')->first();

       $panelCapacityWattsInput = $solar_values->paneloutput;
       $defaultPanelCapacity = $solar_values->panelcapacity;
       $dcToAcDerateInput =  $solar_values->dctoac/100;
       $costPerPanel = $solar_values->costperpanel;
       $taxincentive=$solar_values->taxincentive/100;
       $costPerKwh = $solar_values->kwhrate;
       $homevaluefactor = $solar_values->homevaluefactor;
       $numberOfPanels = $user->panelcount;
       $co2OffsetsPerYear = $user->co2;
       $sunHours = $user->sunshine;
if($numberOfPanels=='undefined'){$numberOfPanels=1;}
       $ydckwh = $defaultPanelCapacity * $numberOfPanels;
       $systemSizeKwh = ($panelCapacityWattsInput * $numberOfPanels * $dcToAcDerateInput) / 1000;
       $manualAnnualEnergyConsumption = ($elect_bill / $costPerKwh) * 12;
       $yearlyEnergySavings = $elect_bill * 12 * $ydckwh / $manualAnnualEnergyConsumption;
       $savings25Years = $yearlyEnergySavings * 25;
       $systemCost = $numberOfPanels * $costPerPanel;
       $taxIncentives = $systemCost * $taxincentive; 
       $addedHomeValue = $yearlyEnergySavings * $homevaluefactor;
       $totalElectricityCostWithoutSolar = $elect_bill * 12 * 25;
       $fin= Financings::where('id', 1)->first();
       $withadders_price =$systemCost;
   $delaerfee = (1 - ($fin->dealer/100));
   $financed_amount = round($withadders_price / $delaerfee);
   $interest = $fin->interest /100;
   $monthly_interest_rate = $interest / 12;
   $number_of_payments = $fin->months;
   $permonth = ($financed_amount * $monthly_interest_rate * pow(1 + $monthly_interest_rate, $number_of_payments)) / (pow(1 + $monthly_interest_rate, $number_of_payments) - 1);
       $monhtly = $permonth;
       $user = Proposalfront::findOrFail($id);
       $user->update([
        'elect_bill'=>$elect_bill,
        'system_size'=>$systemSizeKwh,
		'system_cost'=>$systemCost,
		'savings'=>$savings25Years,
		'tax_incentive'=>$taxIncentives,
		'home_value'=>$addedHomeValue,
		'without_solar'=>$totalElectricityCostWithoutSolar,
        'monthly' =>$monhtly
    ]);
       $id = $user->id;
       return redirect()->to('stepFour/'.$id)->with('success','Proposal added Successfully');
  }

  public function updateproposalfronthouse(Request $request){
    
    $housetype = $request->input_46;
    $id = $request->id;
    $user = Proposalfront::findOrFail($id);
    $user->update(['housetype'=>$housetype]);
     $id = $user->id;
     
     return redirect()->to('stepFive/'.$id)->with('success','Proposal added Successfully');
}
public function updateproposalfronthousetype(Request $request){
    
    $type = $request->input_23;
    $id = $request->id;
    $user = Proposalfront::findOrFail($id);
    $user->update(['housecat'=>$type]);
     $id = $user->id;
     
     return redirect()->to('stepSix/'.$id)->with('success','Proposal added Successfully');
}
public function updateproposalfrontroof(Request $request){
    
    $type = $request->input_22;
    $id = $request->id;
    $user = Proposalfront::findOrFail($id);
    $user->update(['roof'=>$type]);
     $id = $user->id;
     
     return redirect()->to('stepSeven/'.$id)->with('success','Proposal added Successfully');
}

//updateproposalfrontinfo
public function updateproposalfrontinfo(Request $request){
   
    $first_name = $request->first_name;
    $last_name = $request->last_name;
    $phone = $request->phone;
    $email = $request->email;
    $id = $request->id;

    $user = Proposalfront::findOrFail($id);
    $user->update(
        [
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'phone'=>$phone,
            'email'=>$email,
            'sts'=>1
            ]
    );
     $id = $user->id;
     
     return redirect()->to('results/'.$id)->with('success','Proposal added Successfully');
}


//updateproposalfrontroof
      //
  
  public function addproposal(Request $request){
    $is_sold = isset($request->is_sold) ? $request->is_sold : 0;
    $is_installed = isset($request->is_installed) ? $request->is_installed : 0;
    $identity = rand(10000000, 99999999);  
  
    $system = $request->system;
    $system = System::where('name',$system)->first();
    $system_size = $system->systemsize;
    $panel_description = $system->panel;
    $system_production = $system->production;
    $inverter= $system->inverter;
    $down_amount= $request->down_amount;
    $total_amount= $request->total_amount;
    $rem_amount = $total_amount - $down_amount;

        $user = Proposal::create([
            'identity' => $identity,
            'title' => $request->title,
            'customer' => $request->customer,
            'familyname' => $request->familyname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'leadsource' => $request->leadsource,
            'rooftype'=> $request->rooftype,
		    'meteridentifier'=> $request->meteridentifier,
		    'storeys'=> $request->storeys,
		    'cellular'=> $request->cellular,
		    'wind'=> $request->wind,
		    'phase'=> $request->phase,
		    'powerfactor'=> $request->powerfactor,
		    'design'=> $request->design,
		    'sitenotes'=> $request->sitenotes,
            'amount' => $request->amount,
            'description' => $request->description,
            'salerep' => $request->salerep,
            'ucompany' => $request->ucompany,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
            'country' => $request->country,
            'lati' => $request->lati,
            'longi' => $request->longi,
            'priority' => $request->priority,
            'stage' => $request->stage,
            'is_sold' => $is_sold,
            'is_installed' => $is_installed,
            'sqfeet' => $request->sqfeet,
            'appdate' => $request->appdate,
            'apptime' => $request->apptime,
            'system' => $request->system,
            'other_expences' => $request->other_expences,
            'total_amount' => $request->total_amount,
            'financing' => $request->financing,
            'hiddenimage' => $request->hiddenimage,
            'systemsize' => $system_size,
            'panel_description' => $panel_description,
            'production' => $system_production,
            'inverter' => $inverter,
            'panel_count' => $request->panelcount,
            'down_amount'=>$down_amount,
            'rem_amount'=>$rem_amount,
            'powerusage' => $request->total_usage,
        ]);
        Electricity::create([
            'pid'=>$user->id,
            'kwh_jan'=>$request->kwh_jan,
            'amount_jan'=>$request->amount_jan,
            'kwh_feb'=>$request->kwh_feb,
            'amount_feb'=>$request->amount_feb,
            'kwh_march'=>$request->kwh_march,
            'amount_march'=>$request->amount_march,
            'kwh_april'=>$request->kwh_april,
            'amount_april'=>$request->amount_april,
            'kwh_may'=>$request->kwh_may,
            'amount_may'=>$request->amount_may,
            'kwh_june'=>$request->kwh_june,
            'amount_june'=>$request->amount_june,
            'kwh_july'=>$request->kwh_july,
            'amount_july'=>$request->amount_july,
            'kwh_aug'=>$request->kwh_aug,
            'amount_aug'=>$request->amount_aug,
            'kwh_sep'=>$request->kwh_sep,
            'amount_sep'=>$request->amount_sep,
            'kwh_oct'=>$request->kwh_oct,
            'amount_oct'=>$request->amount_oct,
            'kwh_nov'=>$request->kwh_nov,
            'amount_nov'=>$request->amount_nov,
            'kwh_dec'=>$request->kwh_dec,
            'amount_dec'=>$request->amount_dec,
        ]);
		return redirect()->to('/proposals')->with('success','Proposal added Successfully');
  }

  public function proposals(){
    $title = 'Proposals';
    $proposals = Proposal::latest()->get();
    return view('admin.proposals.index',compact('proposals','title'))->with('i',1);
}

public function proposalsnew(){
    $title = 'Proposals';
    $proposals = Proposal::where('stage','New')->latest()->get();
    $designingproposals = Proposal::where('stage','Designing')->latest()->get();
    $sellingproposals = Proposal::where('stage','Selling')->latest()->get();
    $installingproposals = Proposal::where('stage','Installing')->latest()->get();
    $maintainingproposals = Proposal::where('stage','Maintaining')->latest()->get();
    $lostproposals = Proposal::where('stage','Lost')->latest()->get(); 
    return view('admin.proposals.proposalnew',compact('proposals','title','maintainingproposals','lostproposals','installingproposals','designingproposals','sellingproposals'))->with('i',1);
}

	public function myprojects(){
		//dd('222');
        $title = 'Projects';
        $projects = Projects::latest()->get();
        return view('admin.projects.index',compact('projects','title'))->with('i',1);
    }

	public function newproject(){
        $title = 'Add New Project';
        return view('admin.projects.addnew', compact('title'));
    }	
	
	 public function addproject(Request $request){
	     
       
            $destinationPath = public_path('projects/');
            $projectImage = 'cover'.date('YmdHis') . "." . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move($destinationPath, $projectImage);
            $projectphoto = "$projectImage";
			
        $user = Projects::create([
            'title' => $request->title,
            'photo' => $projectphoto,
            'description' => $request->description,
        ]);
       
		return redirect()->to('myprojects')->with('success','Project added Successfully');
  }
  
  public function deleteproject($id)
	{
    $myusers = Projects::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Project deleted successfully');
	}



    /////boards
    public function myboards(){
        $title = 'Boards';
        $external = Boards::where('board_type','External')->latest()->get();
        $technical = Boards::where('board_type','Technical')->latest()->get();
        $organizational = Boards::where('board_type','Organizational')->latest()->get();
        return view('admin.boards.index',compact('external','technical','organizational','title'))->with('i',1);
    }

	public function newboards(){
        $title = 'Add New Board';
        return view('admin.boards.addnew', compact('title'));
    }	
	
	 public function addboards(Request $request){
        $user = Boards::create([
            'title' => $request->title,
            'description' => $request->description,
            'board_type' => $request->board_type
        ]);
		return redirect()->to('myboards')->with('success','Board added Successfully');
  }
  
    public function deleteboards($id)
	{
    $myusers = Boards::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Board deleted successfully');
	}

     /////tasks
     public function profileview($id){
        $tasks = Tasks::findOrfail($id);
        return view('admin.tasks.taskdetail',compact('tasks'));
    }

    public function mytasks(){
        $title = 'Boards';
        $user = auth()->user()->id;
        if(auth()->user()->usertype=='admin'){
        $unprojects = Tasks::where('task_type','Unassigned')->latest()->get();
        $todoprojects = Tasks::where('task_type','To do')->latest()->get();
        $doingprojects = Tasks::where('task_type','Doing')->latest()->get();
        $reviewprojects = Tasks::where('task_type','Review')->latest()->get();
        $releaseprojects = Tasks::where('task_type','Release')->latest()->get();
        }else{
        $unprojects = Tasks::where('task_type','Unassigned')->where('created_by',$user)->orWhere('assigned_to',$user)->latest()->get();
        $todoprojects = Tasks::where('task_type','To do')->where('created_by',$user)->orWhere('assigned_to',$user)->latest()->get();
        $doingprojects = Tasks::where('task_type','Doing')->where('created_by',$user)->orWhere('assigned_to',$user)->latest()->get();
        $reviewprojects = Tasks::where('task_type','Review')->where('created_by',$user)->orWhere('assigned_to',$user)->latest()->get();
        $releaseprojects = Tasks::where('task_type','Release')->where('created_by',$user)->orWhere('assigned_to',$user)->latest()->get();
        }

        //->orWhere('assigned_by', $current_user)
        return view('admin.tasks.index',compact('unprojects','todoprojects','doingprojects','reviewprojects','releaseprojects','title'))->with('i',1);
    }
    public function update_task(Request $request){
        Tasks::where('id',$request->id)->update(['task_type'=>$request->status]);
    }
	public function newtasks(){
        $title = 'Add New Task';
        return view('admin.tasks.addnew', compact('title'));
    }	
	
	 public function addtasks(Request $request){
        $user = Tasks::create([
            'title' => $request->title,
            'description' => $request->description,
            'board' => $request->board,
            'task_type' => $request->task_type,
            'placement' => $request->placement,
            'assigned_to' => $request->assigned_to,
            'priority' => $request->priority,
            'category' => $request->category,
            'created_by'=>auth()->user()->id
        ]);
		return redirect()->to('mytasks')->with('success','Task added Successfully');
  }

  //

  public function addleadactivity(Request $request){
    $user = Leadactivity::create([
        'title' => $request->title,
        'description' => $request->description,
        'leadid' => $request->leadid,
        'created_by'=>auth()->user()->id
    ]);
    return redirect()->to('leadsdetails/'.$request->leadid)->with('success','activity added Successfully');
}
  
  public function deletetasks($id)
	{
    $myusers = Tasks::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Task deleted successfully');
	}
	   
}
