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
        $this->validate([
            'file' => 'required|mimes:zip,rar|max:2048',
        ]);
 
        $filename = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('public/uploads', $filename);

        // You can also save the file path or other details to the database if needed
        File::create([
            'filename' =>$filename,
        ]);

        session()->flash('success', 'File uploaded successfully!');
    }
}