<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordExpiredRequest;
use Illuminate\Support\Facades\Auth;

class ExpiredPasswordController extends Controller
{
    public function expired()
    {
        return view('auth.passwords.expired');
    }

    public function postExpired(PasswordExpiredRequest $request)
    {
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'A Palavra-passe actual está incorrecta.']);
        }else if(Hash::check ($request->password, $request->user()->password)){
            return redirect()->back()->withErrors(['password' => 'A nova Palavra-passe deve ser diferente da anterior.']);
        }

        $request->user()->update([
            'password' => bcrypt($request->password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);

        //Auth::logoutOtherDevices($request->current_password);

        return redirect()->to('home')->with(['status' => 'Palavra-passe alterada com sucesso, a sua sessão foi desconectada de outros dispositivos.']);
    }
}
