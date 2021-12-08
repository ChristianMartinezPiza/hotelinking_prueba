@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('home')}}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @if (session('error'))
                <h6 class="alert alert-danger">{{session('error')}}</h6>
            @endif
            <table class="table">
                <tbody>
                    @foreach ($ofertas as $oferta)
                        <tr>
                            <th scope="row">{{$oferta->id}}</th>
                            <td>{{$oferta->title}}</td>
                            <td><button type="submit" name="ofertaId" value="{{$oferta->id}}" class="btn btn-primary">Añadir oferta</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
@endsection
