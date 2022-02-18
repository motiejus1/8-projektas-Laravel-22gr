<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

use Illuminate\Http\Request;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   


        $input_count = $request->input_count;

        if(empty($input_count)) {
            $input_count = 3;
        }

        
        return view('rating.create', ['input_count'=> $input_count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rating_title = $request->rating_title; //6, MASYVAS
        $total = count($rating_title); //6
      
        for($i=0; $i<$total; $i++) {
        
                $rating = new Rating;
                $rating->title = $request->rating_title[$i];
                $rating->rating = $request->rating_rating[$i];

                $rating->save();
        }

        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }

    public function createjavascript() {
        return view('rating.createjavascript');
    }
    public function storejavascript(Request $request) {
        $rating_title = $request->rating_title; //6, MASYVAS
        $total = count($rating_title); //6
      
        for($i=0; $i<$total; $i++) {
        
                $rating = new Rating;
                $rating->title = $request->rating_title[$i];
                $rating->rating = $request->rating_rating[$i];

                $rating->save();
        }

        return 0;
    }
}
