<?php

namespace App\Services;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function sendMail(Request $request)
    {
        $data = $request->all();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ];

        Mail::to('ardiansupriadi464@gmail.com')->send(new SendEmail($data));
        return $data;
    }
}
