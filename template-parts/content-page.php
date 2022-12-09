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
$leftSideDecoWidth = get_field('left_side_decoration_width', get_the_ID()) ? get_field('left_side_decoration_width', get_the_ID()) : '420';
$leftSideDecoHeight = get_field('left_side_decoration_height', get_the_ID()) ? get_field('left_side_decoration_height', get_the_ID()) : '904';
$leftSideDecoBottom = get_field('left_side_decoration_bottom_pos', get_the_ID()) ? get_field('left_side_decoration_bottom_pos', get_the_ID()) : '-162';
$leftSideDecoLeft = get_field('left_side_decoration_left_pos', get_the_ID()) ? get_field('left_side_decoration_left_pos', get_the_ID()) : '0';

$rightSideDeco = get_field('right_side_decoration', get_the_ID()) ? get_field('right_side_decoration', get_the_ID()) : '';
$rightSideDecoWidth = get_field('right_side_decoration_width', get_the_ID()) ? get_field('right_side_decoration_width', get_the_ID()) : '420';
$rightSideDecoHeight = get_field('right_side_decoration_height', get_the_ID()) ? get_field('right_side_decoration_height', get_the_ID()) : '551';
$rightSideDecoBottom = get_field('right_side_decoration_bottom_pos', get_the_ID()) ? get_field('right_side_decoration_bottom_pos', get_the_ID()) : '85';
$rightSideDecoRight = get_field('right_side_decoration_right_pos', get_the_ID()) ? get_field('right_side_decoration_right_pos', get_the_ID()) : '0';
?>

<div class="content-wrapper" style="
 --leftSideDeco: url('<?php echo $leftSideDeco; ?>');
 --leftSideDecoWidth:<?php echo $leftSideDecoWidth / 10; ?>rem;
 --leftSideDecoHeight:<?php echo $leftSideDecoHeight / 10; ?>rem;
 --leftSideDecoBottom:<?php echo $leftSideDecoBottom / 10; ?>rem;
 --leftSideDecoLeft:<?php echo $leftSideDecoLeft / 10; ?>rem;
  --rightSideDeco: url('<?php echo $rightSideDeco; ?>');
  --rightSideDecoWidth:<?php echo $rightSideDecoWidth / 10; ?>rem;
 --rightSideDecoHeight:<?php echo $rightSideDecoHeight / 10; ?>rem;
 --rightSideDecoBottom:<?php echo $rightSideDecoBottom / 10; ?>rem;
 --rightSideDecoRight:<?php echo $rightSideDecoRight / 10; ?>rem;
  ">
	<?php
	the_content();
	?>
</div><!-- .entry-content -->