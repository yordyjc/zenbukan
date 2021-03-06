jQuery(document).ready(function ($) {

	"use strict";

	function initparallax() {
		var a = {
			Android: function Android() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function BlackBerry() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function iOS() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function Opera() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function Windows() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any: function any() {
				return a.Android() || a.BlackBerry() || a.iOS() || a.Opera() || a.Windows();
			}
		};
		var trueMobile = a.any();
		if (null == trueMobile) {
			var b = new Scrollax();
			b.reload();
			b.init();
		}
	}

	initparallax();

	function callParallax(e) {
		parallaxIt(e, '.xs-clips, .xs-before-text, .xs-after-text', -100);

	}

	function parallaxIt(e, target, movement) {
		var $this = $('.container');
		var relX = e.pageX - $this.offset().left;
		var relY = e.pageY - $this.offset().top;

		TweenMax.to(target, 1, {
			x: (relX - $this.width() / 2) / $this.width() * movement,
			y: (relY - $this.height() / 2) / $this.height() * movement,
			ease: Power2.easeOut
		})
	}

	function animateProgressBar() {
		$("[data-xs-skill]").each(function (index, el) {
			var $this = $(el);
			var wid = $this.data("xs-skill");
			$this.find('.progress-bar').animate({ width: wid + "%" }, wid * 20);
		});
	}

	/*==========================================================
		1. Video popup
	============================================================*/
	if ($('.xs-video-btn').length > 0) {
		$('.xs-video-btn').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
	}

	/*==========================================================
		2. IMC form label animation
	============================================================*/
	if ($('.xs-form').length > 0) {
		$('.xs-form .form-control').on('focus', function (e) {
			$(this).parent('.xs-form-anim').addClass('active');
		});
		$('.xs-form .form-control').on('blur', function (e) {
			var $this = $(this);

			if ('' == $this.val()) {
				$this.parent('.xs-form-anim').removeClass('active');
			}
		});
	}

	/*==========================================================
		3. Owl Carousels
	============================================================*/
	// Slider Carousel
	if ($('.xs-slider-light-owl').length > 0) {
		$('.xs-slider-light-owl').owlCarousel({
			margin: 80,
			loop: true,
			nav: false,
			dots: false,
			// autoplay: true,
			responsive: {
				0: {
					items: 1
				},
			}
		});
	}

	// Testimonial
	if ($('.xs-testimonial-owl').length > 0) {
		$('.xs-testimonial-owl').owlCarousel({
			margin: 10,
			loop: true,
			nav: false,
			autoplay: true,
			responsive: {
				0: {
					items: 1
				}
			}
		});
	}

	// Testimonial Grid
	if ($('.xs-testimonial-grid').length > 0) {
		$('.xs-testimonial-grid').owlCarousel({
			loop: false,
			nav: false,
			margin: 30,
			stagePadding: 30,
			autoplay: true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 3
				},
			}
		});
	}

	// Team Carousel
	if ($('.xs-team-carousel').length > 0) {
		$('.xs-team-carousel').owlCarousel({
			margin: 30,
			loop: true,
			nav: true,
			dots: false,
			stagePadding: 15,
			autoplay: true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 3
				}
			}
		});
	}

	// Service Info Carousel
	if ($('.xs-service-info').length > 0) {
		$('.xs-service-info').owlCarousel({
			loop: true,
			nav: false,
			autoplay: true,
			dots: false,
			responsiveClass:true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 4
				}
			}
		});
	}

	// Brand Carousel
	if ($('.xs-brand-owl').length > 0) {
		$('.xs-brand-owl').owlCarousel({
			margin: 60,
			loop: true,
			nav: false,
			dots: false,
			autoplay: true,
			responsive: {
				0: {
					items: 2
				},
				768: {
					items: 3
				},
				992: {
					items: 4
				},
				1200: {
					items: 5
				}
			}
		});
	}

	/*==========================================================
		5. Health Comparison
	============================================================*/
	if ($('.xs-image-comparison').length > 0) {
		$('.xs-image-comparison').twentytwenty({
			no_overlay: true,
			move_slider_on_hover: false,
			move_with_handle_only: true,
			click_to_move: false,
		});
	}

	/*==========================================================
		6. Clips Animation
	============================================================*/
	if ($('.xs-clips, .xs-before-text, .xs-after-text').length > 0) {
		var timeout;

		$('.container').mousemove(function (e) {
			if (timeout) clearTimeout(timeout);
			setTimeout(callParallax.bind(null, e), 200);
		});
	}

	/*==========================================================
		7. Skill Animation
	============================================================*/
	if ($("[data-xs-skill]").length > 0) {
		var waypoint = new Waypoint({
			element: document.getElementsByClassName('progress-bar'),
			handler: function handler(direction) {
				animateProgressBar();
				this.destroy();
			},
			offset: '50%'
		});
	}

	/*=============================================================
		8. Modal Popup
	=========================================================================*/
	if ($('.xs-modal-popup').length > 0) {
		$('.xs-modal-popup').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: false,
			callbacks: {
				beforeOpen: function () {
					this.st.mainClass = "my-mfp-slide-bottom xs-promo-popup";
				}
			}
		});
	}

	/*==========================================================
		9. Google Maps
	============================================================*/
	if ($('#xs-map').length > 0) {
		var init = function init() {
			// Basic options for a simple Google Map
			var mapOptions = {
				// How zoomed in you want the map to start at (always required)
				zoom: 17,

				// The latitude and longitude to center the map (always required)
				center: new google.maps.LatLng(-18.003006, -70.243668),

				// How you would like to style the map.
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#FAEDB8" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#FAEDB8" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#9CC1AD" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }]
			};

			// Get the HTML DOM element that will contain your map
			// We are using a div with id="map" seen below in the <body>
			var mapElement = document.getElementById('xs-map');

			// Create the Google Map using our element and options defined above
			var map = new google.maps.Map(mapElement, mapOptions);

			var mapPin = 'resources/img/pin-fitness.png';

			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(-18.003006, -70.243668),
				icon: mapPin,
				map: map,
				title: 'Fitness 10'
			});
		};

		// When the window has finished loading create our google map below
		google.maps.event.addDomListener(window, 'load', init);
	}

	if ($(window).width() > 991) {

		$('.parallaxie').parallaxie();

		$(window).on('scroll', function () {

			if ($(window).scrollTop() > 250) {
			   $('.xs-onepage-header').addClass('sticky fadeInDown animated');
			} else {
			   $('.xs-onepage-header').removeClass('sticky fadeInDown animated');
			}
		 });

	 }




	 $( '.elementskit-navbar, .mobile-nav, .cta' ).find( 'a[href*="#"]:not([href="#"])' ).on('click', function () {
        if ( location.pathname.replace( /^\//, '' ) == this.pathname.replace( /^\//, '' ) && location.hostname == this.hostname ) {
            var target = $( this.hash );
            target = target.length ? target : $( '[name=' + this.hash.slice( 1 ) + ']' );
            if ( target.length ) {
                $( 'html,body' ).animate( {
                    scrollTop: ( target.offset().top - 30 )
                }, 1000 );
                if ( $( '.navbar-toggle' ).css( 'display' ) != 'none' ) {
                    $( this ).parents( '.container' ).find( ".navbar-toggle" ).trigger( "click" );
                }
                return false;
            }
        }
    } );



}); // end ready function
