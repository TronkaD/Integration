 <!-- Causes Start -->
 <div class="container-xxl bg-light my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Causes des fonctionnalités</div>
            <h1 class="display-6 mb-5">Chaque enfant mérite d’avoir l’occasion d’apprendre</h1>
        </div>
        <div class="row g-4 justify-content-center">
           <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s"> </div>
               <div class="causes-item d-flex flex-column bg-white  rounded-top overflow-hidden h-100">
                   <div class="text-center p-4 pt-0">
                       <p>
                           Le lycée de zowla dispose d'une enseignement secondaire pour consolider les acquis de l’école primaire et d‘initier les élèves aux méthodes de travail.deplus nous disposons d'un enseignement générale préparant ces jeunes 
                           élèves à acquérir un diplôme professionnel pour s'insérer dans la vie active ou poursuivre leurs études.
                       </p>
                    </div>
               
            </div>
       </div>
        <br>
        <div class="row g-4 justify-content-center">
            {{-- <div class="causes-item d-flex flex-row border-primary overflow-hidden h-100"> row justify-content-md-center  border-top border-5 border-primary--}}
               <div class="causes-item container-class row justify-content-md-center gap-3">
               @forelse($classes as $classe)
                <div class="col-lg-2">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('storage/'.$classe->image) }}" alt="">
                        <div class="causes-overlay">
                            <a class="btn btn-outline-primary" href="{{ route('show_student',['classe'=>urlencode($classe->nom)])}}">
                                {{$classe->nom}}
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
               @empty
               @endforelse
            </div>
        </div>
   </div>
</div>
<style>
    .causes-overlay{
        width: 100% !important;
        height: 100% !important;
    }
</style>
