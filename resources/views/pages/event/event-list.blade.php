@extends('pages.layout.base')
@section('title', 'Events')
@section('header')
    @include('pages.layout.event-header')
@endsection

<style>
    .card {
        margin: 5% 0%;
    }

    .card-body {
        margin: 0% 0% 0% 3%;
        padding: 6% 0%;
    }
    .description {
    max-height: 4.5em;
    line-height: 1.5em;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}
</style>

@section('main')
    <section style="min-height: 60vh">
        <section class="schedule-area pb-100" id="schedule">
            <div class="container" style="margin-top: 100px">
                <div class="row d-flex justify-content-center">
                    <div>
                        <div class="title text-center">
                            <h1 class="mb-10">Consultez notre liste d'événements</h1>
                            <p>Vous pouvez utiliser les champs de recherche pour filtrer votre demande.</p>
                            <p>
                            <div class="input-group mb-3 px-3">
                                <input type="text" class="form-control" placeholder="Rechercher ......"
                                    aria-label="Nom de l'evenement">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">


                    <div class="card-deck row">

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">1 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card mb-4">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/14.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">2 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card mb-4">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">3 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class="card-body">


                                    <h4 class="card-title">4 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card mb-4">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/14.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">5 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card mb-4">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">6 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="card mb-4">


                                <div class="view ">
                                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg"
                                        alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>


                                <div class="card-body">


                                    <h4 class="card-title">7 Card title</h4>

                                    <p class="card-text description">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>

                                    <button type="button" class="btn btn-light-blue btn-md">Reserver</button>

                                </div>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </section>
    </section>
@endsection


@section('footer')
    @include('pages.layout.footer')
@endsection
