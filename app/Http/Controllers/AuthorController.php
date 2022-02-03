<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //1. rikiavimas - duomenu kiekis nesikeicia keiciasi tik duomenu tvarka pagal tam tikra atributa

        //filtravimas - keiciasi duomenu kiekis, atrenkant duomenis pagal tam tikra atributa

        // $authors = Author::all();
        
        //sort() - kai mes gauname neisrikiuota/sumaisyta masyva tiesiai is duomenu bazes id didejimo tvarka
        //sortBy() - pasirinkti, pagal kuri stulpeli norime rikiuoti, didejimo mazejimo(DESC), arba mazejimo didejimo(ASC) tvarkos
        //orderBy() - pasirinkti, pagal kuri stulpeli norime rikiuoti, didejimo mazejimo(DESC), arba mazejimo didejimo(ASC) tvarkos


        // pakeiskime rikiavima pagal id stulpeli nuo didziausio iki maziausio

        // true - DESC, nuo didziausio iki maziausio
        // false - ASC, nuo maziausio iki didziausio


        // 1000 autoriu
        // kreipkis i duomenu baze
        // PASIIMK VISKA
        // sukisk viska i kolekcija
        //ir rikiuok pacia kolekcija
        // kompiuterio/serveris atmintis
        // $authors = Author::all()->sortBy('name', SORT_REGULAR, false ); //::all 
        

        //ASC
        //DESC
        // 1000 autoriu
        //kreipkis i duomenu baze ir isrikiuok duomenubazeje(duombazes algoritmas isrikiuoja)
        //viskas patalpinama i kolekcija
        //ir kolekcija iskart atvaizduot
        $authors = Author::orderBy('name', 'ASC' )->get(); //mes negalime algoritmo pagal kuri rikiuojama
        
        
        //musu visi duomenys paimti is duomenu bazes, masyvas
        // $authors - kolekcija
        //kolekcija - tam tikras isplestas masyvas kuris savyje turi duomenu apdorojimo funkcijas

        //kolekcija yra visada rikiuojama pagal unikalu identifikatoriu(ID) didejimo tvarka

        return view('author.index', ['authors' => $authors]);
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
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
