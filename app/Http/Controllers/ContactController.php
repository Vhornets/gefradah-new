<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendFeedback;
use Validator;

class ContactController extends Controller {
    public function sendFeedback(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 200);
        }         

        Mail::to(env('ADMIN_EMAIL'))->send(new SendFeedback($request->all()));

        return response()->json(['success' => 'Your message successfully sent'], 200);
    }
}
