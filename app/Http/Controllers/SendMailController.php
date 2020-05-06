<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class SendMailController extends Controller
{
    public function get_lienhe(){
    	return view('page.lien_he');
    }
     public function post_lienhe(){
    	$data=['hoten'=>'Doan thi linh'];
    	Mail::send('page.blank',$data,function($message){
    		$message->from('doanlinh10hy@gmail.com','Đoàn Linh');
    		$message->to('doanlinh10hy@gmail.com','Đoàn Linh');
            $message->subject('Đây là mail được gửi');
    	});
    }
}
