<html lang="en-US" prefix="og: https://ogp.me/ns#">
	
<head>
	<meta charset="UTF-8">
	<title>{{$title}} - {{$webdata->details}}</title>	
	
	<link rel="stylesheet" id="hello-elementor-css" href="{{ asset('assets_web/css/style.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="hello-elementor-theme-style-css" href="{{ asset('assets_web/css/theme.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="hello-elementor-header-footer-css" href="{{ asset('assets_web/css/header-footer.min41fe.css?ver=3.0.1')}}" media="all">
	<link rel="stylesheet" id="elementor-frontend-css"	href="{{ asset('assets_web/css/frontend-lite.min.css?ver=3.21.5')}}" media="all">
	<link rel="stylesheet" id="elementor-post-1104-css" href="{{ asset('assets_web/css/post-1104.css?ver=1715989099')}}" media="all">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">
	
</head>

<body
	class="page-template page-template-elementor_canvas page page-id-1104 page-child parent-pageid-1086 wp-custom-logo elementor-default elementor-template-canvas elementor-kit-8 elementor-page elementor-page-1104 e--ua-blink e--ua-chrome e--ua-webkit"
	data-elementor-device-mode="desktop">

	
	<div data-elementor-type="wp-page" data-elementor-id="1104" class="elementor elementor-1104"
		data-elementor-post-type="page">
	
		<section class="elementor-section elementor-top-section elementor-element elementor-element-526da8f elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle showIt">
			
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
									data-id="d7729ad" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-a11b4ed elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
											data-id="a11b4ed" data-element_type="widget"
											data-widget_type="divider.default">
											<div class="elementor-widget-container">
												<div class="elementor-divider">
													<span class="elementor-divider-separator">
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
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
								<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-3e43a99 elementor-hidden-mobile"
									data-id="3e43a99" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-72318fd elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
											data-id="72318fd" data-element_type="widget"
											data-widget_type="divider.default">
											<div class="elementor-widget-container">
												<div class="elementor-divider">
													<span class="elementor-divider-separator">
													</span>
												</div>
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
									<form method="post" action="{{route('updateproposalfront')}}" id="gform_3" >
									@csrf
										<div class="gform-body gform_body">
											<div id="gform_page_3_1" class="gform_page " data-js="page-field-id-1">
												<div class="gform_page_fields">
													<div id="gform_fields_3"
														class="gform_fields top_label form_sublabel_below description_below validation_below">
														<div id="field_3_13"
															class="gfield gfield--type-html gfield--input-type-html gfield--width-full gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_13"><span class="titleBlue">Your
																current Costs</span>
															<span class="titleThin">What is Your Average Electricity
																Bill?</span>
														</div>
														 <div id="field_3_47" class="gfield gfield--type-slider gfield--input-type-slider gfield--width-full field_sublabel_below gfield--no-description field_description_below hidden_label field_validation_below gfield_visibility_visible" data-js-reload="field_3_47">
            <label class="gfield_label gform-field-label" for="input_3_47">Monthly Bill Slider</label>
            <div class="ginput_container ginput_container_slider">
                <div id="slider"></div>
                <input type="hidden" name="input_47" id="input_3_47">
				<input type="hidden" name="id" id="id" value="{{$id}}">
            </div>
        </div>
														
														<div id="field_3_14"
															class="gfield gfield--type-html gfield--input-type-html gfield--width-full gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
															data-js-reload="field_3_14"><span class="para">We use this
																info to estimate your plan and savings!</span></div>
														
														
													</div>
												</div>
												<div class="gform_page_footer top_label">
													<input type="submit" id="gform_next_button_3_48" class="gform_next_button gform-theme-button button" value="Next" >
												</div>
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
	</div>
	<link rel="stylesheet" href="{{ asset('assets_web/css/elementorsection.css')}}">
	<link rel="stylesheet" id="gform_basic-css" href="{{ asset('assets_web/css/basic.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme_components-css" href="{{ asset('assets_web/css/theme-components.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme_ie11-css" href="{{ asset('assets_web/css/theme-ie11.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="gform_theme-css" href="{{ asset('assets_web/css/theme.min193f.css?ver=2.8.16')}}" media="all">
	<link rel="stylesheet" id="wp-color-picker-css" href="{{ asset('assets_web/css/color-picker.minef10.css?ver=6.5.5')}}" media="all">
	<link rel="stylesheet" id="gfaa-admin-css" href="{{ asset('assets_web/css/gfaa-admin2857.css?ver=1724209654')}}" media="all">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
    <script>
        // Initialize the slider
        var slider = document.getElementById('slider');
        var hiddenInput = document.getElementById('input_3_47');

        noUiSlider.create(slider, {
            start: 275,
            connect: [true, false],
            range: {
                'min': 0,
                'max': 1550
            },
            tooltips: true,
            format: {
                to: function (value) {
                    return '$' + value.toFixed(2);
                },
                from: function (value) {
                    return Number(value.replace('$', ''));
                }
            }
        });

        // Update hidden input when slider value changes
        slider.noUiSlider.on('update', function (values, handle) {
            hiddenInput.value = slider.noUiSlider.get().replace('$', '');
        });
    </script>
</body>
</html>