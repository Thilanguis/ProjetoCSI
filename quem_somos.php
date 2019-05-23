<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Quem Somos</title>
	<meta charset="UTF-8">
    <title>Dietpro</title>
     <link rel="stylesheet" href="css/styleQuemSomos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!--font Exo-->
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <?php include_once 'head.php'; ?>
    
</head>
<body id="body">

    <div class="container">

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-secondary navbar-dark p-1">
                    <a class="btn btn-secondary navbar-brand" href="index.php">HOME</a>
                    <a class="btn btn-secondary navbar-brand" href="#">QUEM SOMOS</a>

                    <a class="btn btn-secondary dropdown-toggle navbar-brand" href="#" role="button" id="<dropdownMenuL></dropdownMenuL>ink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        LOGIN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <div id="menuDropDown">
                            <form action="session.php" method="post" class="px-4 py-3">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1"><i class="fab fa-nutritionix" style="font-size: 30px; color:#3b884d; "></i> &nbsp; Endereço E-mail</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@email.com" name="login" re>
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Senha</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha" name="senha">
                                </div>
                                <div class="form-check">
                                </div>
                                <button id="btnentrar" type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <h6 style="margin-left: 48px;">
                                Novo por aqui? <a href="#" data-toggle="modal" data-target="#exampleModalScrollable" style="text-decoration: none;">Cadastre-se</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
           
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div id="divMenuDeslogado">&nbsp; <i id="usuarioDeslogado" class="fas fa-user-times"></i> <b>Nutricionista:</b>
                <?php echo "<i id='paciente'>" ."Deslogado" . "</i>" ; ?>
            </div>
        </nav>

                    <h4 id="menuNutricionista">Quem Somos? &nbsp;<img src="img/icons8-puzzled-48.png" alt=""></h4>


        <div id="corpo" style="width: 90%; margin: auto;">
        	<div id="imagem" style="float: left; margin: 25px 0;">
		        <img data-attachment-id="20483" data-permalink="https://www.happygoluckyblog.com/honey-lime-christmas-fruit-salad/christmas-fruit-salad-31/" data-orig-file="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31.jpg" data-orig-size="1000,1500" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;3.2&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;Canon EOS 6D&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;1545240367&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;55&quot;,&quot;iso&quot;:&quot;800&quot;,&quot;shutter_speed&quot;:&quot;0.008&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}" data-image-title="Christmas Fruit Salad" data-image-description="<p>Celebrate the holidays with a delicious bowl of Honey Lime Christmas Fruit Salad.  A festive fruit salad full of red and green fruit topped with honey-lime dressing.  </p>
				" data-medium-file="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31-200x300.jpg" data-large-file="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31-683x1024.jpg" class="aligncenter wp-image-20483" src="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31.jpg" alt="Celebrate the holidays with a delicious bowl of Honey Lime Christmas Fruit Salad. A festive fruit salad full of red and green fruit topped with honey-lime dressing. " width="600" height="900" srcset="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31.jpg 1000w, https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31-400x600.jpg 400w, https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31-200x300.jpg 200w, https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31-683x1024.jpg 683w" sizes="(max-width: 600px) 100vw, 600px" data-jpibfi-post-excerpt="" data-jpibfi-post-url="https://www.happygoluckyblog.com/honey-lime-christmas-fruit-salad/" data-jpibfi-post-title="Honey Lime Christmas Fruit Salad" data-jpibfi-src="https://www.happygoluckyblog.com/wp-content/uploads/2018/12/Christmas-Fruit-Salad-31.jpg" data-jpibfi-indexer="0">
			</div>
            
	        <div id="text" style="width: 33%; margin-top: 54px; float: right; text-align: center;">
	        	<div id="container-apresentacao">
	        		<h2 id="apresentacao">
	        		    <span>A</span>
	        		    <span>p</span>
	        		    <span>r</span>
	        		    <span>e</span>
	        		    <span>s</span>
	        		    <span>e</span>
	        		    <span>n</span>
	        		    <span>t</span>
	        		    <span>a</span>
	        		    <span>ç</span>
	        		    <span>ã</span>
	        		    <span>o</span>
	        		</h2>    
	        		</div>
	        		<p>O software Dietpro foi desenvolvido por um grupo de programadores do curso técnico de informática noturno do colégio Santo Inácio, trazendo um sistema web com objetivo de automatizar e humanizar as consultas dos profissionais de nutrição.</p>
	        	<hr>
		        <div id="container-valores">
		        	<h2 id="valores">
		        	    <span>V</span>
		        	    <span>a</span>
		        	    <span>l</span>
		        	    <span>o</span>
		        	    <span>r</span>
		        	    <span>e</span>
		        	    <span>s</span>
		        	</h2>
		        	</div>
		        	<p>Trazer o melhor serviço aos nossos cliente com nossa iniciativa e criatividade dando sastifacao ao nosso contratante, respeitando todos os valores e diretrizes da empresa. Investimos em uma boa relação solida e agradável entre software e usuário, respeitando todos os direitos de privacidade.</p>
		        <hr>
		        <div id="container-missao">
		        	<h2 class="missao">
		        	    <span>M</span>
		        	    <span>i</span>
		        	    <span>s</span>
		        	    <span>s</span>
		        	    <span>ã</span>
		        	    <span>o</span>
		        	</h2>
		        	</div>
		        	<p>Nossa missão e a dedicação na conclusão as metas impostas com uma dinâmica de grupo, porque acreditamos em uma boa relação entre nossa equipe trará o melhor serviço ao contratante.</p>
		        
	        </div>

        </div>

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>
</html>