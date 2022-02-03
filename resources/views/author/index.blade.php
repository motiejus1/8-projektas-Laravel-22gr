@extends('layouts.app')

@section('content')
<div class="container">
    {{-- {{print_r($select_array)}} --}}
    <form method="GET" action="{{route('author.index')}}">
        @csrf
        {{-- <input name="sortCollumn" type="text" /> --}}
        <select name="sortCollumn">
            {{-- <option value="id" selected>ID</option>
            <option value="name">Name</option>
            <option value="surname" >Surname</option>
            <option value="username">Username</option>
            <option value="description" >Description</option> --}}
            @foreach ($select_array as $key=>$item)
                {{-- id, name, surname .. --}}
                {{-- 0, 1, 2, 3 --}}
                {{-- turi buti pazymetas 0 masyvo elementas --}}
                {{$key}}
                @if($item == $sortCollumn || ($key == 0 && empty($sortCollumn)) )
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else 
                <option value="{{$item}}" >{{$item}}</option>
                @endif
                
            @endforeach
        </select>    
        {{-- <input name="sortOrder" type="text" /> --}}
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
    <div class="test">
        {{$sortCollumn}}
        {{$sortOrder}}
    </div>    
    <table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Description</th>
    </tr>

  
        @foreach ($authors as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->name}}</td>
            <td>{{$author->surname}}</td>
            <td>{{$author->username}}</td>
            <td>{{$author->description}}</td>
        </tr> 
        @endforeach
     
    </table>    
</div>
@endsection