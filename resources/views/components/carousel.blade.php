<div id="carouselExampleIndicators" class="carousel slide d-flex flex-row justify-content-center" data-bs-ride="true">
    <div class="carousel-indicators" style="bottom: -2em!important">
        @foreach ($table_ids as $table_id)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}">
            </button>
        @endforeach
    </div>
    <div class="carousel-inner w-75">
        @foreach ($table_ids as $table_id)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="padding: 0 0.5em;">
                <iframe src="https://data-transitions2050.ademe.fr/data-fair/embed/dataset/{{ $table_id }}/table?display=table"
                    width="100%" height="500px" style="background-color: transparent; border: none;"></iframe>
            </div>
            <a class="btn btn-success w-25"
                    href="https://data-transitions2050.ademe.fr/data-fair/embed/dataset/{{ $table_id }}/table?display=table" target="_blank"
                    style="color: #fff; text-decoration: none; position: absolute; bottom: 1em; right: 0; z-index: 100">
                    <h5>Voir l'original</h5>
                </a>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
