<?php
/*
 * Adding an extra admin page for tutorials
 * This page is information reference about the admin panel, created for clients
 */

add_action( 'admin_menu', 'custom_page_tutorial_register' );

function custom_page_tutorial_register(){
  add_submenu_page(
    'index.php', // Parent slug
    'Tutorial',                // page title
    'Tutorial',                // menu title
    'read',                    // capability
    'tutorial',                // menu slug
    'custom_page_tutorial_render'        // callback function
  );
}
function custom_page_tutorial_render(){
?>
  <div class="wrap tutorial">
    <div class="tutorial-header">
      <h1>Tutorial</h1>
      <p>In this tutorial, you'll find everything you need to know about the admin panel that you are looking at now. The difference between posts and pages, adding media, filling out content blocks and more.</p>
    </div>
  
    <!-- 01. Tutorial Block -->
    <div class="tutorial-block">
      <div class="tutorial-block-left">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/placeholder.png">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/placeholder.png">
      </div>
      <div class="tutorial-block-right">
        <h2>Title</h2>
        <p>Success ramen mass market seed money disruptive learning curve. Www.discoverartisans.com startup business model canvas agile development twitter bandwidth vesting period. Influencer creative incubator twitter scrum project lean startup series.<br><br>Agile development twitter bandwidth vesting period. Influencer creative incubator twitter scrum project lean startup series.</p>
      </div>
    </div>
  
    <!-- 02. Tutorial Block -->
    <div class="tutorial-block">
      <div class="tutorial-block-left">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/placeholder.png">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/placeholder.png">
      </div>
      <div class="tutorial-block-right">
        <h2>Title</h2>
        <p>Success ramen mass market seed money disruptive learning curve. Www.discoverartisans.com startup business model canvas agile development twitter bandwidth vesting period. Influencer creative incubator twitter scrum project lean startup series.<br><br>Agile development twitter bandwidth vesting period. Influencer creative incubator twitter scrum project lean startup series.</p>
      </div>
    </div>
  </div>
  <?php
}

// Styling this content
add_action('admin_head', 'custom_css_tutorial');

function custom_css_tutorial(){
  echo '<style>
    .tutorial-header{
      width: 50%;
      margin-bottom: 40px;
    }
    
    .tutorial .tutorial-block{
      width: 100%;
      height: auto;
      overflow: hidden;
      margin-bottom: 40px;
      border-bottom: thin dotted black;
    }
    
    .tutorial .tutorial-block .tutorial-block-left{
      width: 50%;
      float: left;
    }
    
    .tutorial .tutorial-block .tutorial-block-left img{
      max-width: 100%;
      margin-bottom: 40px;
    }
    
    .tutorial .tutorial-block .tutorial-block-right{
      width: calc(50% - 40px);
      max-width: 500px;
      padding: 0;
      margin-bottom: 40px;
      padding-left: 40px;
      float: left;
    }
  </style>';
}
?>