<!-- Contact Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contactez-Nous</div>
                    <h1 class="display-6 mb-5">Si vous avez des questions, veuillez nous contacter.</h1>
                    <p class="mb-4">Nous sommes disponible 24h/24 à votre propositions,suggestions, questions et vos commentaire si possible .</p>
                    <form  action="{{route('store_message')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="nom" placeholder="Entrer votre nom" required>
                                    <label for="name">Entrer votre nom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" required>
                                    <label for="email">Entrez votre email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="object" placeholder="Objet">
                                    <label for="subject">Object</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="msg" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                {{-- <button class="btn btn-primary py-2 px-3 me-3">
                                    Envoyer
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button> --}}
                                <input class="btn btn-primary w-100" type="submit" value="Envoyer">
                            </div>
                        </div>
                        <br>
                        @if(session()->has('message'))
                            <span class="alert alert-success w-100">{{ session()->get('message')}}</span>
                        @endif
                        @foreach ($errors->all() as $error)
                                <span class="alert alert-danger w-100">{{$error}}</span>
                        @endforeach
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                       {{--  <iframe class="position-relative w-100 h-100"
                        src="{{ url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd') }}"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe> --}}
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="450" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=zowla&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:700px;}</style><a href="https://www.embedgooglemap.net">embed google map on website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:500px;}</style></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->