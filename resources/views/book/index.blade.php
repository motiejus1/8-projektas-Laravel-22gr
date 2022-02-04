@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{route('book.index')}}">
        @csrf
        <select name="sortCollumn">
            @foreach ($select_array as $key=>$item)
                @if($item == $sortCollumn || ($key == 0 && empty($sortCollumn)) )
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else 
                <option value="{{$item}}" >{{$item}}</option>
                @endif
                
            @endforeach
        </select>    
        <select name="sortOrder">
            @if ($sortOrder == 'asc' || empty($sortOrder))
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            @else 
                <option value="asc">Ascending</option>
                <option value="desc" selected>Descending</option>
            @endif
        </select>    
        <button type="submit">Rikiuok</button>
    </form>

    <form method="GET" action="{{route('book.bookfilter')}}">
        @csrf
    <select name="author_id">
        {{-- Visus autorius --}}
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
    </form>    

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Author id</th>
    </tr>

  
        @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            {{-- autoriaus varda ir pavarde --}}
            <td>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>
        </tr> 
        @endforeach
     
    </table>
</div>    

@endsection