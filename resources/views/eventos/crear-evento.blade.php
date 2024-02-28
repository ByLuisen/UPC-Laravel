@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\crear-evento.css') }}">
@endsection

@section('content')
    <div style="margin-top: 110px">

        <form action="{{ route('crear_evento') }}" method="post" class="container1">
            @csrf
            <div class="row">
                <h4 class="text-center">Crear Evento</h4>
                <!-- Tipo de evento -->
                <div class="input-group input-group-icon">
                    <label for="tipo">Tipo de evento</label>
                    <br>
                    <select name="tipo" id="tipo" style="width:511px;">
                        <option value="Torneo" @if (isset($evento) && $evento['tipo'] == 'Torneo') selected @endif>Torneo</option>
                        <option value="Dibujo" @if (isset($evento) && $evento['tipo'] == 'Dibujo') selected @endif>Dibujo</option>
                    </select>
                </div>

                <!-- Nombre -->
                <div class="input-group">
                    <input type="text" name="nombre" placeholder="Nombre del evento"
                        value="{{ isset($evento) ? $evento['nombre'] : '' }}" />
                </div>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <!-- Fecha de inicio -->
                <label for="tipo">Fecha y hora de inicio</label>
                <div class="input-group">
                    <input type="datetime-local" name="fecha_inicio" min="{{ date('Y-m-d\TH:i') }}"
                        max="{{ date('Y-m-d\TH:i', strtotime('+1 month')) }}"
                        value="{{ isset($evento) ? $fecha_objeto->format('Y-m-d H:i') : '' }}" />
                </div>
                @error('fecha_inicio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <!-- Duración del evento -->
                <div class="input-group">
                    <label for="tipo">Duración del evento</label>
                    <br>
                    <select name="duracion" id="duracion" style="width:511px;">
                        <option value="00:30" @if (isset($evento) && $evento['duracion'] == '00:30') selected @endif>30 minutos</option>
                        <option value="01:00" @if (isset($evento) && $evento['duracion'] == '01:00') selected @endif>1 hora</option>
                        <option value="01:30" @if (isset($evento) && $evento['duracion'] == '01:30') selected @endif>1 hora y 30 minutos
                        </option>
                    </select>
                </div>
                @error('duracion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary w-25 rounded-pill fs-5">
                        Crear
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection