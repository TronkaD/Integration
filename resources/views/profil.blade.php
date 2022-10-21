@extends('app')
@section('content')
     <!-- Page Header Start -->
     <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h5 class="display-4 text-white animated slideInDown mb-4">Informations de élève {{$eleve->nom}}</h5>
        </div>

        <div class="col-lg-6 text-sm-start">
            <a class="btn btn-outline-primary py-2 px-3" href="{{route('show_student', ['classe'=>urlencode($eleve->classe->nom)])}}">
                <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                    <i class="fa-regular fa-circle-left"></i>
                </div>
                Retour
            </a>
        </div>

        <div class="table-responsive container" align="center">
            <table class="table text-sm mb-0 table-borderless" id="table" style="width: 70%; padding:100px; border:2px solid green; box-shadow: 1px 1px 5px gray; background:white"><br/>
                <tr>
                    <td rowspan="5" style="width: 200px;">
                        <img src="{{asset('storage/'.$eleve->image)}}" alt="{{$eleve->nom .' '.$eleve->prenom}}" height="200">
                    </td>
                    <td colspan="2">
                        <span class="text-muted color-green">Nom : </span><h6>{{$eleve->nom}}</h6>
                    </td>
                    <td colspan="4">
                        <span class="text-muted color-green">Prénom(s)</span><h6>{{$eleve->prenom}}</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-muted color-green">Date de naissance</span><h6>{{$eleve->date}}</h6>
                    </td>
                    <td colspan="3">
                        <span class="text-muted color-green">Lieu de naissance</span><h6>{{$eleve->lieu}}</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-muted color-green">Sexe</span>
                        @if($eleve->sexe==0)
                            <h6>Féminin</h6>
                        @elseif($eleve->sexe==1)
                            <h6>Masculin</h6>
                        @else
                            <h6>Inconnu</h6>
                        @endif
                    </td>
                    <td colspan="1">
                        <span class="text-muted">Classe</span>
                        <h6>{{$eleve->classe->nom}}</h6>
                    </td>
                </tr>
                <br/>
            </table>
        </div>
    </div> 
@endsection  
