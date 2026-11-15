<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @isset($auto)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="marca" value="{{ old('marca', $auto->marca ?? '') }}" class="form-control @error('marca') is-invalid @enderror">
        @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input type="text" name="modelo" value="{{ old('modelo', $auto->modelo ?? '') }}" class="form-control @error('modelo') is-invalid @enderror">
        @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="precio" value="{{ old('precio', $auto->precio ?? '') }}" class="form-control @error('precio') is-invalid @enderror">
        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
            @foreach (['activo', 'roto', 'alquilado'] as $estado)
                <option value="{{ $estado }}" @selected(old('estado', $auto->estado ?? 'activo') == $estado)>{{ $estado }}</option>
            @endforeach
        </select>
        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('autos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
