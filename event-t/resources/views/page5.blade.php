@extends("layouts.dashboard")

@section("contenu")


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 ">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Enregistrement des types  de tickets</h6>
                <form action="{{route('page5')}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    @if(session()->has('error'))
                        <p class="text text-success">{{ session()->get('error') }}</p>
                    @endif
                    <div class="mb-3">
                        <select name="ticket_id" class="form-select form-selec-sm mb-3">
                        @foreach($tickets as $ticket) 
                            <option value="{{ $ticket->id }}" selected> {{ $ticket->prix }} </option>
                        @endforeach  
                    @if('error')
                        @error('ticket_id')
                            <p class="text text-danger">{{ $message }}</p>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <input type="text" name="libelle" placeholder="Type de ticket" class="form-control"  aria-describedby="emailHelp">
                    </div>
                        @error('libelle')
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