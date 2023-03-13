<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Solicitacao;

class SolicitacaoController extends Controller
{
    public function index()
    {
        return view('solicitacao');
    }

    public function create()
{
    $usuarios = User::all();
    return view('solicitacao', compact('usuarios'));
}
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'responsavel' => 'required|exists:users,id',
    ]);

    $solicitacao = new Solicitacao;
    $solicitacao->nome = $request->nome;
    $solicitacao->descricao = $request->descricao;
    $solicitacao->responsavel_id = $request->responsavel;
    $solicitacao->save();

    return redirect()->route('solicitacao.index')->with('success', 'Solicitação criada com sucesso.');
}

    
}
