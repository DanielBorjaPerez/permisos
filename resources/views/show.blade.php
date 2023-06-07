@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{$book->name}}</h1></div> 

                <div class="card-body">

            <p> Nombre del libro: {{$book->name}}</p>
            <p> Descripción: {{$book->description}}</p>
            <p> Autor: {{$book->author}}</p>
            <p> Precio: {{$book->price}}</p>
            <div>
            @auth
            @can('edit-user')
            <a href="{{route('edit', $book)}}">editar datos del libro </a><br>
            @else
                <div>Acceso usted no tiene acceso</div>
            @endcan
            @endauth

            @auth
            @can('edit-user')
            <a href="{{route('delete', $book)}}">borrar libro </a><br>
            @else
                <div>Acceso usted no tiene acceso</div>
            @endcan
            @endauth
            
            
            <a href="{{route('home')}}">regresar a la lista de libros </a>
            </div>

                </div>

            
@endsection