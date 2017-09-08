<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Matias Bruzzo ABM</title>

    <!-- Bootstrap core CSS -->
    <link href="/PracticoIII/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/PracticoIII/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/PracticoIII/vendor/css/freelancer.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="/PracticoIII/vendor/jquery/jquery.min.js"></script>
    <script src="/PracticoIII/vendor/popper/popper.min.js"></script>
    <script src="/PracticoIII/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/PracticoIII/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/PracticoIII/vendor/js/jqBootstrapValidation.js"></script>
    <script src="/PracticoIII/vendor/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/PracticoIII/vendor/js/freelancer.min.js"></script>



</head>
<body>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/PracticoIII/Index.php">Trabajo Practico</a>

                <?php if (isset($_SESSION["logueado"])): ?>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="/PracticoIII/Login/Cerrar_Session.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
