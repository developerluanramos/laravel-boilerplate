<?php

namespace App\Http\Controllers;

use App\Enums\ProfilesEnum;
use App\Models\Postagem;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $novos_criadores = User::query()
            ->where('role', ProfilesEnum::criador)
            ->limit(20)
            ->orderBy('created_at', 'desc')
            ->get();

        $postagens_em_alta = Postagem::query()
            ->with('criador')
            ->limit(6)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('welcome', [
            'novos_criadores' => $novos_criadores,
            'postagens_em_alta' => $postagens_em_alta
        ]);
    }
}
