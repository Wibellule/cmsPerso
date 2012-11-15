<?php //$title_for_layout = $pages->name; ?>
<div class='hero-unit'>
	<h1 align="center">Accueil</h1>
</div>
<br />
<div class='hero-unit'>
<h1 align="center"></h1>
	<div id='conteneur'>
		<div id='carrousel'>
		<?php 
			$i = 0;
			foreach($sliders as $k=>$v){
				$i++;
				echo $this->slide->create($v->name,$v->file,$i);
			}
		?>
		</div>
	</div>
</div>
<br />
<div class='hero-unit'>
	<h1 align="center">Focus Prochainement</h1>
</div>
<br />
<div class='hero-unit'>
	<h1 align="center">Footer Prochainement</h1>
</div>
<br />



