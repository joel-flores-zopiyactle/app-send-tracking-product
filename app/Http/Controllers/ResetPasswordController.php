<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidateRoleAdmin;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function show()
    {
        return view('auth.passwords.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = DB::table('users')->where('email', $request->email)->value('email');

        if(empty($email)) {
            return back()->with('error', 'No se encontro concidencias con el correo que ingreso!');
        }

        return view('auth.passwords.reset', compact('email'));
        //return $user;
    }

    public function updatePassword(Request $request) {
        //return $request->all();
        $validate = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'code' => ['required', 'string', new ValidateRoleAdmin],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $newPassword = Hash::make($request->password);

        $user =  DB::table('users')
        ->where('email', $request->email)
        ->update(['password' => $newPassword]);

       if($user) {
        return back()->with('success', 'Contraseña restablecida exitosamente!');
       } else {
        return back()->with('error', 'Fallo al restablecer la contraseña. Recarga la pagina!');
       }

   }
}
