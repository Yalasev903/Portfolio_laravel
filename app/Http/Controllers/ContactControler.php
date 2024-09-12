<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'comments' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'comments' => $request->comments,
        ];

        // Отправляем письмо
        Mail::send([], [], function($message) use ($data) {
            $message->to('slasev903@gmail.com')
                    ->subject($data['subject'])
                    ->setBody("
                        Имя: {$data['name']}<br>
                        Email: {$data['email']}<br>
                        Тема: {$data['subject']}<br>
                        Сообщение: {$data['comments']}
                    ", 'text/html');
        });

        // Ответ клиенту
        return response()->json([
            'status' => 'Success',
            'msg' => 'Ваше сообщение успешно отправлено!',
        ]);
    }
}
