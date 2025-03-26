
function autoScroll() {
    $(".auto-scroll").on("click", function (e) {
        e.preventDefault();
        var t = $(this).attr("href"),
            n = parseInt($(t).offset().top) - 10;
        $("html, body").animate({
            scrollTop: n
        }, 1e3)
    })
}
$("#mobile-nav-content a[href='#main-nav-content']").on("click", function (e) {
    e.preventDefault(), $("#mobile-nav-content").hasClass("open-main-nav") || $("#mobile-nav-content").addClass("open-main-nav")
}), $(".mobile-header-back-link").on("click", function (e) {
    e.preventDefault(), $("#mobile-nav-content").removeClass("open-main-nav open-mobile-currency")
}), $(function () {
    var e = 0,
        t = parseInt(150);
    $("#main-nav-content .center").on({
        mouseenter: function () {
            $(this).addClass("hover");
            var n = $(this);
            setTimeout(function () {
                n.hasClass("hover") && (e = 1)
            }, t)
        },
        mouseleave: function () {
            $(this).removeClass("hover"), e = 0, $("#main-nav-content .main-nav-lvl-0.active-sub").removeClass("active")
        }
    }), $("#main-nav-content .main-nav-lvl-0.active-sub").on({
        mouseenter: function () {
            var n = $(this);
            $(this).addClass("hover"), 1 == e ? n.addClass("active") : setTimeout(function () {
                n.hasClass("hover") && n.addClass("active")
            }, t)
        },
        mouseleave: function () {
            $(this).removeClass("hover"), $(this).removeClass("active")
        }
    }), $(".nav-res-icon").off().on("click", function (e) {
        e.preventDefault(), $("#main-header .options").fadeOut(function () {
            $("#main-header #icon-currency-res").removeClass("open")
        }), $(this).hasClass("open") ? ($(this).removeClass("open"), $("body").removeClass("open-nav"), $(".container-sub-nav.open").removeClass("open"), $(".nav-res-icon .content-anim").removeClass("anim")) : ($(this).addClass("open"), $("body").addClass("open-nav"), $(".nav-res-icon .content-anim").addClass("anim"))
    }), $("#overlay-responsive").on("click", function (e) {
        e.preventDefault(), $(".nav-res-icon.open").removeClass("open"), $("body").removeClass("open-nav"), $(".container-sub-nav.open").removeClass("open"), $(".nav-res-icon .content-anim").removeClass("anim")
    }), $(".main-nav-lvl-0.active-sub > a").on("click", function (e) {
        $(window).innerWidth() < 901 && e.preventDefault(), $(this).parent().find(".container-sub-nav").addClass("open")
    }), $(".nav-back-link").on("click", function (e) {
        e.preventDefault(), $(this).parents(".container-sub-nav").removeClass("open")
    })
});


$('.ab-collapsed .ab-read-more-button').click(function () {
    var collapsedElement = $(this).closest('.ab-collapsed');
    collapsedElement.addClass('ab-expanded');
    collapsedElement.css('height', 'auto');
});




$(document).ready(function () {
    // Calculate the scroll threshold based on 10% of the page height
    var scrollThreshold = $(document).height() * 0.1;

    // Check scroll position on scroll event (for screens wider than 1050px)
    $(window).scroll(function () {
        // Check if the screen width is greater than or equal to 1050px
        if ($(window).width() >= 1050) {
            // Get the current scroll position
            var scrollPosition = $(this).scrollTop();

            // If scrolled past the scroll threshold, show the element
            if (scrollPosition >= scrollThreshold) {
                $('#myElement').css('display', 'block');
            } else {
                $('#myElement').css('display', 'none');
            }
        }
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        var scrollPosition = $(window).scrollTop();

        // Update active tab based on scroll position
        $('div[id^="product--"]').each(function () {
            var sectionOffset = $(this).offset().top;
            if (scrollPosition >= sectionOffset) {
                var sectionId = $(this).attr('id');
                $('a[href="#' + sectionId + '"]').parent().addClass('current').siblings().removeClass('current');
            }
        });
    });
});


$(document).ready(function () {
    $(".tabs-list li a").click(function (e) {
        e.preventDefault();
    });

    $(".tabs-list li").click(function () {
        var tabid = $(this).find("a").attr("data-id");
        //alert(tabid);
        $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab and tab content
        $(".tab").hide();   // hiding open tab

        $(tabid).show();    // show tab

        $(this).addClass("active");


    });

});


$(document).ready(function($) {
    // open popup
    $('.popup-trigger').on('click', function(event) {
      event.preventDefault();
      const videoUrl = $(this).attr('data-video_url');
      $('.popup').addClass('is-visible');
      $('.popup iframe').attr('src', videoUrl);
    });

    // close popup
    $('.popup').on('click', function(event) {
      if ($(event.target).is('.popup-close') || $(event.target).is('.popup')) {
        event.preventDefault();
        $('.popup').removeClass('is-visible');
        $('.popup iframe').attr('src', '');
      }
    });

    // open popup
    $('.login-popup-trigger').on('click', function(event) {
        event.preventDefault();
        $('.login-popup').addClass('is-visible');
      });
  
      // close popup
      $('.login-popup').on('click', function(event) {
        if ($(event.target).is('.loigin-popup-close') || $(event.target).is('.login-popup')) {
          event.preventDefault();
          $('.login-popup').removeClass('is-visible');
        
        }
      });

    // close popup when clicking the esc keyboard button
    $(document).keyup(function(event) {
      if (event.which == '27') {
        $('.popup').removeClass('is-visible');
        $('.popup iframe').attr('src', '');
      }
    });
  });

  $(document).ready(function() {
    $('.filter-cate-tilte').click(function(event) {
      event.preventDefault(); 
      

      $(this).attr('aria-expanded', function(_, attr) {
        return attr === 'true' ? 'false' : 'true';
      });
 
      $(this).next('.panel-collapse').slideToggle();
    });
  });






  
var btnElement = document.getElementById('s-btn');
var sampleElement = document.getElementById('sample');
btnElement.addEventListener('click', function () {
    sampleElement.click();
});
