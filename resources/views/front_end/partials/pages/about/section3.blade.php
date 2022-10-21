 <!-- About Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    {{-- <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Qui sommes-nous</div> --}}
                    <h1 class="display-6 mb-5">Notre Stauts </h1>
                    <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                        <p class="text-dark mb-2">Une association sans but lucratif régie par les présents status et subsidiairement par les articles 60 et suivants du Code civil suisse. Elle est politiquement neutre et confessionnellement indépendants.</p>
                    </div>
                    <p class="mb-5">L'Association Zowla renonce à la distribution de bénéfice net en faveur de ses membres, ses moyens financiers sont irrévocablement affectés à des buts d'utilité publique. Elle exerce une activité d'intérêt général, de manière désintéressée.</p>
                    <a href="#">Pour plus d'informations cliquer sur le bouttons ci dessous</a>
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ route('download') }}">
                        Télécharger ici
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100 pt-5 pe-5" src="{{ asset('img/about-4.jpg') }}" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="{{ asset('img/about-3.jpg')}} " alt="" style="width: 200px; height: 200px;">
                    <img class="position-absolute bottom-0 end-0 bg-white ps-2 pt-2" src="{{ asset('img/about-5.jpg')}} " alt="" style="width: 200px; height: 200px;">
                    <img class="position-absolute top-0 start-0 bg-white pe-2 pb-2" src="{{ asset('img/about-6.jpg')}} " alt="" style="width: 200px; height: 200px;">
                    <img class="position-absolute bottom-0 start-0 bg-white pe-2 pt-2" src="{{ asset('img/about-7.jpg')}} " alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->