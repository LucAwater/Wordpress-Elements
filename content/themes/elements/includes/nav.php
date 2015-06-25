<nav>
  <ul>
    <?php
    if( have_posts() ):
      while( have_posts() ): the_post();
        
        if( have_rows('page') ): $i_anchor = 1;
          while( have_rows('page') ): the_row();
            
            if( get_row_layout() == 'text' ):
              $text_menu = get_sub_field( 'text_o_menu' );
              $text_menu_name = get_sub_field( 'text_o_menu_name' );
              if( $text_menu == true ):
                echo '<li><a href="#anchor-' . $i_anchor . '">' . $text_menu_name . '</a></li>';
              endif;
              $i_anchor++;
              
            elseif( get_row_layout() == 'grid_primary' ):
              $gridPri_menu = get_sub_field( 'gridPri_o_menu' );
              $gridPri_menu_name = get_sub_field( 'gridPri_o_menu_name' );
              if( $gridPri_menu == true ):
                echo '<li><a href="#anchor-' . $i_anchor . '">' . $gridPri_menu_name . '</a></li>';
              endif;
              $i_anchor++;
              
            elseif( get_row_layout() == 'grid_secondary' ):
              $gridSec_menu = get_sub_field( 'gridSec_o_menu' );
              $gridSec_menu_name = get_sub_field( 'gridSec_o_menu_name' );
              if( $gridSec_menu == true ):
                echo '<li><a href="#anchor-' . $i_anchor . '">' . $gridSec_menu_name . '</a></li>';
              endif;
              $i_anchor++;
              
            elseif( get_row_layout() == 'slider' ):
              $slider_menu = get_sub_field( 'slider_o_menu' );
              $slider_menu_name = get_sub_field( 'slider_o_menu_name' );
              if( $slider_menu == true ):
                echo '<li><a href="#anchor-' . $i_anchor . '">' . $slider_menu_name . '</a></li>';
              endif;
              $i_anchor++;
              
            endif;
            
          endwhile;
        endif;
        
      endwhile;
    endif;
    ?>
  </ul>
</nav>