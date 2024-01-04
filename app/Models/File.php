<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class File extends Model
{
    use HasFactory;

    protected $fillable = [
       'filename',
    ];

    public function deleteFileFromStorage()
    {
        $filePath = 'public/uploads/' . $this->filename;

        // Check if the file exists in storage before attempting to delete
        if (Storage::exists($filePath)) {
            // Delete the file from storage
            Storage::delete($filePath);
        }
    }
}