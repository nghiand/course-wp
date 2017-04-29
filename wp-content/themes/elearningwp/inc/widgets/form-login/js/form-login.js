(function ($) {
	"use strict";
	/* Social login popup */
	var popupWrapper = '#thim-popup-login-wrapper';		
	var thimLoginSocialPopup = function () {
		jQuery('.thim-link-login a').click(function (event) {
			var popupWrapper = '#thim-popup-login-wrapper';
			$(popupWrapper).show();
			event.preventDefault();
		});
		jQuery('.thim-popup-login-close', popupWrapper).click(function () {
			$(popupWrapper).hide();
		});
		jQuery(document).mouseup(function (e) {
			var container = jQuery(".thim-popup-login-container-inner");

			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				//jQuery("#thim-popup-login-wrapper").remove();
				jQuery(popupWrapper).hide();
			}
		});

		jQuery(document).keyup(function (e) {
			if (e.keyCode == 27) {
				//jQuery("#thim-popup-login-wrapper").remove();
				jQuery(popupWrapper).hide();
			}
		});

		jQuery('#thim-popup-login-form').submit(function (event) {
			var input_data = jQuery('#thim-popup-login-form').serialize();

			jQuery.ajax({
				type   : 'POST',
				data   : input_data,
				url    : thim_ob_ajax_url,
				success: function (html) {
					var response_data = jQuery.parseJSON(html);
					jQuery('.login-message', '#thim-popup-login-form').html(response_data.message);
					try {
						var response = JSON.parse(response);
						elem.find('.thim-login').append(response.message);
						if (response.code == '1') {
							window.location = window.location;
						}
					} catch (e) {
						return false;
					}
				},
				error  : function (html) {
				}
			});
			event.preventDefault();
			return false;
		});
	}

	/* thim Login Widget*/
	var thimLoginWidget = function () {
		jQuery('.thim-login-widget-form').each(function () {
			jQuery(this).submit(function (event) {
				if (this.checkValidity()) {
					var $form = jQuery(this);
					var input_data = jQuery($form).serialize();
					jQuery.ajax({
						type   : 'POST',
						data   : input_data,
						url    : thim_ob_ajax_url,
						success: function (html) {
							var response_data = jQuery.parseJSON(html);
							jQuery('.thim-login-widget-message', $form).html(response_data.message);
						},
						error  : function (html) {
						}
					});
				}
				event.preventDefault();
				return false;
			});
		});
	}

	// DOMReady event
	$(function () {
		thimLoginSocialPopup();
		thimLoginWidget();
	});
})(jQuery);

