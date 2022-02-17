@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" action="{{route('book.indexsortable')}}">
        @csrf

        <input type="hidden" name="sort" value="{{$sort}}">
        <input type="hidden" name="direction" value="{{$direction}}" />

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
                @if ($page_limit == $setting->value)
                <option value={{$setting->value}} selected>{{$setting->title}}</option>
                @else 
                <option value={{$setting->value}}>{{$setting->title}}</option>
                @endif
            @endforeach
        </select>
        <button class="btn btn-secondary" type="submit">Sort</button>
    </form>
    <a href="{{route('book.indexsortfilter')}}" class="btn btn-primary">Clear filter</a>   


<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        {{-- jeigu nurodau pirmaji funkcijos argumenta rysio stulpeli ir name  --}}
        <th>@sortablelink('bookAuthor.name', 'Author Id')</th>
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
    @if($page_limit != 1)
        {!! $books->appends(Request::except('page'))->render() !!}
    @endif
</div>    

@endsection