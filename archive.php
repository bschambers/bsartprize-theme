<?php
/**
 * Template Name: Archive
 *
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage bsartprize
 * @since 1.0
 * @version 1.0
 */

get_header();

wp_get_archives('type=postbypost');

get_footer();?>
