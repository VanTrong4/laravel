<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailToUser;
use App\Mail\MailToAdmin;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
class MailControl extends Controller
{
    //
    public function store(Request $request)
    {
        $mailData = [
            'title' => 'hello',
        ];
        // Mail::to('vantrong435@gmail.com')->send(new MailToUser($mailData));
        // Mail::to('ps2210001@gmail.com')->send(new MailToAdmin($mailData));
        return Inertia::render('ThankSender');
    }
}
