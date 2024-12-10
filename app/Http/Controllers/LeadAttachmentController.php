<?php

namespace App\Http\Controllers;

use App\Models\LeadAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
class LeadAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp,txt,pdf,zip,doc,docx,xls,xlsx|max:2048',
        ]);

        if ($request->file()) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;
            $file->move(public_path('uploads'), $fileName);
           
            // Save file details in database
             if ($fileSize < 1024 * 1024) {
            // If file size is less than 1 MB, convert to KB
                    $fileSizeConverted = round($fileSize / 1024, 2) . ' KB';
                } else {
                    // Otherwise, convert to MB
                    $fileSizeConverted = round($fileSize / (1024 * 1024), 2) . ' MB';
                }
            $uploadedFile = new LeadAttachment();
            $uploadedFile->leads_id = $request->lead_id;
            $uploadedFile->file_name = $fileName;
            $uploadedFile->file_type = $file->getClientOriginalExtension();
            $uploadedFile->file_path = $filePath;
            $uploadedFile->file_size =   $fileSizeConverted;
            $uploadedFile->save();

            return back()->with('success', 'File has been uploaded.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = LeadAttachment::find($id);

        if ($file) {
            $filePath = public_path($file->file_path);

            if (file_exists($filePath)) {
                return Response::download($filePath, $file->file_name);
            } else {
                return redirect()->back()->with('error', 'File not found.');
            }
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadAttachment $leadAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadAttachment $leadAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = LeadAttachment::find($id);
        if ($file) {
            $filePath = public_path($file->file_path);
            if (file_exists($filePath)) {
                File::delete($filePath);
            }
            $file->delete();
            return redirect()->back()->with('success', 'File Removed Successfully.');
        }
        else{
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
