<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $msgSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series',$series)->with('msgSucesso', $msgSucesso);
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', "A série '{$serie->nome}' foi cadastrada com sucesso!");
        return redirect('/series');
    }
    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        Serie::destroy($request->id);
        $request->session()->flash('mensagem.sucesso', "A série '{$serie->nome}' foi removida com sucesso!");
        return redirect('/series');
    }
}
