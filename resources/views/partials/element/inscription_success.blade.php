<div class="col-md-6 mb-3">
    <div class="card border-0 py-2">
        <div class="card-header bg-white border-0 d-flex justify-content-start align-items-center">
            <img src="{{ asset('img/logo.png') }}" class="mr-2" style="height: 35px" alt="logo">
            <strong class="subTitle text-secondary font-weight-bolder h6 text-uppercase">Email de confirmation</strong>
        </div>
        <div class="img text-center w-75 mx-auto mt-5">
            <img class="animate__animated animate__zoomIn " src="{{ asset('img/frontend_images/mail_sent.svg') }}" alt="illustration">
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="card border-0">
        <div class="card-body py-2">
            <div class="text-right">
                <a href="{{ route("login") }}" class="btn btn-sm btn__login">Connexion <i class="fas fa-sign-in-alt ml-2"></i></a>
            </div>
            <hr>
            <div class="bg-light p-5 rounded">
                <h3 class="h5 font-weight-bolder text-uppercase">Inscription validée</h3>
                <p>
                    <b>Un mail de confirmation de compte vous a été envoyé par email.</b> <br>
                    Veuillez visiter votre boite email et cliquer sur le bouton d'activationde votre compte. <br>
                    Une fois votre compte confirmé, vous pourrez vous connecter avec votre email et mot de passe.
                </p>
            </div>
        </div>
    </div>
</div>
