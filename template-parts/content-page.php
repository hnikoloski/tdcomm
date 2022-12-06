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
$leftSideDeco = get_field('left_side_decoration', get_the_ID()) ? get_field('left_side_decoration', get_the_ID()) : '';
$rightSideDeco = get_field('right_side_decoration', get_the_ID()) ? get_field('right_side_decoration', get_the_ID()) : '';
?>

<div class="content-wrapper" style="--leftSideDeco: url('<?php echo $leftSideDeco; ?>'); --rightSideDeco: url('<?php echo $rightSideDeco; ?>');">
	<?php
	the_content();

	?>
</div><!-- .entry-content -->