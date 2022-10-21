@extends('app')
@section('content')
     <!-- Page Header Start -->
     <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h3 class="display-4 text-white animated slideInDown mb-4">Informations de élève {{$eleve->nom}}</h3>
        </div>
    </div>
    <header class="py-4">
        <div class="row">
            <div class="col-sm-6 text-sm-start">
                <div class="container-fluid">
                    <a href="{{route('index_eleve')}}" class="h5 fw-normal mb-0 text-black"> <i class="fa-regular fa-circle-left"></i> Retour</a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-bottom">
                    <div class="row">
                        <div class="col-lg-6 text-sm-start">
                            <h4 style="vertical-align: center">Informations de {{$eleve->nom .' '.$eleve->prenom}}</h4>
                        </div>
                        <div class="col-lg-6 text-sm-end">
                            <a href="{{route('update_eleve', ['eleve'=>$eleve])}}" class="btn btn-info">Modifier</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-sm mb-0 table-borderless" id="table">
                        <tr>
                            <td rowspan="4" style="width: 200px;">
                                <img src="{{asset('storage/'.$eleve->image)}}" alt="{{$eleve->nom .' '.$eleve->prenom}}" height="200">
                            </td>
                            <td colspan="1">
                                <span class="text-muted">Nom & Prénom(s)</span><h4>{{$eleve->nom .' '.$eleve->prenom}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <span class="text-muted">Date de naissance</span><h4>{{$eleve->date}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <span class="text-muted">Sexe</span>
                                @if($eleve->sexe==0)
                                    <h4>Féminin</h4>
                                @elseif($eleve->sexe==1)
                                    <h4>Masculin</h4>
                                @else
                                    <h4>Inconnu</h4>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <span class="text-muted">Classe</span>
                                <h4>{{$eleve->classe->nom}}</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
@endsection
