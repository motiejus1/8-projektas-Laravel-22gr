@extends('layouts.app')

@section('content')

<div class="container">

    <div class="errors">
        {{-- {{print_r($errors)}}; --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>    
                    @endforeach
                </ul>
            </div>
        @endif    

    </div>    
    <form method="POST" action="{{ route('author.store')}}">
        @csrf
        <div class="form-group">
            <label for="author_name">Name</label>
            <input class="form-control @error('author_name') is-invalid @enderror" type='text' name='author_name' value="{{ old('author_name') }}" />
         {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
            @error('author_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_surname">Surname</label>
            <input class="form-control @error('author_surname') is-invalid @enderror" type='text' name='author_surname' value="{{ old('author_surname') }}" />
            @error('author_surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_username">Username</label>
            <input class="form-control @error('author_username') is-invalid @enderror" type='text' name='author_username' value="{{ old('author_username') }}"  />
            @error('author_username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_description">Description</label>
            <textarea class="form-control @error('author_description') is-invalid @enderror" name='author_description'>
                {{ old('author_description') }}
            </textarea>
            @error('author_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_newbooks">Add new books?</label>
            <input id="author_newbooks" type="checkbox" name="author_newbooks"/>
            {{-- checkbox neturi value atributo --}}
            {{-- jei chekbox nepazymetas, i backend yra grazinama false reiksme, jei pazymetas true --}}

            {{-- checkbox turi value atributa --}}
            {{-- jei chekbox nepazymetas, i backend yra grazinama false reiksme, jei pazymetas bet tai kas parasyta value --}}

            {{-- validaciju testavimas. gt, lt funkcijos --}}
            <div class="form-group">
                <label for="number1">Number 1</label>
                <input class="form-control @error('number1') is-invalid @enderror" type='number' name='number1' value="{{ old('number1') }}" />
             {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
                @error('number1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="number2">Number 2</label>
                <input class="form-control @error('number2') is-invalid @enderror" type='number' name='number2' value="{{ old('number2') }}" />
             {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
                @error('number2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Datu validacija --}}

 <div class="form-group">
                <label for="data1">data1</label>
                <input class="form-control @error('data1') is-invalid @enderror" type='text' name='data1' value="{{ old('data1') }}" />
             {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
                @error('data1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="data2">data2</label>
                <input class="form-control @error('data2') is-invalid @enderror" type='text' name='data2' value="{{ old('data2') }}" />
             {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
                @error('data2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            {{-- Telefono numeris --}}
            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control @error('phone') is-invalid @enderror" type='text' name='phone' value="{{ old('phone') }}" />
             {{-- @error veikia kaip ifas, ar klaidu masyve yra klaida susisijusi su laukeliu author_name --}}
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>




        <div class="books-info d-none">
            <button type="button" class="btn btn-secondary add_field">Add</button>
            <button type="button" class="btn btn-danger remove_field">Remove</button>
            <div class="book-info book-first row">
                <div class="form-group col-md-6">
                    <label for="book_title">Title</label>
                    <input id="book_title" class="form-control" type='text' name='book_title[]' />
                </div>
                <div class="form-group col-md-6">
                    <label for="book_description">Description</label>
                    <textarea id="book_description" class="form-control" name='book_description[]'> 
                    </textarea>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>        
    </form>    
</div>
<script>

    $(document).ready(function(){
        $('#author_newbooks').click(function() {
            $('.books-info').toggleClass('d-none');
            //nenorime isaugoti senu reiksmiu
            $('.book-info:not(.book-first)').remove();
            //Laukeliu nunulinimas
            $('#book_title').val('');
            $('#book_description').val('');
        })

        $('.add_field').click(function(){
            $('.books-info').append('<div class="book-info row"><div class="form-group col-md-6"><label for="book_title">Title</label><input class="form-control" type="text" name="book_title[]" /></div><div class="form-group col-md-6"><label for="book_description">Description</label><textarea class="form-control" name="book_description[]"> </textarea></div></div>');
        });

        $('.remove_field').click(function() {
            //kaip pasirinkti paskutini elementa kurio clase yra input-rating
            $('.book-info:last-child:not(.book-first)').remove();
        });
    })
</script>    
@endsection