<a class="card actu-card" style="text-decoration: none;" href="{{ $lien }}" target="_blank" data-index="{{$index}}">
    <div class="card-header">
        <h5 class="card-title">{{ $titre }}</h5>
    </div>
    <div class="card-body">
        @php
            $decoded_description = html_entity_decode((string) $description);
            $decoded_description = explode(' ', $decoded_description);
            $decoded_description = array_slice($decoded_description, 0, 30);
            $decoded_description = implode(' ', $decoded_description);
        @endphp
        <span class="card-text">{{ $decoded_description }}...</span>

        {{-- <a href="{{ route($chemin . '.show', $id) }}" class="btn btn-primary">Voir plus</a> --}}
    </div>
</a>
