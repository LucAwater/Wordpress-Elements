<?php
// Options (variables)
$hero_o_c_textColor = get_sub_field( 'hero_o_c_textColor' );

// Content (variables)
$hero_banner = get_sub_field( 'hero_banner' );

$hero_c_image = get_sub_field( 'hero_c_image' );
$hero_c_title = get_sub_field( 'hero_c_title' );
$hero_c_text = preg_replace( '/<p>/', '<p class="' . $text_class . '">', get_sub_field( 'hero_c_text' ) );

// Output
echo '<section class="hero has-no-pad">';
  
  // Hero background image
  if( $hero_banner ): 
    echo
    '<div class="hero-banner is-stretched-wrapper">
      <img class="is-stretched-object" src="' . $hero_banner['sizes']['large'] . '" width="' . $hero_banner['width'] . '" height="' . $hero_banner['height'] . '">
    </div>';
  endif;
  
  // Hero content container
  if( $hero_c_image || $hero_c_title || $hero_c_text ):
    echo '<div class="section-body">';
      
      // Logo
      if( $hero_c_image ):
        echo '<img src="' . $hero_c_image['sizes']['medium'] . '" width="' . $hero_c_image['width'] . '" height="' .   $hero_c_image['height'] . '">';
      endif;
      
      // Title
      if( $hero_c_title ):
        echo '<h2 class="is-bold is-' . $hero_o_c_textColor . '">' . $hero_c_title . '</h2>';
      endif;
      
      // Text
      if( $hero_c_text ):
        echo $hero_c_text;
      endif;
      
    echo '</div>';
  endif;
  
echo '</section>';

// <a href="javascript:;" class="arrow arrow-scroll"><img src="<?php echo bloginfo( 'template_directory' ) . /img/arrow.svg"></a>
?>