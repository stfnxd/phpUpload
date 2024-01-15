<div class="dark-background">
    @livewireScripts
    <div class="container">
        <div class="login-container">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="loginForm">
                @csrf
                <div class="form-group">
                    <label for="password">Adgangskode:</label>
                    <input type="password" id="password" wire:model="password" class="form-control">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            
                <div class="button-container">
                    <button type="submit">Log ind</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

        document.addEventListener('livewire:login', function () {
            dd("hallå?");
            console.log('Livewire login event triggered.'); // Tilføj denne linje
        window.location.href = '{{ url('/') }}'; // Omdiriger til hjemmesiden
    });


    // Lyt efter Livewire-error-hændelsen og vis fejlbesked
    Livewire.on('error', message => {
        alert('Fejl: ' + message);
    });
</script>
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

    .login-container {
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

    .form-group {
        margin-bottom: 20px;
        width: 100%;
        text-align: left;
    }

    label {
        display: block;
        color: #ccc;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #666;
        border-radius: 4px;
        background-color: #444;
        color: #fff;
    }

    input:focus {
        outline: none;
        border: 1px solid rgb(184, 73, 21);
    }

    .error {
        color: rgb(184, 73, 21);
        font-size: 14px;
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