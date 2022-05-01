<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FormaRecrut - Portail Jobs</title>
    <meta content="A la recherche de jeunes talents, déposer vos CV, sénégal." name="description">
    <meta content="formarecrut, jobs, sénégal" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FormaRecrut - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            {{-- <h1 class="logo me-auto"><a href="/">FormaRecrut</a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo logo-img me-auto bg-white shadow p-1">
                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="#about">A propos</a></li>
                    <li><a class="nav-link   scrollto" href="#why-us">comment ça marche ?</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="#">Inscrivez-vous</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Bienvenue, FormaRecrut <br> Jobs Portail</h1>
                    <h2>Le cabinet leader en recrutement et dans l'approche directe des cadres confirmés du Sénégal, de
                        l’Afrique de l’Ouest et du Continent Africain.</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto">Inscription</a>
                        <a href="https://youtu.be/ehAo1DgUP94" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Regarder la vidéo</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('img/frontend_images/hero-img.svg') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-1.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-2.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-3.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-4.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-5.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/frontend_images/clients/client-6.png') }}" class="img-fluid"
                            alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>A propos de nous</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            <strong class="text-color2">FormaRecrut</strong> s’appuie sur plus de 15 ans d’expérience
                            dans les Ressources Humaines pour vous
                            proposer des services personnalisés. Nous nous sommes fixé un objectif ambitieux : Réunir
                            dans le vaste domaine de la formation professionnelle, un panel de modules qui se recentrent
                            sur les besoins des individus et apportent notre soutien sur le développement des
                            compétences nécessaires aux performances des entreprises. Les hommes des constituants en
                            étant la principale richesse, ces dernières doivent préparer leurs salariés aux changements.
                        </p>
                        {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
                    </div>
                    <div class="col-lg-6">
                        <p>
                            <strong class="text-color2">L’offre de FormaRecrut</strong> consiste à accompagner des
                            personnes ou des entreprises dans
                            l’atteinte de leurs objectifs et, plus largement, dans la réussite de leur évolution
                            personnelle et professionnelle. L'accompagnement se fait sur différents services, à savoir :
                        </p>
                        <ul>
                            <li>
                                <i class="ri-check-double-line"></i>
                                Le recrutement
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i>
                                La formation
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i>
                                L'audit
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i>
                                L'externalisation des bulletins de salaires
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>
                                <strong>Comment ça marche ?</strong> <br>
                                La mise en relation avec nos entreprises partenaires
                            </h3>
                            <p>
                                Cette plateforme est un portail ouvert à tous les candidats, et aux entreprises
                                souhaitant rechercher des talents.
                                La mise en relation fonctionne sur ces étapes suivants :
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1">
                                        <span>01</span>
                                        Je suis à la recherche d'emploi ? <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            En tant que candidat, ouvrez un compte et completez votre profil en générant
                                            un CV. Une fois votre profil complet, il sera
                                            visible aux entreprises qui recrutent activement.
                                        </p>
                                        <hr>
                                        <a href="#about" class="btn-get-started scrollto">Inscription</a>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span> Je suis à la recherche de talent pour mon
                                        entreprise ?<i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Vous êtes une entreprise à la recherche de personnels qualifiés? C'est
                                            simple, inscrivez-vous.
                                            <br>Vous aurez ainsi accès à une catalogue de nos différents candidats qui
                                            sont à la recherche active de nouveaux défis professionnels.
                                            <br>Parcourez différents profils jusqu'à tomber sur le candidat idéal, libre
                                            à vous de le convoquer à un entretien.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Vous voulez confier le recrutement à
                                        FormaRecrut ? <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            FormaRecrut s’entoure de professionnels du recrutement expérimentés pour
                                            répondre au plus proche de vos besoins en personnel. En plaçant vos attentes
                                            et votre satisfaction au centre de nos préoccupations, FormaRecrut fédère
                                            une offre en constante évolution, basée sur le professionnalisme et la
                                            passion de notre métier.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-size: 90% 50%;background-image: url("{{ asset('img/frontend_images/why-us.svg') }}");'
                        data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="fade-in">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Démarrer maintenant</h3>
                        <p>
                            Ne perdez plus de temps, mettez toutes les chances de votre côté en vous inscrivant
                            maintenant.
                            Que vous soyez candidat ou entreprise, l'inscription est totalement gratuite, et vous aurez
                            accès à un
                            compte dédié type candidat ou entreprise.
                        </p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Inscrivez - vous</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>
                    <p>FormaRecrut s’entoure de professionnels du recrutement expérimentés pour répondre au plus proche
                        de vos besoins en personnel. En plaçant vos attentes et votre satisfaction au centre de nos
                        préoccupations, FormaRecrut fédère une offre en constante évolution, basée sur le
                        professionnalisme et la passion de notre métier.</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-calendar-edit"></i></div>
                            <h4><a href="">Formations</a></h4>
                            <p class="small text-black-50 text-justify">Avec un catalogue de formation complet, nous
                                mettons en place vos formations inter-entreprises ou intra-entreprises, en présentiel
                                ainsi que des formations spécialisées menées par des formateurs de premier plan et
                                experts dans leurs domaines.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxs-file"></i></div>
                            <h4><a href="">Recrutement</a></h4>
                            <p class="small text-black-50 text-justify">
                                Vous êtes à la recherche de candidats qualifiés ? FormaRecrut vous aide à identifier et
                                recruter, à l’échelle mondiale et dans les plus brefs délais, vos futurs collaborateurs.
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-money"></i></div>
                            <h4><a href="">Externalisation des bulletins de salaires</a></h4>
                            <p class="small text-black-50 text-justify">Vous souhaitez vous libérer des contraintes
                                sociales et administratives et vous consacrer au développement de votre entreprise.
                                Notre cabinet s’occupe de tout et vous aide à prendre les bonnes décisions au bon
                                moment.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-cog"></i></div>
                            <h4><a href="">Audit</a></h4>
                            <p class="small text-black-50 text-justify">Notre cabinet est spécialisé dans la
                                réalisation
                                de missions d’audit social et d’audit RH. Nous apportons à nos clients, un important
                                savoir-faire, une solide expérience et des solutions techniques modernes et éprouvées.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img
                                    src="{{ asset('img/frontend_images/team/team-1.jpg') }}" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic"><img
                                    src="{{ asset('img/frontend_images/team/team-2.jpg') }}" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                            <div class="pic"><img
                                    src="{{ asset('img/frontend_images/team/team-3.jpg') }}" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img
                                    src="{{ asset('img/frontend_images/team/team-4.jpg') }}" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
        <!-- End Team Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Questions fréquemment posées</h2>
                    <p>
                        Découvrez nos réponses aux questions qui nou sont fréquemment posées. Si vous n'arrivez pas à trouver votre
                        question dans la liste suivante, veuillez nous contacter par email et nous poser votre question.
                        Notre service clientèle répond à vos questions dans un délai de 24h.
                    </p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at
                                lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                    non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                    purus non.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi
                                enim nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur
                                adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                    Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                    tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam
                                aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                    est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare.
                                Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                    integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                    eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>
                        Nous sommes ouverts du Lundi au Vendredi, de 08h:00 à 17h:30.
                    </p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Emplacement:</h4>
                                <p>Cité Mourtada 2 VDN, Dakar, Sénégal</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>servicecom@formarecrut.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Téléphone:</h4>
                                <p>33 824 19 19</p>
                            </div>

                            {{-- <iframe
                                src="https://maps.google.com/maps?q=sunushopping&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}

                            <iframe src="https://maps.google.com/maps?q=formarecrut&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Votre nom</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Votre email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Objet</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Envoyer le message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Notre NewsLetter</h4>
                        <p>Souscrivez à notre newsletter pour recevoir toutes nos offres.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="S'abonner">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>FormaRecrut</h3>
                        <p>
                            Cité Mourtada 2 VDN, <br>
                            Dakar<br>
                            Sénégal <br><br>
                            <strong>Téléphone:</strong> 33 824 19 19 – 77 158 32 32<br>
                            <strong>Email:</strong> servicecom@formarecrut.com<br>
                            <strong>Email 2:</strong> j.malouf@formarecrut.com
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Liens utils</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">A propos</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#why-us">Comment ça marche</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQs</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route("login") }}">Connexion</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nos services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">Le recrutement</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">La formation</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">L'audit</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">L'externalisation des bulletins
                                    salaires</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Retrouvez nous sur les réseaux sociaux</h4>
                        <p>Vous pouvez nous suivre sur les réseaux sociaux pour rester à jour des nouvelles.</p>
                        <div class="social-links mt-3">
                            <a href="https://twitter.com/formarecrut" target="_blank" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="https://web.facebook.com/FormaRecrut-154830304657897/" target="_blank"
                                class="facebook"><i class="bx bxl-facebook"></i></a>
                            {{-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                            <a href="https://www.linkedin.com/in/formarecrut/" target="_blank"
                                class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>FormaRecrut</span></strong>. Tous droits réservés
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Développée et conçue par <a href="mailto:soumare.dev@gmail.com">Soumare@Dev</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/frontend.js') }}"></script>

</body>

</html>
