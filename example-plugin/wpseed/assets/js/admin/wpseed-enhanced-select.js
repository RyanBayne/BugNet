/*global wpseed_enhanced_select_params */
jQuery( function( $ ) {

	function getEnhancedSelectFormatString() {
		var formatString = {
			formatMatches: function( matches ) {
				if ( 1 === matches ) {
					return wpseed_enhanced_select_params.i18n_matches_1;
				}

				return wpseed_enhanced_select_params.i18n_matches_n.replace( '%qty%', matches );
			},
			formatNoMatches: function() {
				return wpseed_enhanced_select_params.i18n_no_matches;
			},
			formatAjaxError: function() {
				return wpseed_enhanced_select_params.i18n_ajax_error;
			},
			formatInputTooShort: function( input, min ) {
				var number = min - input.length;

				if ( 1 === number ) {
					return wpseed_enhanced_select_params.i18n_input_too_short_1;
				}

				return wpseed_enhanced_select_params.i18n_input_too_short_n.replace( '%qty%', number );
			},
			formatInputTooLong: function( input, max ) {
				var number = input.length - max;

				if ( 1 === number ) {
					return wpseed_enhanced_select_params.i18n_input_too_long_1;
				}

				return wpseed_enhanced_select_params.i18n_input_too_long_n.replace( '%qty%', number );
			},
			formatSelectionTooBig: function( limit ) {
				if ( 1 === limit ) {
					return wpseed_enhanced_select_params.i18n_selection_too_long_1;
				}

				return wpseed_enhanced_select_params.i18n_selection_too_long_n.replace( '%qty%', limit );
			},
			formatLoadMore: function() {
				return wpseed_enhanced_select_params.i18n_load_more;
			},
			formatSearching: function() {
				return wpseed_enhanced_select_params.i18n_searching;
			}
		};

		return formatString;
	}

	$( document.body )

		.on( 'wpseed-enhanced-select-init', function() {

			// Regular select boxes
			$( ':input.wpseed-enhanced-select, :input.chosen_select' ).filter( ':not(.enhanced)' ).each( function() {
				var select2_args = $.extend({
					minimumResultsForSearch: 10,
					allowClear:  $( this ).data( 'allow_clear' ) ? true : false,
					placeholder: $( this ).data( 'placeholder' )
				}, getEnhancedSelectFormatString() );

				$( this ).select2( select2_args ).addClass( 'enhanced' );
			});

			$( ':input.wpseed-enhanced-select-nostd, :input.chosen_select_nostd' ).filter( ':not(.enhanced)' ).each( function() {
				var select2_args = $.extend({
					minimumResultsForSearch: 10,
					allowClear:  true,
					placeholder: $( this ).data( 'placeholder' )
				}, getEnhancedSelectFormatString() );

				$( this ).select2( select2_args ).addClass( 'enhanced' );
			});

		})
});
