<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class Application extends Model
{

    public function englishLevel() {
        return $this->belongsTo('App\EnglishLevel');
    }

    public function applicationStatus() {
        return $this->belongsTo('App\ApplicationStatus');
    }

    protected $with = [
        'EnglishLevel:id,nivelIngles', 
        'ApplicationStatus:id,status'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'english_level_id', 
        'application_status_id', 
        'nomeOriginalArquivo'
    ];

    public static function getAll() {
        $applications = Application::all();

        // foreach ($applications as $a) {
        //     $status = ApplicationStatus::find($a->id)->status;
        //     $nivelIngles = EnglishLevel::find($a->id)->nivelIngles;
        //     $a->nivelIngles = $nivelIngles;
        //     $a->status = $status;
        // }

        return $applications;

    }

    public static function create(Request $req) {

        $file = $req->file('curriculo');

        $application = new Application();
        $application->nomeCompleto = $req->nomeCompleto;
        $application->email= $req->email;
        $application->telefone = $req->telefone;
        $application->linkedinURL = $req->linkedinURL;
        $application->githubURL = $req->githubURL;
        $application->english_level_id = $req->english_level_id;
        $application->pretensaoSalarial = $req->pretensaoSalarial;
        $application->curriculo = $file->store('curriculos', 'public');
        $application->nomeOriginalArquivo = $file->getClientOriginalName();
        $application->save();
        return $application;
    }

    public static function updateStatus($id, $status)  {
        $application = Application::find($id);
        $application->application_status_id = $status;
        $application->applicationStatus; // ver se não tem como fazer de um jeito melhor
        $application->save();
        return $application;
    }

    public static function getByStatus($status) {
        return Application::where('status', $status)->get();
    }
}
