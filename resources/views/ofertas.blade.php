@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (count($ofertas) == 0)
        <h6 class="alert alert-danger">No tienes ninguna oferta añadida</h6>
        @endif
        <form action="{{route('ofertas')}}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @if (session('error'))
                <h6 class="alert alert-danger">{{session('error')}}</h6>
            @endif
            @foreach ($ofertas as $oferta)
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title">Oferta {{ $oferta->id }}</h5>
                        <p class="card-text">{{ $oferta->title }}</p>
                        @if ($oferta->pivot->canjeado)
                            <p class="card-text text-muted">{{ $oferta->pivot->codigo }}</p>
                        @else
                            <button type="submit" name="ofertaId" value="{{ $oferta->id }}" class="btn btn-primary">Canjear oferta</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </form>
        </div>
    </div>
</div>
@endsection
