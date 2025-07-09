<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\GuestBookInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    private GuestBookInterface $guestBook;

    public function __construct(GuestBookInterface $guestBook)
    {
        $this->guestBook = $guestBook;
    }

    public function index(Request $request)
    {
        $guestBooks = $this->guestBook->get($request);

        return view('school.pages.guest-book.index', compact('guestBooks'));
    }
}
