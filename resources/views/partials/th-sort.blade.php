<th>
    <a class="text-decoration-none text-dark" href="{{ route($ruta, ['search' => $search, 'sort' => $campo, 'direction' => $sortField == $campo && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
        {{ $etiqueta }}
        @if ($sortField == $campo)
            {{ $sortDirection == 'asc' ? '▲' : '▼' }}
        @endif
    </a>
</th>
