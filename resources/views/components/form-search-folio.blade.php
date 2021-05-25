<div class="row justify-content-center" id="search-form">
    <form class="col-md-6" action="{{ route('search_folio') }}" method="get">
        {{-- @csrf --}}
        <div class="d-flex">
            {{-- <input type="search" name="folio" placeholder="Search"class="form-control" placeholder="Buscar producto por folio ..." required>
            <button class="btn btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button> --}}

            <div class="input-group mb-3">
                <input type="search" name="folio" placeholder="Ingrese el folio del envío..."class="form-control" required>
                <div class="input-group-prepend">
                    <button class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
