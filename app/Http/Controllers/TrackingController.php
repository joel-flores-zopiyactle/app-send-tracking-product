<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tracking as Tracking;

class TrackingController extends Controller
{

     public function store(Request $request)
     {
        $validatedData = $request->validate([
            //'folio' => ['required', 'unique:sends', 'max:255'],
            'description' => ['required', 'min:15'],
        ]);

        $track = new Tracking;

        $track->body = $request->description;
        $track->user_id = Auth::id();
        $track->send_id = decrypt($request->send_id);

        if ($track->save()) {
            return back()->with('success', 'Mensaje registrado exitosamente!');
        } else {
            return back()->with('error', 'Verifique sus datos!');
        }
     }
}
