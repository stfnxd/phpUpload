<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;

class AuthenticateUploads
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
    
        $link = Link::find($id);
    
        if ($link && Auth::attempt(['name' => $link->name, 'password' => $link->password])) {
            return redirect('/uploads/'.$id);
        }
    
        return redirect('/login');
    }
}