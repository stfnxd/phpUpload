<div class="dark-background">
    <div class="container">
        <div class="upload-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="uploadFile" enctype="multipart/form-data">
                @csrf
                <label for="file" class="custom-file-upload">
                    <input type="file" id="file" wire:model="file">
                    <span>Choose File</span>
                </label>
                @error('file') <span class="error">{{ $message }}</span> @enderror
                
                @if ($file)
                    <div class="selected-file-info">
                        Selected File: {{ $file->getClientOriginalName() }}
                    </div>
                @endif
                
                <div class="button-container">
                    <button type="submit">Upload File</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .dark-background {
            background-color: #222;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
        }

        .container {
            width: 100%;
            max-width: 400px;
        }

        .upload-container {
            padding: 20px;
            border: 1px solid #333;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        .custom-file-upload {
            border: 2px solid #666;
            display: inline-block;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }
        .custom-file-upload:hover {
            border: 2px solid rgb(184, 73, 21);
            background-color: rgb(184, 73, 21);
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .custom-file-upload span {
            font-size: 16px;
            color: #fff;
        }

        .selected-file-info {
            margin-top: 10px;
            color: #ccc;
        }

        .button-container {
            margin-top: 10px;
        }

        button {
            background-color: rgb(184, 73, 21);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(97, 37, 9);
        }
    </style>
</div>