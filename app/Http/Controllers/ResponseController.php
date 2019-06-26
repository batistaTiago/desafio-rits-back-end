<?php

namespace App\Http\Controllers;

class ResponseController extends Controller {

    public static function notFound() {
        return response()->json(['error' => ['code' => 404, 'message' => 'Não encontrado']], 404);
    }

    public static function badRequest() {
        return response()->json(['error' => ['code' => 400, 'message' => 'Requisição mal construída']], 400);
    }

    public static function unauthorized() {
        return response()->json(['error' => ['code' => 401, 'message' => 'Não autorizado. Envie um bearer token.']], 401);
    }

    public static function success($data) {
        return response()->json($data, 200);
    }

    public static function created($data) {
        return response()->json($data, 201);
    }
    
}
