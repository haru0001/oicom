<?php

namespace App\Http\Views\Composers;

use Illuminate\View\View;
use Auth;

class UsersComposer
{
    protected $user;

    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with('user', $user);
    }
}