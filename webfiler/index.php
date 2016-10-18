<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script src="script.js"></script>

	<title>MOA AS - 
	<?php
		if (isset($_GET['uk']))
			echo ucfirst($_GET['uk']);
		else if (isset($_GET['k']))
			echo ucfirst($_GET['k']);
		else if (isset($_GET['p']))
			echo ucfirst($_GET['p']);
		else
			echo "Hjem";
	?>
	</title>

</head>
<body>
	<!-- Structure -->
	<div id="container">
		<header class="row">
			<div id="logo" class="col-8">
				<img src="images/logo.png"/>
			</div>

			<div id="checkout_list" class="col-4">
				Handleliste
			</div>
			<div id="checkout_list_phone" class="col-4">
				<a href="">Handleliste</a>
			</div>
		</header>

		<div class="row">
			<nav id="main_nav" class="col-12">
				<ul id="navMenu" class="topnav">
					<li id="hjem"><a class="active" href="index.php">Hjem</a></li>
					<li id="karosseri"><a href="index.php?k=karosseri">Karosserideler</a></li>
					<li id="motor"><a href="index.php?k=motor">Motordeler</a></li>
					<li id="diverse"><a href="index.php?k=tilbehor">Diverse</a></li>
					<li id="omoss"><a href="index.php?p=omoss">Om oss</a></li>

					<!-- La dette være sist -->
					<li class="icon">
						<a href="#" onclick="showNavigation()">☰</a>
					</li>
				</ul>
			</nav>
		</div>

		<main class="row">
			<nav id="side_nav" class="col-2">
				<!--
				Bruker PHP For å hente inn andre html filer slik at innholdet havner akkurat her i taggen "<section id="content>".

				Da slipper vi å måtte kopiere all HTML strukturen hver gang vi skal lage ny side.

				Det gjør at vi er avhengig at denne filen heter "index.php" i stedet for "index.html".
				-->
				<?php
					$page_path = "pages/";
					$k_path = $page_path."kategorier/";
					$file_ext = ".html";

					if (isset($_GET['k'])){
						echo "<h4>".ucfirst($_GET['k'])."</h4>";
						include $k_path.$_GET["k"].$file_ext;
					} else {
						include $page_path."kategorier".$file_ext;
					}
				?>
			</nav>

			<section id="content" class="col-10"> 


				<!--
				Bruker PHP For å hente inn andre html filer slik at innholdet havner akkurat her i taggen "<section id="content>".

				Da slipper vi å måtte kopiere all HTML strukturen hver gang vi skal lage ny side.

				Det gjør at vi er avhengig at filen heter "index.php" i stedet for "index.html".
				-->
				<p id="content_top">

				<?php
					$page_path = "pages/";
					$product_path = $page_path."produkter/";
					$uk_path = "";
					if (isset($_GET['k']))
						$uk_path = $page_path."kategorier/".$_GET['k']."/";
					$file_ext = ".html";

					if (isset($_GET["product_id"])){
						echo ucfirst($_GET["product_id"]).'</p>';
						include $product_path.$_GET["product_id"].$file_ext;
					} else if (isset($_GET["k"]) && isset($_GET["uk"])){
						echo ucfirst($_GET["k"])." → ".ucfirst($_GET["uk"]).'</p>'; 
						include $uk_path.$_GET["uk"].$file_ext;
					} else if (isset($_GET["k"])){
						echo 'Velg underkategori</p>';
						echo "Velg en kategori fra venstre!";
					} else if (isset($_GET["p"])){
						echo ucfirst($_GET["p"]).'</p>';
						include $page_path."/page/".$_GET['p'].$file_ext;
					} else {
						echo 'Hjem</p>';
						include $page_path."/page/hjem".$file_ext;
					}
				?>
			</section>
		</main>

		<footer class="row">
			<small id="copyright" class="">
				Copyright &copy; 2016 - MOA A/S
			</small>
		</footer>
	</div>
	<!-- END Structure -->

</body>
</html>
