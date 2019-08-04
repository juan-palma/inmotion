<?php
$portafolio_inDB = new stdClass();

//Video Head
$portafolio_inDB->video = new stdClass();
$portafolio_inDB->video->poster = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg';
$portafolio_inDB->video->webm = 'http://thenewcode.com/assets/videos/polina.webm';
$portafolio_inDB->video->mp4 = 'http://thenewcode.com/assets/videos/polina.mp4';
?>
<section id="servicios" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<video class="stopfade" poster="<?php echo($portafolio_inDB->video->poster); ?>" id="bgvid" loop>
				<?php
					if(isset($portafolio_inDB->video->webm)){
					?>
					<source src="<?php echo($portafolio_inDB->video->webm); ?>" type="video/webm">
					<?php	
					}
				?>
				<?php
					if(isset($portafolio_inDB->video->mp4)){
					?>
					<source src="<?php echo($portafolio_inDB->video->mp4); ?>" type="video/mp4">
					<?php	
					}
				?>
			</video>
			<div class="centro">
				<div class="centrado">
					<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
				</div>
				<div class="btnPlay"><i class="far fa-play-circle"></i></div>
				<div class="btnPlayPause dnone op0"><i class="fas fa-pause"></i></div>
			</div>
			
		</div>
		<main class="row row-no-gutters">
			<?php
			foreach ($serviciosDB->servicios as $i=>$v) {
				?>
				<article class="linea clearfix">
					<div class="bl bl1" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/'.@$v->fondo) ); ?>);"></div>
					<div class="bl bl2">
						<div class="centro">
							<div class="icono">
								<img src="<?php echo( base_url('assets/public/img/servicios/'.$v->foto) ); ?>" alt="servicio_icono_<?php echo($i); ?>" />
							</div>
							<h2 class="titulo"><?php echo($v->titulo); ?></h2>
							<div class="texto"><span><?php echo($v->texto); ?></span></div>
							<div class="enlace">
								<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
							</div>
						</div>
					</div>
				</article>
				<?php
			}
			?>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>