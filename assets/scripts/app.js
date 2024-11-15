/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordian
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@*prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@*prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// GSAP
//@prepros-prepend vendor/gsap/gsap.min.js
//@prepros-prepend vendor/gsap/ScrollTrigger.min.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
        gsap.registerPlugin(ScrollTrigger);
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        const menuToggle = document.getElementById('menu-toggle');
        const offCanvas = document.getElementById('off-canvas');
        const offCanvasInner = offCanvas.querySelector('.inner');
        
        menuToggle.addEventListener('click', function(event) {
            event.preventDefault();
            if( document.body.classList.contains('js-nav-shown') ) {
                document.body.classList.remove('js-nav-shown');
                this.setAttribute('aria-expanded', 'false');
                offCanvas.setAttribute('aria-hidden', 'true');
                
                gsap.to(
                    offCanvasInner,{ 
                        opacity: 0, 
                        duration: 0.2,
                        delay: 0, 
                    }
                );
                
                gsap.to(offCanvas, {
                    bottom: 'calc(100% - 112px)',
                    duration: .5,
                    delay: 0,
                    ease: 'circ.in'
                });
                
            } else {
                
                document.body.classList.add('js-nav-shown');
                this.setAttribute('aria-expanded', 'true');
                offCanvas.setAttribute('aria-hidden', 'false');

                gsap.to(offCanvas, {
                    bottom: '29px',
                    duration: .5,
                    ease: 'circ.in'
                });
            
                gsap.to(
                    offCanvasInner,
                    {
                        opacity: 1, 
                        duration: 0.2, 
                        delay: 0.65 
                    }
                );
                
            }
        });
        
    }
    
    _app.testimonials_slider = function() {
        const testimonialsSliders = document.querySelectorAll('.testimonials.module .slider-testimonials');
        
        testimonialsSliders.forEach(function(slider) {
            const prev = slider.parentElement.parentElement.querySelector('.swiper-button-prev');
            const next = slider.parentElement.parentElement.querySelector('.swiper-button-next');
            new Swiper(slider, {
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
            });
        });
        

    }
    
    _app.heading_text_sticky_bg = function() {

        const sections = document.querySelectorAll('.heading-left-copy-right-over-fixed-background-image');

        function adjustBgHeight() {
          sections.forEach((section) => {
            const bgElement = section.querySelector('.bg');
            if (!bgElement) return; // Skip if no `.bg` element
        
            // Find all `.section-row` elements in the section and determine the tallest one
            const sectionRows = Array.from(section.querySelectorAll('.section-row'));
            const tallestRowHeight = Math.max(...sectionRows.map(row => row.offsetHeight));
        
            // Set the `.bg` height to the tallest `.section-row` height
            bgElement.style.height = `${tallestRowHeight}px`;
          });
        }
        adjustBgHeight();
        window.addEventListener('resize', adjustBgHeight);
    
        sections.forEach((section, index) => {
            const bgElement = section.querySelector('.bg');
            if (!bgElement) return;
        
            const pinDuration = section.offsetHeight;
        
        
            ScrollTrigger.create({
                trigger: section,
                start: "center center",
                end: `+=${pinDuration}`,
                pin: bgElement,
                //markers: true,
            });
        });

    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.fixed_nav_hack();
        // _app.display_on_load();
        
        // Custom Functions
        _app.mobile_takover_nav();
        _app.testimonials_slider();
        _app.heading_text_sticky_bg();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);