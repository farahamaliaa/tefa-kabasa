<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function sendMail(Request $request)
    {
        try {
            $this->contactService->sendMail($request);
            return back()->with('success','Pesan anda sudah terkirim!');
        } catch (\Throwable $th) {
            return back()->with('error','Ada beberapa kesalahan!'.$th->getMessage());
        }
    }
}
