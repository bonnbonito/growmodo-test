<?php
/**
 * The front page template: Estatein real estate landing page.
 *
 * Composes reusable template parts. Each card section (properties, testimonials,
 * FAQs) shares the same section-header / card grid / pager structure and is
 * rendered by a single generic loop.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

use WP_Query;

get_header();

bonn_growmodo()->print_styles( 'bonn-growmodo-front-page' );

/*
 * Demo cards for the three slider sections. Each set is doubled below so the
 * sliders have more than one page; replace with real content (or a CPT query)
 * via the `bonn_growmodo_front_page_sections` filter.
 */
$featured_properties = get_field( 'featured_properties' );

$wprig_property_items = array();

foreach ( $featured_properties as $property ) {
	$id = $property->ID;
	$featured_image = get_the_post_thumbnail_url( $id, 'full' );
	$title = get_the_title( $id );
	$excerpt = esc_html( get_field( 'description', $id ) );
	$price = get_field( 'price', $id );

	$wprig_property_items[] = array(
		'image' => $featured_image,
		'title' => $title,
		'excerpt' => $excerpt,
		'badges' => array(
			array(
				'icon' => 'icon-bed.svg',
				'label' => get_field( 'bedrooms', $id ) . '-Bedroom',
			),
			array(
				'icon' => 'icon-bath.svg',
				'label' => get_field( 'bathrooms', $id ) . '-Bathroom',
			),
			array(
				'icon' => 'icon-villa.svg',
				'label' => __( 'Villa', 'bonn-growmodo' ),
			),
		),
		'price' => $price,
		'url' => get_the_permalink( $id ),
	);
}

$testimonials = new WP_Query( array(
	'post_type' => 'testimonial',
	'posts_per_page' => 4,
) );

$wprig_testimonial_items = array();

while ( $testimonials->have_posts() ) {
	$testimonials->the_post();
	$wprig_testimonial_items[] = array(
		'rating' => 5,
		'title' => get_the_title(),
		'text' => esc_html( get_field( 'testimonial_content' ) ),
		'avatar' => get_field( 'image' )['url'],
		'name' => get_field( 'name' ),
		'location' => get_field( 'location' ),
	);
}
wp_reset_postdata();

$wprig_faq_items = array(
	array(
		'title' => __( 'How do I search for properties on Estatein?', 'bonn-growmodo' ),
		'text' => __( 'Learn how to use our user-friendly search tools to find properties that match your criteria.', 'bonn-growmodo' ),
	),
	array(
		'title' => __( 'What documents do I need to sell my property through Estatein?', 'bonn-growmodo' ),
		'text' => __( 'Find out about the necessary documentation for listing your property with us.', 'bonn-growmodo' ),
	),
	array(
		'title' => __( 'How can I contact an Estatein agent?', 'bonn-growmodo' ),
		'text' => __( 'Discover the different ways you can get in touch with our experienced agents.', 'bonn-growmodo' ),
	),
);

$wprig_sections = apply_filters(
	'bonn_growmodo_front_page_sections',
	array(
		'properties' => array(
			'header' => array(
				'title' => __( 'Featured Properties', 'bonn-growmodo' ),
				'text' => __( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.', 'bonn-growmodo' ),
				'cta_label' => __( 'View All Properties', 'bonn-growmodo' ),
			),
			'card' => 'card-property',
			'items' => array_merge( $wprig_property_items, $wprig_property_items ),
		),
		'testimonials' => array(
			'header' => array(
				'title' => __( 'What Our Clients Say', 'bonn-growmodo' ),
				'text' => __( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'bonn-growmodo' ),
				'cta_label' => __( 'View All Testimonials', 'bonn-growmodo' ),
			),
			'card' => 'card-testimonial',
			'items' => array_merge( $wprig_testimonial_items, $wprig_testimonial_items ),
		),
		'faqs' => array(
			'header' => array(
				'title' => __( 'Frequently Asked Questions', 'bonn-growmodo' ),
				'text' => __( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'bonn-growmodo' ),
				'cta_label' => __( 'View All FAQ’s', 'bonn-growmodo' ),
			),
			'card' => 'card-faq',
			'items' => array_merge( $wprig_faq_items, $wprig_faq_items ),
		),
	)
);
?>
<main id="primary" class="site-main front-page">
  <?php get_template_part( 'template-parts/front-page/hero' ); ?>

  <?php get_template_part( 'template-parts/content/features' ); ?>

  <?php foreach ( $wprig_sections as $wprig_section_id => $wprig_section ) : ?>
  <section id="<?php echo esc_attr( $wprig_section_id ); ?>"
    class="fp-section fp-section--<?php echo esc_attr( $wprig_section_id ); ?>">
    <?php get_template_part( 'template-parts/front-page/section-header', null, $wprig_section['header'] ); ?>

    <div class="fp-section__viewport">
      <div class="fp-section__grid">
        <?php
					foreach ( $wprig_section['items'] as $wprig_item ) {
						get_template_part( 'template-parts/content/' . $wprig_section['card'], null, $wprig_item );
					}
					?>
      </div>
    </div>

    <?php
			get_template_part(
				'template-parts/front-page/pager',
				null,
				array_merge(
					array(
						'cta_label' => $wprig_section['header']['cta_label'] ?? '',
						'cta_url' => $wprig_section['header']['cta_url'] ?? '#',
					),
					$wprig_section['pager'] ?? array()
				)
			);
			?>
  </section>
  <?php endforeach; ?>

  <?php get_template_part( 'template-parts/front-page/cta' ); ?>
</main><!-- #primary -->
<?php
get_footer();