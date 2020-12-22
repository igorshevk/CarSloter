
(function($) {
    "use strict";

    /* ======= Preloader ======= */
	$('.preloader').delay(500).fadeOut(500);
			 
   /* ======= Progress bars ======= */
    $('.progress-bar > span').each(function() {
        var $this = $(this);
        var width = $(this).data('percent');
        $this.css({
            'transition': 'width 3s'
        });
        setTimeout(function() {
            $this.appear(function() {
                $this.css('width', width + '%');
            });
        }, 500);
    });
    /* ======= Counter FunFacts ======= */
    var timer = $('.timer');
    if (timer.length) {
        timer.appear(function() {
            timer.countTo();
        });
    }
    /* ======= Accordion Panels ======= */
	$('.accordion li').first().addClass('open');
	$('.accordion li .accordion-content').first().css('display','block').slideDown(400);
    $('.accordion-title a').on('click', function(event) {
        event.preventDefault();
        if ($(this).parents('li').hasClass('open')) {
            $(this).parents('li').removeClass('open').find('.accordion-content').slideUp(400);
        } else {
            $(this).parents('.accordion').find('.accordion-content').not($(this).parents('li').find('.accordion-content')).slideUp(400);
            $(this).parents('.accordion').find('> li').not($(this).parents('li')).removeClass('open');
            $(this).parents('li').addClass('open').find('.accordion-content').slideDown(400);
        }
    });

    /* ======= Accordion Style 2 ======= */
    $('#accordion').on('shown.bs.collapse', function() {
        var offset = $('.panel.panel-default > .panel-collapse.in').offset();

        if (offset) {
            $('html,body').animate({
                scrollTop: offset.top - $('.panel-title a').offset().top
            }, 500);
        }
    });

    /* ======= Jquery CheckBoxes ======= */
    $('.skin-minimal .list li input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
    });
    /* ======= Jquery Select Dropdowns ======= */
    $(".select").select2({
        width: '100%'
    });
	$(".ad-post-status").select2({
        width: '100%',
		theme: "classic"
    });
	$(".search-price-min").select2({
	  placeholder: "Select Pice : Min",
	  width: '100%'
	});
	$(".search-price-max").select2({
	  placeholder: "Select Pice : Max",
	  width: '100%'
	});
	$(".search-loaction").select2({
	  placeholder: "Select Location : Any location",
	  width: '100%'
	});
	$(".make").select2({
	  placeholder: "Select Make : Any make",
	  width: '100%'
	});
	$(".model").select2({
	  placeholder: "Select Model : Any model",
	  width: '100%'
	});
	$(".bodytype").select2({
	  placeholder: "Body Type : Select body type",
	  width: '100%'
	});
	$(".search-year").select2({
	  placeholder: "Select Year : Any Year",
	  allowClear: true,
	  width: '100%'
	});
  /* ======= Animation ======= */
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       false,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}
    /* ======= Profile Image Upload ======= */
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });
    $('.btn-file :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        if (input.length) {
            input.val(log);
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-upload').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readURL(this);
    });
    /* ======= Masonry Grid System ======= */
    $('.posts-masonry').imagesLoaded(function() {
        $('.posts-masonry').isotope({
            layoutMode: 'masonry',
            transitionDuration: '0.3s'
        });
    });
    /* ======= Featured Carousel 1 ======= */
    $('.featured-slider').owlCarousel({
		 items:4,
         loop:true,
		 nav: true,
		 dots: false,
		 responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            }
        }		
    });
	/* ======= Ad Carousel Single ======= */
    $('.featured-slider-single').owlCarousel({
         loop:true,
		 nav: true,
		 dots: false,
		 responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            }
        }		
    });
	/* ======= testimonial Carousel ======= */
		 $(".owl-testimonial-2").owlCarousel({
       	  autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
         dots: false,
		 responsiveClass: true,
        loop: true,
        items: 3,
       responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }		,
        stopOnHover: true
    });
		 /* ======= testimonial Carousel ======= */
		  $(".owl-testimonial-1").owlCarousel({
       	  autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
         dots: false,
		 responsiveClass: true,
        loop: true,
        items: 2,
       responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            }
        }		,
        stopOnHover: true
    });
    /* ======= Featured Carousel 2 ======= */
    $('.featured-slider-1').owlCarousel({
        margin:-10,
        dots: false,
		loop: true,
		nav: true,
        responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
        
    });
    /* ======= Background Image Rotator Carousel ======= */
    $('.background-rotator-slider').owlCarousel({
        loop: true,
        dots: false,
        margin: 0,
        autoplay: true,
        mouseDrag: true,
        touchDrag: true,
        autoplayTimeout: 5000,
        responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    });
	/* ======= Our CLients ======= */
	 $(".clients-list").owlCarousel({
		 loop: true,
		  nav: false,
		 dots: false,
         items: 5,
		  autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
		 responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 4,
            },
            1000: {
                items: 5,
            }
        }
   });
    /*==========  Single Page SLider With Thumb ==========*/
	 $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 160,
        itemMargin: 5,
        asNavFor: '#single-slider'
      });

      $('#single-slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
      
      });
	 /*==========  Price Range Slider  ==========*/
    $('#price-slider').noUiSlider({
        connect: true,
        behaviour: 'tap',
        margin: 5000,
        start: [20000, 100000],
        step: 2000,
        range: {
            'min': 0,
            'max': 150000
        }
    });
		$('#price-slider').Link('lower').to($('#price-min'), null, wNumb({
			decimals: 0
		}));
		$('#price-slider').Link('upper').to($('#price-max'), null, wNumb({
			decimals: 0
		}));
		 /*==========  Month Range Slider  ==========*/
		
		$('#month-slider').noUiSlider({
       start: 8,
    step: 1,
    connect: "lower",
        range: {
            'min': 0,
            'max': 12
        }
    });
		$('#month-slider').Link('lower').to($('#month-min'), null, wNumb({
			decimals: 0
		}));
		
  $('#year-slider .slider').on('change', function(){
		highlightLabel($(this).val());
	});
  
  $('#year-slider .slider').on('slide', function(){
    highlightLabel($(this).val());
  });
  
  $("#year-slider .slider-labels").on("click", "li", function() { 
    $('#year-slider .slider').val($(this).index());
    highlightLabel($(this).index());
  });
  
  function highlightLabel($this) {
    $('#year-slider .slider-labels li').removeClass('active');
    var index = parseInt($this,10) + 1;
    var selector = '#year-slider .slider-labels li:nth-child(' + index + ')';
    $(selector).addClass('active');
  }
		
		$('.primary-header-1 #menu-1').megaMenu({
        // DESKTOP MODE SETTINGS
        logo_align: 'left', // align the logo left or right. options (left) or (right)
        links_align: 'right', // align the links left or right. options (left) or (right)
        socialBar_align: 'left', // align the socialBar left or right. options (left) or (right)
        searchBar_align: 'right', // align the search bar left or right. options (left) or (right)
        trigger: 'hover', // show drop down using click or hover. options (hover) or (click)
        effect: 'expand-top', // drop down effects. options (fade), (scale), (expand-top), (expand-bottom), (expand-left), (expand-right)
        effect_speed: 400, // drop down show speed in milliseconds
        sibling: true, // hide the others showing drop downs if this option true. this option works on if the trigger option is "click". options (true) or (false)
        outside_click_close: true, // hide the showing drop downs when user click outside the menu. this option works if the trigger option is "click". options (true) or (false)
        top_fixed: false, // fixed the menu top of the screen. options (true) or (false)
        sticky_header: false, // menu fixed on top when scroll down down. options (true) or (false)
        sticky_header_height: 20, // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
        menu_position: 'horizontal', // change the menu position. options (horizontal), (vertical-left) or (vertical-right)
        full_width: false, // make menu full width. options (true) or (false)
        // MOBILE MODE SETTINGS
        mobile_settings: {
            collapse: true, // collapse the menu on click. options (true) or (false)
            sibling: true, // hide the others showing drop downs when click on current drop down. options (true) or (false)
            scrollBar: true, // enable the scroll bar. options (true) or (false)
            scrollBar_height: 400, // scroll bar height in px value. this option works if the scrollBar option true.
            top_fixed: false, // fixed menu top of the screen. options (true) or (false)
            sticky_header: false, // menu fixed on top when scroll down down. options (true) or (false)
            sticky_header_height: 200 // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
        }
    });
		
   /* ======= Template MegaMenu  ======= */
    $('#menu-1').megaMenu({
        // DESKTOP MODE SETTINGS
        logo_align: 'left', // align the logo left or right. options (left) or (right)
        links_align: 'left', // align the links left or right. options (left) or (right)
        socialBar_align: 'left', // align the socialBar left or right. options (left) or (right)
        searchBar_align: 'right', // align the search bar left or right. options (left) or (right)
        trigger: 'hover', // show drop down using click or hover. options (hover) or (click)
        effect: 'expand-top', // drop down effects. options (fade), (scale), (expand-top), (expand-bottom), (expand-left), (expand-right)
        effect_speed: 400, // drop down show speed in milliseconds
        sibling: true, // hide the others showing drop downs if this option true. this option works on if the trigger option is "click". options (true) or (false)
        outside_click_close: true, // hide the showing drop downs when user click outside the menu. this option works if the trigger option is "click". options (true) or (false)
        top_fixed: false, // fixed the menu top of the screen. options (true) or (false)
        sticky_header: false, // menu fixed on top when scroll down down. options (true) or (false)
        sticky_header_height: 20, // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
        menu_position: 'horizontal', // change the menu position. options (horizontal), (vertical-left) or (vertical-right)
        full_width: false, // make menu full width. options (true) or (false)
        // MOBILE MODE SETTINGS
        mobile_settings: {
            collapse: true, // collapse the menu on click. options (true) or (false)
            sibling: true, // hide the others showing drop downs when click on current drop down. options (true) or (false)
            scrollBar: true, // enable the scroll bar. options (true) or (false)
            scrollBar_height: 400, // scroll bar height in px value. this option works if the scrollBar option true.
            top_fixed: false, // fixed menu top of the screen. options (true) or (false)
            sticky_header: false, // menu fixed on top when scroll down down. options (true) or (false)
            sticky_header_height: 200 // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
        }
    });
   

    /*==========  Back To Top  ==========*/
    	var offset = 300,
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');
		//hide or show the "back to top" link
		$(window).scroll(function() {
			($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
			if ($(this).scrollTop() > offset_opacity) {
				$back_to_top.addClass('cd-fade-out');
			}
		});
    	//smooth scroll to top
		$back_to_top.on('click', function(event) {
	
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0,
			}, scroll_top_duration);
		});

    /*==========  Tooltip  ==========*/
    $('[data-toggle="tooltip"]').tooltip();

    /*==========  Quick Overview Modal  ==========*/
    $(".quick-view-modal").css("display", "block");
})(jQuery);