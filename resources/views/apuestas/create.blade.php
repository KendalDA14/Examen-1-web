@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Crear Apuesta
        </div>
        <div class="card-body">
            <form action="{{ route('apuestas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_juego">Juego</label>
                    <select name="id_juego" id="id_juego" class="form-control" required>
                        @foreach($juegos as $juego)
                            <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" id="monto" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
@endsection
