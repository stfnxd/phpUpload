<?php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Login extends Component
{
    public $name;
    public $password;

    public function render()
    {
        dd("debugging");
        return "Hello, Livewire!";
        // return view('livewire.login');
    }

    public function loginForm()
    {   
        logger('loginForm called');
        // Valideringsregler
        $rules = [
            'password' => 'required|string',
        ];

        // Tilpas fejlmeddelelser
        $messages = [
            'password.required' => 'Adgangskode skal udfyldes.',
        ];

        // Udfør validering
        $this->validate($rules, $messages);

        // Forsøg at logge ind
        $credentials = [
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Brugeren er logget ind
            $this->emit('login'); // Udløs login-hændelsen
            $this->redirect('/'); // Omdiriger brugeren til startsiden
        } else {
            // Brugeren kunne ikke logges ind
            session()->flash('error', 'Forkert adgangskode.');
            return redirect()->route('login');
        }

    }
}