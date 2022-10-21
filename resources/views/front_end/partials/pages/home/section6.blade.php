<!-- Team Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Membres de l’équipe</div>
                <h1 class="display-6 mb-5">Rencontrons nos soldats ordinaires</h1>
            </div>
            <div class="row g-4">
                @forelse($collaborateurs as $collab)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/'.$collab->image)}}" alt="{{$collab->nomComplet}}">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>{{$collab->nomComplet}}</h5>
                            <p class="text-primary">{{$collab->poste}}</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="mailto:{{$collab->email}}"><i class="fa fa-envelope"></i></a>
                                {{--<a class="btn btn-square" href="{{ url('#') }}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="{{ url('#') }}"><i class="fab fa-instagram"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End -->
