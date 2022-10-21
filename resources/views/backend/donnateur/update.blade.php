@extends('backend.app')
@section('content')
    @include('backend.partials.slidebar')
    @include('backend.partials.navbar')

    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Donnateurs</li>
                </ol>
            </nav>
        </div>
    </div>

    <header class="py-4">
        <div class="row">
            <div class="col-sm-6 text-sm-start">
                <div class="container-fluid">
                    <a href="{{route('index_donnateur')}}" class="h5 fw-normal mb-0 text-black"> < Retour</a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-fluid">
            <div class="card">
                <!--<div class="card-header border-bottom">
                    <h4 class="text-center">Ajout d'une classe</h4>
                </div>-->
                <div class="container-fluid">
                    <div class="py-5 w-50 mx-auto">
                        <form class="form-horizontal" action="{{route('edit_donnateur', ['donnateur'=>$donnateur])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Nom </label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$donnateur->nom}}" name="nom" type="text" placeholder="Entrez votre nom">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Prénom </label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$donnateur->prenom}}" name="prenom" type="text" placeholder="Entrez votre prénom">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="content" name="email" placeholder="Votre addresse email" value="{{$donnateur->email}}"/>
                                    <!--<input class="form-control" required id="content"  value="" name="content" type="text" placeholder="Contenue de l'objectif">
                                    small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="describe">Téléphone</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="describe"  value="{{$donnateur->tel}}" name="tel" type="text" placeholder="Votre numéros de téléphone">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="describe">Status</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="describe"  value="{{$donnateur->status}}" name="status" type="text" placeholder="Votre status">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 ms-auto">
                                    <input class="btn btn-primary w-100" type="submit" value="Modifier">
                                </div>
                            </div>
                            @foreach ($errors->all() as $error)
                                <span class="alert alert-danger w-100">{{$error}}</span>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

