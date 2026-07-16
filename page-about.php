<?php
/**
 * Template Name: About Us
 *
 * Estatein About Us page (Figma 143:9031 desktop / 146:10636 mobile).
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

get_header();

bonn_growmodo()->print_styles( 'bonn-growmodo-front-page', 'bonn-growmodo-about-page' );

$wprig_team = apply_filters(
	'bonn_growmodo_about_team',
	array(
		array(
			'image' => 'team-max.webp',
			'name' => 'Max Mitchell',
			'role' => __( 'Founder', 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'image' => 'team-sarah.webp',
			'name' => 'Sarah Johnson',
			'role' => __( 'Chief Real Estate Officer', 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'image' => 'team-david.webp',
			'name' => 'David Brown',
			'role' => __( 'Head of Property Management', 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'image' => 'team-michael.webp',
			'name' => 'Michael Turner',
			'role' => __( 'Legal Counsel', 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'image' => 'team-sarah.webp',
			'name' => 'Sarah Johnson',
			'role' => __( 'Chief Real Estate Officer', 'bonn-growmodo' ),
			'url' => '#',
		),
	)
);

$wprig_clients = apply_filters(
	'bonn_growmodo_about_clients',
	array(
		array(
			'year' => '2019',
			'name' => 'ABC Corporation',
			'domain' => 'Commercial Real Estate',
			'category' => __( 'Luxury Home Development', 'bonn-growmodo' ),
			'quote' => __( "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs.", 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'year' => '2018',
			'name' => 'GreenTech Enterprises',
			'domain' => 'Commercial Real Estate',
			'category' => __( 'Retail Space', 'bonn-growmodo' ),
			'quote' => __( "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth.", 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'year' => '2022',
			'name' => 'Tenerife House',
			'domain' => 'Commercial Real Estate',
			'category' => __( 'Luxury Home Development', 'bonn-growmodo' ),
			'quote' => __( 'I highly recommend Estatein to anyone looking for a reliable partner. Projects are completed on time and with high quality.', 'bonn-growmodo' ),
			'url' => '#',
		),
		array(
			'year' => '2021',
			'name' => 'Global Tech',
			'domain' => 'globaltech.com',
			'category' => __( 'Information Technology', 'bonn-growmodo' ),
			'quote' => __( "Global Tech's expertise in IT solutions has been invaluable to our growth and success in the digital landscape.", 'bonn-growmodo' ),
			'url' => '#',
		),
	)
);

$wprig_clients = array_merge( $wprig_clients, $wprig_clients );
?>
<main id="primary" class="site-main about-page">
  <?php get_template_part( 'template-parts/about/journey' ); ?>
  <?php get_template_part( 'template-parts/about/values' ); ?>
  <?php get_template_part( 'template-parts/about/achievements' ); ?>
  <?php get_template_part( 'template-parts/about/steps' ); ?>

  <section id="team" class="fp-section fp-section--team">
    <?php
		get_template_part(
			'template-parts/front-page/section-header',
			null,
			array(
				'title' => __( 'Meet the Estatein Team', 'bonn-growmodo' ),
				'text' => __( 'At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.', 'bonn-growmodo' ),
				'cta_label' => __( 'View All Team Members', 'bonn-growmodo' ),
				'cta_url' => '#team',
			)
		);
		?>
    <div class="fp-section__viewport">
      <div class="fp-section__grid">
        <?php foreach ( $wprig_team as $wprig_member ) : ?>
        <?php get_template_part( 'template-parts/about/card-team', null, $wprig_member ); ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php
		get_template_part(
			'template-parts/front-page/pager',
			null,
			array(
				'cta_label' => __( 'View All Team Members', 'bonn-growmodo' ),
				'cta_url' => '#team',
				'total' => '02',
			)
		);
		?>
  </section>

  <section id="clients" class="fp-section fp-section--clients">
    <?php
		get_template_part(
			'template-parts/front-page/section-header',
			null,
			array(
				'title' => __( 'Our Valued Clients', 'bonn-growmodo' ),
				'text' => __( 'At Estatein, we have had the privilege of working with a diverse range of clients across various industries. Here are some of the clients we\'ve had the pleasure of serving', 'bonn-growmodo' ),
				'cta_label' => __( 'View All Clients Stories', 'bonn-growmodo' ),
				'cta_url' => '#clients',
			)
		);
		?>
    <div class="fp-section__viewport">
      <div class="fp-section__grid">
        <?php foreach ( $wprig_clients as $wprig_client ) : ?>
        <?php get_template_part( 'template-parts/about/card-client', null, $wprig_client ); ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php
		get_template_part(
			'template-parts/front-page/pager',
			null,
			array(
				'cta_label' => __( 'View All Clients Stories', 'bonn-growmodo' ),
				'cta_url' => '#clients',
				'total' => '10',
			)
		);
		?>
  </section>

  <?php get_template_part( 'template-parts/front-page/cta' ); ?>
</main><!-- #primary -->
<?php
get_footer();