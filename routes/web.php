<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSiteController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\ControllsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('/',[WebSiteController::class,'finance'])->name('finance');

	// Route::get('/stepTwo/{id}/{address}',[WebSiteController::class,'stepTwo']);
	// Route::get('/stepThree/{id}',[WebSiteController::class,'stepThree']);
	// Route::get('/stepFour/{id}',[WebSiteController::class,'stepFour']);
	// Route::get('/stepFive/{id}',[WebSiteController::class,'stepFive']);
	// Route::get('/stepSix/{id}',[WebSiteController::class,'stepSix']);
	// Route::get('/stepSeven/{id}',[WebSiteController::class,'stepSeven']);
	// Route::get('/results/{id}',[WebSiteController::class,'results']);
	// Route::post('addproposalfront', [AdminController::class, 'addproposalfront'])->name('addproposalfront');
	// Route::post('updateproposalfront', [AdminController::class, 'updateproposalfront'])->name('updateproposalfront');
	// Route::post('updateproposalfronthouse', [AdminController::class, 'updateproposalfronthouse'])->name('updateproposalfronthouse');
	// Route::post('updateproposalfronthousetype', [AdminController::class, 'updateproposalfronthousetype'])->name('updateproposalfronthousetype');
	// Route::post('updateproposalfrontroof', [AdminController::class, 'updateproposalfrontroof'])->name('updateproposalfrontroof');
	// Route::post('updateproposalfrontinfo', [AdminController::class, 'updateproposalfrontinfo'])->name('updateproposalfrontinfo');
	//updateproposalfrontinfo
	
	//a testing route
	Route::get('shoaib',[WebSiteController::class,'shoaib']);
    Route::middleware('auth')->group(function () {
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{user}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //ye nechy wala
    Route::get('changepassword/{id}',[AdminController::class,'changepassword'])->name('admin.changepassword');
    Route::post('updatepassword',[AdminController::class,'updatepassword'])->name('admin.updatepassword');
	//deleteuser
	Route::get('userEdit/{id}', [AdminController::class, 'userEdit']);
	Route::get('usersts/{id}/{sts}', [AdminController::class, 'usersts']);
	Route::post('updateuser', [AdminController::class, 'updateuser']);
    //Speaker Controller
	Route::post('saveimage', [AdminController::class, 'saveimage'])->name('saveimage');
    Route::get('speakers/editprofile',[AdminController::class,'editprofile'])->name('users.editprofile');
    Route::post('speakers/updateprofile',[AdminController::class,'updateprofile'])->name('users.updateprofile');
    //all proposals.
	Route::get('proposals',[AdminController::class,'proposals'])->name('admin.proposals');
	Route::get('proposalsnew',[AdminController::class,'proposalsnew'])->name('admin.proposalsnew');
	Route::get('newproposal', [AdminController::class, 'newproposal'])->name('newproposal');
	Route::get('newproposaltesting', [AdminController::class, 'newproposaltesting'])->name('newproposaltesting');
	
	Route::post('addproposal', [AdminController::class, 'addproposal'])->name('addproposal');
	Route::post('/deleteproposal/{id}', [AdminController::class,'deleteproposal'])->name('deleteproposal');
	Route::get('proposalEdit/{id}', [AdminController::class, 'proposalEdit']);
	Route::post('updateproposal', [AdminController::class, 'updateproposal']);

	Route::get('proposalInfo/{id}', [AdminController::class, 'proposalInfo']);
	Route::get('proposalEnergy/{id}', [AdminController::class, 'proposalEnergy']);
	Route::get('proposalDesign/{id}', [AdminController::class, 'proposalDesign']);
	Route::get('proposalPayment/{id}', [AdminController::class, 'proposalPayment']);
	Route::get('proposalOnline/{id}', [AdminController::class, 'proposalOnline']);
	Route::get('proposalManage/{id}', [AdminController::class, 'proposalManage']);
	
		
		Route::post('addleadactivity', [AdminController::class, 'addleadactivity'])->name('addleadactivity');
		//all tasks.
		
		Route::get('web/showspeaker/{id}', [AdminController::class, 'profileview']);
		
	
	
	Route::get('myleads',[CrmController::class,'myleads'])->name('crm.myleads');
	Route::get('leadsdetails/{id}',[CrmController::class,'leadsdetails'])->name('crm.leadsdetails');
	Route::get('leadedit/{id}',[CrmController::class,'leadedit'])->name('crm.leadedit');
	
	Route::get('dealsdetails',[CrmController::class,'dealsdetails'])->name('crm.dealsdetails');
	
	Route::get('contacts',[CrmController::class,'contacts'])->name('crm.contacts');
	Route::post('createlead', [CrmController::class, 'createlead'])->name('createlead');
	Route::post('updatemylead', [CrmController::class, 'updatemylead'])->name('updatemylead');
	Route::post('updatemyleadsts', [CrmController::class, 'updatemyleadsts'])->name('updatemyleadsts');
	Route::post('/deletelead/{id}', [CrmController::class,'deletelead'])->name('deletelead');

	Route::get('websetting',[ControllsController::class,'webelieve'])->name('websetting');
	Route::post('updatewebelieve', [ControllsController::class, 'updatewebelieve']);
	//all financing.
	Route::get('financingEdit/{id}', [ControllsController::class, 'financingEdit']);
	Route::post('updatefinancing', [ControllsController::class, 'updatefinancing']);

	Route::get('quoteEdit/{id}', [ControllsController::class, 'quoteEdit']);
	Route::post('updatequote', [ControllsController::class, 'updatequote']);
	
	
	
	

});

require __DIR__.'/auth.php';
require __DIR__.'/jdroutes.php';