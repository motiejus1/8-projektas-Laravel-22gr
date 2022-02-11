@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{route('book.indexsortfilter')}}">
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
        <select name="author_id">
            {{-- Visus autorius --}}
            <option value="all">All</option>
            @foreach ($authors as $author)
                @if ($author->id == $author_id)
                    <option value="{{$author->id}}" selected>{{$author->name}} {{$author->surname}}</option>
                @else
                    <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                @endif    
            @endforeach
        </select>
        <select name="page_limit">
            @foreach ($paginationSettings as $setting)
                <option value={{$setting->value}}>{{$setting->title}}</option> 
            @endforeach
        </select>
        <button class="btn btn-secondary" type="submit">Sort</button>
    </form>
    <a href="{{route('book.indexsortfilter')}}" class="btn btn-primary">Clear filter</a>   

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

    {!! $books->appends(Request::except('page'))->render() !!}
</div>    

@endsection