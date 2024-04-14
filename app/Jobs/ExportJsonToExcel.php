<?php

namespace App\Jobs;

use App\Exports\JsonExport;
use App\Models\File;
use App\Models\User;
use App\Notifications\ExportReadyNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExportJsonToExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    /**
     * @var User
     */
    private $user;

    public function __construct(File $file, User $user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    public function handle()
    {
        $jsonData = Storage::disk('public')->get($this->file->file_path);
        $export = new JsonExport($jsonData);

        $fileName = 'export_' . uniqid() . '.xlsx';

        Excel::store($export, $fileName, 'excel_download');
        $this->file->update(["excel_file" => $fileName]);
        // Notify the user with the download link
        $downloadLink = route("excel.download", ["file"=> $this->file->id]);

        // Send a notification to the user with the download link
        // Dispatch the notification
        Notification::route('mail', $this->user->email)
            ->notify(new ExportReadyNotification($downloadLink));
    }
}
