
<!doctype html>
<html lang="es">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>SIAPLUS</title>
	<?php include("includes/referencias.php") ?>
    
</head>

<body>
    <!-- Loader Start -->
    <div class="css-loader">
        <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
    <!-- Loader End -->
    <!-- Header Start -->
	
    <?php include("includes/menu.php"); ?>
	 <?php include("includes/slider.php"); ?>
    <!-- Hero End -->
    <!-- Call To Action Start -->
    <section class="cta" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-left">
                <div class="content" data-aos="fade-right" data-aos-delay="200">
                    <h2>Únase a miles de agricultores</h2>
                    <p>Agricultores de las 24 provincias del ecuador han seleccionado </p>
                    <p>SIA PLUS para mejorar su Agricultura</p>
                    <p> !TÚ QUE ESPERAS!</p>
                </div>
                <div class="subscribe-btn" data-aos="fade-left" data-aos-delay="400" data-aos-offset="0">
                    <a href="#" class="btn btn-primary">Contactanos</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action End -->
    <!-- Services Start -->
    <section class="services">
        <div class="container">
            <div class="title text-center">
                <h6>POR QUÉ ELEGIRNOS</h6>
                <h1 class="title-blue">¿Cómo funciona?</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                            <img class="mr-3" src="assets/images/fondo1.png" alt="Web Development">
                        </div>                        
                    </div>
                    <div class="col">                        
                            <h5>El software de gestión agrícola</h5>
                            <p>le permite planificar, monitorear y analizar todas las actividades en su granja fácilmente. 
                                La labranza, la siembra, la pulverización, la fertilización, el riego, la cosecha y todas las 
                                demás actividades se gestionan con unos pocos clics. </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Services End -->
    <!-- Featured Start -->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-xl-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
                    <div class="title">
                        <h1>Agricultores</h1>
                    </div>
                    <p>Para los productores que buscan optimizar sus prácticas de gestión agrícola, eviten las hojas 
                        de cálculo e implementen la toma de decisiones basada en datos.
                    </p>
                    <h5>Beneficios</h5>
                    <ul class="list-unstyled">
                        <li>Mantenga los registros de su granja</li>
                        <li>Obtenga información en tiempo real</li>
                        <li>Administre las ventas, los gastos y el flujo de caja </li>
                        <li>No permita que las plagas y enfermedades</li>
                    </ul>
                </div>
                <div class="col-xl-5 gallery">
                    <div class="row no-gutters h-100" id="lightgallery">
                        <img class="img-fluid" src="assets/images/sembrando.jpg" alt="Gallery Image">                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Start -->
    <?php include("includes/footer.php"); ?>
    <!-- Footer Endt -->
    
</body>

</html>