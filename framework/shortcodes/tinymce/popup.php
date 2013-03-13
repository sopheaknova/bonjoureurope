<?php
$absolute_path = __FILE__;
$path_to_file = explode('wp-content', $absolute_path);
$path_to_wp = $path_to_file[0];

//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<style>
		#main-shortcodes { width: 95%; }
		#aw-shortcodes label { font-weight: bold; }
		#aw-shortcodes label em { font-weight: normal; }
		#aw-shortcodes th { padding: 18px 10px; }
		#aw-shortcodes .red { color: red; }
	</style>
</head>
<body>

<div id="main-shortcodes">

	<table id="aw-shortcodes" class="form-table">

		<tbody>

			<!-- start dropdown -->
			<tr>

				<th class="label">

					<label for="shortcode-dropdown"><?php _e('All shortcodes', 'sptheme'); ?></label>

				</th>

				<td class="field">
			
					<select name="shortcode-dropdown" id="shortcode-dropdown" class="widefat">
						<option value=""><?php _e('Pick a Shortcode', 'sptheme'); ?></option>
						<optgroup label="- <?php _e('General', 'sptheme'); ?> - ">
							<option value="divider"><?php _e('Divider', 'sptheme'); ?></option>
							<option value="slogan"><?php _e('Slogan', 'sptheme'); ?></option>
							<option value="button-code"><?php _e('Button', 'sptheme'); ?></option>
							<option value="dropcap"><?php _e('Dropcap', 'sptheme'); ?></option>
							<option value="info-box"><?php _e('Info Box', 'sptheme'); ?></option>
							<option value="list"><?php _e('List', 'sptheme'); ?></option>
							<option value="quote"><?php _e('Quote', 'sptheme'); ?></option>
							<option value="content-tabs"><?php _e('Content Tabs', 'sptheme'); ?></option>
                            <option value="accordion-content"><?php _e('Accordion Content', 'sptheme'); ?></option>
                            <option value="toggle-content"><?php _e('Toggle Content', 'sptheme'); ?></option>
                            <!--<option value="lightbox"><?php _e('Lightbox', 'sptheme'); ?></option>
							<option value="pricing-tables"><?php _e('Pricing Tables', 'sptheme'); ?></option>
							<option value="video-player"><?php _e('Video Player', 'sptheme'); ?></option>
							<option value="audio-player"><?php _e('Audio Player', 'sptheme'); ?></option>-->
                            <option value="video-youtube"><?php _e('Video Youtube', 'sptheme'); ?></option>
						</optgroup>
						<optgroup label="- <?php _e('Alert Boxes', 'sptheme'); ?> -">
							<option value="alert-error"><?php _e('Error', 'sptheme'); ?></option>
							<option value="alert-success"><?php _e('Success', 'sptheme'); ?></option>
							<option value="alert-info"><?php _e('Info', 'sptheme'); ?></option>
							<option value="alert-notice"><?php _e('Notice', 'sptheme'); ?></option>
						</optgroup>
						<optgroup label="- <?php _e('Layout', 'sptheme'); ?> -">
							<option value="one-half"><?php _e('1/2', 'sptheme'); ?></option>
							<option value="one-half-last"><?php _e('1/2 Last', 'sptheme'); ?></option>
							<option value="one-third"><?php _e('1/3', 'sptheme'); ?></option>
							<option value="one-third-last"><?php _e('1/3 Last', 'sptheme'); ?></option>
							<option value="one-fourth"><?php _e('1/4', 'sptheme'); ?></option>
							<option value="one-fourth-last"><?php _e('1/4 Last', 'sptheme'); ?></option>
							<option value="two-third"><?php _e('2/3', 'sptheme'); ?></option>
							<option value="two-third-last"><?php _e('2/3 Last', 'sptheme'); ?></option>
							<option value="three-fourth"><?php _e('3/4', 'sptheme'); ?></option>
							<option value="three-fourth-last"><?php _e('3/4 Last', 'sptheme'); ?></option>
						</optgroup>
						<optgroup label="- <?php _e('Template Tags', 'sptheme'); ?> -">
                        	<!--<option value="post-carousel"><?php _e('Post Carousel', 'sptheme'); ?></option>
							<option value="projects-carousel"><?php _e('Projects Carousel', 'sptheme'); ?></option>
							<option value="slider"><?php _e('Slider', 'sptheme'); ?></option>
							<option value="team-member"><?php _e('Team Member', 'sptheme'); ?></option>-->
                            <option value="portfolio"><?php _e('Portfolio', 'sptheme'); ?></option>
                            <option value="postlist"><?php _e('Post list', 'sptheme'); ?></option>
                            <option value="pagelist"><?php _e('Page list', 'sptheme'); ?></option>
						</optgroup>
						<optgroup label="- <?php _e('Misc', 'sptheme'); ?> -">
							<!--<option value="fullwidth-map"><?php _e('Fullwidth Map', 'sptheme'); ?></option>-->
							<option value="raw"><?php _e('Raw (disable editor formatting)', 'sptheme'); ?></option>
						</optgroup>
					</select>

				</td>

			</tr>
			<!-- end dropdown -->

			<!-- start divider -->
			<tr class="option divider">

				<th class="label">

					<label for="divider-style"><?php _e('Dotted line', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="checkbox" name="divider-style" id="divider-style" value="on">

				</td>

			</tr>
			<!-- end divider -->

			<!-- start slogan -->
			<tr class="option slogan">

				<th class="label">

					<label for="slogan-text"><?php _e('Text', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="slogan-text" id="slogan-text" value="" class="widefat">

				</td>

			</tr>

			<tr class="option slogan">
				<th class="label">

					<label for="slogan-align"><?php _e('Align', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="slogan-align" id="slogan-align" class="widefat">
						<option value="" selected><?php _e('Normal', 'sptheme'); ?></option>
						<option value="left"><?php _e('Left', 'sptheme'); ?></option>
						<option value="center"><?php _e('Center', 'sptheme'); ?></option>
						<option value="right"><?php _e('Right', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>
			<!-- end slogan -->

			<!-- start button-code -->
			<tr class="option button-code">

				<th class="label">

					<label for="button-code-content"><?php _e('Text', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="button-code-content" id="button-code-content" value="" class="widefat">

				</td>

			</tr>

			<tr class="option button-code">

				<th class="label">

					<label for="button-code-url"><?php _e('URL', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="button-code-url" id="button-code-url" value="" class="widefat">

				</td>

			</tr>

			<tr class="option button-code">

				<th class="label">

					<label for="button-code-size"><?php _e('Size', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="button-code-size" id="button-code-size" class="widefat">
						<option value="" selected><?php _e('Normal', 'sptheme'); ?></option>
						<option value="medium"><?php _e('Medium', 'sptheme'); ?></option>
						<option value="Large"><?php _e('Large', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>

			<tr class="option button-code">

				<th class="label">

					<label for="button-code-style"><?php _e('Remove background', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="checkbox" name="button-code-style" id="button-code-style" value="no-bg">

				</td>

			</tr>

			<tr class="option button-code">

				<th class="label">

					<label for="button-code-arrow"><?php _e('Arrow', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="button-code-arrow" id="button-code-arrow" class="widefat">
						<option value="" selected><?php _e('No', 'sptheme'); ?></option>
						<option value="right"><?php _e('Right', 'sptheme'); ?></option>
						<option value="left"><?php _e('Left', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>
			<!-- end button-code -->

			<!-- start dropcap -->
			<tr class="option dropcap">

				<th class="label">

					<label for="dropcap-content"><?php _e('Text', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
					
					<input type="text" name="dropcap-content" id="dropcap-content" value="" class="widefat">

				</td>

			</tr>

			<tr class="option dropcap">

				<th class="label">

					<label for="dropcap-style"><?php _e('Background', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="dropcap-style" id="dropcap-style" class="widefat">
						<option value="" selected><?php _e('Light', 'sptheme'); ?></option>
						<option value="dark"><?php _e('Dark', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>
			<!-- end dropcap -->

			<!-- start info-box -->
			<tr class="option info-box">

				<th class="label">

					<label for="info-box-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="info-box-content" id="info-box-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end info-box -->

			<!-- start quote -->
			<tr class="option quote">

				<th class="label">

					<label for="quote-author"><?php _e('Author', 'sptheme'); ?></label>

				</th>

				<td class="field">
					
					<input type="text" name="quote-author" id="quote-author" value="" class="widefat">

				</td>

			</tr>

			<tr class="option quote">

				<th class="label">

					<label for="quote-type"><?php _e('Type', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="quote-type" id="quote-type" class="widefat">
						<option value="" selected><?php _e('Default', 'sptheme'); ?></option>
						<option value="simple"><?php _e('Simple', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>

			<tr class="option quote">

				<th class="label">

					<label for="quote-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="quote-content" id="quote-content" cols="30" rows="5" class="widefat"></textarea>

			</td>

			</tr>
			<!-- end quote -->

			<!-- start list -->
			<tr class="option list">

				<th class="label">

					<label for="list-style"><?php _e('Icon', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="list-icon" id="list-icon" class="widefat">
						<option value="none"><?php _e('None', 'sptheme'); ?></option>
						<option value="arrow" selected><?php _e('Arrow', 'sptheme'); ?></option>
						<option value="arrow-2"><?php _e('Arrow 2', 'sptheme'); ?></option>
						<option value="check"><?php _e('Check', 'sptheme'); ?></option>
						<option value="check-2"><?php _e('Check 2', 'sptheme'); ?></option>
						<option value="circle"><?php _e('Circle', 'sptheme'); ?></option>
						<option value="plus"><?php _e('Plus', 'sptheme'); ?></option>
						<option value="dash"><?php _e('Dash', 'sptheme'); ?></option>
						<option value="star"><?php _e('Star', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>

			<tr class="option list">

				<th class="label">

					<label for="list-style"><?php _e('Dotted Bottom Border', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="checkbox" name="list-style" id="list-style" value="dotted">

				</td>

			</tr>

			<tr class="option list">

				<th class="label">

					<label for="list-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="list-content" id="list-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end list -->

			<!-- start lightbox -->
			<tr class="option lightbox">

				<th class="label">

					<label for="lightbox-type"><?php _e('Type', 'sptheme'); ?></label>

				</th>

				<td class="field">

					<select name="lightbox-type" id="lightbox-type" class="widefat">
						<option value="single-image" selected><?php _e('Single image', 'sptheme'); ?></option>
						<option value="image-gallery"><?php _e('Image gallery', 'sptheme'); ?></option>
						<option value="iframe"><?php _e('Iframe', 'sptheme'); ?></option>
					</select>

				</td>

			</tr>

			<tr class="option lightbox">

				<th class="label">

					<label for="lightbox-full"><?php _e('Full (URL)', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
					
					<input type="text" name="lightbox-full" id="lightbox-full" value="" class="widefat">

				</td>

			</tr>

			<tr class="option lightbox">

				<th class="label">

					<label for="lightbox-title"><?php _e('Title', 'sptheme'); ?></label>

				</th>

				<td class="field">
					
					<input type="text" name="lightbox-title" id="lightbox-title" value="" class="widefat">

				</td>

			</tr>

			<tr class="option lightbox">

				<th class="label">

					<label for="lightbox-group"><?php _e('Group name (lowercase)', 'sptheme'); ?><br /><em><?php _e('(Only for image gallery)', 'sptheme'); ?></em></label>

				</th>

				<td class="field">
					
					<input type="text" name="lightbox-group" id="lightbox-group" value="" class="widefat">

				</td>

			</tr>

			<tr class="option lightbox">

				<th class="label">

					<label for="lightbox-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="lightbox-content" id="lightbox-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end lightbox -->

			<!-- start accordion-content -->
			<tr class="option accordion-content">

				<th class="label">

					<label for="accordion-content-title"><?php _e('Title', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="accordion-content-title" id="accordion-content-title" value="" class="widefat">

				</td>

			</tr>

			<tr class="option accordion-content">

				<th class="label">

					<label for="accordion-content-title-size"><?php _e('Title size', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="accordion-content-title-size" id="accordion-content-title-size" class="widefat">
						<option value="" selected><?php _e('Normal', 'sptheme'); ?></option>
						<option value="h6"><?php _e('Heading 6', 'sptheme'); ?></option>
						<option value="h5"><?php _e('Heading 5', 'sptheme'); ?></option>
						<option value="h4"><?php _e('Heading 4', 'sptheme'); ?></option>
						<option value="h3"><?php _e('Heading 3', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>

			<tr class="option accordion-content">

				<th class="label">

					<label for="accordion-content-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="accordion-content-content" id="accordion-content-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end accordion-content -->
            
            <!-- start toggle-content -->
			<tr class="option toggle-content">

				<th class="label">

					<label for="toggle-content-title"><?php _e('Title', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="toggle-content-title" id="toggle-content-title" value="" class="widefat">

				</td>

			</tr>
            <!-- end toggle-content -->

			<!-- start content-tabs -->
			<tr class="option content-tabs">

				<th class="label">

					<label for="content-tabs-single"><?php _e('Single tab', 'sptheme'); ?><br /><em><?php _e('(Remove wrapping shortcode)', 'sptheme'); ?></em></label>

				</th>

				<td class="field">
				
					<input type="checkbox" name="content-tabs-single" id="content-tabs-single" value="on">

				</td>

			</tr>

			<tr class="option content-tabs">

				<th class="label">

					<label for="content-tabs-title"><?php _e('Title', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="content-tabs-title" id="content-tabs-title" value="" class="widefat">

				</td>

			</tr>

			<tr class="option content-tabs">

				<th class="label">

					<label for="content-tabs-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="content-tabs-content" id="content-tabs-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end content-tabs -->

			<!-- start pricing-tables -->
			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-count"><?php _e('Table column count', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="pricing-tables-column-count" id="pricing-tables-column-count" class="widefat">
						<option value="1"><?php _e('1', 'sptheme'); ?></option>
						<option value="2"><?php _e('2', 'sptheme'); ?></option>
						<option value="3"><?php _e('3', 'sptheme'); ?></option>
						<option value="4" selected><?php _e('4', 'sptheme'); ?></option>
						<option value="5"><?php _e('5', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-type"><?php _e('Table type', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="pricing-tables-type" id="pricing-tables-type" class="widefat">
						<option value="simple" selected><?php _e('Simple', 'sptheme'); ?></option>
						<option value="extended"><?php _e('Extended', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-single"><?php _e('Single column', 'sptheme'); ?><br /><em><?php _e('(Remove wrapping shortcode)', 'sptheme'); ?></em></label>

				</th>

				<td class="field">
				
					<input type="checkbox" name="pricing-tables-column-single" id="pricing-tables-column-single" value="on">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-type"><?php _e('Column type', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="pricing-tables-column-type" id="pricing-tables-column-type" class="widefat">
						<option value="" selected><?php _e('Normal', 'sptheme'); ?></option>
						<option value="features-list"><?php _e('Features list (only for Extended tables)', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-title"><?php _e('Column title', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-title" id="pricing-tables-column-title" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-price"><?php _e('Column price', 'sptheme'); ?><br /><em><?php _e('(With currency)', 'sptheme'); ?></em></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-price" id="pricing-tables-column-price" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-period"><?php _e('Column period', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-period" id="pricing-tables-column-period" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-description"><?php _e('Column description', 'sptheme'); ?><br /><em><?php _e('(Only for Simple tables)', 'sptheme'); ?></em></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-description" id="pricing-tables-column-description" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-signup-title"><?php _e('Column Sign Up button title', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-signup-title" id="pricing-tables-column-signup-title" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-signup-url"><?php _e('Column Sign Up button URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="pricing-tables-column-signup-url" id="pricing-tables-column-signup-url" value="" class="widefat">

				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-special"><?php _e('Special column', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="pricing-tables-column-special" id="pricing-tables-column-special" class="widefat">
						<option value="" selected><?php _e('No', 'sptheme'); ?></option>
						<option value="free"><?php _e('Free', 'sptheme'); ?></option>
						<option value="featured"><?php _e('Featured', 'sptheme'); ?></option>
					</select>
				</td>

			</tr>

			<tr class="option pricing-tables">

				<th class="label">

					<label for="pricing-tables-column-content"><?php _e('Column content (list items)', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="pricing-tables-column-content" id="pricing-tables-column-content" cols="30" rows="5" class="widefat"></textarea>
					<em><?php printf( __('(Use %1$s shortcode to create a tooltip and %2$s shortcode to create a check icon.)', 'sptheme'), '<code>[tooltip text=""]</code>', '<code>[check]</code>' ); ?></em>

				</td>

			</tr>
			<!-- end pricing-tables -->

			<!-- start video-player -->
			<!--<tr class="option video-player">

				<th class="label">

					<label for="video-player-mp4"><?php _e('MP4 file URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="video-player-mp4" id="video-player-mp4" value="" class="widefat">
					<em><?php _e('(For Safari, Internet Explorer 9, iPhone, iPad, Android, and Windows Phone 7)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option video-player">

				<th class="label">

					<label for="video-player-webm"><?php _e('WebM file URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="video-player-webm" id="video-player-webm" value="" class="widefat">
					<em><?php _e('(For Firefox4, Opera, and Chrome)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option video-player">

				<th class="label">

					<label for="video-player-ogg"><?php _e('OGG file URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="video-player-ogg" id="video-player-ogg" value="" class="widefat">
					<em><?php _e('(For older Firefox and Opera versions)', 'sptheme'); ?></em>

				</td>

			</tr>
            
            <tr class="option video-player">

				<th class="label">

					<label for="video-player-poster"><?php _e('Preview image URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="video-player-poster" id="video-player-poster" value="" class="widefat">

				</td>

			</tr>


			<tr class="option video-player">

				<th class="label">

					<label for="video-player-aspect-ratio"><?php _e('Aspect ratio', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="video-player-aspect-ratio" id="video-player-aspect-ratio" value="1.7" class="widefat">

				</td>

			</tr>

			<tr class="option video-player">

				<th class="label">

					<label><?php _e('Extra Info', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<?php _e('If video element isn\'t displayed properly, try to wrap it inside of <code>[raw]</code> shortcode.', 'sptheme'); ?>

				</td>

			</tr>-->
            <tr class="option video-player">

				<th class="label">

					<label><?php _e('Video Embed Code', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<textarea name="video-embed-code" id="video-embed-code" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
            
            
			<!-- end video-player -->
            
            <!-- start vdieo-youtube -->
            <tr class="option video-youtube">
            
				<th class="label">

					<label><?php _e('Video id', 'sptheme'); ?></label>

				</th>

				<td class="field">
					
                    <input type="text" name="video-youtube-id" id="video-youtube-id" value="" class="widefat">

				</td>

			</tr>
            <!-- end vdieo-youtube -->
            
            </tr>

			<!-- start audio-player -->
			<tr class="option audio-player">

				<th class="label">

					<label for="audio-player-mp3"><?php _e('MP3 File URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="audio-player-mp3" id="audio-player-mp3" value="" class="widefat">
					<em><?php _e('(For Safari, Internet Explorer, Chrome)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option audio-player">

				<th class="label">

					<label for="audio-player-ogg"><?php _e('OGG File URL', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="audio-player-ogg" id="audio-player-ogg" value="" class="widefat">
					<em><?php _e('(For Firefox, Opera, Chrome)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option audio-player">

				<th class="label">

					<label><?php _e('Extra Info', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<?php _e('If audio element isn\'t displayed properly, try to wrap it inside of <code>[raw]</code> shortcode.', 'sptheme'); ?>

				</td>

			</tr>
			<!-- end audio-player -->

			<!-- start alert-boxes -->
			<tr class="option alert-boxes">

				<th class="label">

					<label for="alert-boxes-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="alert-boxes-content" id="alert-boxes-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end alert-boxes -->

			<!-- start layout -->
			<tr class="option layout">

				<th class="label">

					<label for="layout-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="layout-content" id="layout-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end layout -->

			<!-- start post-carousel -->
			<tr class="option post-carousel">

				<th class="label">

					<label for="post-carousel-title"><?php _e('Custom Title', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="post-carousel-title" id="post-carousel-title" value="" class="widefat">
					<em><?php _e('(Default: Latest stuff from our blog)', 'sptheme'); ?></em>

				</td>

			</tr>
			<tr class="option post-carousel">

				<th class="label">

					<label for="post-carousel-limit"><?php _e('Limit', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="post-carousel-limit" id="post-carousel-limit" value="" class="widefat">
					<em><?php _e('(Only numbers! Default: 8)', 'sptheme'); ?></em>

				</td>

			</tr>
			<tr class="option post-carousel">

				<th class="label">

					<label for="post-carousel-categories"><?php _e('Categories', 'sptheme'); ?></label>

				</th>

				<td class="field">

					<select name="post-carousel-categories" id="post-carousel-categories" class="widefat" size="5" multiple>

						<option value="" selected><?php _e('All', 'sptheme'); ?></option>

						<?php $blog_categories = get_categories( array('orderby' => 'id') ); foreach( $blog_categories as $category ): ?>

							<option value="<?php echo $category->term_taxonomy_id; ?>"><?php echo $category->name; ?></option>

						<?php endforeach; ?>

					</select>

					<em><?php _e('(You can select multiple categories by pressing CTRL key)', 'sptheme'); ?></em>

				</td>

			</tr>
			<!-- end post-carousel -->

			<!-- start projects-carousel -->
			<tr class="option projects-carousel">

				<th class="label">

					<label for="projects-carousel-title"><?php _e('Custom Title', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<input type="text" name="projects-carousel-title" id="projects-carousel-title" value="" class="widefat">
					<em><?php _e('(Default: Latest projects)', 'sptheme'); ?></em>

				</td>

			</tr>
			<tr class="option projects-carousel">

				<th class="label">

					<label for="projects-carousel-limit"><?php _e('Limit', 'sptheme'); ?> </label>

				</th>

				<td class="field">
				
					<input type="text" name="projects-carousel-limit" id="projects-carousel-limit" value="" class="widefat">
					<em><?php _e('(Only numbers! Default: 8)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option projects-carousel">

				<th class="label">

					<label for="projects-carousel-categories"><?php _e('Categories', 'sptheme'); ?></label>

				</th>

				<td class="field">

					<select name="projects-carousel-categories" id="projects-carousel-categories" class="widefat" size="5" multiple>

						<option value="" selected><?php _e('All', 'sptheme'); ?></option>

					<?php $portfolio_categories = get_terms( 'portfolio-categories', array('order_by' => 'id') ); foreach( $portfolio_categories as $category ): ?>

						<option value="<?php echo $category->term_taxonomy_id; ?>"><?php echo $category->name; ?></option>

					<?php endforeach; ?>

					</select>

					<em><?php _e('(You can select multiple categories by pressing CTRL key)', 'sptheme'); ?></em>

				</td>

			</tr>
			<!-- end projects-carousel -->

			<!-- start portfolio -->
			<tr class="option portfolio">

				<th class="label">

					<label for="portfolio-columns"><?php _e('Column', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="portfolio-columns" id="portfolio-columns" class="widefat">
						<option value="one_half"><?php _e('1/2', 'sptheme'); ?></option>
						<option value="one_third"><?php _e('1/3', 'sptheme'); ?></option>
						<option value="one_fourth" selected><?php _e('1/4', 'sptheme'); ?></option>
					</select>
					
				</td>

			</tr>

			</tr>
			
			<tr class="option portfolio">

				<th class="label">

					<label for="portfolio-limit"><?php _e('Limit', 'sptheme'); ?> </label>

				</th>

				<td class="field">
				
					<input type="text" name="portfolio-limit" id="portfolio-limit" value="" class="widefat">
					<em><?php _e('(Only numbers! Default: All)', 'sptheme'); ?></em>

				</td>

			</tr>

			<tr class="option portfolio">

				<th class="label">

					<label for="portfolio-categories"><?php _e('Categories', 'sptheme'); ?></label>

				</th>

				<td class="field">

					<select name="portfolio-categories" id="portfolio-categories" class="widefat" size="5" multiple>

						<option value="" selected><?php _e('All', 'sptheme'); ?></option>

					<?php $portfolio_categories = get_terms( 'portfolio-categories', array('order_by' => 'id') ); foreach( $portfolio_categories as $category ): ?>

						<option value="<?php echo $category->term_taxonomy_id; ?>"><?php echo $category->name; ?></option>

					<?php endforeach; ?>

					</select>

					<em><?php _e('(You can select multiple categories by pressing CTRL key)', 'sptheme'); ?></em>

				</td>

			</tr>
			<!-- end portfolio -->

			<!-- start slider -->
			<tr class="option slider">

				<th class="label">

					<label for="slider-id"><?php _e('ID', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">

					<select name="slider-id" id="slider-id" class="widefat">

						<option value="" select><?php _e('Select slider', 'sptheme'); ?></option>

						<?php
							global $post;
							$args = array( 'post_type' => 'slider', 'posts_per_page' => -1 );
							query_posts( $args );
							if( have_posts() ) while ( have_posts() ) : the_post();
						?>

							<option value="<?php echo $post->post_name; ?>"><?php echo $post->post_title; ?></option>

						<?php endwhile; wp_reset_query();  ?>

					</select>

				</td>

			</tr>
			<!-- end slider -->

			<!-- start team-member -->
			<tr class="option team-member">

				<th class="label">

					<label for="team-member-id"><?php _e('Team Member', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">

					<select name="team-member-id" id="team-member-id" class="widefat">

						<option value="" select><?php _e('Select team member', 'sptheme'); ?></option>

						<?php
							global $post;
							$args = array( 'post_type' => 'team', 'posts_per_page' => -1 );
							query_posts( $args );
							if( have_posts() ) while ( have_posts() ) : the_post();
						?>

							<option value="<?php echo $post->post_name; ?>"><?php echo $post->post_title; ?></option>

						<?php endwhile; wp_reset_query();  ?>

					</select>

				</td>

			</tr>

			<tr class="option team-member">

				<th class="label">

					<label for="team-member-column"><?php _e('Column', 'sptheme'); ?></label>

				</th>

				<td class="field">
				
					<select name="team-member-column" id="team-member-column" class="widefat">
						<option value="one-half"><?php _e('1/2', 'sptheme'); ?></option>
						<option value="one-third"><?php _e('1/3', 'sptheme'); ?></option>
						<option value="one-fourth" selected><?php _e('1/4', 'sptheme'); ?></option>
					</select>
					
				</td>

			</tr>

			<tr class="option team-member">

				<th class="label">

					<label for="team-member-last"><?php _e('Last column', 'sptheme'); ?></label>

				</th>

				<td class="field">

					<input type="checkbox" name="team-member-last" id="team-member-last" value="last">

				</td>

			</tr>
			<!-- end team-member -->
            
            <!-- start postlist -->
            <tr class="option postlist">
            
            	<th class="label">

					<label for="pagelist-id"><?php _e('Post list', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
                    
                    <?php wp_dropdown_categories( array( 'hierarchical' => 1, 'depth' => '2', 'name' => 'postlist-category', 'orderby' => 'name' ) ); ?>

				</td>
           
           </tr>
           <tr class="option postlist">
           
           <th class="label">

                <label for="postlist-num"><?php _e('Number of post', 'sptheme'); ?> </label>

            </th>

            <td class="field">
            
                <input type="text" name="postlist-num" id="postlist-num" value="5" class="widefat">

           </td>
           
           </tr>
            <!-- start postlist -->
            
            <!-- start pagelist -->
            <tr class="option pagelist">
            
            	<th class="label">

					<label for="pagelist-id"><?php _e('Page list', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
                    
                    <?php wp_dropdown_pages( array( 'sort_column'  => 'post_title', 'depth' => '2', 'name' => 'pagelist-page-id' ) ); ?>

				</td>
           
           </tr>
            <!-- start pagelist -->

			<!-- start fullwidth-map -->
			<tr class="option fullwidth-map">

				<th class="label">

					<label for="fullwidth-map-content"><?php _e('Map shortcode', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="fullwidth-map-content" id="fullwidth-map-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end fullwidth-map -->

			<!-- start raw -->
			<tr class="option raw">

				<th class="label">

					<label for="raw-content"><?php _e('Content', 'sptheme'); ?><span class="red">*</span></label>

				</th>

				<td class="field">
				
					<textarea name="raw-content" id="raw-content" cols="30" rows="5" class="widefat"></textarea>

				</td>

			</tr>
			<!-- end raw -->

			<!-- start current -->
			<tr>

				<th class="label">

					<label for="shortcode-dropdown"><?php _e('Current shortcode with all available attributes', 'sptheme'); ?><br />					
					<em>(<span class="red"><?php _e('red', 'sptheme'); ?></span> = <?php _e('required', 'sptheme'); ?>)</em></label>

				</th>

				<td class="field">

					<code id="shortcode"></code>

				</td>

			</tr>
			<!-- end current -->

			<!-- start insert -->
			<tr>

				<th class="label"></th>

				<td class="field">

					<p><button id="insert-shortcode" class="button-primary"><?php _e('Insert Shortcode', 'sptheme'); ?></button></p>

				</td>

			</tr>
			<!-- end insert -->

		</tbody>

	</table>
	
</div><!-- end #main -->

<script>jQuery('.option').hide();</script>

</body>
</html>