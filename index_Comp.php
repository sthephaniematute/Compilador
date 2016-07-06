<?php
	
	
	include("classes.php");
	
	$uploaddir = 'uploads/';
	$codeS = array();
	
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mag1's PythonToJavaScript</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/freelancer.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="page-top" class="index">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Compilador de Python a JavaScript</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="index.php"></a>
                    </li>
                   <li class="page-scroll">
                        <a href="#formI">Specifications</a>
                    </li>
                  <li class="page-scroll">
                        <a href="#about">Quienes Somos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <div class="intro-text">
                        <span class="name">Compilador Magico</span>
                        <hr class="star-light">
                        <span class="skills">Python a JavaScript </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="formI">
		<div class="container" >
			 <div class="row" >
                <div class="col-lg-12  text-center">
					<form action="index.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<div  class="row control-group">
								<div class="col-lg-12 text-center">
									<h3>Analizador Lexico: </h3>
									<hr class="star-primary">
								</div>
							<div  class="row control-group">
								
								<div class="row control-group col-lg-4"  align="left">
									
									<label for="nome">Upload log:</label>
									<br>
									<?php 
									
										if ((($_FILES["file"]["type"] == "image/gif")
											|| ($_FILES["file"]["type"] == "image/jpeg")
											|| ($_FILES["file"]["type"] == "text/plain"))
											&& ($_FILES["file"]["size"] < 20000)) {
									  
											  if ($_FILES["file"]["error"] > 0) {
												  echo "Código de retorno: ".
													  $_FILES["file"]["error"].
													  "<br />";
											  }
											  else {
												  
												  echo "Arquivo: "
													  .$_FILES["file"]["name"]."<br />";
												  echo "Tipo: ".
													  $_FILES["file"]["type"]."<br />";
												  echo "Tamanho: ".
													  ($_FILES["file"]["size"] / 1024).
													  " Kb<br />";
												  echo "Arquivo temporário: ".
													  $_FILES["file"]["tmp_name"]."<br />";
												 
												  if (file_exists("uploads/" .$_FILES["file"]["name"])){
													  echo $_FILES["file"]["name"] ." já existe.";
												  }
												  else {
													
														echo "\n\nGuardado em: uploads/".
														$_FILES["file"]["name"];
												  }
												    move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$_FILES["file"]["name"]);
													  $code = $uploaddir . basename($_FILES['file']['name']);
													 $codigo = file ($uploaddir . basename($_FILES['file']['name']));
											  }
									  }else {
										  echo "Invalid file";
									  }
									$linhas = file($_FILES["file"]["name"]);
									

									?>
								</div>
								<div class="row control-group col-lg-4"  align="left">
									<label for="nome">File Log:</label>
									<br>
									<code>
									<?php 
										$lexer = new lexer($codigo);
										$tokens = array();
											
										
									?>
									</code>
									
									
								</div>	
								<div class="row control-group col-lg-4"  align="left">
									<label for="nome">Tabs Log:</label>
									<br>
									<?php 
										
										$lexer->getTabs();
										
									?>
									
									
									
								</div>	
								
							</div>
							<div  class="row control-group">
							
								<div class="row control-group col-lg-4"  align="left">
									<label >Tokens Log:</label>
									<br>
									
									<?php 
										$tokens = $lexer->getTokens();
										$newTxt = fopen("downloads/tokens.txt", "a");
										$stringTxt ='';
										foreach($tokens as $token){
											$stringTxt = $stringTxt. $token->toString() . " ";
										}
										$escreve = fwrite($newTxt, $stringTxt);
										fclose($newTxt); 
										
										
									?>
									
									
									
								</div>	
							</div>	
							<div  class="row control-group">
								
								<div  class="form-group col-xs-12"align="center">
									<button class="botao" type="submit" name="submit">Atras</button>
								</div>
							</div>	
							</div>
						</fieldset>
					</form>  	
				</div>
			</div>					
		</div>
    </section>

  <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Quienes somos</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Yerry N. <p>
Brian G. <p>
Kelvin H. <p>
Luigi C. <p>
Victor P. <p>
Stephanie M. <p>
                </div>
                <div class="col-lg-4">
                    <p>Edison T. <p>
Yonny H. <p>
Geraldine N. <p>
Leidymar V. <p>
Cesar R. <p>
Yubiry S.</p></p>
                </div>
            </div>
        </div>
    </section>
   <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contactanos</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Correo</label>
                                <input type="email" class="form-control" placeholder="Correo" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" placeholder="Telefono" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensaje</label>
                                <textarea rows="5" class="form-control" placeholder="Mensaje" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


     <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Universidad</h3>
                        <p>UNERG<br>Periodo 2016-1</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Mis Redes</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Compilador de Python a JavaScript</h3>
                        <p><a href="#"></a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Stepha Gmc 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>
 </footer>

    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

  
	
	
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <script src="js/freelancer.js"></script>

</body>

</html>
