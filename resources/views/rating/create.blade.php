@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" action="{{route('rating.create')}}">
        <input type="number" name="input_count" value="{{$input_count}}">
        <button type="submit">OK</button>
    </form>    

    <form method="POST" action="{{route('rating.store')}}">
        @csrf

        @for ($i=0; $i<$input_count; $i++) 
            <input type="text" name="rating_title[]" value="test{{$i}}" />
            <input type="number" name="rating_rating[]" value="{{$i}}" />
            <br>
        @endfor

        <button type="submit"> Save</button>
    </form>
</div>    
@endsection