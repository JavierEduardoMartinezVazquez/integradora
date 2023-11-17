<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sopamex</title>
        <link rel="shortcut icon" href="control/img/favicon.png">

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
       
          <meta charset="utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
          <meta name="description" content="" />
          <meta name="author" content="" />
          <title>Sopamex</title>
          <!-- Favicon-->
          <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
          <!-- Font Awesome icons (free version)-->
          <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
          <!-- Google fonts-->
          <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
          <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
          <!-- Core theme CSS (includes Bootstrap)-->
          <link href="css/styles.css" rel="stylesheet" />
          <link href="css/styless.css" rel="stylesheet" />
        </head>

        <style>
            .imgmodals{
                text-align: center;
                height: auto;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto; /* Centrar el contenedor */
            }
            .descripcion{
                color: #FA7A02;
                font-family: "Arial", sans-serif;
                font-size: 18px;
            }
            .pasos{
                color: #63320b;
                font-size: 15px;
                text-align: left;
                text-align: justify;
            }
            #compra {
              background-image: url('control/img/pasta2.jpg');
              background-size: cover; /* Ajusta el tamaño de la imagen al contenedor */
              background-repeat: no-repeat; /* Evita que se repita la imagen */
              position: relative; /* Establece una posición relativa en el contenedor */
            }
          
            #compra::before {
              content: '';
              background-color: rgba(0, 0, 0, 0.788); /* Color negro con opacidad (ajusta el último valor para controlar la opacidad) */
              position: absolute; /* Establece una posición absoluta en la capa de superposición */
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
            }
          
            /* Estilos para los elementos superpuestos */
            .page-section-heading,
            .divider-custom,
            .btn {
              position: relative; /* Establece una posición relativa en los elementos superpuestos */
              z-index: 1; /* Asegura que los elementos estén encima de la capa de superposición */
            }
            .quienes{
                    margin-top: 0;
                    margin-bottom: 0.5rem;
                    font-weight: 700;
                    line-height: 1.2;
                    align-content: center;
                    font-size: 25px;
                    color: rgb(75, 33, 7);
                    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                }
          </style>
<body >
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: #683208">
        <div class="container">
          <img src="/control/img/logotipo.png" alt="logo" style="width: 120px" href="#home">
            <a class="navbar-brand" href="#page-top">Sopamex</a>
            <button class="navbar-toggler text-uppercase font-weight-bold text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: rgb(231, 119, 15)">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#page-top">Inicio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Recetas</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#compra">Compra</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#conocenos">Conocenos</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    </section>
    <div class="py-1" style="background-color: rgb(201, 110, 0)">
        <div class="container">
        </div>
    </div>
    <!-- Masthead-->
    <section class="page-top portfolio" id="page-top">
                <img src="/control/img/PastaFondoNegro.jpg" class="img-fluid" alt="..." style="margin-top: 70px">
    </section>
    
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-10">Recetas</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
            </div>
            <br>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="control/img/receta1.jpg" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="control/img/receta2.jpg" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="control/img/receta3.jpg" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>
      
    <!-- compra Section-->
    <section class="page-section text-white mb-0" id="compra">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">¿Desea adquirir nuestra pasta?</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                  <img src="control\img\carrito-de-compras.png"></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Button-->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="/login">
                    Comprar
                </a>
            </div>
        </div>
    </section>
    <!-- Conocenos Section-->
