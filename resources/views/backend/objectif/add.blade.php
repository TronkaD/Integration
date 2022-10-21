@extends('backend.app')
@section('content')
    @include('backend.partials.slidebar')
    @include('backend.partials.navbar')

    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Objectifs</li>
                </ol>
            </nav>
        </div>
    </div>

    <header class="py-4">
        <div class="row">
            <div class="col-sm-6 text-sm-start">
                <div class="container-fluid">
                    <a href="{{route('index_objectif')}}" class="h5 fw-normal mb-0 text-black"> < Retour</a>
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
                        <form class="form-horizontal" action="{{route('store_objectif')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="picture">Image</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="picture" name="image" type="file" placeholder="Choissiez votre image" accept=".png, .jpeg, jpg"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Titre de l'objectif</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title" name="titre" type="text" placeholder="Titre de l'objectif"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Contenue de l'objectif</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" required id="content" name="contenue" placeholder="Contenue de l'objectif"cols="30" rows="5"></textarea>
                                    <!--<input class="form-control" required id="content" name="content" type="text" placeholder="Contenue de l'objectif">small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="describe">Description de l'objectif</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="describe" name="description" type="text" placeholder="Description de l'objectif"><!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <!--<div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="inputHorizontalElTwo" type="password" placeholder="Pasword"><small class="form-text">Example help text that remains unchanged.</small>
                                </div>
                            </div>-->
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

