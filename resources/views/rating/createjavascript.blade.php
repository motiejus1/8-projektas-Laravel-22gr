@extends('layouts.app')


{{-- <style>
    p {
        color:red;
    }

    #test {
        color:red;
    }

    .test {
        color:red;
    }
</style> --}}

@section('content')
<div class="container">

    <button id="add_field" class="btn btn-primary">Add</button>
    <button id="remove_field" class="btn btn-danger"> Remove</button>
    
    <input id="input_count" type="text" value="1"/>
    <button id="submit_number">Ok</button>

    <form method="POST" action="{{route('rating.storejavascript')}}">
        @csrf
        <div class="input-rating">
            <input type="text" name="rating_title[]" value="test" />
            <input type="number" name="rating_rating[]" value="1" />
        </div>
        <div class="info"></div>
        <button type="submit"> Save</button>
    </form>

    
</div>
<script>
    //JQuery

    $(document).ready(function() {
        //dabar mygtukas add_field isves teksta "mygtukas paspaustas" i p zyme kurios klase yra info
        $('#add_field').click(function(){
            $('.info').append('<div class="input-rating"><input type="text" name="rating_title[]" value="test" /><input type="number" name="rating_rating[]" value="1" /></div>');
        });

        $('#remove_field').click(function() {
            //kaip pasirinkti paskutini elementa kurio clase yra input-rating
            $('.input-rating:last-child').remove();
        });

        $('#submit_number').click(function() {
            let input_count;
            input_count = $('#input_count').val();
            //jeigu is inputo mes pasiima skaiciu
            //javascript ji gali interpetuoti kaip teksta
            for(let i=0; i<input_count; i++ ) {
                $('.info').append('<div class="input-rating"><input type="text" name="rating_title[]" value="test" /><input type="number" name="rating_rating[]" value="1" /></div>');
            }
            //is input laukelio turi buti paimama jo reiksme input_count
            //input count sukasi ciklas kuries prie div info tiesiog tiek kartu appendina inputus, kokia yra input_Count
        });
    });

    console.log('scriptas veikia');
</script>    
@endsection