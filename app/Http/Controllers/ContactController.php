<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Mail::to('conaldefaoficial@conaldefa.org')->send(new Notification( $validated ));

        return response()->json(['message' => 'Correo enviado con éxito.']);
    }
}
