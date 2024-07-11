@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Comparación de Apuestas
        </div>
        <div class="card-body">
            <p>Total de $ en juegos de cartas: <strong>{{ $totalCartas }}</strong></p>
            <p>Total de $ juegos que no son de cartas: <strong>{{ $totalNoCartas }}</strong></p>
        </div>
    </div>
@endsection
