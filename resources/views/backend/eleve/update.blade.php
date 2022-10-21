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
                <div class="container-fluid">
                    <div class="py-5 w-50 mx-auto">
                        <form class="form-horizontal" action="{{route('edit_eleve', ['eleve'=>$eleve])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="picture">Image de élève</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="picture"  name="image" type="file" placeholder="Choissiez votre photo" accept=".png, .jpeg, .jpg" >

                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Nom de élève</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$eleve->nom}}" name="nom" type="text" placeholder="">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Prénom de élève</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$eleve->prenom}}" name="prenom" type="text" placeholder="">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Date de naissance</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$eleve->date}}" name="date" type="date" placeholder="">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="title">Lieu de naissance</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required id="title"  value="{{$eleve->lieu}}" name="lieu" type="text" placeholder="">
                                    <!--small class="form-text">Example help text that remains unchanged.</small>-->
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="describe">Sexe</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="select_sexe" required>
                                        <option value="0" {{($eleve->sexe==0) ? 'selected':''}}>Féminin</option>
                                        <option value="1" {{($eleve->sexe==1) ? 'selected':''}}>Masculin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gy-2 mb-4">
                                <label class="col-sm-3 form-label" for="content">Classe</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="select_classe" required>
                                        @foreach($classes as $classe)
                                            <option value="{{$classe->id}}" {{ $eleve->classe_id === $classe->id ? 'selected' : ''}}> {{$classe->nom}}</option>
                                        @endforeach
                                    </select>
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

