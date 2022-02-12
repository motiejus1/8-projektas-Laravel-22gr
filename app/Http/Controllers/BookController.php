<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\PaginationSetting;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::orderBy('name', 'asc' )->get();
        // ar cia knyga kazkuo susijusi su autoriumi?
        $sortCollumn = $request->sortCollumn; //name
        $sortOrder = $request->sortOrder; // ASC/DESC

        $tem_book = Book::all();
        $book_collumns = array_keys($tem_book->first()->getAttributes());

        if(empty($sortCollumn) || empty($sortOrder)) {
            $books = Book::all();
        } else {

            if($sortCollumn == "author_id") {
                $sortBool = true;
                
                if($sortOrder == "asc"){
                    $sortBool = false;
                }

                $books = Book::get()->sortBy(function($query){
                    return $query->bookAuthor->name;
                }, SORT_REGULAR, $sortBool )->all();
            
            } else {
                $books = Book::orderBy($sortCollumn, $sortOrder )->get();
            }
        }   

         $select_array =  $book_collumns;
        // $select_array = array('author');

        return view('book.index', ['books' => $books, 'authors'=>$authors, 'sortCollumn' =>$sortCollumn, 'sortOrder'=> $sortOrder, 'select_array' => $select_array,  ]);
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
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function bookfilter(Request $request) {
        //1. filtras turi viena inputa kuriame yra select
        //2. tame select yra atvaizduojami visi autoriai
        //3. pasirinktas autorius yra perduodamas per forma i bookfilter funkcija
        //4. ir pagal autoriaus kintamaji mes vykdome filtravima

        // $books = Book::all();

        $author_id = $request->author_id;
        $books = Book::where('author_id', '=' , $author_id)->get();
        return view('book.bookfilter', ['books' =>$books]);
    }

    public function indexpagination(Request $request) {
        //paparastasis puslpaiavimas
        //simplePaginate

        //pilnasis puslapiavimas
        //paginate

          //Isrikiuoti elementus pagal id mazejimo tvarka

        // $books=Book::all()->sortBy('id', SORT_REGULAR, true);

        $sortCollumn = $request->sortCollumn; //name
        $sortOrder = $request->sortOrder; // ASC/DESC

        //Rikiavimo stulpelius
        $tem_book = Book::all();
        $book_collumns = array_keys($tem_book->first()->getAttributes());


        //
        if(empty($sortCollumn) || empty($sortOrder)) {
            $books = Book::paginate(15);
        } else {
            $books = Book::orderBy($sortCollumn, $sortOrder )->paginate(15);
        }   

         $select_array =  $book_collumns;


        // $books = Book::orderBy('title', 'DESC')->paginate(15);

        // $books = Book::paginate(15);

        return view('book.indexpagination', ['books' => $books,'sortCollumn' =>$sortCollumn, 'sortOrder'=> $sortOrder, 'select_array' => $select_array]);
    }

    public function indexsortfilter(Request $request) {

        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;
        $author_id = $request->author_id;// select = 'all'

        
        $paginationSettings = PaginationSetting::where('visible', '=', 1)->get();
        

        $page_limit = $request->page_limit;
        // $page_limit = 15;



            //Rikiavimo stulpelius
            $tem_book = Book::all();
            $book_collumns = array_keys($tem_book->first()->getAttributes());
            $select_array =  $book_collumns;

        //pasirinkti visas knygas kuriu autoriaus id = 1 ir isrikiuoti pagal id mazejimo tvarka

        //Kada page_limit = 1, tai reiskia kad mes norime atvaizduoti visas reiksmes
        //mes norime nuimti puslapiavima
        if(empty( $sortCollumn) || empty($sortOrder) || empty($author_id) )
        {   
            $books = Book::paginate($page_limit);
        
        } else {

            if($author_id == 'all') {
                if($page_limit == 1) {
                    $books= Book::orderBy($sortCollumn, $sortOrder)->get();
                } else {
                    $books= Book::orderBy($sortCollumn, $sortOrder)->paginate($page_limit);
                }
            } else {
                if($page_limit == 1) {
                    $books = Book::where('author_id', '=', $author_id)->orderBy($sortCollumn, $sortOrder)->get();
                } else {
                    $books = Book::where('author_id', '=', $author_id)->orderBy($sortCollumn, $sortOrder)->paginate($page_limit);
                }
            }   
        }

        // $books = Book::where('author_id', '=' , $author_id)->get();
        // $books = Book::orderBy($sortCollumn, $sortOrder )->get();

        // $books 
        $authors = Author::all();

        return view('book.indexsortfilter', [
            'books'=> $books, 
            'authors' => $authors, 
            'select_array'=>$select_array, 
            'sortCollumn'=>$sortCollumn, 
            'sortOrder' => $sortOrder, 
            'author_id'=> $author_id, 
            'paginationSettings' => $paginationSettings, 
            'page_limit' => $page_limit ]);
    }

    public function indexsortable() {


        //atfiltruoti duomenis kur author_id = 2

        $books = Book::where("author_id", "=", 2)->sortable()->paginate(1);
       
        return view('book.indexsortable', ['books'=> $books]);
    }
}
