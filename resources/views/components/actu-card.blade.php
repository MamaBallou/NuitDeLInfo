<a class="w-25 mx-1 my-2" style="text-decoration: none;" href="{{ $lien }}" target="_blank">
    <div class="card actu-card w-100">
        <div class="card-header">
            <h5 class="card-title">{{ $titre }}</h5>
        </div>
        <div class="card-body">
            <span class="card-text">{{ html_entity_decode((string) $description) }}</span>

            {{-- <a href="{{ route($chemin . '.show', $id) }}" class="btn btn-primary">Voir plus</a> --}}
        </div>
    </div>
</a>