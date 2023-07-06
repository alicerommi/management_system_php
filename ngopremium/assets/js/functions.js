var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
    aggressive: true,
});
$(document).ready(function() {
    
    $(".various").click(function() {
        var pkgname_action = $(this).attr('title');
         $(".lead_action").val(pkgname_action);
    });
    
    $(".various").click(function() {
        $('#ouibounce-modal').attr('id', 'ouibounce-modal2');
        var pkgname = $(this).attr('title');
        var orgPrice = $(this).attr('href').split('=')[1]
        if ($(this).attr('title') !== undefined) {
            $('.popupform h2').html(pkgname);
            return;
        } else {
            var pkgname = $(this).attr('title');
            $('.popupform h2').html("GET A FREE QUOTE");
        }
        return false;
    });
    $(".modal-footer a, #ouibounce-modal .underlay").click(function() {
        $('#ouibounce-modal').attr('id', 'ouibounce-modal2');
    });
    $(".calculate-price").click(function() {
        $("#popupform .lead_area").val("Calculate Price Lead");
    });
    $(".free-quote").click(function() {
        $("#popupform .lead_area").val("Get A Quote");
    });
    $("#popupform .popup-form").validate();
    $(".modal-body .popup-form").validate();
   
    $("#form_stp2").submit(function(e) {
        var ck = $("form input:checked").length;
        var b = $("input:submit");
        var checkboxes = $("input[type='checkbox']"),
            submitButt = $("input[type='submit']");
        if (ck === 0) {
            console.log('invalid');
            $('.platform-message').text("Please select at least one platform and compatible device!").addClass("platform-error").css({
                "color": "red"
            });
        } else {
            $('.platform-error').removeClass().text("");
            document.getElementById("form_stp2").submit();
        }
        e.preventDefault();
    });
    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");
    $("tr:nth-child(odd)").addClass("alter");
    $('[href="#"]').attr("href", "javascript:;");
    $(".footer-form form").validate();
    $(".order-form").validate();
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
    var str = location.href.toLowerCase();
    $(".navbar-nav li a").each(function() {
        if (str.indexOf(this.href.toLowerCase()) > -1) {
            $(".navbar-nav  li.active").removeClass("active");
            $(this).parent().addClass("active");
        }
    });
    $("li.navbar-nav").parents().each(function() {
        if ($(this).is(".navbar-nav li")) {
            $(this).addClass("active");
        }
    });
    $('.scroll-bottom').click(function() {
        $("html, body").animate({
            scrollTop: $(".down-section").offset().top
        }, 'slow');
    });
    $('#about-tab a').click(function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#mobile-slider').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        drag: false,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 1,
                nav: false,
            }
        },
    });
    $('.process-list-slider').owlCarousel({
        items: 1,
        loop: false,
        drag: false,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 4,
                nav: false,
                touchDrag: false,
                mouseDrag: false,
            }
        },
    });
    var checkWidth = $(document).width();
    if (checkWidth <= 800) {
        $('.services-slider').owlCarousel({
            items: 1,
            loop: false,
            drag: false,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                },
                600: {
                    items: 1,
                    nav: false,
                },
                1000: {
                    items: 3,
                    nav: false,
                    touchDrag: false,
                    mouseDrag: false,
                }
            },
        });
    }
    $('.slider-mb-bg').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        animateOut: 'fadeOut',
        autoplay: true,
        drag: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 1,
                nav: false,
            }
        },
    });
    var owl = $('#mobile-slider');
    var owl_bg = $('.slider-mb-bg');
    owl.owlCarousel();
    owl_bg.owlCarousel();
    $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
        owl_bg.trigger('next.owl.carousel');
    })
    $('.customPrevBtn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
        owl_bg.trigger('prev.owl.carousel', [300]);
    })
    $('.testimonial-slider').owlCarousel({
        items: 1,
        loop: true,
        drag: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 1,
                nav: true,
            },
            1000: {
                items: 1,
                nav: true,
            }
        },
        navText: ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>']
    });
    $(function() {
        var selectedClass = "";
        $(".fil-cat").click(function() {
            $(this).addClass('active-pf');
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(100, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut().removeClass('scale-anm');
            setTimeout(function() {
                $("." + selectedClass).fadeIn().addClass('scale-anm').css('display', 'inline-block');
                $("#portfolio").fadeTo(300, 1);
                $('.toolbar .fil-cat').removeClass('active-pf')
            }, 300);
        });
    });
    $(function() {
        var sliceFirst = $("#portfolio .scale-anm").slice(0, 4).show();
        $(sliceFirst).css('display', 'inline-block');
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            var sliceAfter = $("#portfolio .scale-anm:hidden").slice(0, 2).slideDown();
            $(sliceAfter).css('display', 'inline-block');
            if ($("#portfolio .scale-anm:hidden").length == 0) {
                $("#loadMore").fadeOut('fast');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
    });
});
var newsletter_p = setInterval(function() {
    $("#ouibounce-modal").css("display", "block")
    clearInterval(newsletter_p);
}, 15000);