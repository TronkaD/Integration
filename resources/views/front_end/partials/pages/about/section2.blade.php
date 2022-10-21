 <!-- About Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100 pt-5 pe-5" src="{{ asset('img/about-1.jpg') }}" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="{{ asset('img/about-2.jpg')}} " alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Qui sommes-nous</div>
                    <h1 class="display-6 mb-5">Nous aidons les jeunes élèves dans le domaine éducatif </h1>
                    <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                        <p class="text-dark mb-2">Une organisation à but non lucratif ayant pour but de contribuer à l'émergence d'une communauté où le poids de la vie est considérablement allégé par des hommes de bonne volonté.</p>
                        <span class="text-primary">ATTIBA, Manu</span>
                    </div>
                    <p class="mb-5">Nous contribuons à l'amélioration des conditions de vie socio-économique et culturelle des communautés de base dans une approche de développement humain durable et participatif.</p>
                    <a class="btn btn-primary py-2 px-3 me-3" href="{{ url('/about') }}">
                        Savoir Plus
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ url('/contact') }}">
                        Contactez-Nous
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->