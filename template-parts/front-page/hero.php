<?php
/**
 * Front page hero section.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/icons' );
$stats = get_field( 'stats' );
$wprig_hero = apply_filters(
	'bonn_growmodo_front_page_hero',
	array(
		'title' => get_field( 'title' ),
		'text' => get_field( 'description' ),
		'hero_image' => get_field( 'hero_image' ) ? get_field( 'hero_image' )['url'] : '',
		'buttons' => array(
			array(
				'label' => __( 'Learn More', 'bonn-growmodo' ),
				'url' => '#',
				'style' => 'dark',
			),
			array(
				'label' => __( 'Browse Properties', 'bonn-growmodo' ),
				'url' => '#properties',
				'style' => 'primary',
			),
		),
		'stats' => array(
			$stats['stat_1_title'] => $stats['stat_1_text'],
			$stats['stat_2_title'] => $stats['stat_2_text'],
			$stats['stat_3_title'] => $stats['stat_3_text'],
		),
		'badge_text' => __( '✨ Discover Your Dream Property', 'bonn-growmodo' ),
		'image' => 'hero-image.png',
	)
);
?>
<section class="hero">
  <div class="hero__content">
    <div class="hero__text">
      <h1 class="hero__title"><?php echo esc_html( $wprig_hero['title'] ); ?></h1>
      <p class="hero__description"><?php echo esc_html( $wprig_hero['text'] ); ?></p>
    </div>

    <div class="hero__buttons">
      <?php foreach ( $wprig_hero['buttons'] as $wprig_button ) : ?>
      <a class="btn btn--<?php echo esc_attr( $wprig_button['style'] ); ?>"
        href="<?php echo esc_url( $wprig_button['url'] ); ?>"><?php echo esc_html( $wprig_button['label'] ); ?></a>
      <?php endforeach; ?>
    </div>

    <dl class="hero__stats">
      <?php foreach ( $wprig_hero['stats'] as $wprig_value => $wprig_label ) : ?>
      <div class="hero__stat">
        <dt><?php echo esc_html( $wprig_label ); ?></dt>
        <dd><?php echo esc_html( $wprig_value ); ?></dd>
      </div>
      <?php endforeach; ?>
    </dl>
  </div>

  <div class="hero__visual">
    <div class="hero__media">
      <img src="<?php echo esc_url( $wprig_hero['hero_image'] ); ?>" alt="">
    </div>

    <a class="hero__badge" href="#properties" aria-label="<?php echo esc_attr( $wprig_hero['badge_text'] ); ?>">
      <svg viewBox="0 0 176 176" aria-hidden="true" focusable="false">
        <defs>
          <path id="hero-badge-circle" d="M 88,88 m -64,0 a 64,64 0 1,1 128,0 a 64,64 0 1,1 -128,0" />
        </defs>
        <text>
          <textPath href="#hero-badge-circle"><?php echo esc_html( $wprig_hero['badge_text'] ); ?></textPath>
        </text>
      </svg>
      <img src="<?php echo esc_url( $wprig_img_uri . '/icon-badge-arrow.svg' ); ?>" alt="" width="34" height="34">
    </a>
  </div>
</section><!-- .hero -->