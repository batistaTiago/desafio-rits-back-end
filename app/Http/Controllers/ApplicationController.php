<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use Illuminate\Support\Facades\Storage;
use Log;

class ApplicationController extends Controller
{


    public function index(Request $req) {
        $status = $req->query('status');
        if (isset($status)) {
            $result = Application::getByStatus($status);
        }
        else {
            $result = Application::getAll();
        }
        return ResponseController::success($result);
    }



    public function store(Request $req)
    {

        \Log::info('recebendo store request');

        $this->validate(request(), [
            'nomeCompleto' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'linkedinURL' => 'required',
            'githubURL' => 'required',
            'english_level_id' => 'required',
            'pretensaoSalarial' => 'required',
            'curriculo' => 'required',
        ]);

        try {
            $result = Application::create($req);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            \Log::info('erro');
            return ResponseController::badRequest();
        }
    }

    public function download($id) {
        $application = Application::find($id);
        if (isset($application)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($application->curriculo);
            return ResponseController::download($path, $application->nomeOriginalArquivo);
        } else {
            return ResponseController::notFound();
        }
    }

    private $validStatusIds = [1, 2, 3, 4];

    public function update($id, Request $req) {
        $this->validate(request(), [
            'status' => 'required'
        ]);

        try {
            $this->validateStatus($req->status);
            $result = Application::updateStatus($id, $req->status);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            Log::info($exc);
            return ResponseController::badRequest();
        }
    }

    private function validateStatus($status) {
        if (!in_array($status, $this->validStatusIds)) {
            throw new \Exception('status invalido');
        }
    }
}
