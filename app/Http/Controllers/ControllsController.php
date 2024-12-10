<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use Illuminate\Http\Request;

use App\Models\Roofs;

use App\Models\Designs;
use App\Models\Faq;
use App\Models\Financings;
use App\Models\Inverters;
use App\Models\Modules;
use App\Models\Proposalfront;
use App\Models\Solarvaluessetting;
use App\Models\Ucompany;

use App\Models\System;
use App\Models\Webelieve;

class ControllsController extends Controller
{
    //roofs
    public function myroofs(){
        $title = 'Roof Designs';
        $projects = Roofs::latest()->get();
        return view('admin.roofs.index',compact('projects','title'))->with('i',1);
    }
    public function neroofs(){
        $title = 'Add New Roof';
        return view('admin.roofs.addnew', compact('title'));
    }	
    public function addroof(Request $request){
        $user = Roofs::create([
            'name' => $request->title,
        ]);
    return redirect()->to('myroofs')->with('success','Roof added Successfully');
    }
    public function deleteroof($id)
	{
    $myusers = Roofs::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Roof deleted successfully');
	}
    public function roofsEdit($id){
        $proposals=Roofs::find($id);
        return view('admin.roofs.edit', compact('proposals'));
    }
    public function updateroofs(Request $data){
		$id = $data->input('id');
		$user = Roofs::findOrFail($id);
        $user->update(['name' => $data->title,]);
		return redirect()->to('/myroofs')->with('success','Roof Updated Successfully');
    }
    //designs
    public function designs(){
        $title = 'Designs';
        $projects = Designs::latest()->get();
        return view('admin.designs.index',compact('projects','title'))->with('i',1);
    }
    public function newdesigns(){
        $title = 'Add New Design';
        return view('admin.designs.addnew', compact('title'));
    }	
    public function adddesigns(Request $request){
        $user = Designs::create([
            'name' => $request->title,
        ]);
    return redirect()->to('designs')->with('success','Design added Successfully');
    }
    public function deletedesigns($id)
	{
    $myusers = Designs::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Design deleted successfully');
	}
    public function designsEdit($id){
        $proposals=Designs::find($id);
        return view('admin.designs.edit', compact('proposals'));
    }
    public function updatedesigns(Request $data){
		$id = $data->input('id');
		$user = Designs::findOrFail($id);
        $user->update(['name' => $data->title,]);
		return redirect()->to('/designs')->with('success','Design Updated Successfully');
    }
    //ucompany
    public function ucompany(){
        $title = 'Utility Company';
        $projects = Ucompany::latest()->get();
        return view('admin.ucompany.index',compact('projects','title'))->with('i',1);
    }
    public function newucompany(){
        $title = 'Add New Company';
        return view('admin.ucompany.addnew', compact('title'));
    }	
    public function adducompany(Request $request){
        $user = Ucompany::create([
            'name' => $request->title,
            'winter_rates' => $request->winter_rates,
            'summer_rates' => $request->summer_rates,
            'fixed_fee' => $request->fixed_fee,
            'taxes' => $request->taxes
        ]);
    return redirect()->to('ucompany')->with('success','Company added Successfully');
    }
    public function deleteucompany($id)
	{
    $myusers = Ucompany::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Company deleted successfully');
	}
    public function ucompanyEdit($id){
        $proposals=Ucompany::find($id);
        return view('admin.ucompany.edit', compact('proposals'));
    }
    public function updateucompany(Request $data){
		$id = $data->input('id');
		$user = Ucompany::findOrFail($id);
        $user->update(['name' => $data->title,'winter_rates' => $data->winter_rates,
            'summer_rates' => $data->summer_rates,
            'fixed_fee' => $data->fixed_fee,
            'taxes' => $data->taxes]);
		return redirect()->to('/ucompany')->with('success','Company Updated Successfully');
    }
    //system
    public function system(){
        $title = 'System Designs';
        $projects = System::latest()->get();
        return view('admin.system.index',compact('projects','title'))->with('i',1);
    }
    public function newsystem(){
        $title = 'Add New system';
        $modules = Modules::latest()->get();
        $battery = Battery::latest()->get();
        $inverter = Inverters::latest()->get();
        return view('admin.system.addnew', compact('title','modules','battery','inverter'));
    }	
    public function addsystem(Request $request){
        $user = System::create([
            'name' => $request->title,
            'systemsize' => $request->systemsize,
            'panel' => $request->panel,
            'panelcount' => $request->panelcount,
            'inverter' => $request->inverter,
            'battery' => $request->battery,
            'batterycount' => $request->batterycount,
            'systemprice' => $request->systemprice,
            'dcoptimizer' => $request->dcoptimizer,
            'dcoptimizerprice' => $request->dcoptimizerprice,
        ]);
    return redirect()->to('system')->with('success','System added Successfully');
    }
    public function deletesystem($id)
	{
    $myusers = System::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'System deleted successfully');
	}
    public function systemEdit($id){
        $proposals=System::find($id);
        $modules = Modules::latest()->get();
        $battery = Battery::latest()->get();
        $inverter = Inverters::latest()->get();
        return view('admin.system.edit', compact('proposals','modules','battery','inverter'));
    }
    public function updatesystem(Request $data){
		$id = $data->input('id');
		$user = System::findOrFail($id);
        $user->update([
            'name' => $data->title,
            'systemsize' => $data->systemsize,
            'panel' => $data->panel,
            'panelcount' => $data->panelcount,
            'inverter' => $data->inverter,
            'battery' => $data->battery,
            'batterycount' => $data->batterycount,
            'systemprice' => $data->systemprice,
            'dcoptimizer' => $data->dcoptimizer,
            'dcoptimizerprice' => $data->dcoptimizerprice,]);
		return redirect()->to('/system')->with('success','System Updated Successfully');
    }


    //financing
    public function financing(){
        $title = 'Finance Companies';
        $projects = Financings::latest()->get();
        return view('admin.financing.index',compact('projects','title'))->with('i',1);
    }
    public function newfinancing(){
        $title = 'Add New Company';
        return view('admin.financing.addnew', compact('title'));
    }	
    public function addfinancing(Request $request){
        $user = Financings::create([
            'name' => $request->title,
            'maxamount' => $request->maxamount,
            'interest' => $request->interest,
            'dealer' => $request->dealer,
            'months' => $request->months,
        ]);
    return redirect()->to('financing')->with('success','Company added Successfully');
    }
    public function deletefinancing($id)
	{
    $myusers = Financings::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Company deleted successfully');
	}

    public function financingEdit($id){
        $proposals=Financings::find($id);
        return view('admin.financing.edit', compact('proposals'));
    }
    public function updatefinancing(Request $data){
		$id = $data->input('id');
		$user = Financings::findOrFail($id);
        $user->update(['name' => $data->title,'maxamount' => $data->maxamount,'interest' => $data->interest,'dealer' => $data->dealer,'months' => $data->months]);
		return redirect()->back()->with('success','Company Updated Successfully');
    }

    public function quoteEdit($id){
        $proposals=Solarvaluessetting::find($id);
        return view('admin.financing.solarvalues', compact('proposals'));
    }
    public function updatequote(Request $data){
		$id = $data->input('id');
		$user = Solarvaluessetting::findOrFail($id);
        $user->update([
            'panelcapacity' => $data->panelcapacity,
            'paneloutput' => $data->paneloutput,
            'dctoac' => $data->dctoac,
            'costperpanel' => $data->costperpanel,
            'taxincentive' => $data->taxincentive,
            'kwhrate' => $data->kwhrate,
            'homevaluefactor' => $data->homevaluefactor]);
		return redirect()->back()->with('success',' Updated Successfully');
    }
      // webelieve
      public function webelieve(){
        $title = 'We believe';
        $about = Webelieve::where('id',1)->first();
        return view('admin.crm.webelieve',compact('about','title'))->with('i',1);
    }
    
    public function updatewebelieve(Request $data){
		$id = $data->input('id');
        $details = $data->input('details');
		$user = Webelieve::findOrFail($id);
        if ($image = $data->file('profile_photo')) {
            request()->validate([
                'profile_photo' => 'image|mimes:jpg,png,jpeg|max:50000',
            ]);
            $destinationPath = public_path('template/');
            $profileImage = 'cover'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profilephot = "$profileImage";
            $user->update(['photo'=>$profilephot]);
        }
        if ($image = $data->file('profile_photo2')) {
            request()->validate([
                'profile_photo2' => 'image|mimes:jpg,png,jpeg|max:50000',
            ]);
            $destinationPath = public_path('template/');
            $profileImage = 'coveri'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profilephot = "$profileImage";
            $user->update(['photo2'=>$profilephot]);
        }
        $user->update(['details'=>$details]);
         return redirect()->back()->with('success','Updated successfully');
       
    }

    //faq
    public function faq(){
        $title = 'Finance Companies';
        $projects = Faq::latest()->get();
        return view('admin.faq.index',compact('projects','title'))->with('i',1);
    }
    public function newfaq(){
        $title = 'Add New Company';
        return view('admin.faq.addnew', compact('title'));
    }	
    public function addfaq(Request $request){
        $user = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
    return redirect()->to('faq')->with('success','FAQ added Successfully');
    }
    public function deletefaq($id)
	{
    $myusers = Faq::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'FAQ deleted successfully');
	}
    public function faqEdit($id){
        $proposals=Faq::find($id);
        return view('admin.faq.edit', compact('proposals'));
    }
    public function updatefaq(Request $data){
		$id = $data->input('id');
		$user = Faq::findOrFail($id);
        $user->update(['question' => $data->question,'answer' => $data->answer]);
		return redirect()->to('/faq')->with('success','FAQ Updated Successfully');
    }
    //battery
    public function battery(){
        $title = 'Battery';
        $projects = Battery::latest()->get();
        return view('admin.battery.index',compact('projects','title'))->with('i',1);
    }
    public function newbattery(){
        $title = 'Add New battery';
        return view('admin.battery.addnew', compact('title'));
    }	
    public function addbattery(Request $request){
        $user = Battery::create([
            'name' => $request->title,
            'manuf' => $request->manuf,
		    'voltage' => $request->voltage,
		    'warranty' => $request->warranty,
		    'price'=> $request->price
        ]);
    return redirect()->to('battery')->with('success','Battery added Successfully');
    }
    public function deletebattery($id)
	{
    $myusers = Battery::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Battery deleted successfully');
	}
    public function batteryEdit($id){
        $proposals=Battery::find($id);
        return view('admin.battery.edit', compact('proposals'));
    }
    public function updatebattery(Request $data){
		$id = $data->input('id');
		$user = Battery::findOrFail($id);
        $user->update([
            'name' => $data->title,
            'manuf' => $data->manuf,
		    'voltage' => $data->voltage,
		    'warranty' => $data->warranty,
		    'price'=> $data->price,
        ]);
		return redirect()->to('/battery')->with('success','Battery Updated Successfully');
    }
    //inverter
    public function inverter(){
        $title = 'Inverter';
        $projects = Inverters::latest()->get();
        return view('admin.inverter.index',compact('projects','title'))->with('i',1);
    }
    public function newinverter(){
        $title = 'Add New Inverter';
        return view('admin.inverter.addnew', compact('title'));
    }	
    public function addinverter(Request $request){
        $user = Inverters::create([
            'name' => $request->title,
            'voltage_nominal' => $request->voltage_nominal,
            'max_power' => $request->max_power,
            'efficiency' => $request->efficiency,
            'price' => $request->price,
        ]);
    return redirect()->to('inverter')->with('success','Inverter added Successfully');
    }
    public function deleteinverter($id)
	{
    $myusers = Inverters::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Inverter deleted successfully');
	}
    public function inverterEdit($id){
        $proposals=Inverters::find($id);
        return view('admin.inverter.edit', compact('proposals'));
    }
    public function updateinverter(Request $data){
		$id = $data->input('id');
		$user = Inverters::findOrFail($id);
        $user->update([
            'name' => $data->title,
            'voltage_nominal' => $data->voltage_nominal,
            'max_power' => $data->max_power,
            'efficiency' => $data->efficiency,
            'price' => $data->price,
        ]);
		return redirect()->to('/inverter')->with('success','Inverter Updated Successfully');
    }
    //modules
    public function modules(){
        $title = 'Module Designs';
        $projects = Modules::latest()->get();
        return view('admin.modules.index',compact('projects','title'))->with('i',1);
    }
    public function newmodules(){
        $title = 'Add New Module';
        return view('admin.modules.addnew', compact('title'));
    }	
    public function addmodules(Request $request){
        $user = Modules::create([
            'name' => $request->title,
            'manuf' => $request->manuf,
            'tech' => $request->tech,
            'rating' => $request->rating,
            'width' => $request->width,
            'thikness' => $request->thikness,
            'height' => $request->height,
            'max_power_voltage' => $request->max_power_voltage,
            'max_power_current' => $request->max_power_current,
            'short_circuit_current' => $request->short_circuit_current,
            'open_circuit_voltage' => $request->open_circuit_voltage,
            'nominal_operating_cell_temp' => $request->nominal_operating_cell_temp,
            'cell_in_series' => $request->cell_in_series,
            'warranty' => $request->warranty,
            'performance_warranty' => $request->performance_warranty,
            'weight' => $request->weight,
            'sku' => $request->sku,
            'color' => $request->color,
            'price_per_unit' => $request->price_per_unit,
            'price_per_watt' => $request->price_per_watt,
        ]);
    return redirect()->to('modules')->with('success','Module added Successfully');
    }
    public function deletemodules($id)
	{
    $myusers = Modules::findOrFail($id);
	$myusers->delete();
	return redirect()->back()->with('destroy', 'Module deleted successfully');
	}
    public function modulesEdit($id){
        $proposals=Modules::find($id);
        return view('admin.modules.edit', compact('proposals'));
    }
    public function updatemodules(Request $data){
		$id = $data->input('id');
		$user = Modules::findOrFail($id);
        $user->update([
            'name' => $data->title,
            'manuf' => $data->manuf,
            'tech' => $data->tech,
            'rating' => $data->rating,
            'width' => $data->width,
            'thikness' => $data->thikness,
            'height' => $data->height,
            'max_power_voltage' => $data->max_power_voltage,
            'max_power_current' => $data->max_power_current,
            'short_circuit_current' => $data->short_circuit_current,
            'open_circuit_voltage' => $data->open_circuit_voltage,
            'nominal_operating_cell_temp' => $data->nominal_operating_cell_temp,
            'cell_in_series' => $data->cell_in_series,
            'warranty' => $data->warranty,
            'performance_warranty' => $data->performance_warranty,
            'weight' => $data->weight,
            'sku' => $data->sku,
            'color' => $data->color,
            'price_per_unit' => $data->price_per_unit,
            'price_per_watt' => $data->price_per_watt,]);
		return redirect()->to('/modules')->with('success','Module Updated Successfully');
    }
}
