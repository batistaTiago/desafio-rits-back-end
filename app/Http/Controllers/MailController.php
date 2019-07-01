<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ApplicationMailable;
use App\Mail\DailyNotification;

class MailController extends Controller {

    public static function sendMail(Request $req) {
        try {

            $targetMail = env('TARGET_MAIL', 'ekyidag@gmail.com');

            $data = [
                'nomeCompleto' => $req->nomeCompleto,
                'email' => $req->email,
                'telefone' => $req->telefone,
            ];

            Mail::to($targetMail)->send(new ApplicationMailable($data));
            return ResponseController::success(['data' => 'success']);
        } catch (\Throwable $exc) {
            return ResponseController::badRequest(['message' => $exc->getMessage()]);
        }
    }

    public static function notify($count) {
        $targetMail = env('TARGET_MAIL', 'ekyidag@gmail.com');

        $data = ['count' => 50];

        Mail::to($targetMail)->send(new DailyNotification($data));
    }

}
