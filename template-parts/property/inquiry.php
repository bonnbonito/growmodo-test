<?php
/**
 * Property single — inquiry form.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_title = get_the_title();
$wprig_heading = function_exists( 'get_field' ) ? (string) get_field( 'inquiry_title' ) : '';
$wprig_text = function_exists( 'get_field' ) ? (string) get_field( 'inquiry_text' ) : '';

if ( '' === $wprig_heading ) {
	$wprig_heading = sprintf(
		/* translators: %s: property title */
		__( 'Inquire About %s', 'bonn-growmodo' ),
		$wprig_title
	);
}

if ( '' === $wprig_text ) {
	$wprig_text = __( 'Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.', 'bonn-growmodo' );
}

$wprig_properties = get_posts(
	array(
		'post_type' => 'property',
		'posts_per_page' => 50,
		'post_status' => 'publish',
		'orderby' => 'title',
		'order' => 'ASC',
	)
);
?>
<section class="property-inquiry" id="inquire">
  <header class="property-inquiry__header">
    <?php get_template_part( 'template-parts/content/entry_sparks' ); ?>
    <h2 class="property-inquiry__title"><?php echo esc_html( $wprig_heading ); ?></h2>
    <div class="property-inquiry__text"><?php echo wp_kses_post( wpautop( $wprig_text ) ); ?></div>
  </header>

  <form class="property-inquiry__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <input type="hidden" name="action" value="bonn_growmodo_property_inquiry">
    <?php wp_nonce_field( 'bonn_growmodo_property_inquiry', 'bonn_growmodo_property_inquiry_nonce' ); ?>
    <input type="hidden" name="property_id" value="<?php the_ID(); ?>">

    <div class="property-inquiry__row">
      <label class="property-inquiry__field">
        <span><?php esc_html_e( 'First Name', 'bonn-growmodo' ); ?></span>
        <input type="text" name="first_name" placeholder="<?php esc_attr_e( 'Enter First Name', 'bonn-growmodo' ); ?>"
          required>
      </label>
      <label class="property-inquiry__field">
        <span><?php esc_html_e( 'Last Name', 'bonn-growmodo' ); ?></span>
        <input type="text" name="last_name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'bonn-growmodo' ); ?>" required>
      </label>
    </div>

    <div class="property-inquiry__row">
      <label class="property-inquiry__field">
        <span><?php esc_html_e( 'Email', 'bonn-growmodo' ); ?></span>
        <input type="email" name="email" placeholder="<?php esc_attr_e( 'Enter Email', 'bonn-growmodo' ); ?>" required>
      </label>
      <label class="property-inquiry__field">
        <span><?php esc_html_e( 'Phone', 'bonn-growmodo' ); ?></span>
        <input type="tel" name="phone" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'bonn-growmodo' ); ?>">
      </label>
    </div>

    <label class="property-inquiry__field">
      <span><?php esc_html_e( 'Selected Property', 'bonn-growmodo' ); ?></span>
      <select name="selected_property" required>
        <option value=""><?php esc_html_e( 'Select one...', 'bonn-growmodo' ); ?></option>
        <?php foreach ( $wprig_properties as $wprig_prop ) : ?>
        <option value="<?php echo esc_attr( (string) $wprig_prop->ID ); ?>"
          <?php selected( get_the_ID(), $wprig_prop->ID ); ?>>
          <?php echo esc_html( get_the_title( $wprig_prop ) ); ?>
        </option>
        <?php endforeach; ?>
      </select>
    </label>

    <label class="property-inquiry__field">
      <span><?php esc_html_e( 'Message', 'bonn-growmodo' ); ?></span>
      <textarea name="message" rows="5"
        placeholder="<?php esc_attr_e( 'Enter your message here...', 'bonn-growmodo' ); ?>"></textarea>
    </label>

    <label class="property-inquiry__terms">
      <input type="checkbox" name="terms" value="1" required>
      <span><?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'bonn-growmodo' ); ?></span>
    </label>

    <button type="submit"
      class="btn btn--primary property-inquiry__submit"><?php esc_html_e( 'Send Your Message', 'bonn-growmodo' ); ?></button>
  </form>
</section><!-- .property-inquiry -->