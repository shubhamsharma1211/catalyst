jQuery(document).ready(function ($) {

// fullpage customization
    /**
     *  @desc Home Section on Scroll
     *  @author Catalyst
     *  @date 25/08/2020
     */
    if ($("body").hasClass("home")) {
        const mq = window.matchMedia("(min-width: 768px)");
        if (mq.matches) {
            $('#fullpage').fullpage({
                //sectionsColor: ['#B8AE9C', '#348899', '#F2AE72', '#5C832F', '#B8B89F'],
                sectionSelector: '.vertical-scrolling',
                slideSelector: '.horizontal-scrolling',
                navigation: true,
                slidesNavigation: true,
                controlArrows: false,
                anchors: ['home', 'about-sec', 'opportunities', 'services', 'projects', 'testimonials', 'contact-us'],
                menu: '#menu',
                scrollingSpeed: 1000,
                scrollOverflow: true,
                afterLoad: function (anchorLink, index) {
                    $('body').addClass('sectionNumber' + index);
                },
                onLeave: function (index, nextIndex, direction) {
                    $('body').removeClass('sectionNumber' + index);
                }
            });
        }
    }
    /**
     *  @desc mobile toggle
     *  @author Catalyst
     *  @date 25/08/2020
     */
    $('.menu-toggle').click(function () {
        $('body').toggleClass('menu-open');
    });
    $('.menu li a , #fullpage , main').click(function () {
        $('body').removeClass('menu-open');
    })


    /**
     *  @desc Testimonials carousel
     *  @author Catalyst
     *  @date 25/08/2020
     */
    $('#testimonials-carousel').owlCarousel({
        loop: true,
        margin: 40,
        items: 1,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplay: true,
        autoHeight: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });





    $("#gallery-carousel").owlCarousel({
        loop: true,
        margin: 10,
        stagePadding: 50,
        autoWidth: true,
        items: 1,
        nav: false,
        dots: true,
        //navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplay: true,
        autoHeight: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 4500,
        responsive: {
            0: {
                items: 1,
                autoWidth: false
            },
            768: {
                items: 1,
                autoWidth: false
            },
            1000: {
                items: 1,
                autoWidth: false
            },
            1100: {
                items: 1,
                // autoWidth: false
            }
        }
    });


    /**
     *  @desc Project Gallery Carousel
     *  @author Catalyst
     *  @date 25/08/2020
     */
    $('#project-gallery-carousel').owlCarousel({
        loop: true,
        margin: 40,
        items: 1,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplay: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });



    /**
     *  @desc Add class on Url function
     *  @author Catalyst
     *  @date 25/08/2020
     */
    if (window.location.href.match('catalyst.sh/wp/projects/#web')) {
        $("body").addClass("web");
    }
    if (window.location.href.match('catalyst.sh/wp/projects/#mobile')) {
        $("body").addClass("mobile");
    }
    if (window.location.href.match('catalyst.sh/wp/projects/#art')) {
        $("body").addClass("art");
    }

    /**
     *  @desc projects Tab 
     *  @author Catalyst
     *  @date 25/08/2020
     */
    setTimeout(function () {
        if ($("body").hasClass("web")) {
            $('#tabs-nav li:nth-of-type(4) ').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:nth-of-type(4)').show();
        } else if ($("body").hasClass("mobile")) {
            $('#tabs-nav li:nth-of-type(3) ').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:nth-of-type(3)').show();
        } else if ($("body").hasClass("art")) {
            $('#tabs-nav li:nth-of-type(2) ').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:nth-of-type(2)').show();
        } else {
            // Show the first tab and hide the rest
            $('#tabs-nav li:nth-of-type(1)').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:nth-of-type(1)').show();
        }
    }, 500);

// Click function
    $('#tabs-nav li').click(function () {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });



    /**
     *  @desc Remove Fullpage.js script in Mobile 
     *  @author Catalyst
     *  @date 25/08/2020
     */
    function checkPosition() {
        if (window.matchMedia('(max-width: 767px)').matches) {
            var script = document.createElement('script');
            script.type = 'text/javascript';

            if (window.matchMedia("(min-width:768px)").matches) {
                script.src = '/js/jquery.fullPage.min.js';
                script.src = '/js/jquery.easings.min.js';
                script.src = '/js/scrolloverflow.min.js';
            }
            document.getElementsByTagName('head')[0].appendChild(script);
        }
    }

    /**
     *  @function  Page loder animation js
     *  @author Catalyst
     *   @date 11/09/2020
     */
    if ($("body").hasClass("home")) {
        $(window).load(function () {
            // Animate loader off screen		
            setTimeout(function () {
                $(".loder").fadeOut("slow");
            }, 2500);
            setTimeout(function () {
                $(".loder").remove();
            }, 1000);

        });
    } else {
        $(".loder").hide();
    }

    /**
     *  @function  Add Class by Text Length
     *  @author Catalyst
     *   @date 11/09/2020
     */
    $(function () {
        $(".post-page-row h1").each(function (i) {
            len = $(this).text().length;
            if (len > 9)
            {
                $("body").addClass("newClass");
                //$(this).text($(this).text().substr(0,5)+'...');
            }
        });
    });


    /**
     *  @function  Projects Tab animation 
     *  @author Catalyst
     *   @date 11/09/2020
     */
    if ($("body").hasClass("page-template-projects")) {
        $(document).ready(function () {
            setTimeout(function () {
                if ($("body").hasClass("web")) {
                    $('.grid').isotope({
                        itemSelector: '.grid-item',
                        filter: '.web'
                    });
                    $('.filter-tab-wrapper ul li:nth-of-type(4)').addClass('active');
                    $('.filter-tab-wrapper ul li:nth-of-type(1)').removeClass('active');
                } else if ($("body").hasClass("mobile")) {
                    $('.grid').isotope({
                        itemSelector: '.grid-item',
                        filter: '.mobile'
                    });
                    $('.filter-tab-wrapper ul li:nth-of-type(3)').addClass('active');
                    $('.filter-tab-wrapper ul li:nth-of-type(1)').removeClass('active');
                } else if ($("body").hasClass("art")) {
                    $('.grid').isotope({
                        itemSelector: '.grid-item',
                        filter: '.art'
                    });
                    $('.filter-tab-wrapper ul li:nth-of-type(2)').addClass('active');
                    $('.filter-tab-wrapper ul li:nth-of-type(1)').removeClass('active');
                } else {
                    $('.grid').isotope({
                        itemSelector: '.grid-item',
                        filter: '.all-projects'
                    });
                }
            }, 500);

// filter items on button click
            $('.filter-button-group').on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                $('.grid').isotope({filter: filterValue});
                $('.filter-button-group li').removeClass('active');
                $(this).addClass('active');
            });
        });
        console.log("hello");
    }

//Adding placeholder attribute 
    $(".recaptcha-wrapper input#c4wp_user_input_captcha").attr("placeholder", "Enter Captcha Here");


}); //main
