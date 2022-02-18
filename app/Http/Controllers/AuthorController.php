<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        //filtravimo pavyzdys - paieska


        //1. rikiavimas - duomenu kiekis nesikeicia keiciasi tik duomenu tvarka pagal tam tikra atributa

        //filtravimas - keiciasi duomenu kiekis, atrenkant duomenis pagal tam tikra atributa

        // $authors = Author::all();
        
        //sort() - kai mes gauname neisrikiuota/sumaisyta masyva tiesiai is duomenu bazes id didejimo tvarka
        //sortBy() - pasirinkti, pagal kuri stulpeli norime rikiuoti, didejimo mazejimo(DESC), arba mazejimo didejimo(ASC) tvarkos
        //orderBy() - pasirinkti, pagal kuri stulpeli norime rikiuoti, didejimo mazejimo(DESC), arba mazejimo didejimo(ASC) tvarkos


        // pakeiskime rikiavima pagal id stulpeli nuo didziausio iki maziausio

        // true - DESC, nuo didziausio iki maziausio
        // false - ASC, nuo maziausio iki didziausio


        // 100 autoriu
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
        

        $sortCollumn = $request->sortCollumn; //name
        $sortOrder = $request->sortOrder; // ASC

        if(empty($sortCollumn) || empty($sortOrder)) {
            $authors = Author::all();
        } else {
            $authors = Author::orderBy($sortCollumn, $sortOrder )->get();
        }   


        // $select_array = array('id','name','surname','username','description');

        $select_array =  array_keys($authors->first()->getAttributes());

        //  $select_array = DB::getSchemaBuilder()->getColumnListing('authors');

        //$authors - kolekcija, sudetingesnis masyvas
        // first() - ji grazina viena irasa is kolekcijos
        // paprastas objektas, kolekcijos objektas - raktu ir informacijos
        // getAttributes() - jinai gauna informacija apie kolekcijos objekta kaip apie paprasta masyva
        //array_keys funkcija galiu pasiimti duomenu bazes stulpeliu pavadinimus

        // 0(raktas/key) - id(reiksme)
        // 1(raktas/key) - name(reiksme)
        // ..        
        //pasiimu viena vieninteli autoriu
        // $autorius = $authors->first(); //objektas

        // $autorius = (array)$autorius;
        // $autorius = array_keys($autorius);

        // $select_array = array();
        // foreach($autorius as $autoriaus_parametras)
        // {
        //     $select_array[] = $autoriaus_parametras;
        // }


     //mes negalime algoritmo pagal kuri rikiuojama
        
        //1. index.blade.php dokumente tureti forma
        
        //elektronine parduotuve
        //isirikiavot kompiuterius pagal kaina
        //nusiusti draugui

        //POST /kompiuteriai - jisai musu isrikiuotu kompiuteriu nematytu
        //GET /kompiuteriai?sortCollum=price&order=DESC

        //2. POST GET. GET. Rikiavimo stulpeli ir rikiavimo tvarka
        //3. Spaudziu mygtuka Rikiuok
        //4. Koks action? kokf formos veiksmo kelias? index.blade.php/ route("author.index")/''
        //5. Ko index() funkcijai truksta kad paimti kintamuosius is formos?


        //musu visi duomenys paimti is duomenu bazes, masyvas
        // $authors - kolekcija
        //kolekcija - tam tikras isplestas masyvas kuris savyje turi duomenu apdorojimo funkcijas

        //kolekcija yra visada rikiuojama pagal unikalu identifikatoriu(ID) didejimo tvarka

        return view('author.index', ['authors' => $authors, 'sortCollumn' =>$sortCollumn, 'sortOrder'=> $sortOrder, 'select_array' => $select_array,  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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

    public function search(Request $request) {
        // $authors = Author::all();

        //Atrinkti autoriu/ius kurio/iu id = 34


        
        // $tekstas = '34'; //tekstas
        
        // $skaicius = 34;// skaicius

        // if($tekstas === $skaicius) 
        // {
        //     dd('tiesa');
        // } else {
        //     dd('melas');
        // }

        // $authors = Author::where('name', 'Paula')->get();

        $search_key = $request->search_key;

        $authors = Author::where('description', 'LIKE' , '%'.$search_key.'%')
        ->orWhere('name', 'LIKE', '%'.$search_key.'%')
        ->orWhere('surname', 'LIKE', '%'.$search_key.'%')
        ->orWhere('username', 'LIKE', '%'.$search_key.'%')
        ->orWhere('id', 'LIKE', '%'.$search_key.'%')
        ->get();

        //AND ir OR
        // description panasus yra paieskos zodi ARBA(OR) vardas panasus i paieskos zodi    
        // description panasus yra paieskos zodi ARBA(OR) vardas panasus i paieskos zodi ARBA pavarde panasus i paieskos zodi
        

        // id skaicius
        // 3 like 3
        // skaiciu paverstu i teksta 3 => '3' 13=> '13'
        // simboline paieska
        //%% iesko teksto kuris turi specifini simboli 

        //where() istikro galime nurodyti 3 parametrus
        //1 - parametras stulpelio pavadinimas
        //2 - operacijos veiksmu, =, <, >, <=, >=, LIKE
        // 3 - reiksme
        
        // name = 'Paula'
        // id = 34
        
        //Paieska pagal id stulpeli ir ivedame skaiciu 3
        // 3
        //13
        //23
        //33 ...
        
        // imu autorius, kur yra kazkokia salyga(kur id = 34)
        return view('author.search', ['authors'=> $authors ]);
    }
}
