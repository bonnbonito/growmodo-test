<?php
/**
 * About Us — valued client card.
 *
 * @package bonn_growmodo
 *
 * @var array $args {
 *     @type string $year     Year since.
 *     @type string $name     Client name.
 *     @type string $domain   Domain / industry label.
 *     @type string $category Category label.
 *     @type string $quote    Testimonial quote.
 *     @type string $url      Website URL.
 * }
 */

namespace Bonn\GrowModo;

$args = wp_parse_args(
	$args ?? array(),
	array(
		'year' => '',
		'name' => '',
		'domain' => '',
		'category' => '',
		'quote' => '',
		'url' => '#',
	)
);

$wprig_img_uri = get_theme_file_uri( 'assets/images' );
$wprig_icon_uri = get_theme_file_uri( 'assets/icons' );
?>
<article class="client-card">
  <div class="client-card__top">
    <div class="client-card__identity">
      <p class="client-card__year">
        <?php echo esc_html( sprintf( /* translators: %s: year */ __( 'Since %s', 'bonn-growmodo' ), $args['year'] ) ); ?>
      </p>
      <h3 class="client-card__name"><?php echo esc_html( $args['name'] ); ?></h3>
    </div>
    <a class="btn btn--dark client-card__link"
      href="<?php echo esc_url( $args['url'] ); ?>"><?php esc_html_e( 'Visit Website', 'bonn-growmodo' ); ?></a>
  </div>

  <div class="client-card__meta">
    <div class="client-card__meta-item">
      <p class="client-card__meta-label">
        <img src="<?php echo esc_url( $wprig_icon_uri . '/icon-domain.svg' ); ?>" alt="" width="20" height="20">
        <?php esc_html_e( 'Domain', 'bonn-growmodo' ); ?>
      </p>
      <p class="client-card__meta-value"><?php echo esc_html( $args['domain'] ); ?></p>
    </div>
    <div class="client-card__meta-item">
      <p class="client-card__meta-label">
        <img src="<?php echo esc_url( $wprig_icon_uri . '/icon-category.svg' ); ?>" alt="" width="20" height="20">
        <?php esc_html_e( 'Category', 'bonn-growmodo' ); ?>
      </p>
      <p class="client-card__meta-value"><?php echo esc_html( $args['category'] ); ?></p>
    </div>
  </div>

  <div class="client-card__quote">
    <p class="client-card__quote-label"><?php esc_html_e( 'What They Said 🤗', 'bonn-growmodo' ); ?></p>
    <p class="client-card__quote-text"><?php echo esc_html( $args['quote'] ); ?></p>
  </div>
</article><!-- .client-card -->