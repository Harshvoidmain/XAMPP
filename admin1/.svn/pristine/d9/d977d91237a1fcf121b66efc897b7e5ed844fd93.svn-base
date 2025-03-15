var Login = function () {
    
    return {
        //main function to initiate the module
        init: function () {
            $base= $('#UserBase').val();
            $loginUrl = $('#UserLoginForm').attr('action');
            
            jQuery('#forget-password').click(function () {
                jQuery('.login-form').hide();
                jQuery('.forget-form').show();
            });

            jQuery('#back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.forget-form').hide();
            });

            jQuery('#register-btn').click(function () {
                jQuery('.login-form').hide();
                jQuery('.register-form').show();
            });

            jQuery('#register-back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.register-form').hide();
            });

            $.backstretch([
                "img/bg/1.jpg",
                "img/bg/2.jpg",
                "img/bg/3.jpg",
                "img/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 8000
                });
        }

    };

}();