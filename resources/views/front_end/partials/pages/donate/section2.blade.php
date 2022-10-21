<!-- Donate Start -->
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="container-fluid py-5">
    <div class="container">
        <div class="col-lg-7 mx-auto wow fadeIn">
            @if(session()->has('message'))
                <span class="alert alert-success w-100">{{ session()->get('message')}}</span>
            @endif
            <div class="h-100 bg-light p-5">
                <form action="{{route('make_donation')}}" method="POST" id="form-donate">
                    @csrf
                    <div class="row ">
                        <div class="col-12 mb-4">
                            <h3 class="mb-4">Informations générales</h3>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 @error('lastname') is-invalid @enderror" id="lastname" name="lastname" required placeholder="Entrer votre nom">
                                        <label for="name">Nom*</label>
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 @error('firstname') is-invalid @enderror" id="firstname" name="firstname" required placeholder="Entrer votre nom">
                                        <label for="name">Prénom(s)*</label>
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 @error('email') is-invalid @enderror" id="email" required name="email" placeholder="E-mail(s)">
                                        <label for="name">E-mail*</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control border-0 @error('email') is-invalid @enderror" id="phone" required name="phone" placeholder="Téléphone">
                                        <label for="phone">Téléphone*</label>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 @error('city') is-invalid @enderror" id="city" name="city" required placeholder="Ville">
                                        <label for="name">Ville*</label>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <select name="country" required id="country" class="form-control bg-white mb-1 @error('country') is-invalid @enderror">
                                            <option value="" selected disabled>Sélectionnez un pays</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                        <label for="name">Pays*</label>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <h3 class="mb-3 mt-4">Informations sur le Don</h3>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control border-0 @error('amount') is-invalid @enderror" id="amount" name="amount" required placeholder="Montant du don">
                                        <label for="name">Montant du don en $ (Dollars)*</label>
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="hidden" name="payment_method" id="payment_method">
                                        <div id="card-element"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h3 class="mb-3 mt-4">Autres</h3>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea class="form-control border-0" name="message" id="message" cols="30" rows="7" placeholder="Ecrivez un message..." style="resize: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary px-5 w-100" style="height: 60px;" id="btn-donate">
                                Donner Maintenant
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
    <!-- Donate End -->
<script src="{{asset('backend/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card',{
        classes:{
            base: 'StripeElement bg-white form-control border-0'
        }
    });
    cardElement.mount('#card-element');
    let btn_donate = document.getElementById('btn-donate');
    btn_donate.addEventListener('click', async(e) =>{
        e.preventDefault();
        $('#btn-donate').text("Veuillez patienter..."); //CHANGEMENT DU TEXT DU BOUTON PENDANT LE TRAITEMENT
        $('#btn-donate').prop("disabled", true); //DESACTIVATION DU BOUTON
        /*VERIFICATION DES CHAMPS*/
        if($('#firstname').val() !== "" && $('#lastname').val() !== "" && $('#email').val() !== "" && $('#phone').val() !== "" && $('#city').val() !== "" && $('#country option selected').val() !== "" && $('#amount').val() !== ""){
            const {paymentMethod, error} = await stripe.createPaymentMethod(
                'card', cardElement,{
                    billing_details: {
                        name: $('#firstname').val()+' '+$('#lastname').val(), //CONCATENATION DU NOM ET DU PRENOM
                        address: $('#city').val()+', '+$('#country'), //CONCATENATION DU PAYS ET DE LA VILLE
                    } //INFORMATIONS SUR LE DONNEUR
                }
            );
            //SI LA CARTE EST CORRECTE
            if (error){
                alert(error.message);//affichage du message d'erreur
                console.log(error);
                $('#btn-donate').text("Donner Maintenant"); //CHANGEMENT DU TEXT DU BOUTON
                $('#btn-donate').prop("disabled", false); //REACTIVATION DU BOUTON
            }else{
                $('#payment_method').val(paymentMethod.id);
                $('#btn-donate').text("Donner Maintenant"); //CHANGEMENT DU TEXT DU BOUTON
                $('#btn-donate').prop("disabled", false); //REACTIVATION DU BOUTON
                $('#form-donate').submit();//SOUMISSION DU FORMULAIRE
            }

        }else{
            alert("Veuillez remplir tous les champs");
        }






    });
</script>
