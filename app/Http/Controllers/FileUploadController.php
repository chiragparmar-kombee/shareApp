<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function create()
    {
        return view('file-upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $filePath = Storage::disk('shared')->put('users', $request->file('file'));
            return back()->with('success', 'File uploaded successfully!')->with('filePath', $filePath);
        }

        return back()->withErrors(['file' => 'There was an issue uploading the file.']);
    }
}
