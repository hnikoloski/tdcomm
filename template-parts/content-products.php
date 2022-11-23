<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * 
 */

?>

<?php
require(get_template_directory() . '/template-parts/hero.php');
?>

<div class="content-wrapper">
	<?php
	the_content();

	?>
</div><!-- .entry-content -->