<section class="page-section" id="conocenos" style="background-color:rgb(226, 226, 226)">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Conocenos</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
            </div>

            <div class="salto"></div>
            <div class="card mb-12" style="max-width: 1300px;">
                <div class="row g-0">
                    <div class="col-md-7">
                    <div class="card-body" style="background-color:#FEB31E; height: 100%">
                      <div class="quienes">¿Quienes somos?</div>
                      <p class="card-text">Buscamos ser percibidos por los consumidores como un producto que sea capaz de satisfacer su necesidad de tener una alimentacion saludable y el poder de ser una empresa rentable para poder posicionarnos en el mercado nacional</p>
                    </div>
                    </div>
                  <div class="col-md-5">
                    <img src="control/img/logotipo.png" class="img-fluid rounded-start" alt="..." style="height: 100%">
                  </div>
                </div>
            </div>
            <div class="salto"></div>

            <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Misión</h5>
                    <p class="card-text">Desarrollar y ofrecer un producto alimenticio nutriciona, funcional, e innovador con respecto a nuestras materias primas, garantizando una producción eficiente y de calidad.</p>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Visión</h5>
                    <p class="card-text">Buscamos ser percibidos por los consumidores como un producto que sea capaz de satisfacer su necesidad de tener una alimentación saludable.</p>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Valores</h5>
                    <p class="card-text">
                        <lista>• Compromiso</lista><br>
                        <lista>• Calidad</lista><br>
                        <lista>• Responsabilidad</lista><br>
                        <lista>• Integra</lista><br>
                        <lista>• Eficiencia</lista>
                    </p>
                  </div>
                </div>
            </div>
    </section>
    <!-- Contact Section-->
{{--     <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contactanos</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Nombre</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es requerido.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">Email requerido.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Telefono</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Necesitas un numero de telefono.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Mensaje</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Escribe un mensaje</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error!</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">
                          Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Footer-->
    <footer class="footer text-center"  id="contact">
        <div class="container">
            <div class="row">
                {{-- <!-- Footer -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    
                </div>
                <!-- Footer--> --}}
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Localización</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7534.92094055297!2d-99.47623126084062!3d19.218753559003687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sParque%20Industrial%20PYMES%2C%20Km.%209.5%20Carr.%20Santiago%20Tianguistenco-Ocoyoacac%20Calle%20Industrial%20Bodega%2010.%20Col.%20Agua%20blanca.%20Capulhuac!5e0!3m2!1ses-419!2smx!4v1700241355724!5m2!1ses-419!2smx" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Footer-->
                <div class="col-lg-6">
                    <style>
                        .contactofooter{
                            color: #ffffff;
                            font-size: 16px;
                            font-family: Verdana, Geneva, Tahoma, sans-serif;
                            text-align: center;
                            line-height: 1.5;
                            word-spacing: 2px;
                        }
                    </style>
                    <h4 class="text-uppercase mb-4">Correo</h4>
                    <p class="contactofooter"> 
                        sopamex07@gmail.com
                    <br>
                    <h4 class="text-uppercase mb-4">Telefono</h4>
                    <p class="contactofooter"> 
                        (722) 862 6868 
                    </p>
                    <h4 class="text-uppercase mb-4">Dirección</h4>
                    <p class="contactofooter"> 
                        Parque Industrial PYMES, Km. 9.5 Carr. <br> Santiago Tianguistenco-Ocoyoacac Calle Industrial <br>Bodega 10. Col. Agua blanca. Capulhuac, México. CP 52700. 
                    </p>
                    <div class="salto"/>
                    <h4 class="text-uppercase mb-4">Buscanos</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://web.facebook.com/people/Sopa-Mex/pfbid0S2dXwe6iwAWkz933TjkZnmVy4roVB6TxWE7hasMUYEYdPhs7qxW2jyGsKVKQ4Yt3l/?mibextid=ZbWKwL"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://vm.tiktok.com/ZMjwXETUX/"><i class="fab fa-fw fa-tiktok"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/sopamex_biotecnology/?igshid=NzZlODBkYWE4Ng%3D%3D"><i class="fab fa-fw fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright-->
    <div class="copyright py-4 text-center text-white" style="background-color: rgb(207, 117, 0)">
        <div class="container"><small>Copyright 2023 | By Servicios Digitales</small></div>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Espagueti Blanco</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="imgmodals" src="control/img/receta1.jpg" alt="..." />
                                        
                                        <div class="salto"></div>
                                        <div class="descripcion">Pasos para hacer este platillo:
                                            <div class="pasos">
                                                <br>
                                                1.	En una sartén, calienta la mantequilla y fríe el ajo por 1 minuto. Agrega el espagueti cocido y escurrido; cocina por 2 minutos más.
                                                <br>
                                                2.	Vierte la Leche Evaporada CARNATION® CLAVEL® con la Media Crema NESTLÉ®, la sal con cebolla y el consomé de pollo; mezcla y cocina hasta que espese ligeramente.
                                                <br>
                                                3.	Sirve y decora.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Portfolio Modal - Text-->
                                <br>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Espagueti verde con chile poblano</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="control/img/receta2.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <div class="descripcion">Pasos para hacer este platillo:
                                    <div class="pasos">
                                        <br>
                                        1.	 Asa los chiles poblanos en el comal o plancha.
                                        <br>
                                        2.	Una vez asados, introduce los chiles poblano en una bolsa de plástico y ciérrala para que suden y puedas retirar la piel más fácilmente. Déjalos dentro durante 5 minutos, luego quita la piel, las semillas y las venas de los chiles.
                                        <br>
                                        3.	Es el momento de hacer la salsa que dará a la pasta el color verde. Para ello, corta los chiles en cuadros, introdúcelos en la licuadora o recipiente de borde alto, incorpora el ajo, la crema de leche, un poco de consomé al gusto para salar la crema y bátelo todo.
                                        <br>
                                        4.	Hecha la salsa, pon una sartén a calentar para cocer los espaguetis con ella, hazlo a fuego medio y añade un poco de mantequilla. Cuando se derrita la mantequilla, vierte la salsa poblana para que se caliente y espese. Después, incorpora los espaguetis y revuélvelo todo bien hasta que adquieran el espesor deseado.
                                        <br>
                                        5.	Sirve y decora.
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Espagueti rojo</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="control/img/receta3.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <div class="descripcion">Pasos para hacer este platillo:
                                    <div class="pasos">
                                        <br>
                                        1.	Hierve el puré de jitomate a fuego lento y añade la crema, la mantequilla y el cubo sazonador. 
                                        <br>
                                        2.	Vierte el espagueti en la salsa y mezcla. 
                                        <br>
                                        3.	Sirve y decora.
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
