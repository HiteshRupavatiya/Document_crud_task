<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserDocumentController extends Controller
{
    public function index()
    {
        $userDocuments = UserDocument::all();
        return view('document.index', compact('userDocuments'));
    }

    public function create()
    {
        $documents = DB::table('documents')->select('id', 'name')->get();
        return view('document.create', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'documentName' => 'required',
            'files.*'      => 'required'
        ]);

        $imageNames = [];

        if ($request->hasFile('files')) {
            $images = $request->file('files');
            foreach ($images as $image) {
                $destinationPath = 'files/';
                $file_name = time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file_name);
                array_push($imageNames, $file_name);
                $data[] = $file_name;
            }
        }

        $userDocument = UserDocument::create([
            'path'        => $imageNames,
            'user_id'     => Auth::user()->id,
            'document_id' => $request->documentName,
            'expires_at'  => now()->addMonths(2),
            'status'      => true,
        ]);

        return redirect()->route('user-document.create')->withSuccess('Image Uploaded Successfully');
    }

    public function edit($id)
    {
        $userDocument = UserDocument::findOrFail($id);
        return view('document.edit', compact('userDocument'));
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
        $userDocument = UserDocument::findOrFail($id)->delete();
        foreach ($userDocument->path as $file) {
            unlink('public/files/' . $file);
        }
        return redirect()->route('user-document.index')->withSuccess('Image Deleted Successfully');
    }
}
