<div class="wrap cave-settings">
  
  <?php 
  /** Get the parent theme data. */
  $cave_theme_data = cave_theme_data();
  screen_icon();
  ?>
  
  <h2><?php echo sprintf( __( '%1$s Theme Settings', 'cave' ), $cave_theme_data['Name'] ); ?></h2>    
  
  <?php settings_errors(); ?>
  
  <form action="options.php" method="post" id="cave-form-wrapper">
    
    <div id="cave-form-header" class="cave-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'cave' ); ?>">
    </div>
	
	<?php settings_fields('cave_options_group'); ?>
    
    <div id="cave-sidebar">
      
      <ul id="cave-group-menu">
        <li id="0_section_group_li" class="cave-group-tab-link-li active"><a href="javascript:void(0);" id="0_section_group_li_a" class="cave-group-tab-link-a" data-rel="0"><span><?php _e( 'Blog Settings', 'cave' ); ?></span></a></li>
        <li id="1_section_group_li" class="cave-group-tab-link-li"><a href="javascript:void(0);" id="1_section_group_li_a" class="cave-group-tab-link-a" data-rel="1"><span><?php _e( 'Post Settings', 'cave' ); ?></span></a></li>
        <li id="2_section_group_li" class="cave-group-tab-link-li"><a href="javascript:void(0);" id="2_section_group_li_a" class="cave-group-tab-link-a" data-rel="2"><span><?php _e( 'Footer Settings', 'cave' ); ?></span></a></li>
        <li id="3_section_group_li" class="cave-group-tab-link-li"><a href="javascript:void(0);" id="3_section_group_li_a" class="cave-group-tab-link-a" data-rel="3"><span><?php _e( 'General Settings', 'cave' ); ?></span></a></li>
      </ul>
    
    </div>
    
    <div id="cave-main">
    
      <div id="0_section_group" class="cave-group-tab">
        <?php do_settings_sections( 'cave_section_blog_page' ); ?>
      </div>
      
      <div id="1_section_group" class="cave-group-tab">
        <?php do_settings_sections( 'cave_section_post_page' ); ?>
      </div>
      
      <div id="2_section_group" class="cave-group-tab">
        <?php do_settings_sections( 'cave_section_footer_page' ); ?>
      </div>
      
      <div id="3_section_group" class="cave-group-tab">
        <?php do_settings_sections( 'cave_section_general_page' ); ?>
      </div>
    
    </div>
    
    <div class="clear"></div>
    
    <div id="cave-form-footer" class="cave-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'cave' ); ?>">
    </div>
    
  </form>

</div>