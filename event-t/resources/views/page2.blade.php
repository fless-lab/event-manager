@extends("layouts.dashboard")

@section("contenu")


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 ">
            <div class="bg-secondary rounded h-100 p-4">
                @if($errors->any())
                <ul>
                    @foreach($errors->all as $error )
                        <li class="text text-danger">{{$error}}</li>
                    @endforeach
                @endif
                
                <h6 class="mb-4">Enregistrement d'un Evenement</h6>
                <form action="{{route('page2')}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    @if(session()->has('error'))
                        <p class="text text-success">{{ session()->get('error') }}</p>
                    @endif
                    <div class="mb-3">
                        <input type="text" name="titre" placeholder="Titre de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="description" placeholder="Description de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="organisateur" placeholder="Organisateur de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="type" placeholder="Type de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="lieu" placeholder="Lieu de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input class="form-control bg-dark" name="image" type="file" >
                    </div>
                    <div class="mb-3">
                        <input type="date" name="date_deb" placeholder="Date de début de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="date" name="date_fin" placeholder="Date de fin de l'evenement" class="form-control"  aria-describedby="emailHelp">
                    </div>
                        
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection