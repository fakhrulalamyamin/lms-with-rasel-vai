<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        permission_check('user-management');

        $users = User::paginate(10);

        return view('livewire.user-index', [
            'users' => $users
        ]);
    }

    public function userDelete($id)
    {
        permission_check('user-management');

        $user = User::findOrFail($id);

        $user->delete();

        flash()->addInfo('User deleted successfully.');
    }
}
