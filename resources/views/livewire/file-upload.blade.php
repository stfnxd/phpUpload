<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
    <form wire:submit.prevent="uploadFile" enctype="multipart/form-data">
        @csrf
        <input type="file" wire:model="file">
        @error('file') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Upload File</button>
    </form>
</div>