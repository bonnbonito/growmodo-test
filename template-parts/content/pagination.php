<?php
/**
 * Template part for displaying a pagination
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

the_posts_pagination(
	array(
		'mid_size'           => 2,
		'prev_text'          => _x( 'Previous', 'previous set of search results', 'bonn-growmodo' ),
		'next_text'          => _x( 'Next', 'next set of search results', 'bonn-growmodo' ),
		'screen_reader_text' => __( 'Page navigation', 'bonn-growmodo' ),
	)
);
