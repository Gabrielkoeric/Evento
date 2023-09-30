<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngressosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ingressos = DB::table('ingressos')
            ->select('id_ingressos', 'nome', 'descricao', 'quantidade', 'quantidade_disponivel', 'valor')
            ->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('ingressos.index')->with('ingressos', $ingressos)->with('mensagemSucesso', $mensagemSucesso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingressos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $descricao = $request->input('descricao');
        $quantidade = $request->input('quantidade');
        $quantidadeDisponivel = $request->input('quantidadeDisponivel');
        $valor = $request->input('valor');
        //dd("nome é $nome, descrição é $descricao, quantidade é $quantidade, quantidade disponivel é $quantidadeDisponivel, e valor é $valor");

        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'quantidade' => $quantidade,
            'quantidade_disponivel' => $quantidadeDisponivel,
            'valor' => $valor
        ];
        DB::table('ingressos')->insertGetId($dados);
        return redirect('/ingressos')->with('mensagem.sucesso', 'Ingresso inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingressos $ingressos)
    {
        return view('usuarios.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
