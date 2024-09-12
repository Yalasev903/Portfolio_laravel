<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // Исправлен импорт

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'comments' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'comments' => $request->input('comments'),
        ];

        // Отправляем письмо
        Mail::to('slasev903@gmail.com')->send(new ContactFormMail($data));

        // Ответ клиенту
        return response()->json([
            'status' => 'Success',
            'msg' => 'Ваше повідомлення успішно надіслано!',
        ]);
    }
}
