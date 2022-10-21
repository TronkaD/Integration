  <!-- Donate Start -->
  <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="{{ asset('img/carousel-2.jpg') }}">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Dons Maintenant</div>
                <h1 class="display-6 text-white mb-5">Notre vision avec les dons obtenus</h1>
                <ul>
                    <li class="text-white">Améliorer la vie quotidienne des élèves de l'école de Zowla</li>
                    <li class="text-white">Construire une cantine afin de permettre une journée continue</li>
                    <li class="text-white">Prévoir des moyens de locomotion</li>
                    <li class="text-white">Elaboration d'une bibliothèque accessible à tous les élèves</li>
                    <li class="text-white">Parrainage des élèves les plus méritants</li>
                </ul>

                {{-- <p class="text-white-50 mb-0">Les fonds fournis sont garantis par un contrôle stricte de leur affectation sur le terrain,les responsables de ces actions étant tous bénévoles.Ils veillent scrupuleusement à ce que chaque franc ou euro donné soit utilisé dans des projets en cours</p> --}}
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="name" placeholder="Your Name">
                                    <label for="name">Entrer votre nom</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="email" placeholder="Your Email">
                                    <label for="email">Entrer votre email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="btn-group d-flex justify-content-around">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                    <label class="btn btn-light py-3" for="btnradio1">$10</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                    <label class="btn btn-light py-3" for="btnradio2">$20</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                    <label class="btn btn-light py-3" for="btnradio3">$30</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary px-5" style="height: 60px;">
                                    Dons Maintenant
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donate End -->