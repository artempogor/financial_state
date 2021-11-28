<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function upload(Request $request)
    {
        // загрузка файла
        if ($request->isMethod('post') && $request->file('userfile')) {

            $file = $request->file('userfile');
            $upload_folder = 'public/folder';
            $filename = $file->getClientOriginalName(); // image.jpg

            $a=Storage::putFileAs($upload_folder, $file, $filename);
            dd($a);
        }
    }

    public function create()
    {
        return view('admin_tabs.register.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|unique:users',
            'ikul' =>'required|numeric|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'login' => $request->login,
            'ikul'=>$request->ikul,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');
        event(new Registered($user));
        $statuslogin=$request->login;
        $statuspassword = $request->password;
        return redirect('register')->with('status', "Пользователь '$statuslogin' зарегистрирован, его пароль '$statuspassword'.");
    }

}
