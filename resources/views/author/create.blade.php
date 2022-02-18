@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('author.store')}}">
        @csrf
        <div class="form-group">
            <label for="author_name">Name</label>
            <input class="form-control" type='text' name='author_name' />
        </div>
        <div class="form-group">
            <label for="author_surname">Surname</label>
            <input class="form-control" type='text' name='author_surname' />
        </div>
        <div class="form-group">
            <label for="author_username">Name</label>
            <input class="form-control" type='text' name='author_username' />
        </div>
        <div class="form-group">
            <label for="author_description">Description</label>
            <textarea class="form-control" name='author_description'> 
            </textarea>
        </div>
        <div class="form-group">
            <label for="author_newbooks">Add new books?</label>
            <input id="author_newbooks" type="checkbox" name="author_newbooks"/>
            {{-- checkbox neturi value atributo --}}
            {{-- jei chekbox nepazymetas, i backend yra grazinama false reiksme, jei pazymetas true --}}

            {{-- checkbox turi value atributa --}}
            {{-- jei chekbox nepazymetas, i backend yra grazinama false reiksme, jei pazymetas bet tai kas parasyta value --}}


        </div>
        <div class="books-info d-none">
            <button type="button" class="btn btn-secondary add_field">Add</button>
            <button type="button" class="btn btn-danger remove_field">Remove</button>
            <div class="book-info row">
                <div class="form-group col-md-6">
                    <label for="book_title">Title</label>
                    <input class="form-control" type='text' name='book_title[]' />
                </div>
                <div class="form-group col-md-6">
                    <label for="book_description">Description</label>
                    <textarea class="form-control" name='book_description[]'> 
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
        })

        $('.add_field').click(function(){
            $('.books-info').append('<div class="book-info row"><div class="form-group col-md-6"><label for="book_title">Title</label><input class="form-control" type="text" name="book_title[]" /></div><div class="form-group col-md-6"><label for="book_description">Description</label><textarea class="form-control" name="book_description[]"> </textarea></div></div>');
        });

        $('.remove_field').click(function() {
            //kaip pasirinkti paskutini elementa kurio clase yra input-rating
            $('.book-info:last-child').remove();
        });
    })
</script>    
@endsection