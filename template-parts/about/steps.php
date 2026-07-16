<?php
/**
 * About Us — Navigating the Estatein Experience (steps).
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_steps = apply_filters(
	'bonn_growmodo_about_steps',
	array(
		'header' => array(
			'title' => __( 'Navigating the Estatein Experience', 'bonn-growmodo' ),
			'text' => __( "At Estatein, we've designed a straightforward process to help you find and purchase your dream property with ease. Here's a step-by-step guide to how it all works.", 'bonn-growmodo' ),
		),
		'items' => array(
			array(
				'step' => '01',
				'title' => __( 'Discover a World of Possibilities', 'bonn-growmodo' ),
				'text' => __( 'Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties based on your preferences, including location, type, size, and budget.', 'bonn-growmodo' ),
			),
			array(
				'step' => '02',
				'title' => __( 'Narrowing Down Your Choices', 'bonn-growmodo' ),
				'text' => __( "Once you've found properties that catch your eye, save them to your account or make a shortlist. This allows you to compare and revisit your favorites as you make your decision.", 'bonn-growmodo' ),
			),
			array(
				'step' => '03',
				'title' => __( 'Personalized Guidance', 'bonn-growmodo' ),
				'text' => __( 'Have questions about a property or need more information? Our dedicated team of real estate experts is just a call or message away.', 'bonn-growmodo' ),
			),
			array(
				'step' => '04',
				'title' => __( 'See It for Yourself', 'bonn-growmodo' ),
				'text' => __( "Arrange viewings of the properties you're interested in. We'll coordinate with the property owners and accompany you to ensure you get a firsthand look at your potential new home.", 'bonn-growmodo' ),
			),
			array(
				'step' => '05',
				'title' => __( 'Making Informed Decisions', 'bonn-growmodo' ),
				'text' => __( 'Before making an offer, our team will assist you with due diligence, including property inspections, legal checks, and market analysis. We want you to be fully informed and confident in your choice.', 'bonn-growmodo' ),
			),
			array(
				'step' => '06',
				'title' => __( 'Getting the Best Deal', 'bonn-growmodo' ),
				'text' => __( "We'll help you negotiate the best terms and prepare your offer. Our goal is to secure the property at the right price and on favorable terms.", 'bonn-growmodo' ),
			),
		),
	)
);
?>
<section class="about-steps">
  <?php get_template_part( 'template-parts/front-page/section-header', null, $wprig_steps['header'] ); ?>

  <div class="about-steps__grid">
    <?php foreach ( $wprig_steps['items'] as $wprig_item ) : ?>
    <div class="step">
      <div class="step-number">
        <?php printf( /* translators: %s: step number */ esc_html__( 'Step %s', 'bonn-growmodo' ), esc_html( $wprig_item['step'] ) ); ?>
      </div>
      <article class="step-card">
        <h3 class="about-steps__title"><?php echo esc_html( $wprig_item['title'] ); ?></h3>
        <p class="about-steps__text"><?php echo esc_html( $wprig_item['text'] ); ?></p>
      </article>
    </div>

    <?php endforeach; ?>
  </div>
</section><!-- .about-steps -->