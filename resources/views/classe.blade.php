@extends('app')
<style>
    .text-black{
        color: #787878;
    }
    .text-black:hover{
        color: #787878;
    }
</style>
@section('content')
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center">
                <h1 class="display-4 text-white animated slideInDown mb-4">Liste des èleves de {{$classe_->nom}}</h1>
            </div>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table text-sm mb-0 tableDons" id="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Voir</th>
                    </tr>
                    </thead>
                    <tbody>
                        <style>
                            img{
                                transition:transform 0.25s ease;
                            }
                        </style>
                        
                        @forelse($eleves as $eleve)
                        
                                <tr>
                                    <td>
                                        <a href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus">
                                            <div id="container{{$eleve->id}}">
                                                <img src="{{asset('storage/'.$eleve->image)}}" alt="{{$eleve->nom}}" height="25">
                                            </div>
                                        </a>
                                        <style>
                                            #container{{$eleve->id}} > img:hover{
                                                width: 100px;
                                                height: 100px;
                                            }
                                        </style>
                                    </td>
                                    <td>
                                        <a class="text-black" href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus">
                                            {{$eleve->nom}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-black" href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus">
                                            {{$eleve->prenom}}
                                        </a>
                                    </td>
                                    @if($eleve->sexe==0)
                                        <td><a class="text-black" href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus">Féminin</a></td>
                                    @elseif($eleve->sexe==1)
                                        <td><a class="text-black" href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus">Masculin</a></td>
                                    @else
                                        <td><a href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus" class="text-black">Inconnu</a></td>
                                    @endif
                                    <td><a href="{{route('infos_eleve', ['nom'=>urlencode($eleve->nom), 'prenom'=>urlencode($eleve->prenom)])}}" title="Voir plus"><i class="fa-solid fa-eye color-green"></i></a></td>
                                </tr>
                            </a>
                        @empty
                        @endforelse
                    </tbody>
                </table>
    
            </div>
        </div>
        <!-- Page Header End -->
@endsection