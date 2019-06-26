<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    public function store(Request $req)
    {

        $this->validate(request(), [
            'nomeCompleto' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'linkedinURL' => 'required',
            'githubURL' => 'required',
            'nivelIngles' => 'required',
            'pretensaoSalarial' => 'required',
            'curriculo' => 'required',
        ]);



        try {
            $result = Application::create($req);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            return ResponseController::badRequest();
        }
    }

    public function index(Request $req) {
        $status = $req->query('status');
        if (isset($status)) {
            $result = Application::getByStatus($status);
        }
        else {
            $result = Application::all();
        }
        return ResponseController::success($result);
    }

    public function update($id, Request $req) {
        $this->validate(request(), [
            'status' => 'required'
        ]);

        $status = $req->status;

        try {
            $this->validateStatus($status);
            $result = Application::updateStatus($id, $req->status);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            return ResponseController::badRequest();
        }
    }

    private $validStatuses = ['pendente', 'processamento', 'aceito', 'rejeitado'];

    private function validateStatus($status) {
        if (!in_array($status, $this->validStatuses)) {
            throw \Throwable('status invalido');
        }
    }
}