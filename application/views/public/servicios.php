<section id="servicios" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
				<source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
				<source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
			</video>
			<div class="centro">
				<div class="centrado">
					<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
					<div class="btnPlay"></div>
				</div>
				<div class="btnPlayPause ">Pausa</div>
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
								<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
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