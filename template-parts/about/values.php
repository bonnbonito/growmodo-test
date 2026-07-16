<?php
/**
 * About Us — Our Values.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images' );

$wprig_values = apply_filters(
	'bonn_growmodo_about_values',
	array(
		'header' => array(
			'title' => __( 'Our Values', 'bonn-growmodo' ),
			'text' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'bonn-growmodo' ),
		),
		'items' => array(
			array(
				'icon' => 'icon-value-trust.png',
				'title' => __( 'Trust', 'bonn-growmodo' ),
				'text' => __( 'Trust is the cornerstone of every successful real estate transaction.', 'bonn-growmodo' ),
			),
			array(
				'icon' => 'icon-value-excellence.png',
				'title' => __( 'Excellence', 'bonn-growmodo' ),
				'text' => __( 'We set the bar high for ourselves. From the properties we list to the services we provide.', 'bonn-growmodo' ),
			),
			array(
				'icon' => 'icon-value-client-centric.png',
				'title' => __( 'Client-Centric', 'bonn-growmodo' ),
				'text' => __( 'Your dreams and needs are at the center of our universe. We listen, understand.', 'bonn-growmodo' ),
			),
			array(
				'icon' => 'icon-value-commitment.png',
				'title' => __( 'Our Commitment', 'bonn-growmodo' ),
				'text' => __( 'We are dedicated to providing you with the highest level of service, professionalism, and support.', 'bonn-growmodo' ),
			),
		),
	)
);
?>
<section class="about-values">
  <div class="about-values__intro">
    <?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
    <h2 class="about-values__title"><?php echo esc_html( $wprig_values['header']['title'] ); ?></h2>
    <p class="about-values__text"><?php echo esc_html( $wprig_values['header']['text'] ); ?></p>
  </div>

  <div class="about-values__grid">
    <?php foreach ( $wprig_values['items'] as $wprig_item ) : ?>
    <article class="about-values__card">
      <div class="about-values__card-icon">
        <img class="about-values__icon" src="<?php echo esc_url( $wprig_img_uri . '/' . $wprig_item['icon'] ); ?>"
          alt="" width="60" height="60">
        <h3 class="about-values__card-title"><?php echo esc_html( $wprig_item['title'] ); ?>
        </h3>
      </div>
      <p class="about-values__card-text"><?php echo esc_html( $wprig_item['text'] ); ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</section><!-- .about-values -->