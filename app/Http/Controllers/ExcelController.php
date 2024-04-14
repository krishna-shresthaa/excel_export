<?php

namespace App\Http\Controllers;

use App\Jobs\ExportJsonToExcel;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{

    public function excel()
    {
        $files = auth()->user()->files()->select("id", "file_name", "file_path")->get();

        return view("excel_export", compact("files"));
    }

    /**
     * Export the JSON file to an Excel file.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function export(Request $request)
    {
        // Validate the request
        $request->validate([
            'file_id' => 'required|numeric',
        ]);

        // Get the file
        $file = File::findOrFail($request["file_id"]);

        ExportJsonToExcel::dispatch($file, auth()->user());

        return redirect()->route("dashboard")->with("success_message", "Export has started, you will be notified via email");
    }

    public function download(File $file)
    {
//        check if user is authorized to download the file
        if ($file->user_id == auth()->user()->id) {
            $filePath = Storage::disk('excel_download')->path($file->excel_file);

            return response()->download($filePath);
        }

        abort("401");
    }
}
