
<header id="header" class="mboxG">
	<div class="mboxC">
		<div id="keep_on">
			<img src="<?php echo(base_url('assets/public/img/keep_on.svg')) ?>" alt="Keep on' moving" />
		</div>
		<div id="direccion">
			<span class="tel">T: <a href="tel:<?php echo($generalDB->telefono); ?>"><?php echo($generalDB->telefono); ?></a></span>
			<span class="mail">M: <a href="mailto:<?php echo($generalDB->correo); ?>"><?php echo($generalDB->correo); ?></a></span>
		</div>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</header>


<section id="servicios" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<?php
			foreach ($serviciosDB->servicios as $i=>$v) {
				?>
<!-- 				<article class="col-12 col-sm-6 col-md-3"> -->
					<article class="col-12 col-sm-6 col-md-2-5">
					<div class="icono">
						<img src="<?php echo( base_url('assets/public/img/servicios/'.$v->icono) ); ?>" alt="servicio_icono_<?php echo($i); ?>" />
					</div>
					<h2 class="titulo"><?php echo($v->titulo); ?></h2>
					<div class="texto"><span><?php echo($v->texto); ?></span></div>
					<div class="enlace">
						<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
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



<section id="clientes" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($clientesDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<div class="slideMain">
				<div class="slideItems">
				<?php
					$conteno = 0;
					foreach ($clientesDB->logos as $i=>$v) {
						
						if($conteno <= 0){
							?>
							<div class="slideLine">
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v->logo) ); ?>" />
								</div>
							<?php
							$conteno++;
						} else if($conteno >= 3){
							?>
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v->logo) ); ?>" />
								</div>
							</div>
							<?php
							$conteno = 0;
						} else{
							?>
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v->logo) ); ?>" />
								</div>
							<?php
							$conteno++;
						}
						
					}
				?>
				</div>
				<div class="mboxD_in">
					<div class="btnSlideNext">
						<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoNext.jpg') ); ?>" />
					</div>
					<div class="btnSlideBack">
						<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoBack.jpg') ); ?>" />
					</div>
				</div>
			</div>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>





<section id="portafolios" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($portafoliosDB->titulo_general); ?></h1>
		<main class="">
			<?php
			foreach ($portafoliosDB->portafolios as $i=>$v) {
				?>
				<article class="boxMainPortafolio" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.$v->fondo) ); ?>);">
					<h2 class="titulo">
						<?php echo($v->titulo); ?>
					</h2>
					<div class="enlace">
						<input type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
					</div>
				</article>
				<?php
			}
			?>
			<input id="btnMasPortafolios" type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/')); ?>'" value="ver más"></input>
<!-- 			<div id="btnMasPortafolios">ver más</div> -->
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>



<section id="nosotros" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($nosotrosDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<div class="slideMain">
				<div class="slideItems">
				<?php
					$conteno = 0;
					foreach ($nosotrosDB->team as $i=>$v) {
					?>
						<article class="item" style="background-image: url(<?php echo( base_url('assets/public/img/nosotros/'.$v->fondo) ); ?>); background-color: <?php echo($v->color); ?>">
							<div class="persona">
								<span class="nombre"><?php echo($v->nombre ); ?></span>
								<span class="apellido"><?php echo($v->apellido ); ?></span>
								<span class="cargo"><?php echo($v->puesto ); ?></span>
							</div>
						</article>
					<?php
					}
				?>
				</div>
				<div class="mboxD_in">
					<div class="btnSlideBack">
						<img src="<?php echo( base_url('assets/public/img/btnSlideNaranjaBack.jpg') ); ?>" />
					</div>
					<div class="btnSlideNext">
						<img src="<?php echo( base_url('assets/public/img/btnSlideNaranjaNext.jpg') ); ?>" />
					</div>
				</div>
			</div>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>



















