<?php
/**
 * About Us — Our Achievements.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_achievements = apply_filters(
	'bonn_growmodo_about_achievements',
	array(
		'header' => array(
			'title' => __( 'Our Achievements', 'bonn-growmodo' ),
			'text' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'bonn-growmodo' ),
		),
		'items' => array(
			array(
				'title' => __( '3+ Years of Excellence', 'bonn-growmodo' ),
				'text' => __( "With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.", 'bonn-growmodo' ),
			),
			array(
				'title' => __( 'Happy Clients', 'bonn-growmodo' ),
				'text' => __( 'Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.', 'bonn-growmodo' ),
			),
			array(
				'title' => __( 'Industry Recognition', 'bonn-growmodo' ),
				'text' => __( "We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.", 'bonn-growmodo' ),
			),
		),
	)
);
?>
<section class="about-achievements">
  <?php get_template_part( 'template-parts/front-page/section-header', null, $wprig_achievements['header'] ); ?>

  <div class="about-achievements__grid">
    <?php foreach ( $wprig_achievements['items'] as $wprig_item ) : ?>
    <article class="about-achievements__card">
      <h3 class="about-achievements__title"><?php echo esc_html( $wprig_item['title'] ); ?></h3>
      <p class="about-achievements__text"><?php echo esc_html( $wprig_item['text'] ); ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</section><!-- .about-achievements -->