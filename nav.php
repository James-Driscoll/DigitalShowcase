

	<body <?php body_class(); ?>>

	<!--[if lt IE 7]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

<header class="col-xs-12" id="header">
	<div class="container">
		<div class="row">
			<!-- Title -->
			<?php
			    $heading = get_field('heading', false, false);
			    $sub_heading = get_field('sub_heading', false, false);
			?>
			<div class="col-md-6 title">
				<h1 class="text-left"><?php echo $heading; ?></h1>
				<h2 class="text-left"><?php echo $sub_heading; ?></h2>
			</div>
			<!-- / Title -->
			<div class="col-md-6 navWrapper">
			  <?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
			</div>
		</div>
	</div>
</header>
