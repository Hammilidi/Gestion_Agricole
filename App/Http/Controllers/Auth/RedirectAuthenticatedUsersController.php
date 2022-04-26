<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    //
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/adminDashboard');
        } elseif (auth()->user()->role == 'editor') {
            return redirect('/editorDashboard');
        } elseif (auth()->user()->role == 'viewer') {
            return redirect('/viewerDashboard');
        } else {
            return auth()->logout();
        }
    }
}
