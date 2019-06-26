<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Application extends Model
{

    public static function create(Request $req) {
        $application = new Application();
        $application->nomeCompleto = $req->nomeCompleto;
        $application->email= $req->email;
        $application->telefone = $req->telefone;
        $application->linkedinURL = $req->linkedinURL;
        $application->githubURL = $req->githubURL;
        $application->nivelIngles = $req->nivelIngles;
        $application->pretensaoSalarial = $req->pretensaoSalarial;
        $application->curriculo = 'jaja';
        $application->save();
        return $application;
    }

    public static function updateStatus($id, $status)  {
        $application = Application::find($id);
        $application->status = $status;
        $application->save();
        return $application;
    }

    public static function getByStatus($status) {
        return Application::where('status', $status)->get();
    }
}
