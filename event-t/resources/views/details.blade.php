@extends("layouts.dashboard")

@section("contenu")
    @foreach($events as $event)
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <img src="/images/{{ $event->image }}" width="100%" height="100%" alt="">
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-3">Titre</h6>
                <p>{{ $event->titre }}</p>
                <h6 class="mb-3">Description</h6>
                <p>{{ $event->description }}</p>
                <h6 class="mb-3">Organisateur</h6>
                <p>{{ $event->organisateur }}</p>
                <h6 class="mb-3">Type</h6>
                <p>{{ $event->type }}</p>
                <h6 class="mb-3">Lieu</h6>
                <p>{{ $event->lieu }}</p>
                <h6 class="mb-3">Date de debut</h6>
                <p>{{ $event->date_deb }}</p>
                <h6 class="mb-3">Date de fin</h6>
                <p>{{ $event->date_fin }}</p>

            </div>
        </div>
    </div>
</div>
    @endforeach
@endsection