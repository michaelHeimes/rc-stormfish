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

// JS Cookie
//@prepros-prepend vendor/js.cookie.min.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
        gsap.registerPlugin(ScrollTrigger);
    }

    // Custom Functions
        
    _app.loading_screen = function() {
        const loadingScreen = document.getElementById('loading-screen');

        if( ! loadingScreen ) return;
                
        if( Cookies.get('skip-intro') == 'true' ) {
            gsap.to(loadingScreen, { 
                opacity: 0, 
                duration: 0.4
            });
            gsap.to(loadingScreen, { 
                display: 'none', 
                delay: .41,
            });
            return;
        }
    
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
            },
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
            "+=1.5"
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
            "-=1"
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

        topBar.classList.remove('.no-blur');
        
        // Cookies.set('skip-intro', 'true');
       
        if( ! document.body.classList.contains('logged-in') ) {
            Cookies.set('skip-intro', 'true');
        }
       
    }
    
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
                
                pauseFlicker();
                
            } else {
                resumeFlicker();
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
        
        // pixel animation
const paths = document.querySelectorAll('.menu-pixels-bg path');
        
        // Store references to animation instances
        const flickerAnimations = [];
        
        if (paths.length > 0) {
            const randomDuration = () => Math.random() * 0.9 + 0.1;
        
            paths.forEach(path => {
                const flicker = gsap.fromTo(
                    path,
                    { opacity: 0 },
                    {
                        opacity: 1,
                        duration: randomDuration(),
                        repeat: -1, // Infinite repeats
                        repeatDelay: randomDuration(),
                        onStart: () => {
                            path.style.visibility = 'visible'; // Ensure path is visible
                        },
                    }
                );
        
                // Add animation instance to the array for control
                flickerAnimations.push(flicker);
            });
        }
        
        // Function to pause all flicker animations
        function pauseFlicker() {
            flickerAnimations.forEach(animation => animation.pause());
        }
        
        // Function to resume all flicker animations
        function resumeFlicker() {
            flickerAnimations.forEach(animation => animation.resume());
        }
        pauseFlicker();
        
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
    
    _app.keyPersonnel = function() {
        const rows = document.querySelectorAll('.person-row');
        
        if(rows.length < 1) return;
        
        rows.forEach(row => {
           
           const pipe = row.querySelector('.pipe span');
           
           let tl = gsap.timeline({
               // yes, we can add it to an entire timeline!
               scrollTrigger: {
                   trigger: row,
                   start: "top bottom-=200", 
               }
           });
           
           tl.fromTo(
               row,
               {
                   y: "50",
                   opacity: 0,
               },
               {
                   y: "0",
                   opacity: 1,
                   duration: .8,
                   ease: "circ.out",
               }
           )
           .fromTo(
               pipe,
               { 
                   width: "0",
               },
               {
                   width: "100%",
                   duration: 1,
                   ease: "circ.out",
               },
               "-=0.05"
           );
            
        });
        
    }
    

    _app.testimonials_slider = function() {
        const testimonialModules = document.querySelectorAll('.testimonials.module');
        
        if( testimonialModules.length < 1 ) return;
        
        testimonialModules.forEach(module => {
        
            const slider = module.querySelector('.slider-testimonials');
    
            const prev = module.querySelector('.swiper-button-prev');
            const next = module.querySelector('.swiper-button-next');
            new Swiper(slider, {
                loop: true,
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
            });
            
            const mobilePipe = module.querySelector('.pipe.mobile span');
            const desktopPipe = module.querySelector('.pipe.desktop span');
                        
            let tl = gsap.timeline({
                // yes, we can add it to an entire timeline!
                scrollTrigger: {
                    trigger: slider,
                    start: "top bottom-=150", 
                }
            });
            
            tl.fromTo(
                mobilePipe,
                {
                    width: "0%",
                },
                {
                    width: "100%",
                    duration: 1,
                    ease: "power3.out",
                }
            )
            .fromTo(
                desktopPipe,
                {
                    height: "0%",
                },
                {
                    height: "100%",
                    duration: 1,
                    ease: "power3.out",
                }
            )
            .fromTo(
                slider,
                {
                    x: -30,
                    opacity: 0,
                },
                {
                    x: 0,
                    opacity: 1,
                    duration: .5,
                    ease: "circ.out",
                },
                "-=.8"
            )
            .fromTo(
                prev,
                {
                    x: -20,
                    opacity: 0,
                },
                {
                    x: 0,
                    opacity: 1,
                    duration: .5,
                    ease: "circ.out",
                },
                "-=.20"
            )
            .fromTo(
                next,
                {
                    x: -20,
                    opacity: 0,
                },
                {
                    x: 0,
                    opacity: 1,
                    duration: .5,
                    ease: "circ.out",
                },
                "-=.30"
            )
            ;
            
                
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
            
            const trigger = section.querySelector('.section-row');
            const pinDuration = section.offsetHeight;
        
        
            ScrollTrigger.create({
                trigger: trigger,
                start: "center center",
                end: `+=${pinDuration}`,
                pin: bgElement,
                //markers: true,
            });
            
            const sectionRows = section.querySelectorAll('.section-row');
            sectionRows.forEach(row => {
                
               const mobilePipe = row.querySelector('.pipe.mobile span');
               const desktopPipe = row.querySelector('.pipe.desktop span');
               const copy = row.querySelector('.copy-wrap');
                           
               let tl = gsap.timeline({
                   // yes, we can add it to an entire timeline!
                   scrollTrigger: {
                       trigger: row,
                       start: "top bottom-=200", 
                   }
               });
               
               tl.fromTo(
                   mobilePipe,
                   {
                       width: "0%",
                   },
                   {
                       width: "100%",
                       duration: 1,
                       ease: "power3.out",
                   }
               )
               .fromTo(
                   desktopPipe,
                   {
                       height: "0%",
                   },
                   {
                       height: "100%",
                       duration: 1,
                       ease: "power3.out",
                   }
               )
               .fromTo(
                   copy,
                   {
                       x: -30,
                       opacity: 0,
                   },
                   {
                       x: 0,
                       opacity: 1,
                       duration: .8,
                       ease: "circ.out",
                   },
                   "-=.8"
               )
               ; 
            });
            
        });

    }
    
    _app.parallax_scrolling = async function() {
        
        const parallaxSections = document.querySelectorAll('.parallax-section');
        
        if( parallaxSections.length < 1 ) return;
        
        parallaxSections.forEach((section) => {

            const parallax1s = section.querySelectorAll('.parallax-1');
            const parallax2s = section.querySelectorAll('.parallax-2');
            
            if ( parallax1s.length > 0 || parallax2s.length > 0 ) {
                
                const computedStyle = window.getComputedStyle(section);
                const topPadding = parseFloat(computedStyle.paddingTop);
                const bottomPadding = parseFloat(computedStyle.paddingBottom);
                
                const p1Offset = topPadding * 1;
                const p2Offset = bottomPadding  * .8;
                
                let parrallax1Start;
                let parallax1Direction;
                            
                if( window.innerWidth < 900 ) {
                    parrallax1Start = p1Offset;
                    parallax1Direction = -p1Offset;
                } else {
                    parrallax1Start = -p1Offset;
                    parallax1Direction = p1Offset;
                }
                            
                parallax1s.forEach((parallax1) => {
                    if (parallax1) {
                        
                        gsap.set(parallax1, {y:parrallax1Start});
                        
                        gsap.to(parallax1, {
                            y: parallax1Direction,
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
                });
                
                parallax2s.forEach((parallax2) => {
                    if (parallax2) {
                        
                        gsap.set(parallax2, {y: p2Offset});
                        
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
                });
            }
        });
    }
    
    _app.contact_hero = function() {
        const contactHeros = document.querySelectorAll('.contact-hero');
        
        if( contactHeros.length < 1 ) return;
                
        contactHeros.forEach((hero) => {
            const img = hero.querySelector('img.img-fill');
            
            if( hero.classList.contains('first-section') ) {
                if(img) {
                    gsap.to(img, {
                        scale: 1.5,
                        duration: 3,
                        delay: .75,
                        ease: "power2.inOut",
                        scrollTrigger: {
                            trigger: hero,
                            start: 'top bottom',
                            end: 'bottom top',
                        },
                    });
                }  
            } else {
                if(img) {
                    gsap.to(img, {
                        scale: 1.5,
                        ease: "power2.inOut",
                        scrollTrigger: {
                            trigger: hero,
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 5,
                        },
                    });
                }  
            }
            
          
        });
    }
    
    _app.cascading_pixels = function() {
        const pixelGraphics = document.querySelectorAll('.pixels-graphic');
        
        if( pixelGraphics.length < 1 ) return;
        
        pixelGraphics.forEach((graphic) => {
            const trigger = graphic.parentElement.parentElement;
            const pixelRows = graphic.querySelectorAll('.row');
            const triggerWidth = trigger.offsetWidth;
            
            if( !graphic ) return;
        
            // Create a master timeline for all rows in the graphic
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: trigger,
                    start: "top bottom-=200",
                },
            });
        
            pixelRows.forEach((row, index) => {
                tl.fromTo(
                    row,
                    {
                        x: `-${triggerWidth}px`,
                        opacity: 0,
                    },
                    {
                        x: "0",
                        opacity: 1,
                        duration: index * 0.025,
                        ease: "circ.out",
                    },
                    index * 0.03,
                );
            });
            
        });
    };
    
    _app.fade_in = function() {
        const fadeIns = document.querySelectorAll('.fade-in-top-center');
        
        if(  fadeIns.length < 1 ) return;
        
        fadeIns.forEach( fadeIn => {
            
            gsap.to(fadeIn, {
                    opacity: 1,
                    duration: 1,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: fadeIn,
                        start: "top center",
                        ease: "power2.inOut",
                    },
                },
    
            );
            
        });
        
    }
    
    _app.fade_in_left = function() {
        const fadeInLefts = document.querySelectorAll('.fade-in-left');
        
        if(  fadeInLefts.length < 1 ) return;
        
        fadeInLefts.forEach( fadeInLeft => {
            
            gsap.to(fadeInLeft, {
                    x: 0,
                    opacity: 1,
                    duration: 1,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: fadeInLeft,
                        start: "top bottom-=200",
                        ease: "power2.inOut",
                    },
                },

            );
            
        });
        
    }
    
    _app.stagger_fade_in_left = function() {
        const staggerFadeInLefts = document.querySelectorAll('.stagger-fade-left');
        
        if(  staggerFadeInLefts.length < 1 ) return;
        
        staggerFadeInLefts.forEach( staggerFadeInLeft => {
            
            const trigger = staggerFadeInLeft;
            const items = staggerFadeInLeft.querySelectorAll('.stagger-item');
            
            gsap.to(items, {
                    x: 0,
                    opacity: 1,
                    duration: 1,
                    ease: "power3.out",
                    stagger: {
                        each: 0.2,
                        overlap: 0.15,
                    },
                    scrollTrigger: {
                        trigger: trigger,
                        start: "top bottom-=200",
                        ease: "power2.inOut",
                    },
                },
            );

        });
        
    }

            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        
        // Custom Functions
        _app.loading_screen();
        _app.mobile_takover_nav();
        _app.eyebrows();
        _app.testimonials_slider();
        _app.orange_text_flyby();
        _app.keyPersonnel();
        _app.heading_text_sticky_bg();
        _app.parallax_scrolling();
        _app.contact_hero();
        _app.playLoopingVidInView();
        _app.cascading_pixels();
        _app.fade_in();
        _app.fade_in_left();
        _app.stagger_fade_in_left();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
        document.body.classList.add('js-loaded');
    });
	
	
})(jQuery);