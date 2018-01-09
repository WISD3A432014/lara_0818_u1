<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function getSend()
    {
        $content='安安你好~';
        $data = ['name' => '太妍', 'content'=> $content, ];
        Mail::send('email.test', $data, function($message){
            $message->subject('Laravel 5 Mail');
            $message->to('mandy19970219@gmail.com', '太妍');
            $message->from('mandy19970219@gm.student.ncut.edu.tw', 'admin');
        });
    }
}