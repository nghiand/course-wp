(function ($) {
	"use strict";
	$.avia_utilities = $.avia_utilities || {};
	$.avia_utilities.supported = {};
	$.avia_utilities.supports = (function () {
		var div = document.createElement('div'),
			vendors = ['Khtml', 'Ms', 'Moz', 'Webkit', 'O'];  // vendors   = ['Khtml', 'Ms','Moz','Webkit','O'];  exclude opera for the moment. stil to buggy
		return function (prop, vendor_overwrite) {
			if (div.style.prop !== undefined) {
				return "";
			}
			if (vendor_overwrite !== undefined) {
				vendors = vendor_overwrite;
			}
			prop = prop.replace(/^[a-z]/, function (val) {
				return val.toUpperCase();
			});

			var len = vendors.length;
			while (len--) {
				if (div.style[vendors[len] + prop] !== undefined) {
					return "-" + vendors[len].toLowerCase() + "-";
				}
			}
			return false;
		};
	}());

	/* Smartresize */
	(function ($, sr) {
		var debounce = function (func, threshold, execAsap) {
			var timeout;
			return function debounced() {
				var obj = this, args = arguments;

				function delayed() {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				}

				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);

				timeout = setTimeout(delayed, threshold || 100);
			}
		}
		// smartresize
		jQuery.fn[sr] = function (fn) {
			return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
		};
	})(jQuery, 'smartresize');

	//Back To top
	var back_to_top = function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-to-top').css({bottom: "15px"});
			} else {
				jQuery('#back-to-top').css({bottom: "-100px"});
			}
		});
		jQuery('#back-to-top').click(function () {
			jQuery('html, body').animate({scrollTop: '0px'}, 800);
			return false;
		});
	}

	//// stick header
	$(document).ready(function () {
		var $header = $('#masthead.sticky-header.header_default');
		var $content_pusher = $('#wrapper-container .content-pusher');
		$header.imagesLoaded(function () {
			var height_sticky_header = $header.outerHeight(true);
			//$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			$(window).resize(function () {
				var height_sticky_header = $header.outerHeight(true);
				//$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			});
		});
	});
	//header overlay
	$(document).ready(function () {
		var $header = $('#masthead.sticky-header.header_overlay');
		var $content_pusher = $('#wrapper-container .top_site_main');
		$header.imagesLoaded(function () {
			var height_sticky_header = $header.outerHeight(true);
			$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			$(window).resize(function () {
				var height_sticky_header = $header.outerHeight(true);
				$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			});
		});
	});

	$(window).scroll(function () {
		var $header = $('#masthead.sticky-header');
		var $height_stick = $header.attr('data-height-sticky');
		if (!$height_stick) {
			$height_stick = '2';
		}
		if ($(this).scrollTop() > $height_stick) {
			$header.addClass('affix');
			$header.removeClass('affix-top');
		} else {
			$header.removeClass('affix');
			$header.addClass('affix-top');
		}
	});
	////end  stick header
	/* audio post */
	/* ****** jp-jplayer  ******/
	var post_audio = function () {
		$('.jp-jplayer').each(function () {
			var $this = $(this),
				url = $this.data('audio'),
				type = url.substr(url.lastIndexOf('.') + 1),
				player = '#' + $this.data('player'),
				audio = {};
			audio[type] = url;

			$this.jPlayer({
				ready              : function () {
					$this.jPlayer('setMedia', audio);
				},
				swfPath            : 'jplayer/',
				cssSelectorAncestor: player
			});
		});
	}

	var post_gallery = function () {
		if( $('article.format-gallery .flexslider').length > 0 ) {
			$('article.format-gallery .flexslider').imagesLoaded(function () {
				$('.flexslider').flexslider({
					slideshow     : true,
					animation     : 'fade',
					pauseOnHover  : true,
					animationSpeed: 400,
					smoothHeight  : true,
					directionNav  : true,
					controlNav    : false
				});
			});
		}
	}

	/* Product Grid, List Switch */
	var cookie_name = jQuery('.grid-list-switch').data('cookie');
	if (cookie_name == 'product-switch') {
		var gridClass = 'products-grid';
		var listClass = 'products-list';
	} else if (cookie_name == 'lpr_course-switch') {
		var gridClass = 'course-grid';
		var listClass = 'course-list';
	} else {
		var gridClass = 'blog-grid';
		var listClass = 'blog-list';
	}

	var listSwitcher = function () {
		var activeClass = 'switcher-active';
		jQuery('.switchToList').click(function () {
			if (!jQuery.cookie(cookie_name) || jQuery.cookie(cookie_name) == 'grid') {
				switchToList();
			}
		});
		jQuery('.switchToGrid').click(function () {
			if (!jQuery.cookie(cookie_name) || jQuery.cookie(cookie_name) == 'list') {
				switchToGrid();
			}
		});

		function switchToList() {
			jQuery('.switchToList').addClass(activeClass);
			jQuery('.switchToGrid').removeClass(activeClass);
			jQuery('.archive_switch').fadeOut(300, function () {
				jQuery(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
				jQuery.cookie(cookie_name, 'list', {expires: 3, path: '/'});
			});
		}

		function switchToGrid() {
			jQuery('.switchToGrid').addClass(activeClass);
			jQuery('.switchToList').removeClass(activeClass);
			jQuery('.archive_switch').fadeOut(300, function () {
				jQuery(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
				jQuery.cookie(cookie_name, 'grid', {expires: 3, path: '/'});
			});
		}
	}

	var check_view_mod = function () {
		var activeClass = 'switcher-active';
		if (jQuery.cookie(cookie_name) == 'grid') {
			jQuery('.archive_switch').removeClass(listClass).addClass(gridClass);
			jQuery('.switchToGrid').addClass(activeClass);
			jQuery('.switchToList').removeClass(activeClass);
		} else if (jQuery.cookie(cookie_name) == 'list') {
			jQuery('.archive_switch').removeClass(gridClass).addClass(listClass);
			jQuery('.switchToList').addClass(activeClass);
			jQuery('.switchToGrid').removeClass(activeClass);
		}
		else {
			jQuery('.switchToList').addClass(activeClass);
			jQuery('.switchToGrid').removeClass(activeClass);
			jQuery('.archive_switch').removeClass(gridClass).addClass(listClass);
		}
	}

	/* ****** PRODUCT QUICK VIEW  ******/
	var quick_view = function () {
		$('.quick-view').click(function (e) {
			/* add loader  */
			$(this).find("i").before('<div class="loading dark"></div>');
			$(this).find("i").css('display', 'none');
			var product_id = $(this).attr('data-prod');
			var data = {action: 'jck_quickview', product: product_id};
			$.post(ajaxurl, data, function (response) {
				$.magnificPopup.open({
					mainClass: 'my-mfp-zoom-in',
					items    : {
						src : '<div class="product-lightbox">' + response + '</div>',
						type: 'inline'
					}
				});
				$('.loading').remove();
				$(this).find("i").css('display', 'inline-block');
				setTimeout(function () {
					if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {
						$( '.product-info .variations_form' ).each( function() {
							$( this ).wc_variation_form().find('.variations select:eq(0)').change();
						});
					}
				}, 600);
			});
			e.preventDefault();
		});
	}
	quick_view();

	// menu landing courses
	var menu_landing = function () {
		var $window = jQuery(window);
		if (jQuery(".menu-scoll-landing").length) {
			var $scrollOffset = $("#landing-desc").length ? $("#landing-desc").offset().top : $("#main").offset().top ;

			$window.scroll(function () {
				if ($window.scrollTop() > $scrollOffset ) {
					$('.menu-scoll-landing').addClass('slideDown');
					$('#masthead').addClass('slideUp');
				} else {
					$('.menu-scoll-landing').removeClass('slideDown');
					$('#masthead').removeClass('slideUp');
				}
			});
			$('.tab-btns a[href*="#"]').on('click', function (event) {
				event.preventDefault();
				var t = $(this);
				$('html, body').animate({scrollTop: $(this.hash).offset().top - $('.menu-scoll-landing').height()}, 500, function () {
					$('.tab-btns li a').removeClass('active');
					t.addClass('active');
				});
			});
		}
	}

	var scrollTimer = false,
		scrollHandler = function () {
			var scrollPosition = parseInt(jQuery(window).scrollTop(), 10);
			jQuery('.tab-btns a[href*="#"]').each(function () {
				var thisHref = jQuery(this).attr('href'),
					tab = 	jQuery(thisHref);
				if (tab.length) {
					var thisTruePosition = parseInt( tab.offset().top, 10);
					if (jQuery("#wpadminbar").length) {
						var admin_height = jQuery("#wpadminbar").height();
					} else admin_height = 0;

					var thisPosition = thisTruePosition - (jQuery("#masthead").height() + admin_height);
					if (scrollPosition <= parseInt(jQuery(jQuery('.tab-btns a[href*="#"]').first().attr('href')).height(), 10)) {
						if (scrollPosition >= thisPosition) {
							jQuery('.tab-btns a[href^="#"]').removeClass('active');
							jQuery('.tab-btns a[href="' + thisHref + '"]').addClass('active');
						}
					} else {
						if (scrollPosition >= thisPosition || scrollPosition >= thisPosition) {
							jQuery('.tab-btns  a[href^="#"]').removeClass('active');
							jQuery('.tab-btns  a[href="' + thisHref + '"]').addClass('active');
						}
					}
				}
			});
		}

	window.clearTimeout(scrollTimer);
	scrollHandler();
	jQuery(window).scroll(function () {
		window.clearTimeout(scrollTimer);
		scrollTimer = window.setTimeout(function () {
			scrollHandler();
		}, 150);
	});

	$(function () {
		menu_landing();
		check_view_mod();
		listSwitcher();
		/* Back to top */
		back_to_top();
		/* Menu Sidebar */
		jQuery('.sliderbar-menu-controller').click(function (e) {
			e.stopPropagation();
			jQuery('.slider-sidebar').toggleClass('opened');
			jQuery('html,body').toggleClass('slider-bar-opened');
		});
		jQuery('#wrapper-container').click(function () {
			jQuery('.slider-sidebar').removeClass('opened');
			jQuery('html,body').removeClass('slider-bar-opened');
		});
		jQuery(document).keyup(function (e) {
			if (e.keyCode === 27) {
				jQuery('.slider-sidebar').removeClass('opened');
				jQuery('html,body').removeClass('slider-bar-opened');
			}
		});
		/* Blog */
		$(window).load(function () {
			post_audio();
			post_gallery();
		});

		$('.parallax_effect').each(function () {
			var $bgobj = $(this); // assigning the object
			$(window).scroll(function () {
				var yPos = -($(window).scrollTop() / 4);
				var coords = '50%' + (yPos + 0) + 'px';
				$bgobj.css({backgroundPosition: coords});
			}); // window scroll Ends
		});

		/* Waypoints magic
		 ---------------------------------------------------------- */
		if (typeof jQuery.fn.waypoint !== 'undefined') {
			jQuery('.wpb_animate_when_almost_visible:not(.wpb_start_animation)').waypoint(function () {
				jQuery(this).addClass('wpb_start_animation');
			}, {offset: '85%'});
		}
		// widget courses slider
		$(document).ready(function () {
			$(".courses-slider").each(function () {
				var $this = jQuery(this);
				var $column = $this.attr("data-column");
				var $show_page_nav = $this.attr("data-show-page-nav");
				var $show_nav = $this.attr("data-show-nav");
				if ($show_page_nav == '1') {
					$show_page_nav = true;
				} else {
					$show_page_nav = false;
				}
				if ($show_nav == '1') {
					$show_nav = true;
				} else {
					$show_nav = false;
				}
				$this.owlCarousel({
					items         : $column,
					pagination    : $show_page_nav,
					autoPlay      : false,
					navigation    : $show_nav,
					navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
				});
			});
		});
	});
	//menu mobile toggle
	jQuery(document).on('click', '.menu-mobile-effect', function (e) {
		e.stopPropagation();
		jQuery('.wrapper-container').toggleClass('mobile-menu-open');
	});

	jQuery(document).on('click', '.mobile-menu-open .content-pusher', function () {
		jQuery('.wrapper-container.mobile-menu-open').removeClass('mobile-menu-open');
	});

	function mobilecheck() {
		var check = false;
		(function (a) {
			if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	}

	if (mobilecheck()) {
		window.addEventListener('load', function () { // on page load
			var main_content = document.getElementById('main-content');
			if (main_content) {
				main_content.addEventListener("touchstart", function (e) {
					jQuery('.wrapper-container').removeClass('mobile-menu-open');
				});
			}
		}, false);
	};

	// perload
	jQuery(document).ready(function ($) {
		$(window).load(function () {
			$('#preload').delay(100).fadeOut(500, function () {
				$(this).remove();
			});
		});
	});
})(jQuery);