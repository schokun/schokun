$(document).ready(function () {

    if($('#my_captcha_form')) {
        document.getElementById("my_captcha_form").addEventListener("submit",function(evt)
        {
            var response = grecaptcha.getResponse();
            if(response.length == 0)
            {
                //reCaptcha not verified
                $('.g-recaptcha').css('display' , 'block');
                $('.g-recaptcha').css('opacity' , '1');
                evt.preventDefault();
                return false;
            }
            //captcha verified
            //do the rest of your validations here

        });

        let commentPosition = $('.user-comment').offset();

        $('.post-info .comments').click(function () {
            window.scrollTo({
                top: commentPosition.top - 200,
                behavior: "smooth"
            });
        });
    }

});
