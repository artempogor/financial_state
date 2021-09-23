<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;

class ChangePassword extends Controller
{
    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()
                ->with('error', 'Не верно введён действующий пароль');
        }
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Пароль умпешно обновлен!');
    }
}