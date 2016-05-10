/* global jQuery, cbScripts, cookie, 5.0.2 */
(function($) { "use strict";
    var cbMobileTablet = !!( ( navigator.userAgent.match(/Android/i) === true ) || ( navigator.userAgent.match(/BlackBerry/i) === true ) || ( navigator.userAgent.match(/iPhone|iPod|iPad|iWatch/i) ) || ( navigator.userAgent.match(/Motorola|DROIDX/i) ) || ( navigator.userAgent.match(/Linux/i) ) || ( navigator.userAgent.match(/IEMobile/i) === true ) ),
    cbMobilePhone = !!( (navigator.userAgent.match(/IEMobile/i) === true ) || ( navigator.userAgent.match(/Android/i) === true ) || ( navigator.userAgent.match(/BlackBerry/i) === true ) || ( navigator.userAgent.match(/iPhone|iPod/i) ) || ( navigator.userAgent.match(/Motorola|DROIDX/i) ) || ( navigator.userAgent.match(/Linux/i) ) ),
    cbBody = $('body'),
    cbWindow = $(window),
    cbDoc = $(document),
    cbWindowWidth = cbWindow.width(),
    cbWindowHeight = cbWindow.height() + 1,
    cbContainer = $('#cb-container'),
    cbContent = $('#cb-content'),
    cbNavBar = $('#cb-nav-bar'),
    cbMain = $('#main'),
    cbAdminBar = false,
    cbBGOverlay = $('#cb-overlay'),
    cbStickySB = cbContainer.find('.cb-sticky-sidebar'),
    cbStickySBEL = cbStickySB.find('.cb-sidebar'),
    cbStickySBELPT = cbStickySBEL.css('padding-top'),
    cbWindowScrollTop,
    cbWindowScrollTopCache = 0,
    cbTimer = 0,
    cbStickyBotCache = 0,
    cbStickyTopCache = 0,
    cbInfiniteScroll = $('#cb-blog-infinite-scroll'),
    cbCheckerI = false,
    cbFooterEl = $('#cb-footer'),
    cbStickyHeightCache,
    cbLoad = false,
    cbReady = true,
    cbSlider1Post = $('.cb-slider-b'),
    cbStickyTopVal,
    cbMenuHeight,
    cbNavBarDiv = cbNavBar.find(' > div'),
    cbNavBarFirstLI = cbNavBarDiv.find(' > ul li').first(),
    cbMSearchTrig = $('#cb-s-trigger'),
    cbMSearchTrigSM = $('#cb-s-trigger-sm'),
    cbLWA = $('#cb-lwa'),
    cbLWATrigger = $('#cb-lwa-trigger'),
    cbLWARTriggerSM = $('#cb-lwa-trigger-sm'),
    cbLWARTrigger = $('#cb-lwa-r-trigger'),
    cbLWAForms = cbLWA.find('.lwa-form'),
    cbLWAinputuser = cbLWAForms.find('.cb-form-input-username'),
    cbBodyRTL = false,
    cbcloser = $('.cb-close-m').add(cbBGOverlay),
    cbMSearch = $('#cb-search-modal'),
    cbMSearchI = cbMSearch.find('input'),
    cbMenuItemWrap = $('#cb-icons-wrap'),
    cbReviewCont = $('#cb-review-container'),
    cbRatingBars = cbReviewCont.find('.cb-overlay span'),
    cbRatingStars = cbReviewCont.find('.cb-overlay-stars span'),
    cbMenuOffset,
    cbOverlaySpan,
    cbTMS = $('#cb-top-menu'),
    cbTMSWrap = cbTMS.find('.cb-top-menu-wrap'),
    cbVote = $('#cb-vote'),
    cbFeaturedMain = $('#cb-full-background-featured'),
    cbParallaxMain = $('#cb-parallax-featured'),
    cbParallaxImg = cbParallaxMain.find('.cb-image'),
    cbParallaxBG = $('#cb-parallax-bg'),
    cbMobOp = $('#cb-mob-open'),
    cbMobCl = $('#cb-mob-close'),
    cbWindowHeightTwo,
    cbFlexFW = $('.flexslider-1-fw'),
    cbFlexSW = $('.flexslider-1'),
    cbToTop = $('#cb-to-top'),
    cbNonce,
    cbFlag = false,
    cbNavLogo = $('#cb-nav-logo'),
    cbcloser = $('.cb-close-m').add(cbBGOverlay);

    if ( cbBody.hasClass('rtl') ) { cbBodyRTL = true; }
        
    if ( cbNavBar.length ) {
        if  ( cbWindowWidth > 767 ) {
            cbMenuHeight = cbNavBarDiv.outerHeight();
        }

        cbNavBar.css( 'height', cbMenuHeight );
        cbMenuItemWrap.add(cbNavLogo).css( 'height', cbNavBarFirstLI.outerHeight() );
    }

    if ( cbBody.hasClass('admin-bar') ) { cbAdminBar = true; }

    cbSlider1Post.each( function() {
        var cbThis = $(this);

        if ( cbThis.hasClass('cb-module-fw') || cbThis.hasClass('cb-full-slider' ) ) {
            cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 2.3076923 ) );
        } else if ( cbThis.hasClass('cb-slider-widget') ) {
            cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 1.5925925 ) );
        } else {
            cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 1.876923 ) );
        }
        
    });

    cbMobOp.click( function(e) {

        e.preventDefault();
        cbBody.addClass('cb-mob-op');

    });

    cbMobCl.click( function(e) {

        e.preventDefault();
        cbBody.removeClass('cb-mob-op');

    });

    cbLWATrigger.click( function( e ) {
        e.preventDefault();
        cbBody.addClass('cb-lwa-modal-on');
        if ( cbMobileTablet === false ) {
            cbLWAinputuser.focus();
        }
        
    });

    cbLWARTrigger.click( function( e ) {
        e.preventDefault();
        cbBody.addClass('cb-lwa-r-modal-on');        
    });

    cbLWARTriggerSM.click( function( e ) {
        e.preventDefault();
        cbBody.addClass('cb-lwa-modal-on');
        if ( cbMobileTablet === false ) {
            cbLWAinputuser.focus();
        }
        
    });

    cbcloser.click( function() {
        cbBody.removeClass('cb-lwa-modal-on cb-lwa-r-modal-on cb-s-modal-on cb-m-modal-on cb-m-em-modal-on');
        cbPauseYTVideo();
    });

     cbDoc.keyup(function(e) {

        if (e.keyCode == 27) { 
            cbBody.removeClass('cb-lwa-modal-on cb-lwa-r-modal-on cb-s-modal-on cb-m-modal-on cb-m-em-modal-on');
            cbPauseYTVideo();
        }   
    });

    cbMSearchTrig.click( function( e ) {
        e.preventDefault();
       
        cbBody.addClass('cb-s-modal-on');
        if ( cbMobileTablet === false ) {
            cbMSearchI.focus();
        }
    });

    cbMSearchTrigSM.click( function( e ) {
        e.preventDefault();
       
        cbBody.addClass('cb-s-modal-on');
        if ( cbMobileTablet === false ) {
            cbMSearchI.focus();
        }
    });

    function cbOnScroll() {

        if ( cbAdminBar === true ) {
            if ( cbWindowWidth > 781 ) {
                cbWindowScrollTop = cbWindow.scrollTop() + 32;
            } else {
                cbWindowScrollTop = cbWindow.scrollTop() + 46;
            }
        } else {
            cbWindowScrollTop = cbWindow.scrollTop();
        }

        cbChecker();

    }

    function cbChecker() {
        
        if ( ! cbCheckerI ) {
            requestAnimationFrame(cbScrolls);
            cbCheckerI = true;
        }
    }

    function cbFixdSidebarLoad() {

        if ( cbLoad === false ) {
            cbScrolls();
            cbScrolls();
            cbLoad = true;
        }
    }

    function cbScrolls() {

        if ( cbBody.hasClass( 'cb-sticky-mm' ) ) {

            if ( ! cbBody.hasClass('cb-sticky-menu-up') ) {
                if ( cbWindowScrollTop >= cbMenuOffset ) {

                    cbBody.addClass('cb-stuck');

                } else {
                    cbBody.removeClass('cb-stuck');
                }
            } else {

                if ( ( cbWindowScrollTop >= cbMenuOffset ) && ( cbWindowScrollTopCache > cbWindowScrollTop ) ) {

                    cbBody.addClass('cb-stuck');

                } else {
                    cbBody.removeClass('cb-stuck');
                }

                if ( cbWindowScrollTop >= ( cbMenuOffset + cbMenuHeight + 80 ) ) {

                    cbBody.addClass('cb-stuck-hid');

                } else {
                    cbBody.removeClass('cb-stuck-hid');
                }

                cbWindowScrollTopCache = cbWindowScrollTop;
            }
            
        }

        if ( ( cbWindowWidth > 767 ) && ( cbMobileTablet === false ) ) {
            if ( cbStickySB.length ) {

                var cbStickyLoc = cbStickySB.offset().top,
                    cbStickyHeight = cbStickySBEL.outerHeight(true),
                    cbFooterElTop = cbFooterEl.offset().top,
                    cbStickyBot = cbStickyLoc + cbStickyHeight,
                    cbCurScroll = cbWindowHeight + cbWindowScrollTop,
                    cbOuterContent = $('#cb-outer-container').css('margin-top'),
                    cbOuterContentValue = 0;

                    if ( cbAdminBar === true ) {
                        cbCurScroll = cbCurScroll - 32;
                    }
                    if ( cbOuterContent != '0px' ) {
                        cbOuterContentValue = parseFloat( cbOuterContent );
                    }

                    if ( cbStickySBEL.hasClass('cb-sidebar-hp') ) {
                        cbStickyLoc = cbStickyLoc - 60;
                    }

                    if ( cbFlag === false ) {
                        cbStickyHeightCache = cbStickyHeight;
                        cbFlag = true;
                    }

                    if ( cbStickyHeightCache < cbStickyHeight ) {
                        cbStickyHeightCache = cbStickyHeight;
                        cbStickyBot = cbStickyLoc + cbStickyHeight;
                        cbStickyBotCache = cbStickyBot;
                    }

                if ( cbStickyHeightCache > cbWindowHeight ) {
                    // CBTLRTW

                    cbStickySB.css('height', cbStickyHeightCache);
                    cbBody.removeClass('cb-stuck-sb-t');
                    if ( ! cbBody.hasClass('cb-stuck-sb') ) {
                        
                        if (  ( cbCurScroll > cbStickyBot ) && ( cbWindowScrollTop < cbFooterElTop ) && ( cbWindowScrollTop > cbStickyLoc ) ) {
                            cbBody.addClass('cb-stuck-sb');
                            cbStickyBotCache = cbStickyBot;
                        }
                        
                        if ( cbCurScroll > cbFooterElTop ) {
                            cbBody.addClass('cb-footer-vis');
                        }
                        
                    } else {
                        if ( ( ! cbFooterEl.visible(true) ) && ( cbWindowScrollTop < cbFooterElTop ) ) {
                            cbBody.removeClass('cb-footer-vis');
                            cbStickySBEL.css('top', 'auto' );
                        }  else {
                            cbBody.addClass('cb-footer-vis');
                            cbStickySBEL.css('top', cbFooterElTop - cbStickyHeightCache - cbOuterContentValue + 'px' );
                        }
                        
                        if ( cbCurScroll < cbStickyBotCache ) {
                            cbBody.removeClass('cb-stuck-sb');
                        }
                    }

                } else {
                    // CBSRTTW

                    if ( cbAdminBar === true ) {
                        cbStickyTopVal = cbMenuHeight +  32;
                        cbStickyTopCache = cbStickyLoc - parseInt(cbStickySBELPT, 10) - cbMenuHeight + 32;
                    } else {
                        cbStickyTopVal = cbMenuHeight;
                        cbStickyTopCache = cbStickyLoc - parseInt(cbStickySBELPT, 10) - cbMenuHeight;
                    }
                    cbStickySB.css('height', cbStickyHeightCache);

                    if ( ! cbBody.hasClass('cb-stuck-sb') ) {

                        if ( cbBody.hasClass('cb-stuck') && ( ! cbBody.hasClass('cb-fis-big-block') ) )  {
                            cbStickySBEL.css('top', cbStickyTopVal );
                        }
                        
                        if ( cbWindowScrollTop >= cbStickyTopCache ) {
                            cbBody.addClass('cb-stuck-sb cb-stuck-sb-t');
                            if ( cbBody.hasClass('cb-fis-big-block') ) {
                                cbStickySBEL.css('top', cbStickyTopVal );
                            }
                        }

                    } else {

                        if ( cbFooterElTop > ( cbCurScroll - ( cbWindowHeight - cbStickyHeightCache ) ) ) {
                            cbBody.removeClass('cb-footer-vis');
                             
                            if ( cbBody.hasClass('cb-stuck') ) {
                                cbStickySBEL.css('top', cbStickyTopVal );
                            } else {
                                cbStickySBEL.css('top', '0' );
                            }
                            
                        }  else {
                            cbBody.addClass('cb-footer-vis');
                            cbStickySBEL.css('top', cbFooterElTop - (cbStickyHeightCache ) + 'px' );
                        }
                        
                        if ( cbWindowScrollTop < cbStickyTopCache ) {
                            cbBody.removeClass('cb-stuck-sb cb-stuck-sb-t');
                            if ( cbBody.hasClass('cb-stuck') ) {
                                cbStickySBEL.css('top', cbStickyTopVal );
                            } else {
                                cbStickySBEL.css('top', '0' );
                            }
                        }
                    }
                }
            }
        }

       if ( ( cbBody.hasClass( 'cb-m-sticky' ) ) && ( cbWindowWidth < 768 ) ) {
            
            var cbTMLoc = cbTMS.offset().top;

            if ( ( cbWindowScrollTop - $('#wpadminbar').outerHeight(true) ) > cbTMLoc ) {
                cbBody.addClass('cb-tm-stuck');                
            } else {
                cbBody.removeClass('cb-tm-stuck');
            }
        }

        if ( ( cbParallaxImg.length !== 0 ) && ( cbMobileTablet === false ) ) {

            if ( cbWindowScrollTop <  cbWindowHeight ) {
                cbBody.removeClass('cb-par-hidden');
                if ( cbAdminBar === true) {
                    cbWindowScrollTop = cbWindowScrollTop - 32;
                }

                var cbyPos = ( ( cbWindowScrollTop / 2    ) ),
                    cbCoords = cbyPos + 'px';

                    $('#cb-par-wrap img').css({ '-webkit-transform': 'translate3d(0, ' + cbCoords + ', 0)', 'transform': 'translate3d(0, ' + cbCoords + ', 0)' });
            } else {
                cbBody.addClass('cb-par-hidden');
            }

        }

        if ( cbInfiniteScroll.length ) {

            if ( cbReady === true ) {

                var cbLastChild = $('#main').children().last(),
                    cbLoadHasAd = $('#main').children().first().hasClass('cb-category-top'),
                    cbLastChildID = cbLastChild.attr('id'),
                    cbLastArticle = cbLastChild.prev();

                if ( ( cbLastChildID === 'cb-blog-infinite-scroll' ) && ( cbLastArticle.visible(true) ) ) {

                    cbReady = false;

                    var cbCurrentPagination = $('#cb-blog-infinite-scroll').find('a').attr('href');
                    cbMain.addClass('cb-loading');

                    $.get( cbCurrentPagination, function( data ) {

                        var cbExistingPosts, cbExistingPostsRaw;

                        if ( cbLoadHasAd === true ) {
                                cbExistingPostsRaw = $(data).filter('#cb-outer-container').find('#main');
                                $(cbExistingPostsRaw).find('.cb-category-top').remove();
                                cbExistingPosts = cbExistingPostsRaw.html();

                        } else {
                            cbExistingPosts = $(data).filter('#cb-outer-container').find('#main').html();
                        }

                        $('#main').children().last().remove();
                        $('#main').append(cbExistingPosts);
                        cbMain.removeClass('cb-loading');

                    });

                }

            }
        }

        if( ( cbWindowScrollTop > 750 ) &&  ( cbWindowWidth > 768 ) ) {
            cbBody.addClass('cb-to-top-vis');
        } else {
            cbBody.removeClass('cb-to-top-vis');
        }

        cbCheckerI = false;
    }

    
    if (window.addEventListener) {
        window.addEventListener( 'scroll', cbOnScroll, false );
    }
    else {
        window.attachEvent('scroll', cbOnScroll);
    }

    $.each(cbRatingBars, function(i, value) {

        var cbValue = $(value);
        if ( cbValue.visible(true) ) {

            cbValue.removeClass('cb-zero-trigger');
            cbValue.addClass('cb-bar-ani');

        }
    });

    $.each(cbRatingStars, function(i, value) {

        var cbValue = $(value);
        if ( cbValue.visible(true) ) {

            cbValue.removeClass('cb-zero-stars-trigger');
            cbValue.addClass('cb-bar-ani-stars');

        }
    });

    cbWindow.scroll(function(event) {

        $.each(cbRatingBars, function(i, value) {

            var cbValue = $(value);
            if ( ( cbValue.visible(true) ) && ( cbValue.hasClass('cb-zero-trigger') ) ) {

              cbValue.removeClass('cb-zero-trigger');
              cbValue.addClass('cb-bar-ani');
            }
        });

          $.each(cbRatingStars, function(i, value) {

            var cbValue = $(value);
            if ( ( cbValue.visible(true) ) && ( cbValue.hasClass('cb-zero-stars-trigger') ) ) {

                cbValue.removeClass('cb-zero-stars-trigger');
                cbValue.addClass('cb-bar-ani-stars');
            }
        });

    });


    jQuery(document).ready(function($) {
        if ( cbBody.hasClass('admin-bar') && ( ! $('#wpadminbar').length ) ) { 
            cbAdminBar = false; 
            cbBody.addClass('cb-no-admin-bar');
        } 
        if ( cbNavBar.length ) {
            if  ( cbWindowWidth > 767 ) {
                cbMenuOffset = cbNavBar.offset().top;
            }
        }

        $('.hentry').find('a').has('img').each(function () {

            var cbImgTitle = $('img', this).attr( 'title' ),
                cbAttr = $(this).attr('href');

            var cbWooLightbox = $(this).attr('rel');

            if (typeof cbImgTitle !== 'undefined') {
                $(this).attr('title', cbImgTitle);
            }

            if ( ( typeof cbAttr !== 'undefined' )  && ( cbWooLightbox !== 'prettyPhoto[product-gallery]' ) ) {
                var cbHref = cbAttr.split('.');
                var cbHrefExt = $(cbHref)[$(cbHref).length - 1];

                if ((cbHrefExt === 'jpg') || (cbHrefExt === 'jpeg') || (cbHrefExt === 'png') || (cbHrefExt === 'gif') || (cbHrefExt === 'tif')) {
                    $(this).addClass('cb-lightbox');
                }
            }

        });

        $('.tiled-gallery').find('a').attr('rel', 'tiledGallery');
        $('.gallery').find('a').attr('rel', 'tiledGallery');

        var cbMain = $('#main'),
            cbIFrames = cbMain.find('iframe');

        cbIFrames.each( function() {
            var CbThisSrc = $(this).attr('src');
            
            if( CbThisSrc && ( ( CbThisSrc.indexOf("yout") > -1 ) || ( CbThisSrc.indexOf("vimeo") > -1 ) || ( CbThisSrc.indexOf("daily") > -1 ) ) ) {
                $(this).wrap('<div class="cb-video-frame"></div>');
            } 
        });

        // Fire up LightBox
        if (!!$.prototype.boxer) {
            $(".cb-lightbox").boxer({ duration: 350, fixed: true, });
        }

        // Toggle
        $('.cb-toggler').find('.cb-toggle').click(function(e) {
               $(this).next().stop().slideToggle();
               $(this).prev().stop().toggle();
               $(this).prev().prev().stop().toggle();
               e.preventDefault();
        });

        var cbFirstGrid = cbContent.first('.cb-grid-block');

        $(cbFirstGrid).imagesLoaded( function() {
            cbBody.addClass('cb-imgs-loaded');
        });

        $(window).load(function() {
            cbFixdSidebarLoad();
            var cbTabber = $('.tabbernav'),
                cb_amount = cbTabber.children().length;
            if ( cb_amount === 4 ) { cbTabber.addClass("cb-fourtabs"); }
            if ( cb_amount === 3 ) { cbTabber.addClass("cb-threetabs"); }
            if ( cb_amount === 2 ) { cbTabber.addClass("cb-twotabs"); }
            if ( cb_amount === 1 ) { cbTabber.addClass("cb-onetab"); }

        });

        // Clear half modules
        $('.cb-module-half:odd').each(function(){
            $(this).prev().addBack().wrapAll($('<div/>',{'class': 'cb-double-block clearfix'}));
        });

        cbFlexSW.flexslider({
            animation: "slide",
            itemWidth: 280,
            itemMargin: 3,
            pauseOnHover: true,
            maxItems: 3,
            minItems: 1,
            controlNav: false,
            slideshow: cbScripts.cbSlider[1],
            slideshowSpeed: cbScripts.cbSlider[2],
            animationSpeed: cbScripts.cbSlider[0],
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });
        cbFlexFW.flexslider({
            animation: "slide",
            itemWidth: 280,
            itemMargin: 3,
            pauseOnHover: true,
            maxItems: 4,
            minItems: 1,
            controlNav: false,
            slideshow: cbScripts.cbSlider[1],
            slideshowSpeed: cbScripts.cbSlider[2],
            animationSpeed: cbScripts.cbSlider[0],
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });

        $('#cb-carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            directionlNav: true,
            itemWidth: 150,
            itemMargin: 15,
            asNavFor: '#cb-gallery',
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
          });

        $('#cb-gallery').flexslider({
            animation: "slide",
            controlNav: false,
            directionlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#cb-carousel",
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });

        $('.flexslider-1-menu').flexslider({
            animation: "slide",
            itemWidth: 210,
            itemMargin: 3,
            slideshow: false,
            pauseOnHover: true,
            maxItems: 2,
            minItems: 1,
            controlNav: false,
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });

        $('.flexslider-2').flexslider({
            animation: "slide",
            minItems: 1,
            pauseOnHover: true,
            maxItems: 1,
            controlNav: false,
            slideshow: cbScripts.cbSlider[1],
            slideshowSpeed: cbScripts.cbSlider[2],
            animationSpeed: cbScripts.cbSlider[0],
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });
         $('.flexslider-2-fw').flexslider({
            animation: "slide",
            pauseOnHover: true,
            minItems: 1,
            maxItems: 1,
            controlNav: false,
            slideshow: cbScripts.cbSlider[1],
            slideshowSpeed: cbScripts.cbSlider[2],
            animationSpeed: cbScripts.cbSlider[0],
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
        });

        
        $('#messages_search').removeAttr('placeholder');

        var cbMainNav = $('.main-nav li');

        // Show sub menus
        $('.main-nav > li').hoverIntent(function() {

            $(this).find('.cb-big-menu').stop().slideDown('fast');
            $(this).find('.cb-mega-menu').stop().slideDown('fast');
            $(this).find('.cb-links-menu .cb-sub-menu').stop().fadeIn();

        }, function() {

           $(this).find('.cb-big-menu').slideUp('fast');
           $(this).find('.cb-mega-menu').slideUp('fast');
           $(this).find('.cb-links-menu .cb-sub-menu').fadeOut();

        });

        cbMainNav.find('.cb-big-menu .cb-sub-menu li').hoverIntent(function(){

            $(this).find('> .cb-grandchild-menu').stop().slideDown('fast');

        }, function() {

           $(this).find('> .cb-grandchild-menu').slideUp('fast');

        });

        cbMainNav.find('.cb-links-menu .cb-sub-menu li').hoverIntent(function(){

            $(this).children('.cb-grandchild-menu').stop().fadeIn();

        }, function() {

           $(this).children('.cb-grandchild-menu').fadeOut();

        });        

        var hideSpan = $('.cb-accordion > span').hide();
        $('.cb-accordion > a').click(function() {

            if ( $(this).next().css('display') == 'none') {
                hideSpan.slideUp('fast');
                $(this).next().slideDown('fast');
            } else {
                $(this).next().slideUp('fast');
            }
            return false;

        });

        cbToTop.click(function(event) {
            $('html, body').animate({scrollTop:0}, 600);
            event.preventDefault();
        });

        $('.cb-video-frame').fitVids();

        $('.cb-tabs' ).find( '> ul' ).tabs( '.cb-panes .cb-tab-content' );

        $('#cb-ticker').totemticker({
            row_height  :   '33px',
            mousestop   :   true
        });

        var cbVote = $('#cb-vote').find('.cb-overlay');
        var cbVoteStars = $('#cb-vote').find('.cb-overlay-stars');

        if (cbVote.length) {

            $(cbVote).on('click', function() {
                $(cbVote).tipper({
                    direction: "bottom"
                });
            });
        } else if (cbVoteStars.length) {
            $(cbVoteStars).on('click', function() {
                $(cbVoteStars).tipper({
                    direction: "bottom"
                });
            });
        }

        $(".cb-tip-bot").tipper({
            direction: "bottom"
        });

        $(".cb-tip-top").tipper({
            direction: "top"
        });

        $(".cb-tip-right").tipper({
            direction: "right"
        });

        $(".cb-tip-left").tipper({
            direction: "left"
        });
        
        cbDoc.ajaxStop(function() {
          cbReady = true;
          $('.cb-pro-load').removeClass('cb-pro-load');
        });

        cbContent.on('click', '#cb-blog-infinite-load a', function( e ){

            e.preventDefault();
            var cbCurrentPagination = $(this).attr('href'),
                cbCurrentParent = $(this).parent();

            cbMain.addClass('cb-loading');

            $.get( cbCurrentPagination, function( data ) {

                var cbExistingPosts, cbExistingPostsRaw,
                cbLoadHasAd = $('#main').children().first().hasClass('cb-category-top');

                if ( cbLoadHasAd === true ) {

                        cbExistingPostsRaw = $(data).filter('#cb-outer-container').find('#main');
                        $(cbExistingPostsRaw).find('.cb-category-top').remove();
                        cbExistingPosts = cbExistingPostsRaw.html();

                } else {
                    cbExistingPosts = $(data).filter('#cb-outer-container').find('#main').html();
                }

                $('#main').append(cbExistingPosts);
                cbMain.removeClass('cb-loading');
                cbCurrentParent.addClass( 'cb-hidden' );

            });

        });

        $('.cb-c-l').hoverIntent(function(){

            var cbThis = $(this),
                cbThisText = $(this).text(),
                cbBigMenu = cbThis.closest('div');

            if ( cbBigMenu.hasClass('cb-big-menu') ) {

                var cid = cbThis.attr('data-cb-c'),
                    chref = cbThis.attr('href'),
                    cbBigMenuEl = $(cbBigMenu[0].firstChild),
                    cbBigMenuUL = cbBigMenuEl.find('.cb-recent > ul');

                $.ajax({
                    type : "GET",
                    data : { action: 'cb_mm_a', cid: cid, acall: 1 },
                    url: cbScripts.cbUrl,
                    beforeSend : function(){
                        cbBigMenuEl.addClass('cb-pro-load');
                    },
                    success : function(data){
                        cbBigMenuUL.html($(data));
                    },
                    error : function(jqXHR, textStatus, errorThrown) {
                        console.log("cbmm " + jqXHR + " :: " + textStatus + " :: " + errorThrown);
                        }
                });
            }

        }, function() {});

    });


    if ( ( cbParallaxImg.length > 0 ) && ( cbMobileTablet === false ) ) {
        var cbParallaxMainOffTop = cbParallaxMain.offset().top;
            cbWindowHeightTwo = cbWindowHeight - cbParallaxMainOffTop - 90;

        cbParallaxBG.css("height", cbWindowHeight);
        cbParallaxMain.css("height", cbWindowHeightTwo);

    }

    if ( cbFeaturedMain.length > 0) {
        if ( cbMobilePhone === true ) {
            cbWindowHeightTwo =  cbWindowHeight - cbFeaturedMain.offset().top;
        } else {
            cbWindowHeightTwo =  cbWindowHeight - cbFeaturedMain.offset().top - 80;
        }

        cbFeaturedMain.css( 'height', cbWindowHeightTwo );
    }

    var cbFullWidth = $('#cb-full-background-featured'),
        cbFullCheck = true;
        var cbClickFlag = true;

    if ( cbFullWidth.length === 0 ) {
        cbFullWidth = $('#cb-full-width-featured');
        cbFullCheck = false;
    }

    if ( cbFullWidth.length === 0 ) {
        cbFullWidth = $('#cb-parallax-featured');
        cbFullCheck = true;
    }

    var cbFullWidthTitle = cbFullWidth.find('.cb-title-fi'),
        cbFullWidthTitleHeight = cbFullWidthTitle.height();

    if ( cbBody.hasClass('cb-fis-tl-overlay') ) {
        cbFullWidthTitleHeight = 0;
    }

    var cbMediaOverlay = $('#cb-media-overlay'),
        cbMediaIcon = $('#cb-m-trigger'),
        cbVimeoFrame = cbMediaOverlay.find('iframe[src^="//player.vimeo"]'),
        cbYouTubeMediaFrame = jQuery('#cbplayer'),
        cbFisWrap = $('#cb-fis-wrap');

    cbMediaIcon.click( function( e ) {
        e.preventDefault();
        if ( ! cbMediaIcon.hasClass('cb-lb') ) {
            cbBody.addClass('cb-m-em-modal-on');
        } else {
            cbBody.addClass('cb-m-modal-on');
        }

        cbPlayYTVideo();

    });

    var cbMediaOverlayWidth = cbFisWrap.width(),
        cbMediaFrameHeight = ( cbWindowHeightTwo - cbFullWidthTitleHeight ) * 0.9,
        cbMediaFrameTop = ( cbWindowHeightTwo - cbMediaFrameHeight - cbFullWidthTitleHeight ) / 2,
        cbMediaFrameWidth = cbMediaFrameHeight * 560 / 315,
        cbMediaFrameMarginLeft;

    if ( cbMediaFrameWidth >  cbMediaOverlayWidth ) {
        cbMediaFrameWidth = cbMediaOverlayWidth - 20;
        cbMediaFrameMarginLeft = 10;
    }  else {
        cbMediaFrameMarginLeft = ( cbMediaOverlayWidth - cbMediaFrameWidth ) / 2;
    }

    if ( cbClickFlag === true ) {

        cbVimeoFrame.attr('src', (cbVimeoFrame.attr('src') + '?autoplay=1'));
        cbClickFlag = false;
    }

    if ( ( cbMediaFrameTop !== 'undefined'  ) && ( ! cbMediaOverlay.hasClass('cb-audio-overlay') ) ) {
        cbMediaOverlay.css({'top' : cbMediaFrameTop, 'height' : cbMediaFrameHeight, 'width' : cbMediaFrameWidth, 'margin-left' : cbMediaFrameMarginLeft });

    }

    cbWindow.resize(function() {
        
        cbWindowWidth = cbWindow.width(),
        cbWindowHeight = cbWindow.height() + 1;

        if ( cbNavBar.length ) {
            cbNavBar.css( 'height', '' );
            cbMenuItemWrap.css( 'height', '' );
            if  ( cbWindowWidth > 767 ) {
                cbMenuHeight = cbNavBarDiv.outerHeight();
            }
            cbNavBar.css( 'height', cbMenuHeight );
            cbMenuItemWrap.add(cbNavLogo).css( 'height', cbNavBarFirstLI.outerHeight() );
        }

        if ( cbWindowWidth < 767 ) {
            cbStickySB.css( 'height', 'auto' );
        }

        if ( ( cbParallaxImg.length > 0 ) && ( cbMobileTablet === false ) ) {
            cbParallaxMainOffTop = cbParallaxMain.offset().top;
            cbWindowHeightTwo =  (cbWindowHeight) - (cbParallaxMainOffTop) - 90;
            cbParallaxBG.css("height", cbWindowHeight );
            cbParallaxMain.css("height", cbWindowHeightTwo );

        }

        if ( cbFeaturedMain.length > 0) {
            if ( cbMobilePhone === true ) {
                cbWindowHeightTwo =  cbWindowHeight - cbFeaturedMain.offset().top;
            } else {
                cbWindowHeightTwo =  cbWindowHeight - cbFeaturedMain.offset().top - 80;
            }

            cbFeaturedMain.css("height", cbWindowHeightTwo );
        }

        cbMediaOverlayWidth = cbFisWrap.width(),
        cbMediaFrameHeight = ( cbWindowHeightTwo - cbFullWidthTitleHeight ) * 0.9,
        cbMediaFrameTop = ( cbWindowHeightTwo - cbMediaFrameHeight - cbFullWidthTitleHeight ) / 2,
        cbMediaFrameWidth = cbMediaFrameHeight * 560 / 315;

        if ( cbMediaFrameWidth >  cbMediaOverlayWidth ) {
            cbMediaFrameWidth = cbMediaOverlayWidth - 20;
            cbMediaFrameMarginLeft = 10;
        }  else {
            cbMediaFrameMarginLeft = ( cbMediaOverlayWidth - cbMediaFrameWidth ) / 2;
        }

        if ( cbClickFlag === true ) {

            cbVimeoFrame.attr('src', (cbVimeoFrame.attr('src') + '?autoplay=1'));
            cbClickFlag = false;
        }

        if ( ( cbMediaFrameTop !== 'undefined'  ) && ( ! cbMediaOverlay.hasClass('cb-audio-overlay') ) ) {
            cbMediaOverlay.css({'top' : cbMediaFrameTop, 'height' : cbMediaFrameHeight, 'width' : cbMediaFrameWidth, 'margin-left' : cbMediaFrameMarginLeft });
        }

        cbSlider1Post.each( function() {
            var cbThis = $(this);

            if ( cbThis.hasClass('cb-module-fw') || cbThis.hasClass('cb-full-slider' )  ) {
                cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 2.3076923 ) );
            } else if ( cbThis.hasClass('cb-slider-widget') ) {
                cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 1.5925925 ) );
            } else {
                cbThis.find('.slides > li').css( 'height', ( cbThis.width() / 1.876923 ) );
            }
            
        });
        
        if ( cbFlexFW.length ) {
              cbFlexFW.flexslider(1);
        }
        if ( cbFlexSW.length ) {
                cbFlexSW.flexslider(1);
        }

    });

    var CbYTPlayerCheck = jQuery('#cb-yt-player');

    function cbPlayYTVideo() {
        if ( ( cbMobileTablet === false ) && ( CbYTPlayerCheck.length > 0 ) ) {
            cbYTPlayerHolder.playVideo();
        }
    };

    function cbPauseYTVideo() {
        if ( ( cbMobileTablet === false )  && ( CbYTPlayerCheck.length > 0 ) ) {
            cbYTPlayerHolder.pauseVideo();
        }
    };

})(jQuery);


var cbYTPlayerHolder,
CbYTPlayer = jQuery('#cb-yt-player'),
cbYouTubeVideoID = CbYTPlayer.text();

if ( CbYTPlayer.length > 0 ) {
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}
        
function onYouTubeIframeAPIReady() {
    if ( CbYTPlayer.length > 0 ) {
        cbYTPlayerHolder = new YT.Player('cb-yt-player', {
            videoId: cbYouTubeVideoID
        });
    }
}