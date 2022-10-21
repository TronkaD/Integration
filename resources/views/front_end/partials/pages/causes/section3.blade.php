<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Notre mission</div>
            <h1 class="display-6 mb-8">Le but de l'association</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($objectifs as $objectif)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('storage/'.$objectif->image) }}" alt="{{$objectif->titre}}" style="height:130px">
                    <h4 class="mb-3">{{$objectif->titre}}</h4>
                    <p class="mb-4">{{$objectif->contenue}}</p>
                    <a class="btn btn-outline-primary px-3" href="{{ url('/causes') }}"> En Savoir Plus
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
<!-- Service End -->
