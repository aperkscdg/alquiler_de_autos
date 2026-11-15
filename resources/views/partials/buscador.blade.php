<form method="GET" action="{{ route($ruta) }}" class="d-flex gap-2 mb-3">
    <input type="search" name="search" value="{{ $search }}" class="form-control bg-warning border-light border-3" placeholder="Buscar...">
    <button class="btn btn-outline-danger">Buscar</button>
    <a href="{{ route($ruta) }}" class="btn btn-outline-danger">Limpiar</a>
</form>
