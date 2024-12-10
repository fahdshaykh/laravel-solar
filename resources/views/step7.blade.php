<html lang="en-US" prefix="og: https://ogp.me/ns#">

<head>
	<meta charset="UTF-8">
	<title>Next Steps - {{$webdata->details}}</title>	
	<link rel="stylesheet" id="hello-elementor-css" href="{{ asset('assets_web/css/style.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="hello-elementor-theme-style-css" href="{{ asset('assets_web/css/theme.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="hello-elementor-header-footer-css" href="{{ asset('assets_web/css/header-footer.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="elementor-frontend-css"	href="{{ asset('assets_web/css/frontend-lite.min.css?ver=3.21.5')}}" media="all">
	<link rel="stylesheet" id="elementor-post-1104-css" href="{{ asset('assets_web/css/post-1104.css?ver=1715989099')}}" media="all">
	<style id="wp-custom-css">
		.gform_wrapper.gravity-theme .gfield_required .gfield_required_custom,
		.gform_wrapper.gravity-theme .gfield_required .gfield_required_text {
			display: none;
		}
	</style>
</head>

<body
	class="page-template page-template-elementor_canvas page page-id-1104 page-child parent-pageid-1086 wp-custom-logo elementor-default elementor-template-canvas elementor-kit-8 elementor-page elementor-page-1104 e--ua-blink e--ua-chrome e--ua-webkit"
	data-elementor-device-mode="desktop">

	<div data-elementor-type="wp-page" data-elementor-id="1104" class="elementor elementor-1104"
		data-elementor-post-type="page">
		
		<section
			class="elementor-section elementor-top-section elementor-element elementor-element-526da8f elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle showIt"
			data-id="526da8f" data-element_type="section" id="stepb"
			data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_top&quot;:&quot;frame&quot;,&quot;shape_divider_bottom&quot;:&quot;frame&quot;,&quot;_ha_eqh_enable&quot;:false}">
		
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-31fcdbb"
					data-id="31fcdbb" data-element_type="column"
					data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section
							class="elementor-section elementor-inner-section elementor-element elementor-element-1e0c92a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
							data-id="1e0c92a" data-element_type="section"
							data-settings="{&quot;_ha_eqh_enable&quot;:false}">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-d7729ad elementor-hidden-mobile"
									data-id="d7729ad" data-element_type="column"></div>
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-cf0ac77"
									data-id="cf0ac77" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-52b70a7 elementor-widget elementor-widget-image"
											data-id="52b70a7" data-element_type="widget"
											data-widget_type="image.default">
											<div class="elementor-widget-container">
												<style>
													/*! elementor - v3.21.0 - 08-05-2024 */
													.elementor-widget-image {
														text-align: center
													}

													.elementor-widget-image a {
														display: inline-block
													}

													.elementor-widget-image a img[src$=".svg"] {
														width: 48px
													}

													.elementor-widget-image img {
														vertical-align: middle;
														display: inline-block
													}
												</style> 
												
											</div>
										</div>
										<div class="elementor-element elementor-element-a5c24e7 elementor-widget elementor-widget-heading"
											data-id="a5c24e7" data-element_type="widget"
											data-widget_type="heading.default">
											<div class="elementor-widget-container">
											<div align="center"> <img src="{{asset('template/'.$webdata->photo)}}" width="150px" height="150px" class="attachment-medium size-medium wp-image-3469" alt="{{$webdata->details}}"></div>
												<h3 class="elementor-heading-title elementor-size-default">Let me
													know...</h3>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</section>
						<div class="elementor-element elementor-element-6f52d77 elementor-widget elementor-widget-ha-gravityforms happy-addon ha-gravityforms"
							data-id="6f52d77" data-element_type="widget" data-widget_type="ha-gravityforms.default">
							<div class="elementor-widget-container">
								<script type="text/javascript"></script>
								<div class="gf_browser_chrome gform_wrapper gravity-theme gform-theme--no-framework"
									data-form-theme="gravity-theme" data-form-index="0" id="gform_wrapper_3" style="">
									<div id="gf_3" class="gform_anchor" tabindex="-1"></div>
									<div class="gform_heading">
										<p class="gform_description"></p>
									</div>
									<form method="post" enctype="multipart/form-data"
										id="gform_3"
										action="{{route('updateproposalfrontinfo')}}"
										data-formid="3" style="">
										@csrf
										<div class="gform-body gform_body">
										
											<div id="gform_page_3_4" class="gform_page clicked2">										
											<div  id="gform_page_3_5" class="gform_page" data-js="page-field-id-27">
												<div class="gform_page_fields">
													<div id="gform_fields_3_5"
														class="gform_fields top_label form_sublabel_below description_below validation_below">
														<div id="field_3_33"
															class="gfield gfield--type-html gfield--input-type-html gfield--width-full gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_33"><span class="titleThin">How Can
																Revolution Solar Contact You?</span></div>
														<div id="field_3_29"
															class="gfield gfield--type-text gfield--input-type-text gfield--width-half gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_29"><label
																class="gfield_label gform-field-label"
																for="input_3_29">First Name<span
																	class="gfield_required"><span
																		class="gfield_required gfield_required_text">(Required)</span></span></label>
															<div class="ginput_container ginput_container_text">
															<input
																	name="first_name" id="input_3_29" type="text" value=""
																	class="large" required
																	aria-invalid="true"> </div>
														</div>
														<div id="field_3_30"
															class="gfield gfield--type-text gfield--input-type-text gfield--width-half gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_30"><label
																class="gfield_label gform-field-label"
																for="input_3_30">Last Name<span
																	class="gfield_required"><span
																		class="gfield_required gfield_required_text">(Required)</span></span></label>
															<div class="ginput_container ginput_container_text"><input
																	name="last_name" id="input_3_30" type="text" value=""
																	class="large" aria-required="true"
																	aria-invalid="false"> </div>
														</div>
														<div id="field_3_32"
															class="gfield gfield--type-phone gfield--input-type-phone gfield--width-half gfield_contains_required field_sublabel_below gfield--has-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_32"><label
																class="gfield_label gform-field-label"
																for="input_3_32">Phone<span
																	class="gfield_required"><span
																		class="gfield_required gfield_required_text">(Required)</span></span></label>
															<div class="ginput_container ginput_container_phone"><input
																	name="phone" id="input_3_32" type="text" pattern="^\+?[1-9]\d{1,14}$" placeholder="+1 123-456-7890" value=""
																	class="large" required
																	></div>
															<div class="gfield_description"
																id="gfield_description_3_32">Please enter a valid phone
																number.</div>
														</div>
														<input type="hidden" value="{{$id}}" name="id" />
														<div id="field_3_31"
															class="gfield gfield--type-email gfield--input-type-email gfield--width-half gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_31"><label
																class="gfield_label gform-field-label"
																for="input_3_31">Email<span
																	class="gfield_required"><span
																		class="gfield_required gfield_required_text">(Required)</span></span></label>
															<div class="ginput_container ginput_container_email">
																<input name="email" required id="input_3_31" type="email"
																	value="" class="large" aria-required="true"
																	aria-invalid="false">
															</div>
														</div>
													</div>
												</div>
												<div class="gform_page_footer top_label">
													<input type="submit" id="gform_submit_button_3" class="gform_button button make_visible" value="Show Me the Numbers">
													
												</div>
												<p class="consentText">By submitting your information, you consent for
												{{$webdata->details}} directly or through its approved partner <span
														class="partnerNameA">sunset</span> to contact you from
													time-to-time by telephone, text, automated technology, calls from
													artificial voices, email and/or direct mail with information and
													offers about products and services that might interest me. This
													consent is not required to make a purchase. Reply ‘STOP’ to opt-out
													at any time. Clicking the button above constitutes your electronic
													signature. <b><a
															href="#">Privacy
															Policy</a></b></p>
											</div>
										</div>
									</form>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
	<link rel="stylesheet" href="{{ asset('assets_web/css/elementorsection.css')}}">
	<link rel="stylesheet" id="gform_basic-css" href="{{ asset('assets_web/css/basic.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme_components-css" href="{{ asset('assets_web/css/theme-components.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme_ie11-css" href="{{ asset('assets_web/css/theme-ie11.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme-css" href="{{ asset('assets_web/css/theme.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="wp-color-picker-css" href="{{ asset('assets_web/css/color-picker.minef10.css?ver=6.5.5')}}" media="all">
	<link rel="stylesheet" id="gfaa-admin-css" href="{{ asset('assets_web/css/gfaa-admin2857.css?ver=1724209654')}}" media="all">
	<link rel="stylesheet" id="noUiSlider-css" href="{{ asset('assets_web/css/nouislider.min.css?ver=2.0')}}" media="all">
	<link rel="stylesheet" id="slider_fields-css" href="{{ asset('assets_web/css/slider.css?ver=2.0')}}" media="all">
</body>

</html>