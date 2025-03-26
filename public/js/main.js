function setCookie(cname,cvalue,exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
    
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function checkCookie() {
    let user = getCookie("PrivacyCookie");
    if (user != "") {
        document.getElementById('cookie-banner').style.display = 'none';
    } else {
        document.getElementById('cookie-banner').style.display = 'block';
    }
}
function acceptCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    setCookie('PrivacyCookie', 'accepted', 300); 
}
// Get the button
let mybutton = document.getElementById("myBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
$(document).ready(function () {
    checkCookie();
    $('.lazy').lazy();
    $('.icon-researchs').click(function () {
        var accordionItem = $(this).parent('.research-accordion-item');
        var content_research = accordionItem.next('.content_research');
        if (accordionItem.hasClass('active')) {
            accordionItem.removeClass('active');
            content_research.slideUp();
            $(this).html('<i class="fa fa-plus" aria-hidden="true"></i>');
        } else {
            $('.research-accordion-item.active').removeClass('active').find('.icon-research').html('<i class="fa fa-plus" aria-hidden="true"></i>');
            $('.content_research').slideUp();
            accordionItem.addClass('active');
            content_research.slideDown();
            $(this).html('<i class="fa fa-minus"></i>');
        }
    });
    var input = document.querySelector("#phone3");
    if(input != null){
        window.intlTelInput(input, {
            separateDialCode: true,
            excludeCountries: ["il"],
            preferredCountries: ["us","ru", "jp", "pk", "no"],
            defaultCountry: "us",
            initialCountry: "US",
        });
    }
   
   
    $(document).on('click', function (e) {
        if ($(e.target).closest("#search_result").length === 0) {
            $("#search_result").hide();
        }
    });
    $('.reg_btn').on('click', function(event) {
        event.preventDefault();
        let fname = $("#first_name").val();
        let lname = $("#last_name").val();
        let m0b_num = $("#phone3").val();
        let pass = $("#paasword").val();
        let email = $("#email").val();
        if(fname == "" || email == "" || m0b_num == "" || pass == ""){
            $("#reg_msg").css('display','block')
            $("#reg_msg").html('Sorry!! All Fields are required.');
        }else {
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: '{{url("/register")}}',
               type: 'post',
               data: {"fname":fname, "lname":lname, "mob":m0b_num, "pass":pass, "email":email},
               success: function(response) {
                  $("#reg_msg").css('display','block')
                  $("#reg_msg").html(response)
               },
            });
         }         
      });
    $(document).on("submit", "#handleAjax", function() {
        var e = this;
        $(this).find("[type='submit']").html("Login...");
        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(e).find("[type='submit']").html("Login");
                if (data.status) {
                    window.location = data.redirect;
                } else{
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
            }
        });
        return false;
    });
    $('#reload_register').click(function () {
      $.ajax({
         type: 'GET',
         url: base_url + '/reload-captcha',
         success: function (data) {
            $(".captcha span").html(data.captcha);
         }
      });
   });
   $('#reload_login').click(function () {
      $.ajax({
         type: 'GET',
         url: base_url + '/reload-captcha',
         success: function (data) {
            $(".captcha span").html(data.captcha);
         }
      });
   });
});
$('.hero_top').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay:true,
  dots: false,
  speed: 300,
});
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'en,ar,es,fr,ja,pt,ru,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    var $googleDiv = $("#google_translate_element .skiptranslate");
    var $googleDivChild = $("#google_translate_element .skiptranslate div");
    $googleDivChild.next().remove();
    $googleDiv.contents().filter(function(){
        return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
    }).remove();
}
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}