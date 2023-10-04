<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller{
    public function index() {
        return view("salas.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("salas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $rules = [
            'nome' => 'required|min:10|max:50',
            'descricao' => 'required|min:10|max:100',
            'eixo'  => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($rules, $msgs);

        $reg = new Sala();
        $reg->nome = mb_strtoupper($request->nome, 'UTF-8');
        $reg->descricao = mb_strtoupper($request->descricao, 'UTF-8');

        $obj_eixo = Eixo::find();

        if(!isset($obj_eixo)){ return "<h1>Eixo não encotrado!</h1>"; }

        $reg->eixo()->associate($obj_eixo);

        $reg->save();

        return redirect()->route("salas.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Sala::with(['eixo'])->get();

        if(!isset($data)) { return "<h1> $id não encontrado </h1>"; }

        return redirect("salas.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $obj = Sala::with(['eixo'])->get();

        if(!isset($obj)) { return "<h1> $id não encontrado </h1>"; }
        $rules = [
            'nome' => 'required|min:10|max:50'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($rules, $msgs);

        $reg = new Sala();
        $reg->nome = $request->nome;

        $reg->save(); 

        return redirect()->route("salas.index");
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $obj = Sala::find($id);

        if(!isset($obj)) { return "<h1> $id não encontrado </h1>"; }

        $obj->destroy($id);

        return redirect()->route("atividade.index");
    }
}
