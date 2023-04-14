<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailInfo;
use Illuminate\Http\RedirectResponse;
class MailControl extends Controller
{
    //
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'Furigana' => 'required|string|max:255',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'gender' => 'required',
        ],
        [
            'required' => 'こちらは必須入力となります。',
            'email' => '※正しい書式でご記入ください',
            'gender.required' => '1つのみ選択可能'
        ]);
        $mailData = [
            'title' => 'Mail test',
            'body' => 'test'
        ];
        dd($request->name);
        Mail::to('ps2210001@gmail.com')->send(new MailInfo($mailData));
    }
}
