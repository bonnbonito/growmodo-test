<?php
/**
 * About Us — Our Journey hero.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images' );

$wprig_journey = apply_filters(
	'bonn_growmodo_about_journey',
	array(
		'title' => __( 'Our Journey', 'bonn-growmodo' ),
		'text' => __( "Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we've expanded our reach, forged valuable partnerships, and gained the trust of countless clients.", 'bonn-growmodo' ),
		'image' => 'about-journey.png',
		'stats' => array(
			'200+' => __( 'Happy Customers', 'bonn-growmodo' ),
			'10k+' => __( 'Properties For Clients', 'bonn-growmodo' ),
			'16+' => __( 'Years of Experience', 'bonn-growmodo' ),
		),
	)
);
?>
<section class="about-journey">
  <div class="about-journey__content">
    <?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
    <h1 class="about-journey__title"><?php echo esc_html( $wprig_journey['title'] ); ?></h1>
    <p class="about-journey__text"><?php echo esc_html( $wprig_journey['text'] ); ?></p>

    <dl class="hero__stats about-journey__stats">
      <?php foreach ( $wprig_journey['stats'] as $wprig_value => $wprig_label ) : ?>
      <div class="hero__stat">
        <dt><?php echo esc_html( $wprig_label ); ?></dt>
        <dd><?php echo esc_html( $wprig_value ); ?></dd>
      </div>
      <?php endforeach; ?>
    </dl>
  </div>

  <div class="about-journey__visual">
    <img src="<?php echo esc_url( $wprig_img_uri . '/' . $wprig_journey['image'] ); ?>" alt="" width="755" height="546">
  </div>
</section><!-- .about-journey -->