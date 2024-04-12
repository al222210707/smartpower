<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <title>Inicio </title>
    
    <link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/coming-sssoon.css" rel="stylesheet" />  
    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  
</head>

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
  <div class="container">
   

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('login') }}"> 
                    Iniciar Sesión
                </a>
            </li>
             <li>
              <a href="{{ route('register') }}"> 
                Registrarse
            </a>
            </li>
       </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('images/consumo-energetico-cabecera.jpg')">

<!--    Change the image source 'images/rick.jpg' with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
          Medidor de Consumo de Energía - Inicio
        </h1>
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
        
        <div class="content">
            <h4 class="motto">Bienvenido al Medidor de Consumo de Energía.</h4>
            <div class="subscribe">
                <h5 class="info-text">
                  Esta pagina web te ayuda a controlar tu consumo de energía. 
                </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>
 </div>
</body>
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>