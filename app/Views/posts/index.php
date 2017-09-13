<div class="row">
	<div class="col-sm-8">	
    <!--<h2 class="title_index">Articles récents</h2>-->

    <!--<p><a href="index.php?page=index">Home</a></p>-->
<?php
   /* $pdo=new PDO('mysql:dbname=test;host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

    $count=$pdo->exec('INSERT INTO articles SET titre="Premier titre", date="'.date('Y-m-d H:i:s').'"');

    var_dump($count);*/

 	 /*$db= new App\Database(); 
 	 $db->getPDO(); */
 	
?>
 	 <div id="container-index">
	<div id="horizontal_index">
 	 <?php foreach($posts as $post): ?>
		
 	 	<div id="article_index">
 	 		<!--<p><?= $post->img; ?></p>-->	
 	 		<?= $post->img; ?>			
			<div id="content_post">
				<h3><a class="title_article" href="<?= $post->url;  ?> "><?= $post->titre; ?></a></h3>

				<p><?= $post->extrait; ?></p>

				<!--<p class="theme"><em><?= $post->categorie ?></em></p>-->
			</div>
		</div>
		
	<?php endforeach; ?>
	</div>

			<div id="pagination">
				<?php for($i=1; $i <= $nbPage; $i++): ?>
					<?php if($cPage == $i): ?>
						<em><?= $i ?></em>
					<?php else : ?>
						<a href="index.php?page=posts.index&p=<?=$i?>"><?=$i?></a>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
		</div>
	</div>

	<!--<div class="col-sm-4">
		<?php foreach ($categories as $categorie): ?>
			<ul>
				<li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre; ?></a></li>
				
			</ul>

		<?php endforeach; ?>
	</div>-->
	
</div>