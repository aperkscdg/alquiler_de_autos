<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @isset($alquiler)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="id_cliente" class="form-select @error('id_cliente') is-invalid @enderror">
            <option value="">Seleccionar cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" @selected(old('id_cliente', $alquiler->id_cliente ?? '') == $cliente->id_cliente)>
                    {{ $cliente->apellido }} {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
        @error('id_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Auto</label>
        <select name="id_auto" class="form-select @error('id_auto') is-invalid @enderror">
            <option value="">Seleccionar auto</option>
            @foreach ($autos as $auto)
                <option value="{{ $auto->id_auto }}" @selected(old('id_auto', $alquiler->id_auto ?? '') == $auto->id_auto)>
                    {{ $auto->marca }} {{ $auto->modelo }}
                </option>
            @endforeach
        </select>
        @error('id_auto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $alquiler->fecha_inicio ?? '') }}" class="form-control @error('fecha_inicio') is-invalid @enderror">
        @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de fin</label>
        <input type="date" name="fecha_fin" value="{{ old('fecha_fin', $alquiler->fecha_fin ?? '') }}" class="form-control @error('fecha_fin') is-invalid @enderror">
        @error('fecha_fin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-outline-light btn-lg me-4 my-3">Guardar</button>
    <a href="{{ route('alquileres.index') }}" class="btn btn-outline-danger btn-lg">Cancelar</a>
</form>
