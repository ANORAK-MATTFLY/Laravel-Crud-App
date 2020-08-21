<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use App\Categorie;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Crud::join("categories","categories.id","cruds.id_categorie")->select("cruds.*","categories.nom")->paginate(5);
        return view('index', compact('data', 'categorie'))
               ->with('i', (request()->input('page', 1) -1) *5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]);
        $form_data = array(
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'id_categorie' => $request->id_categorie
        );
        crud::create($form_data);
        return redirect('crud')->with('seccess', 'Data Added successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Crud::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $post = Crud::find($id);
        // dd($post->titre);
        return view('edit', compact('post'));
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
        $post = Crud::find($id);
        $post->titre = request() ->titre; 
        $post->contenu = request() ->contenu; 
        $post->save();
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Crud::destroy($id);
        return redirect()->route('crud.index');
    }
}
