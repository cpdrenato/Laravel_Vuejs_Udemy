<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;
use Illuminate\Support\Facades\DB; //Database: Query Builder

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //referente ao component bootstrap que indica paginas - migalhas
        $listaMigalhas = json_encode([
          ["titulo"=>"Admin","url"=>route('admin')],
          ["titulo"=>"Lista de artigos","url"=>""],
        ]);
        //$listaArtigos = json_encode(Artigo::all()); // traz todos
      /*  $listaArtigos = Artigo::select('id','titulo','descricao','user_id','data')->paginate(5);
        //$listaArtigos = json_encode(Artigo::select('id','titulo','descricao','data')->get());

        foreach ($listaArtigos as $key => $value) {
          $value->user_id = \App\User::find($value->user_id)->name;
          //outra opcao e usar metodo de relacionamento para buscar autor
          // $value->user_id = $value->user->name;
          // unset($value->user);
        }

        //usar Database: Query Builder --> Aula 51
        $listaArtigos = DB::table('artigos')
                        ->join('users','users.id','=','artigos.user_id')
                        ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                        ->whereNull('deleted_at')
                        ->paginate(5);*/

        //lista artigos vai vir do modelo Artigo
        $listaArtigos = Artigo::listaArtigos(5);

        return view('admin.artigos.index',compact('listaMigalhas','listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd tipo vardump php
        //dd($request->all());
        $data = $request->all();
        //Validators
        $validacao = \Validator::make($data,[
          "titulo" => "required",
          "descricao" => "required",
          "conteudo" => "required",
          "data" => "required",
        ]);
        if($validacao->fails()){
          return redirect()->back()->withErrors($validacao)->withInput();
        }
        $user = auth()->user();
        $user->Artigos()->create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Artigo::find($id);//laravel vai retorna um json.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $data = $request->all();
      //Validators
      $validacao = \Validator::make($data,[
        "titulo" => "required",
        "descricao" => "required",
        "conteudo" => "required",
        "data" => "required",
      ]);
      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }
      $user = auth()->user();
      $user->artigos()->find($id)->update($data);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::find($id)->delete();
        return redirect()->back();
    }
}
