<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../public/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="../public/stylesheets/style.css">
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
	<!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->
	<!--<link href="starter-template.css" rel="stylesheet">-->
	
	<!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

	<title>Blog | Arnaud Adon | web Developper </title>

</head>
<body>
	<header id="top">
		<nav>
			<p>Arnaud Adon  |  Blog</p>
			<ul>
				<li><a href="index.php?page=posts.index&p=1">Articles <img src="../public/images/articles_modif.png" alt=""> </a></li>
				<li><a href="http://arnaudadon.fr/">Website <img src="../public/images/website_modif.png" alt=""></a></li>
				<li><a href="index.php?page=posts.about">A propos de moi <img src="../public/images/about_modif.png" alt=""></a></li>
				<li><a href="index.php?page=contact.mail">Contact  <img src="../public/images/contact_modif.png" alt=""></a></li>
				<li><a href="?page=users.login">Administration</a></li>
			</ul>
			<form method="post">
				<!--<input id="input_search" type="text" name="search" placeholder="Rechercher">
				<button type="submit" class="btn_search"><img style src="../public/images/search.png" alt="search"></button>-->
			</form>
		</nav>
	</header>
	
	<div class="container">
      <div class="starter-template" style="padding-top:25px;">
        <?= $content;?>
      </div>

      <!--<aside id="apropos">
      	<img src="../public/images/apropos.png" alt="">
      	<p>Je me nomme Arnaud Adon, je suis un developpeur web situé sur paris , je partage mes découvert sur le développement à travers mon blog</p>
      </aside>-->

    </div><!-- /.container -->
	
<footer>
	<div id="social">       
        <p><a href="https://github.com/Arnaud-Adon"><img src="../public/images/github.png" alt="Github"></a></p>
        <p><a href="https://twitter.com/Arnaud_Adon"><img src="../public/images/twitter.png" alt="twitter"></a></p>
        <p><a href=""><img src="../public/images/rss.png" alt="Flux rss"></a></p>
    </div>
    <p><em>Tous droits réservés © 2017 - Arnaud Adon</em></p>  
</footer>
<a href="#top"><img src="../public/images/arrow-up.png" alt="scroll_up" class="scrollTop_button"></a> 

<script type="text/javascript" src="../public/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="../public/js/main.js"></script>

</body>
</html>