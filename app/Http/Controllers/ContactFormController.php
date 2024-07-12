<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'comments' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'subject', 'comments');

        $to_email = "slasev903@gmail.com";
        $email_subject = "Inquiry From Contact Page";
        $vpb_message_body = nl2br("Dear Admin,\n
        The user whose detail is shown below has sent this message from " . $_SERVER['HTTP_HOST'] . " dated " . date('d-m-Y') . ".\n

        Name: " . $data['name'] . "\n
        Email Address: " . $data['email'] . "\n
        Subject: " . $data['subject'] . "\n
        Message: " . $data['comments'] . "\n
        User Ip: " . getHostByName(getHostName()) . "\n
        Thank You!\n\n");

        $headers = [
            'From' => $data['name'] . ' <' . $data['email'] . '>',
            'Content-type' => 'text/html; charset=iso-8859-1',
        ];

        $status = 'error';
        $output = "Sorry, your email could not be sent at the moment. Please try again or contact this website admin to report this error message if the problem persist. Thanks.";

        try {
            Mail::raw($vpb_message_body, function ($message) use ($to_email, $email_subject, $headers) {
                $message->to($to_email)
                        ->subject($email_subject)
                        ->setHeaders($headers);
            });
            $status = 'success';
            $output = "Congrats " . $data['name'] . ", your email message has been sent successfully! We will get back to you as soon as possible. Thanks.";
        } catch (\Exception $e) {
            // Handle error if needed
        }

        return response()->json(['status' => $status, 'msg' => $output]);
    }
}
