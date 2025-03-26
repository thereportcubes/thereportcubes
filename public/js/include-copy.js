
window.onload = function(){ 
   var base_path=''
    $.getScript(base_path+"js/slick.js");
    $.getScript(base_path+"js/bootstrap.bundle.min.js");
    setTimeout(() => {
        $.getScript(base_path+"js/custom.js");   
        $('.hero_top').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay:true,
            dots: false,
            speed: 300,
        });
    }, 2000);
    setTimeout(() => {
        checkCookie();
        // $.getScript("https://www.google.com/recaptcha/api.js");
        //  $.getScript("https://www.googletagmanager.com/gtag/js?id=G-ZBMNJ08HNP");
        // $.getScript("https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit");
        // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        // (function(){
        //     var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        //     s1.async=true;
        //     s1.src='https://embed.tawk.to/5eabccf4203e206707f88c70/default';
        //     s1.charset='UTF-8';
        //     s1.setAttribute('crossorigin','*');
        //     s0.parentNode.insertBefore(s1,s0);
        // })(); 
    }, 20000);
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
    /*setTimeout(() => {
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
        
    }, 6000);*/
    $('#search_123').on('keyup',function(){
      
        let value=$(this).val();
        if(value == ""){
            $("#search_result").css("display","none");
        }
        else{
            $.ajax({
            type : 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : base_url+'report_search',
            data:{'search':value, _token: $('meta[name="csrf-token"]').attr('content')},
                success:function(data){          
                if(data != ""){
                    $("#search_result").css("display","block");
                    $("#search_result").html(data);
                }
                else{
                    $(".search_result_data").css("border","1px solid #fff");
                }
            }
            });
        }        
    });
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
        } else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/register',
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
                }else{
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
}; 
function display_cookies(){
    $('#display_cookies').html(`<div class="container">             
    <div id="cookie-banner" class="cookie-banner" style="text-align:center">
       <div class="row">  
          <div class="col-md-8">
             <h4><strong>We use cookies to improve your experience</strong></h4>
             <p>This website uses cookies to ensure you get the best experience on our website. To learn more, visit our <a href="{{url('privacy-policy')}}" target="_blank" rel="noopener noreferrer" aria-label="Privacy Policy"> Privacy Policy </a>. 
             <br> By continuing to use this site, or closing this box, you consent to our use of cookies. </p>                  
          </div>
          <div class="col-md-2 text-left">
             <button onclick="acceptCookies()" class="btns btn-primary mt-4">Accept</button>
          </div>
          <div class="col-md-2 text-left">
             <button onclick="$('#cookie-banner').hide()" class="btns btn-primary mt-4">Cancel</button>
          </div>
       </div>         
    </div>
 </div>`);
}
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
    if(getCookie("PrivacyCookie") == '')
        display_cookies();
}
function acceptCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    setCookie('PrivacyCookie', 'accepted', 300);
}
let mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'en,ar,es,fr,ja,pt,ru,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    var $googleDiv = $("#google_translate_element .skiptranslate");
    var $googleDivChild = $("#google_translate_element .skiptranslate div");
    $googleDivChild.next().remove();   
    $googleDiv.contents().filter(function(){
       return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
    }).remove();
}
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
 $('document').ready(function(){
    $('body').on('click', '.expand_all', function(){
        if($(this).hasClass('active')){
            $('.collapse').removeClass('show');
            $(this).removeClass('active');
        } else {
            $('.collapse').addClass('show');
            $(this).addClass('active');
        }
    });
    
    $('body').on('click', '.collapseBtn', function(){
        let id = ($(this).data('target')).replace('#', '');
        if($('#'+id).hasClass('show')){
            $('#'+id).removeClass('show');
        } else {
            $('.collapse').removeClass('show');
            $('#'+id).addClass('show');
        }
    });
    $('body').on('click', '#changePassBtn', function(){
        let current_password = $('#current_password').val();
        let new_password = $('#new_password').val();
        let new_confirm_password = $('#new_confirm_password').val();
        let err =0;
        if($.trim(current_password) ==''){
            $('#current_password').addClass('is-invalid');
            err = 1;
        } else {
            $('#current_password').removeClass('is-invalid');
        }
        if($.trim(new_password) ==''){
            $('#new_password').addClass('is-invalid');
            err = 1;
        } else {
            $('#new_password').removeClass('is-invalid');
        }
        if($.trim(new_confirm_password) ==''){
            $('#new_confirm_password').addClass('is-invalid');
            err = 1;
        } else {
            $('#new_confirm_password').removeClass('is-invalid');
        }
        if(err == 0){
            $.ajax({
            type : 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : base_url+'change_passwprd',
            data:{'current_password':current_password, 'password':new_password, 'password_confirmation':new_confirm_password, _token: $('meta[name="csrf-token"]').attr('content')},
                success:function(data){          
                alert(data.msg);
            }
            });
        }
    });
    $('body').on('click', '#billingBtn', function(){
        let billing_company_name = $('#billing_company_name').val();
        let billing_name = $('#billing_name').val();
        let billing_designation = $('#billing_designation').val();
        let billing_email = $('#billing_email').val();
        let billing_tel = $('#billing_tel').val();
        let billing_address = $('#billing_address').val();
        let billing_city = $('#billing_city').val();
        let billing_zip = $('#billing_zip').val();
        let billing_country = $('#billing_country').val();
        $.ajax({
            type : 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : base_url+'update_user_info',
            data:{'company_name': billing_company_name,'billing_name': billing_name,'job_title':billing_designation, 'email2':billing_email,'zip_code1':billing_zip, 'city1':billing_city, 'addrress1':billing_address, _token: $('meta[name="csrf-token"]').attr('content'), 'phone' : billing_tel, 'country':billing_country},
                success:function(data){          
                alert(data.msg);
            }
        });
    });
    $('body').on('click', '#shippingBtn', function(){
        let shiping_tel = $('#shiping_tel').val();
        let shiping_address = $('#shiping_address').val();
        let shiping_city = $('#shiping_city').val();
        let shiping_zip = $('#shiping_zip').val();
        let shiping_country = $('#shiping_country').val();
        $.ajax({
        type : 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : base_url+'update_user_info',
        data:{'zip_code2':shiping_zip, 'city2':shiping_city, 'address2':shiping_address, _token: $('meta[name="csrf-token"]').attr('content'), 'phone_number' : shiping_tel, 'country2':shiping_country},
            success:function(data){          
            alert(data.msg);
        }
        });
    });
    
    $('body').on('click', '#questionBtn', function(){
        let question = $('#question').val();
        if($.trim(current_password) ==''){
            $('#current_password').addClass('is-invalid');
            return false;
        }
        $.ajax({
        type : 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : base_url+'inquiry',
        data:{'question':question, 'id': $('#qid').val()},
            success:function(data){          
                alert(data.msg);
                location.reload();
            }
        });
    });
    $('body').on('click', '.delQuestion', function(){
        let id = $(this).data('id');
        $.ajax({
        type : 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : base_url+'del_inquiry',
        data:{ 'id': id},
            success:function(data){          
                alert(data.msg);
                location.reload();
            }
        });
    });
    if(typeof bill_country !='undefined'){
        $('#billing_country').val(bill_country);
    }
    if(typeof ship_country !='undefined'){
        $('#shiping_country').val(ship_country);
    }
});
