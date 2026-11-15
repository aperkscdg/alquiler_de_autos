<form method="GET" action="{{ route($ruta) }}" class="d-flex gap-2 mb-3">
    <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Buscar...">
    <button class="btn btn-primary">Buscar</button>
    <a href="{{ route($ruta) }}" class="btn btn-outline-secondary">Limpiar</a>
</form>
