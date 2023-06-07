@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br></br>
                    {{ __('Aqui puedes ver todos los libros disponibles') }}
                </div>
                <div class="card-body">
                @if(!empty($books))
            <ul>
                @foreach ($books as $book)
                    <li>
                        {{ $book->name }} ⮕
                        <a href="{{ route('show',['id' => $book->id]) }}">ver detalles </a>

                    </li>
                @endforeach

                <br></br>
                @auth
                @can('edit-user')
                <a href="{{route('create')}}">Añadir libro </a>
                @else
                    <div>Acceso usted no tiene acceso</div>
                @endcan
                @endauth
                
        </form>
            </ul>
        @else
        <p>No hay usuarios registrados</p>
        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
