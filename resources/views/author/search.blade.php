@extends('layouts.app')

@section('content')
    <div class='container'>
        <table class="tbale table-striped">
            <tr>
                <th>Id</th>
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