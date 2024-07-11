@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de Apuestas
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($apuestas as $apuesta)
                    <li class="list-group-item">
                        {{ $apuesta->fecha }} - {{ $apuesta->monto }} - {{ $apuesta->juego->nombre }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
