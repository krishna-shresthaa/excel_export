<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadJsonFileRequest;
use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class JsonController extends Controller
{

    public function json()
    {
        return view("upload");
    }

    /**
     * Upload a JSON file.
     *
     * @param UploadJsonFileRequest $request
     * @return RedirectResponse
     */
    public function upload(UploadJsonFileRequest $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Handle the file upload
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        // Store the file path in the database or perform any other necessary operations
        File::create([
            "user_id" => $user->id,
            "file_name" => $request["file_name"],
            "file_path" => $filePath
        ]);

        return redirect()->route("dashboard")->with("success_message", "File uploaded successfully");
    }
}
