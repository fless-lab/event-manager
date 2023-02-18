@extends("layouts.dashboard")

@section("contenu")


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 ">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Enregistrement des types  de tickets</h6>
                <form action="{{route('page4')}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    @if(session()->has('error'))
                        <p class="text text-success">{{ session()->get('error') }}</p>
                    @endif
                    <div class="mb-3">
                        <select name="event_id" class="form-select form-selec-sm mb-3">
                        @foreach($events as $event) 
                            <option value="{{ $event->id }}" selected> {{ $event->titre }} </option>
                        @endforeach    
                    </div>
                    @if('error')
                        @error('even_id')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                    <div class="mb-3">
                        <input type="Numerique" name="nbre" placeholder="Le nombre de ticket" class="form-control"  aria-describedby="emailHelp">
                    </div>
                        @error('nbre')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror 
                    <div class="mb-3">
                        <input type="Numerique" name="prix" placeholder=" Prix" class="form-control"  aria-describedby="emailHelp">
                    </div>
                        @error('prix')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror
                    @endif 
                  
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection