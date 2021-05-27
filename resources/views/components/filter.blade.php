<div class="d-flex justify-content-between">
    <div class="btn-group mb-2" role="group" aria-label="Basic outlined example">
        <a href="{{ route('home') }}" type="button" class="btn btn-outline-secondary">Últimos enviados</a>
        <a href="{{ route('all') }}" type="button" class="btn btn-outline-secondary">Ver todos</a>
    </div>

    <div class="btn-group mb-2" role="group" aria-label="Basic outlined example">
        <a href="{{ route('completed') }}" type="button" class="btn btn-outline-secondary">Completadas</a>
        <a href="{{ route('process') }}" type="button" class="btn btn-outline-secondary">En proceso</a>
    </div>
</div>
