<?php

use Illuminate\Support\Facades\Auth;

function permission_check($permission)
{
    if (!Auth::user()->hasPermissionTo($permission)) {
        flash()->addWarning('You\'ve no access to this page');

        return redirect()->back()->send();
    }
}
