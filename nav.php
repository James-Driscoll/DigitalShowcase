

<body <?php body_class(); ?>>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="row">
	<div class="col-md-12 header">
		<div class="container">
			<div class="col-md-6">
				<!-- Site Heading -->
				<?php $site_heading = get_bloginfo('name');
				$site_sub_heading = get_bloginfo('description'); ?>
				<div class="site-title font1 text-left">
					<h1><?php echo $site_heading; ?></h1>
					<h2><?php echo $site_sub_heading; ?></h2>
				</div>
				<!-- / Site Heading -->
			</div>
			<div class="col-md-6">
				<!-- Navigation -->
				<div class="navWrapper font1">
				  <?php wp_nav_menu (array('theme_location' => 'page_navigation','container_class' => 'nav')); ?>
				</div>
				<!-- / Navigation -->
			</div>
		</div>
	</div>
</div>
