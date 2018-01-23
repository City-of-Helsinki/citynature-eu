<?php
$nature_audio_file = get_field( 'history_audio' );

if ( ! empty( $nature_audio_file ) ) {
	?>
	<h6><?php pll_e( 'Listen text' ) ?></h6>
	<audio controls>
		<source src="<?php echo $nature_audio_file['url'] ?>"
		        type="<?php echo $nature_audio_file['mime_type'] ?>">
		<?php pll_e( 'Your browser does not support the audio element.' ) ?>
	</audio>
	<?php
}