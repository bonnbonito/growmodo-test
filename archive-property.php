<?php
/**
 * Property archive template (Estatein properties listing — Figma 149:12282).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

get_header();

bonn_growmodo()->print_styles( 'bonn-growmodo-front-page', 'bonn-growmodo-property-single', 'bonn-growmodo-property-archive' );
?>
<main id="primary" class="site-main property-archive">
  <?php get_template_part( 'template-parts/property/archive/hero' ); ?>
  <?php get_template_part( 'template-parts/property/archive/intro' ); ?>
  <?php get_template_part( 'template-parts/property/archive/search' ); ?>

  <section class="property-archive__list" aria-label="<?php esc_attr_e( 'Property listings', 'bonn-growmodo' ); ?>">
    <?php if ( have_posts() ) :


			?>
    <div class="property-archive__grid">
      <?php
				while ( have_posts() ) {
					the_post();
					$id = get_the_ID();
					$featured_image = get_the_post_thumbnail_url( $id, 'full' );
					$title = get_the_title( $id );
					$excerpt = esc_html( get_field( 'description', $id ) );
					$price = get_field( 'price', $id );

					$wprig_property_items = array(
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

					get_template_part(
						'template-parts/content/card-property',
						null,
						$wprig_property_items
					);
				}
				?>
    </div>

    <?php
			$wprig_pagination = paginate_links(
				array(
					'type' => 'array',
					'prev_text' => '<img src="' . esc_url( get_theme_file_uri( 'assets/images/estatein/icon-arrow-left.svg' ) ) . '" alt="" width="24" height="24">',
					'next_text' => '<img src="' . esc_url( get_theme_file_uri( 'assets/images/estatein/icon-arrow-right.svg' ) ) . '" alt="" width="24" height="24">',
				)
			);

			if ( $wprig_pagination ) :
				?>
    <nav class="property-archive__pagination" aria-label="<?php esc_attr_e( 'Properties pagination', 'bonn-growmodo' ); ?>">
      <ul>
        <?php foreach ( $wprig_pagination as $wprig_link ) : ?>
        <li><?php echo wp_kses_post( $wprig_link ); ?></li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php else : ?>
    <p class="property-archive__empty">
      <?php esc_html_e( 'No properties match your search. Try a different keyword.', 'bonn-growmodo' ); ?>
    </p>
    <?php endif; ?>
  </section>

  <?php get_template_part( 'template-parts/property/archive/inquiry' ); ?>
  <?php get_template_part( 'template-parts/front-page/cta' ); ?>
</main>
<?php
get_footer();