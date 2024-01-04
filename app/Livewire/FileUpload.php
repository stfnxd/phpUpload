<?php

namespace App\Livewire;
 
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;
 
class FileUpload extends Component
{
    use WithFileUploads;
 
    public $file;
 
    public function render()
    {
        return view('livewire.file-upload');
    }
 
    public function uploadFile()
    {
        // Validate and check that the file is in Zip/Rar and is under 2048 byte
        $this->validate([
            'file' => 'required|mimes:zip,rar|max:2048',
        ]);
 
        // Making the $filename into unix time_FileName (fx 13204928_ThisisATestFile)
        $filename = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('public/uploads', $filename);

        // Creates the file
        File::create([
            'filename' =>$filename,
        ]);

        session()->flash('success', 'File uploaded successfully!');
    }
}