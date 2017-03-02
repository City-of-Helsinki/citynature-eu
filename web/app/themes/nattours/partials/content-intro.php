<style>
	.header--location {
		background-image: 
		-webkit-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
		url("<?php the_field('introduction_image'); ?>");
		background-image: 
		-moz-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
		url("<?php the_field('introduction_image'); ?>");
		background-image: 
		-o-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
		url("<?php the_field('introduction_image'); ?>");
		background-image: 
		linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
		url("<?php the_field('introduction_image'); ?>"); }
</style>

<?php 
echo '<h4>' . pll__( 'Header for introduction text' ) . '</h4>';
the_content();
?>