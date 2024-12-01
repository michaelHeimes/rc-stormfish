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
    
    _app.orange_text_flyby = function() {
        const orangeTextFlybys = document.querySelectorAll('.orange-text-with-flyby-animation');
        
        if( orangeTextFlybys.length < 1 ) return;
        
        orangeTextFlybys.forEach(orangeTextFlyby => {
            const text =  orangeTextFlyby.querySelectorAll('a,p,ul,h1,h2,h3,h4,h5,h6');
            const screenWidth = window.innerWidth;
            const fishDuration = screenWidth * .0025;
            const fish = orangeTextFlyby.querySelector('.fish-wrap');
            const colorOverlap = "'-=" + (fishDuration * .25);
  
            let tl = gsap.timeline({
                // yes, we can add it to an entire timeline!
                scrollTrigger: {
                    trigger: orangeTextFlyby,
                    start: "top 90%", 
                }
            });
           
            tl.fromTo(
                fish,
                {
                    x: "-75%",
                    scale: 0.8,
                },
                {
                    x: "300%",
                    scale: 3,
                    duration: fishDuration,
                    ease: "power4.in",
                }
            )
            .to(
                text,
                { 
                    color: '#fff',
                    duration: .5,
                    ease: "power2.in",
                },
                colorOverlap
            )
            ;
           
        });
        
    }
    
    _app.loading_screen = function() {
        const loadingScreen = document.getElementById('loading-screen');

        if( ! loadingScreen ) return;
    
        const screenWidth = window.innerWidth;
        const fishDuration = screenWidth * .0025;
        const blurOverlap = fishDuration * .5;
        const fish = loadingScreen.querySelector('.fish-wrap');
        const headline = loadingScreen.querySelector('.h1');
        const firstSection = document.querySelector('main section');
        const allSections = document.querySelectorAll('main section');
        const notFirstSections = Array.from(allSections).filter(section => section !== firstSection);
        const firstSectionContent = firstSection.querySelector('div');
        const header = document.getElementById('header-wrap');
        const topBar = header.querySelector('.top-bar');
        const body = document.querySelector('body');
        body.style.overflow = 'hidden';
        
        const tl = gsap.timeline();
        
        topBar.classList.add('no-blur');
        
        tl.fromTo(
            fish,
            {
                x: "-100%",
                scale: 0.8,
            },
            {
                x: "300%",
                scale: 3,
                duration: fishDuration,
                ease: "expo.in",
            }
        );
        
        tl.fromTo(
            headline,
            { opacity: 0 },
            {
                opacity: 1,
                duration: 0.4,
                ease: "power1.out",
            }
        )
        .fromTo(
            headline,
            { filter: "blur(10px)" },
            {
                filter: "blur(0px)",
                duration: 0.4,
                ease: "back.out(1.7)",
            },
            "-=0.25"
        )
        .to(
            headline,
            { 
                filter: "blur(10px)", 
                duration: 0.3,
                ease: "power1.out", 
            },
            "+=3"
        )
        .to(
            headline,
            { 
                opacity: 0, 
                duration: 0.3,
                ease: "power1.out", 
            },
            
        )
        .fromTo(
            loadingScreen,
            { opacity: 1 },
            {
                opacity: 0,
                duration: 0.3,
                ease: "power1.out",
            },
        )
        .to(
            loadingScreen,
            { display: 'none' },
        )
        .fromTo(
            firstSection,
            { 
                y: "-50%",
                opacity: 0 
            },
            {
                y: "0%",
                opacity: 1,
                duration: 1,
                ease: "power1.out",
            },
            "-=.75"
        )
        .fromTo(
            firstSectionContent,
            { 
                x: -100,
                opacity: 0 
            },
            {
                x: 0,
                opacity: 1,
                duration: .7,
                ease: "power4.out",
            },
            "-=.2"
        )
        .fromTo(
            header,
            { 
                y: -30,
                opacity: 0 
            },
            {
                y: 0,
                opacity: 1,
                duration: .5,
                ease: "power1.out",
            },
            "-=.30"
        )
        .to(
            topBar,
            { 
                backdropFilter: "blur(4px)",
                duration: .5,
                ease: "power4.out",
            },
            "-=.7"
        )
        .fromTo(
           notFirstSections,
            { opacity: 0 },
            {
                opacity: 1,
                duration: .7,
                ease: "power4.out",
            },
            "-=.30"
        )
        .to(
            body,
            { overflow: 'auto' },
        );
       
    }
    
    _app.mobile_takover_nav = function() {
        const menuToggle = document.getElementById('menu-toggle');
        const offCanvas = document.getElementById('off-canvas');
        if (!menuToggle || !offCanvas) return;
        const offCanvasInner = offCanvas.querySelector('.inner');
        
        const navToggle = function() {
            if (document.body.classList.contains('js-nav-shown')) {
                document.body.classList.remove('js-nav-shown');
                menuToggle.setAttribute('aria-expanded', 'false');
                offCanvas.setAttribute('aria-hidden', 'true');
                
                gsap.to(offCanvasInner, { opacity: 0, duration: 0.2 });
                gsap.to(offCanvas, { bottom: 'calc(100% - 83px)', duration: 0.5, ease: 'circ.in' });
                
            } else {
                document.body.classList.add('js-nav-shown');
                menuToggle.setAttribute('aria-expanded', 'true');
                offCanvas.setAttribute('aria-hidden', 'false');
                
                gsap.to(offCanvas, { bottom: 'calc(-100vh + 140px)', duration: 0.5, ease: 'circ.in' });
                gsap.to(offCanvasInner, { opacity: 1, duration: 0.2, delay: 0.65 });
            }
        };
        
        // Add event listeners
        menuToggle.addEventListener('click', function(event) {
            event.preventDefault();
            navToggle();
        });
        menuToggle.addEventListener('keydown', function(event) {
            if (event.keyCode === 13) { // Enter key
                event.preventDefault();
                navToggle();
            }
        });
    };
    
    _app.playLoopingVidInView = async function() {
        const videos = document.querySelectorAll('.play-in-view');
        
        if(videos.length < 1) { return; };
        
        gsap.registerPlugin(ScrollTrigger) 
        
        videos.forEach(video => {
            // Create a ScrollTrigger for each video
            ScrollTrigger.create({
                trigger: video,
                start: "top 100%", 
                end: "bottom 0%",
                onEnter: () => {
                    // console.log('Playing video:', video);
                    video.play();
                },
                onLeave: () => video.pause(),
                onEnterBack: () => video.play(),
                onLeaveBack: () => video.pause()
            });
        });
      
    }
    
    _app.eyebrows = function() {
        const eyebrows = document.querySelectorAll('.eyebrow');
        
        eyebrows.forEach(eyebrow => {
            
            const pipe = eyebrow.querySelector('span');
            
            let tl = gsap.timeline({
                // yes, we can add it to an entire timeline!
                scrollTrigger: {
                    trigger: eyebrow,
                    start: "top bottom-=200", 
                }
            });
            
            tl.fromTo(
                eyebrow,
                {
                    y: "30",
                    opacity: 0,
                },
                {
                    y: "0",
                    opacity: 1,
                    duration: .8,
                    ease: "power2.out",
                }
            )
            .fromTo(
                pipe,
                { 
                    maxWidth: "0",
                },
                {
                    maxWidth: 100,
                    duration: 1,
                    ease: "circ.out",
                },
                "-=0.05"
            );
            
        });
        
    }
    
    _app.testimonials_slider = function() {
        const testimonialsSliders = document.querySelectorAll('.testimonials.module .slider-testimonials');
        
        testimonialsSliders.forEach((slider) => {
            
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
                if (!bgElement) return;
            
                const sectionRows = Array.from(section.querySelectorAll('.section-row'));
                const tallestRowHeight = Math.max(...sectionRows.map(row => row.offsetHeight));
            
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
    
    _app.parallax_scrolling = function() {
        
        const parallaxSections = document.querySelectorAll('.parallax-section');
        
        if( parallaxSections.length < 1 ) return;
        
        parallaxSections.forEach((section) => {

          const parallax1 = section.querySelector('.parallax-1');
          const parallax2 = section.querySelector('.parallax-2');
        
          if (parallax1 || parallax2) {
              
            const computedStyle = window.getComputedStyle(section);
            const topPadding = parseFloat(computedStyle.paddingTop);
            const bottomPadding = parseFloat(computedStyle.paddingBottom);
            
            const p1Offset = topPadding * 1;
            const p2Offset = bottomPadding  * .8;
                        
            if (parallax1) {
                gsap.to(parallax1, {
                    y: p1Offset,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1,
                        ease: "power2.inOut",
                    },
                });
            }
            
            if (parallax2) {
                gsap.to(parallax2, {
                    y: -p2Offset,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1,
                        ease: "power2.inOut",
                    },
                });
            }
          }
        });
    }
    
    _app.contact_hero = function() {
        const contactHeros = document.querySelectorAll('.contact-hero');
        
        if( contactHeros.length < 1 ) return;
        
        contactHeros.forEach((hero) => {
            const img = hero.querySelector('img.img-fill');
            
            if(img) {
                gsap.to(img, {
                    scale: 1.5,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: hero,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 5,
                        ease: "power2.inOut",
                    },
                });
            }
            
        });
        
    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        // _app.fixed_nav_hack();
        // _app.display_on_load();
        
        // Custom Functions
        _app.loading_screen();
        _app.mobile_takover_nav();
        _app.eyebrows();
        _app.testimonials_slider();
        _app.playLoopingVidInView();
        _app.orange_text_flyby();
        _app.heading_text_sticky_bg();
        _app.parallax_scrolling();
        _app.contact_hero();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
        document.body.classList.add('js-loaded');
    });
	
	
})(jQuery);