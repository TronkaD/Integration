@extends('backend.app')
@section('content')
    @include('backend.partials.slidebar')
    @include('backend.partials.navbar')

    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Elèves</li>
                </ol>
            </nav>
        </div>
    </div>

    <header class="py-4">
        <div class="row">
            <div class="col-sm-6 text-sm-start">
                <div class="container-fluid">
                    <a href="{{route('index_eleve')}}" class="h5 fw-normal mb-0 text-black"> < Retour</a>
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
                        <form class="form-horizontal" action="{{route('store_eleve')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="picture">Image</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="picture" name="image" type="file" placeholder="Choissiez votre image" accept=".png, .jpeg, .jpg"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Nom</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title" name="nom" type="text" placeholder="Entrez le nom de l'élève"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Prénom</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title" name="prenom" type="text" placeholder="Entrez le prénom de l'élève"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Date de naissance</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="content" name="date" placeholder="" type="date"/>
                                    <!--<input class="form-control" required id="content" name="content" type="text" placeholder="Contenue de l'objectif">small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Lieu de naissance</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="content" name="lieu" placeholder="" type="text"/>
                                    <!--<input class="form-control" required id="content" name="content" type="text" placeholder="Contenue de l'objectif">small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="describe">Sexe</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="select_sexe" required>
                                        <option selected value="0">Féminin</option>
                                        <option value="1">Masculin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Classe</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="select_classe" required>
                                        @foreach($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 ms-auto">
                                    <input class="btn btn-primary w-100" type="submit" value="Ajouter">
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

