<?php
// add a new logo to the login page
function custom_login_logo() { ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url( <?php echo home_url( 'content/themes/theme/img/logo.svg' , __FILE__ ); ?> );
            background-size: 100%;
            background-position: center;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );
?>