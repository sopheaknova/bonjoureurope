<?php
// Prevent loading this file directly - Busted!
if( ! class_exists('WP') ) 
{
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

if ( ! class_exists( 'RWMB_Slider_Slides_Field' ) ) 
{
	class RWMB_Slider_Slides_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_style( 'rwmb-slider-slide', RWMB_CSS_URL . 'slider-slides.css', array(), RWMB_VER );

			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'rwmb-slider-slide', RWMB_JS_URL . 'slider-slides.js', array( 'jquery' ), RWMB_VER, true );
		}

		/**
		 * Show begin HTML markup for fields
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function begin_html( $html, $meta, $field )
		{
			$html = '';

			return $html;
		}

		/**
		 * Show end HTML markup for fields
		 *
		 * @param string $html
		 * @param mixed $meta
		 * @param array $field
		 *
		 * @return string
		 */
		static function end_html( $html, $meta, $field )
		{
			$html = '';

			return $html;
		}

		/**
		* Get field HTML
		*
		* @param $html
		* @param $field
		* @param $meta
		*
		* @return string
		*/
		static function html( $html, $meta, $field ) 
		{

			global $post;

			$id = $field['id'];

			$slider_slides = get_post_meta( $post->ID, $id, true ) ? get_post_meta( $post->ID, $id, true ) : false;

			$html = '<ul id="slider-slides">';

				if( $slider_slides ) {

					foreach ( $slider_slides as $i => $slide ) {

						$slide_img_src            = isset( $slide['slide-img-src'] )            ? $slide['slide-img-src']            : null;
						$slide_button_type        = isset( $slide['slide-button-type'] )        ? $slide['slide-button-type']        : null;
						$slide_button_dropcap     = isset( $slide['slide-button-dropcap'] )     ? $slide['slide-button-dropcap']     : null;
						$slide_button_title       = isset( $slide['slide-button-title'] )       ? $slide['slide-button-title']       : null;
						$slide_button_description = isset( $slide['slide-button-description'] ) ? $slide['slide-button-description'] : null;
						$slide_button_img_src     = isset( $slide['slide-button-img-src'] )     ? $slide['slide-button-img-src']     : null;
						$slide_content            = isset( $slide['slide-content'] )            ? $slide['slide-content']            : null;
						$slide_link_lightbox      = isset( $slide['slide-link-lightbox'] )      ? $slide['slide-link-lightbox']      : null;
						$slide_link_url           = isset( $slide['slide-link-url'] )           ? $slide['slide-link-url']           : null;

						$html .= '<li class="slide postbox">

									<div class="handlediv" title="' . __('Click to toggle', 'sptheme') . '">&nbsp;</div>

									<h3 class="hndle"><span>' . __('Slide', 'sptheme') . '</span></h3>

									<div class="inside">

										<div class="slider-slide-tabs">

											<ul>
												<li><a href="#slide-image">' . __('Image', 'sptheme') . '</a></li>
												<li><a href="#slide-button">' . __('Button', 'sptheme') . '</a></li>
												<li><a href="#slide-content">' . __('Content', 'sptheme') . '</a></li>
												<li><a href="#slide-link">' . __('Link', 'sptheme') . '</a></li>
											</ul>

											<div id="slide-image" class="tabs-content">

												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Image URL', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<input type="text" name="slide-img-src[]" class="rwmb-text" size="30" value="' . $slide_img_src . '">
														<input type="button" name="upload-image" class="upload-image" value="' . __('Upload Image', 'sptheme') . '">
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->											

											</div><!-- end #slide-image -->

											<div id="slide-button" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Button Type', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<select name="slide-button-type[]" class="rwmb-select">
															<option value="" ' . selected( $slide_button_type, "", false ) . '>' . __('Text', 'sptheme') . '</option>
															<option value="image" ' . selected( $slide_button_type, "image", false ) . '>' . __('Image', 'sptheme') . '</option>
														</select>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

												<div class="button-type text">
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Dropcap', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-dropcap[]" class="rwmb-text" size="30" value="' . $slide_button_dropcap . '">
															<p class="description">' . __('(optional)', 'sptheme') . '</p>
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Title', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-title[]" class="rwmb-text" size="30" value="' . $slide_button_title . '">
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Description', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-description[]" class="rwmb-text" size="30" value="' . $slide_button_description . '">
															<p class="description">' . __('(optional)', 'sptheme') . '</p>
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
												</div><!-- end .button-type.text -->

												<div class="button-type image">
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Image URL', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-img-src[]" class="rwmb-text" size="30" value="' . $slide_button_img_src . '">
															<input type="button" name="upload-image" class="upload-image" value="' . __('Upload Image', 'sptheme') . '">
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
												</div><!-- end .button-type.image -->

											</div><!-- end #slide-button -->

											<div id="slide-content" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Slide Content', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<textarea name="slide-content[]" class="rwmb-textarea large-text" cols="60" rows="5">' . $slide_content . '</textarea>
														<p class="description">' . __('(optional) HTML tags and WordPress shortcodes are allowed.', 'sptheme') . '</p>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

											</div><!-- end #slide-content -->

											<div id="slide-link" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Lightbox', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<select name="slide-link-lightbox[]" class="rwmb-select">
															<option value="" ' . selected( $slide_link_lightbox, "", false ) . '>' . __('Disabled', 'sptheme') . '</option>
															<option value="single-image" ' . selected( $slide_link_lightbox, "image", false ) . '>' . __('Image', 'sptheme') . '</option>
															<option value="iframe" ' . selected( $slide_link_lightbox, "iframe", false ) . '>' . __('Iframe', 'sptheme') . '</option>
														</select>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('URL', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<input type="text" name="slide-link-url[]" class="rwmb-text" size="30" value="' . $slide_link_url . '">
														<input type="button" name="upload-image" class="upload-image slide-link-lightbox" value="' . __('Upload Image', 'sptheme') . '">
														<p class="description">' . __('(optional) Any valid URL is allowed, doesn\'t have to be an image', 'sptheme') . '.</p>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

											</div><!-- end #slide-link -->

										</div><!-- end .slider-slide-tabs -->

										<button class="remove-slide button-secondary">' . __('Remove Slide', 'sptheme') . '</button>
										
										<input type="hidden" name="' . $id . '[]" class="rwmb-text" size="30" value="">
								
									</div><!-- end .inside -->
									
								</li>';

					}

				} else {


						$html .= '<li class="slide postbox">

									<div class="handlediv" title="' . __('Click to toggle', 'sptheme') . '">&nbsp;</div>

									<h3 class="hndle"><span>' . __('Slide', 'sptheme') . '</span></h3>

									<div class="inside">

										<div class="slider-slide-tabs">

											<ul>
												<li><a href="#slide-image">' . __('Image', 'sptheme') . '</a></li>
												<li><a href="#slide-button">' . __('Button', 'sptheme') . '</a></li>
												<li><a href="#slide-content">' . __('Content', 'sptheme') . '</a></li>
												<li><a href="#slide-link">' . __('Link', 'sptheme') . '</a></li>
											</ul>

											<div id="slide-image" class="tabs-content">

												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Image URL', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<input type="text" name="slide-img-src[]" class="rwmb-text" size="30" value="">
														<input type="button" name="upload-image" class="upload-image" value="' . __('Upload Image', 'sptheme') . '">
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->											

											</div><!-- end #slide-image -->

											<div id="slide-button" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Button Type', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<select name="slide-button-type[]" class="rwmb-select">
															<option value="" selected>' . __('Text', 'sptheme') . '</option>
															<option value="image">' . __('Image', 'sptheme') . '</option>
														</select>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

												<div class="button-type text">
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Dropcap', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-dropcap[]" class="rwmb-text" size="30" value="">
															<p class="description">' . __('(optional)', 'sptheme') . '</p>
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Title', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-title[]" class="rwmb-text" size="30" value="">
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Description', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-description[]" class="rwmb-text" size="30" value="">
															<p class="description">' . __('(optional)', 'sptheme') . '</p>
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
												</div><!-- end .button-type.text -->

												<div class="button-type image">
													
													<div class="rwmb-field">

														<div class="rwmb-label">
															<label>' . __('Image URL', 'sptheme') . '</label>
														</div><!-- end .rwmb-label -->

														<div class="rwmb-input">
															<input type="text" name="slide-button-img-src[]" class="rwmb-text" size="30" value="">
															<input type="button" name="upload-image" class="upload-image" value="' . __('Upload Image', 'sptheme') . '">
														</div><!-- end .rwmb-input -->

													</div><!-- end .rwmb-field -->
													
												</div><!-- end .button-type.image -->

											</div><!-- end #slide-button -->

											<div id="slide-content" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Slide Content', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<textarea name="slide-content[]" class="rwmb-textarea large-text" cols="60" rows="5"></textarea>
														<p class="description">' . __('(optional) HTML tags and WordPress shortcodes are allowed.', 'sptheme') . '</p>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

											</div><!-- end #slide-content -->

											<div id="slide-link" class="tabs-content">
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('Lightbox', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<select name="slide-link-lightbox[]" class="rwmb-select">
															<option value=""  selected>' . __('Disabled', 'sptheme') . '</option>
															<option value="single-image">' . __('Image', 'sptheme') . '</option>
															<option value="iframe">' . __('Iframe', 'sptheme') . '</option>
														</select>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->
												
												<div class="rwmb-field">

													<div class="rwmb-label">
														<label>' . __('URL', 'sptheme') . '</label>
													</div><!-- end .rwmb-label -->

													<div class="rwmb-input">
														<input type="text" name="slide-link-url[]" class="rwmb-text" size="30" value="">
														<input type="button" name="upload-image" class="upload-image slide-link-lightbox" value="' . __('Upload Image', 'sptheme') . '">
														<p class="description">' . __('(optional) Any valid URL is allowed, doesn\'t have to be an image', 'sptheme') . '.</p>
													</div><!-- end .rwmb-input -->

												</div><!-- end .rwmb-field -->

											</div><!-- end #slide-link -->

										</div><!-- end .slider-slide-tabs -->

										<button class="remove-slide button-secondary">' . __('Remove Slide', 'sptheme') . '</button>
										
										<input type="hidden" name="' . $id . '[]" class="rwmb-text" size="30" value="">
								
									</div><!-- end .inside -->
									
								</li>';

				}

				$html .= '</ul><!-- end #slider-slides -->

						  <p> <button id="add-slider-slide" class="button-primary">' . __('Add New Slide', 'sptheme') . '</button> </p>

						  <input type="hidden" name="slider-meta-info" value="' . $post->ID . '|' . $id . '">';

			return $html;
		}

		/**
		 * Save slides
		 *
		 * @param mixed $new
		 * @param mixed $old
		 * @param int $post_id
		 * @param array $field
		 *
		 * @return void
		 */
		static function save( $new, $old, $post_id, $field )
		{
				
			$name = $field['id'];

			$slider_slides = array();
			
			foreach( $_POST[$name] as $k => $v ) {

				$slider_slides[] = array(
					'slide-img-src'            => $_POST['slide-img-src'][$k],
					'slide-button-type'        => $_POST['slide-button-type'][$k],
					'slide-button-dropcap'     => $_POST['slide-button-dropcap'][$k],
					'slide-button-title'       => $_POST['slide-button-title'][$k],
					'slide-button-description' => $_POST['slide-button-description'][$k],
					'slide-button-img-src'     => $_POST['slide-button-img-src'][$k],
					'slide-content'            => $_POST['slide-content'][$k],
					'slide-link-lightbox'      => $_POST['slide-link-lightbox'][$k],
					'slide-link-url'           => $_POST['slide-link-url'][$k]
				);

			}

			$new = $slider_slides;

			update_post_meta( $post_id, $name, $new );

		}
	}
}