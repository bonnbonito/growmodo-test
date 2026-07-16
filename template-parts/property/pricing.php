<?php
/**
 * Property single — comprehensive pricing breakdown.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_price = function_exists( 'get_field' ) ? (string) get_field( 'price' ) : '';
$wprig_intro = function_exists( 'get_field' ) ? (string) get_field( 'pricing_intro' ) : '';
$wprig_note = function_exists( 'get_field' ) ? (string) get_field( 'pricing_note' ) : '';
$wprig_sections = function_exists( 'get_field' ) ? get_field( 'pricing_sections' ) : array();

if ( '' === $wprig_intro && empty( $wprig_sections ) && '' === $wprig_price ) {
	return;
}
?>
<section class="property-pricing">
  <header class="property-pricing__header">
    <?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
    <h2 class="property-pricing__title"><?php esc_html_e( 'Comprehensive Pricing Details', 'bonn-growmodo' ); ?></h2>
    <?php if ( $wprig_intro ) : ?>
    <div class="property-pricing__intro"><?php echo wp_kses_post( $wprig_intro ); ?></div>
    <?php endif; ?>
  </header>

  <?php if ( $wprig_note ) : ?>
  <aside class="property-pricing__note">
    <strong><?php esc_html_e( 'Note', 'bonn-growmodo' ); ?></strong>
    <p><?php echo esc_html( $wprig_note ); ?></p>
  </aside>
  <?php endif; ?>

  <div class="property-pricing__body">
    <?php if ( $wprig_price ) : ?>
    <div class="property-pricing__listing">
      <span><?php esc_html_e( 'Listing Price', 'bonn-growmodo' ); ?></span>
      <strong><?php echo esc_html( $wprig_price ); ?></strong>
    </div>
    <?php endif; ?>

    <?php if ( ! empty( $wprig_sections ) && is_array( $wprig_sections ) ) : ?>
    <div class="property-pricing__sections">
      <?php foreach ( $wprig_sections as $wprig_section ) : ?>
      <section class="property-pricing__section">
        <header class="property-pricing__section-header">
          <h3 class="property-pricing__section-title"><?php echo esc_html( $wprig_section['title'] ?? '' ); ?></h3>
          <?php if ( ! empty( $wprig_section['link_label'] ) ) : ?>
          <a class="btn btn--dark property-pricing__learn"
            href="<?php echo esc_url( $wprig_section['link_url'] ?? '#' ); ?>"><?php echo esc_html( $wprig_section['link_label'] ); ?></a>
          <?php endif; ?>
        </header>

        <?php if ( ! empty( $wprig_section['items'] ) && is_array( $wprig_section['items'] ) ) : ?>
        <ul class="property-pricing__items">
          <?php foreach ( $wprig_section['items'] as $wprig_item ) : ?>
          <li class="property-pricing__item">
            <div class="property-pricing__item-main">
              <span class="property-pricing__item-label"><?php echo esc_html( $wprig_item['label'] ?? '' ); ?></span>
              <strong
                class="property-pricing__item-amount"><?php echo esc_html( $wprig_item['amount'] ?? '' ); ?></strong>
            </div>
            <?php if ( ! empty( $wprig_item['description'] ) ) : ?>
            <p class="property-pricing__item-desc"><?php echo esc_html( $wprig_item['description'] ); ?></p>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </section>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section><!-- .property-pricing -->