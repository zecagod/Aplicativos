<?php
session_start();
$idfuncionario=$_SESSION['xidfuncionario'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="keywords" content="Beauty Spot App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
        <!--
        <div id="menu" class="panel" role="navigation">
			<div class="wrap-content">
				<div class="profile-menu text-center">
					<h2><a href="single.html">Beauty Spot app</a></h2>
					<img class="img-circle border-effect" src="images/pic3.jpg" alt=" ">
					<h3>Patrick Victoria</h3>
					<h4>Designer</h4>
					<div class="facebook">
						<ul>
							<li><a class="fb" href="#">Facebook</a></li>
							<li><a class="twi" href="#">Twitter</a></li>
							<li><a class="goo" href="#">Google+</a></li>
							<li><a class="dri" href="#">Dribbble</a></li>
							<li><a class="pin" href="#">Pinterest</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		-->
		<div class="phone-box wrap push">
			<div id="home" class="menu-notify">

                <div class="profile-left">
                <!--
                <i class="fa fa-chevron-left"></i>
				<!--
					<a href="#" class="menu-link"><i class="fa fa-chevron-left"></i></a>
					-->
				</div>
				<div class="Profile-mid logo">
					<h1>
						<a class="link link--yaku" href="single.html">
							<span>A</span><span>P</span><span>P</span><span> &nbsp;&nbsp;</span><span></span><span></span>S<span>i</span><span>n</span><span>a</span><span>l</span><span>l</span><span></span><span></span>
						</a>
					</h1>
				</div>
				<div class="Profile-right">
					<div id="dd1" class="wrapper-dropdown-1" tabindex="1"><i class="fa fa-home"></i>
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
                            <li><a class="scroll" href="singleSep.php">Separados 1</a></li>
							<li><a class="scroll" href="#appoint">Pendentes</a></li>

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
											
															var dd = new DropDown( $('#dd1') );
											
															$(document).click(function() {
																// all dropdowns
																$('.wrapper-dropdown-1').removeClass('active');
															});
											
														});
							</script>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> 
			<div  class="banner">
				<script src="js/responsiveslides.min.js"></script>
				<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="screen_one">
								
							</div>
						</li>
                        <!--
                        <li>
							<div class="screen_three">
							
							</div>
						</li>
						<li>
							<div class="screen_one">
								
							</div>
						</li>
						<li>
							<div class="screen_three">
							
							</div>
						</li>
						-->
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
            <div data-role="content">
				<h2>Chamados</h2>
                <br>
				<p>Aplicativo desenvolvido para melhorar o acompanhamento de chamados em geral.</p>
				<p>Trabalhe a partir de uma única plataforma para gerenciar com eficiência todas as suas tarefas. <br>
                Uma ferramenta de gerenciamento poderosa com recursos avançados de automação..
                <!--
                <img src="../advancon/images/advancon1.gif" width="238" height="122" border="0">
                 -->
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
              </div><!-- /content -->
            <!--

			</div>

		</div>


	</div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
-->
</body>
</html>
