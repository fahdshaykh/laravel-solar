<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeadAttachmentController;

Route::post('/update-task-status',[AdminController::class,'update_task']);
Route::resource('leadattachments',LeadAttachmentController::class);
Route::post('sendemail',[CrmController::class,'sendEmail'])->name('leads.sendemail');
Route::resource('invoices',InvoiceController::class);