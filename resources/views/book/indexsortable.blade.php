@extends('layouts.app')

@section('content')
<div class="container">

<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>@sortablelink('author_id', 'Author Id')</th>
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