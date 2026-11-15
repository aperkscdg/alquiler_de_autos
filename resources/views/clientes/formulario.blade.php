<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @isset($cliente)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre ?? '') }}" class="form-control @error('nombre') is-invalid @enderror">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" value="{{ old('apellido', $cliente->apellido ?? '') }}" class="form-control @error('apellido') is-invalid @enderror">
        @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="text" name="dni" value="{{ old('dni', $cliente->dni ?? '') }}" class="form-control @error('dni') is-invalid @enderror">
        @error('dni') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $cliente->email ?? '') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono ?? '') }}" class="form-control @error('telefono') is-invalid @enderror">
        @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-outline-light btn-lg me-4 my-3">Guardar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-danger btn-lg">Cancelar</a>
</form>
