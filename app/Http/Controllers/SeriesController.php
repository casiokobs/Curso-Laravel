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
        $msgSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series',$series)->with('msgSucesso', $msgSucesso);
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
        Serie::create($request->all());
        return redirect('/series');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem.sucesso', 'A série foi removida com sucesso.');
        return redirect('/series');
    }
}
