<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    // show upload form page
    public function create()
    {
        return view('upload');
    }

    // store file
    public function store(Request $request)
    {
        $file = $request->file('file');

        $path = $file->store('uploads', 'public');

        Upload::create([
            'user_id' => auth()->id(),
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'type' => $file->getClientOriginalExtension(),
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'File uploaded successfully');
    }

    // delete file
    public function destroy($id)
    {
        $upload = Upload::where('user_id', auth()->id())
            ->findOrFail($id);

        $upload->delete();

        return redirect()->route('dashboard')
            ->with('success', 'File deleted successfully');
    }
}