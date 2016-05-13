<?php
session_start();
$idfuncionario=$_SESSION['xidfuncionario'];
#include('conexaoSql.php');
$con = odbc_connect("DRIVER={SQL Server}; SERVER=201.20.54.186;DATABASE=dbsistema;", "zeca","@meuacesso@");
$sql="select top 30 idchamado,
         		  motivo,
                  convert(char(12),data,103) as data,
                  e.nome as cliente,
				  idfuncionario,
				  a.usuario,
				  '' as enderecoatend,
				  b.nrserie
                         from tbchamadotecnico a  join tbestoque b
                         on a.idestoque = b.idestoque
						 inner join tbchamadotecnico_status c
						 on a.idstatuschamado=c.idstatuschamado
						 inner join tbcontrato d
						 on a.idcontrato=d.idcontrato
						 inner join tbclientes e
						 on d.idcliente=e.idcliente
                          where a.idfuncionario = $idfuncionario
						 and c.idstatuschamado=1
						 and classificacao='PD'
                         OR
                         isnull(a.idfuncionario,0)=0
						 and c.idstatuschamado=1
						 and classificacao='SP'
                         order by a.idcontrato,idchamado desc";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="keywords" content="Chamados" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!--font-awsome-css-->
           <link rel="stylesheet" href="css/font-awesome.min.css"> 
		<!--bootstrap-->
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--custom css-->
			<link rel="stylesheet" href="css/jquery-ui.css" />
			<link href="css/style.css" rel="stylesheet" type="text/css"/>
			
        <!--component-css-->
			<script src="js/jquery-2.1.4.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/Chart.js"></script>
			 <!--script-->
            <script src="js/bigSlide.js"></script>
            <script>
				$(document).ready(function() {
				$('.menu-link').bigSlide();
				});
            </script>
            <!--script-->
			
		<!---start-date-piker---->
			
				<script src="js/jquery-ui.js"></script>
				    <script>
						$(function() {
							$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
		<!---/End-date-piker---->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
		
		<!--script-->
		<link href='//fonts.googleapis.com/css?family=Rajdhani:400,300,500,600,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    </head>
<body>
<div class="body-back">
	<div class="masthead pdng-stn1">

		<div class="phone-box wrap push">
			<div id="home" class="menu-notify">

				<div class="clearfix"></div>
			</div>


			<div id="services" class="menu-notify1">
                <!--
                <div class="profile-left">
					<a href="#menu" class="menu-link"><i class="fa fa-chevron-left"></i></a>
				</div>
				-->
				<div class="Profile-mid logo2">
					<h3>Pendentes</h3>
				</div>
				<div class="Profile-right">
					<div id="dd2" class="wrapper-dropdown-2" tabindex="1"><i class="fa fa-home"></i>
						<ul class="dropdown">
                            <li data-filtertext="listview autodivider">
                                     <a href="menu.php">Home</a>
                            </li>
       	                    <li data-filtertext="listview autodivider">
                                     <a href="separados.php">Separados</a>
                            </li>
                            <li data-filtertext="listview autodivider">
                                     <a href="pendentes.php">Pendentes</a>
                            </li>
                            <!--
                            <li><a class="scroll" href="#contact">Contact</a></li>
                            -->
						</ul>
							<script type="text/javascript">
														function DropDown(el) {
															this.dd = el;
															this.initEvents();
														}
														DropDown.prototype = {
															initEvents : function() {
																var obj = this;
											
																obj.dd.on('click', function(event){
																	$(this).toggleClass('active');
																	event.stopPropagation();
																});	
															}
														}
														$(function() {
											
															var dd = new DropDown( $('#dd2') );
											
															$(document).click(function() {
																// all dropdowns
																$('.wrapper-dropdown-2').removeClass('active');
															});
											
														});
							</script>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>

           <div class="specials">
                 <?php
                 $i=0;
                 $resultMod = odbc_exec($con,$sql) or die(mysql_error());
                 if(odbc_num_rows($resultMod)>0):
                 while($rowMod = odbc_fetch_object($resultMod)):
                      $idchamado=$rowMod->idchamado;
                      $motivo=$rowMod->motivo;
                      $cliente=substr($rowMod->cliente,0,25);
                      $nomeusuario=$rowMod->usuario;
                      $enderecoatend=$rowMod->enderecoatend;
                      $nrserie=$rowMod->nrserie;
                      $lembrete="Cliente:".$cliente . ' - ' . $motivo . ' - ' . $enderecoatend;
                      $i+=1;
                ?>
                 <div class="accordion">

							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-<?php echo $i?>"><?php echo $cliente ?> <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>

                                <div id="accordion-<?php echo $i?>" class="accordion-section-content">
                                  <p>Protocolo:<strong><?php echo $idchamado?></strong><br></p>
								  <p>Motivo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $motivo?></strong></p>
									 <a href="pendentes.php">Finalizar</a>
								</div>

							</div>
							<?php
                             endwhile;
                             else:
                                 ?>
                                 <div class="accordion-section">
								 <a class="accordion-section-title" href="#accordion-1">Nenhum Chamado foi Localizado <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								 </a>

                                 <div id="accordion-1" class="accordion-section-content">
									<p></p>
								 </div>

							</div>
							<?php
                             endif;
                            ?>

                            <!--
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-2"><img src="images/a2.jpg" alt=" " />Separados 2 <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-2" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>

							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-3"><img src="images/a3.jpg" alt=" " />Manicure <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-3" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-4"><img src="images/a4.jpg" alt=" " />Pedicure <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-4" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-5"><img src="images/a5.jpg" alt=" " />Spa Treatments <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-5" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-6"><img src="images/a6.jpg" alt=" " />Wrinkles Treatments <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-6" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							-->
				</div>
				<script>
							jQuery(document).ready(function() {
								function close_accordion_section() {
									jQuery('.accordion .accordion-section-title').removeClass('active');
									jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
								}

								jQuery('.accordion-section-title').click(function(e) {
									// Grab current anchor value
									var currentAttrValue = jQuery(this).attr('href');

									if(jQuery(e.target).is('.active')) {
										close_accordion_section();
									}else {
										close_accordion_section();

										// Add active class to section title
										jQuery(this).addClass('active');
										// Open up the hidden content panel
										jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
									}

									e.preventDefault();
								});
							});
				</script>
			</div>



					</div>

			</div>






            <!--


			<div id="appoint" class="book">
				<div class="menu-notify2">
					<div class="profile-left">
						<a href="#menu" class="menu-link"><i class="fa fa-chevron-left"></i></a>
					</div>
					<div class="Profile-mid logo2">
						<h3>Pendentes</h3>
					</div>
					<div class="Profile-right">
						<div id="dd4" class="wrapper-dropdown-4" tabindex="1"><i class="fa fa-home"></i>
							<ul class="dropdown">
								<li><a class="scroll" href="#home">Home </a></li>
								<li><a class="scroll" href="single.php">Separados</a></li>
								<li><a class="scroll" href="#appoint">Pendentes</a></li>
								<li data-filtertext="listview autodivider">
                                     <a href="../../mobile_z/fechamentoDados_mobile.php">Pendentes 1</a>

						        </li>
								<!--
								<li><a class="scroll" href="#contact">Contact</a></li>
								-->
								<!--
							</ul>

                                <script type="text/javascript">
															function DropDown(el) {
																this.dd = el;
																this.initEvents();
															}
															DropDown.prototype = {
																initEvents : function() {
																	var obj = this;

																	obj.dd.on('click', function(event){
																		$(this).toggleClass('active');
																		event.stopPropagation();
																	});
																}
															}
															$(function() {

																var dd = new DropDown( $('#dd4') );

																$(document).click(function() {
																	// all dropdowns
																	$('.wrapper-dropdown-4').removeClass('active');
																});

															});
								</script>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

                <div class="accordion">
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-1"><img src="images/a1.jpg" alt=" " />Pendentes 1 <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>

                                <div id="accordion-1" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>

							</div>

							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-2"><img src="images/a2.jpg" alt=" " />Pendentes 2 <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-2" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>

							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-3"><img src="images/a3.jpg" alt=" " />Manicure <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-3" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-4"><img src="images/a4.jpg" alt=" " />Pedicure <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-4" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-5"><img src="images/a5.jpg" alt=" " />Spa Treatments <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-5" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
							<div class="accordion-section">
								<a class="accordion-section-title" href="#accordion-6"><img src="images/a6.jpg" alt=" " />Wrinkles Treatments <i class="fa fa-chevron-down"></i><div class="clearfix"></div>
								</a>
								<div id="accordion-6" class="accordion-section-content">
									<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices.</p>
								</div>
							</div>
				</div>
				<script>
							jQuery(document).ready(function() {
								function close_accordion_section() {
									jQuery('.accordion .accordion-section-title').removeClass('active');
									jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
								}

								jQuery('.accordion-section-title').click(function(e) {
									// Grab current anchor value
									var currentAttrValue = jQuery(this).attr('href');

									if(jQuery(e.target).is('.active')) {
										close_accordion_section();
									}else {
										close_accordion_section();

										// Add active class to section title
										jQuery(this).addClass('active');
										// Open up the hidden content panel
										jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
									}

									e.preventDefault();
								});
							});
				</script>
			</div>








            <!--
            <div id="contact" class="contact map-middle">
				<div class="menu-notify1">
					<div class="profile-left">
						<a href="#menu" class="menu-link"><i class="fa fa-chevron-left"></i></a>
					</div>
					<div class="Profile-mid logo2">
						<h3>Contact</h3>
					</div>
					<div class="Profile-right">
						<div id="dd5" class="wrapper-dropdown-5" tabindex="1"><i class="fa fa-home"></i>
							<ul class="dropdown">
								<li><a class="scroll" href="#home">Home </a></li>
								<li><a class="scroll" href="#services">Services</a></li>
								<li><a class="scroll" href="#appoint">Appointments</a></li>
								<li><a class="scroll" href="#contact">Contact</a></li>
							</ul>
								<script type="text/javascript">
															function DropDown(el) {
																this.dd = el;
																this.initEvents();
															}
															DropDown.prototype = {
																initEvents : function() {
																	var obj = this;

																	obj.dd.on('click', function(event){
																		$(this).toggleClass('active');
																		event.stopPropagation();
																	});
																}
															}
															$(function() {

																var dd = new DropDown( $('#dd5') );

																$(document).click(function() {
																	// all dropdowns
																	$('.wrapper-dropdown-5').removeClass('active');
																});

															});
								</script>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="contact-map text-center">
						<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819"></iframe>
					<div class="map-pos">
						<h4>345 Diamond Street,</h4>
						<p>Greece.</p>
					</div>
				</div>
				<form>
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
					<input type="submit" value="Send" >
				</form>
			</div>
		</div>
	</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
-->
</body>
</html>
