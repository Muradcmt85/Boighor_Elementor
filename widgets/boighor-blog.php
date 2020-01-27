<?php
class boighor_blog_area extends \Elementor\Widget_Base {

	public function get_name() {
    return "Boighor_Blog"; 
  } 

	public function get_title() {
    return __("Boighor Blog", 'boighor');
  }

	public function get_icon() {
    return "fa fa-cog";
  }

	public function get_categories() {
    return [ 'general' ]; 
  }

	protected function _register_controls() {
    $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'boighor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );
    
    // $this->add_control(
	// 		'image_icon',
	// 		[
	// 			'label' => __( 'Section Image Icon', 'boighor' ),
    //     'type' => \Elementor\Controls_Manager::MEDIA,
    //     'default' => [
	// 				'url' => \Elementor\Utils::get_placeholder_image_src(),
    //             ],
                
    //         'default' => 'Insert Image',
	// 		]
    // );

		$this->add_control(
			'blog_title',
			[
				'label' => __( 'Blog Top Title', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Blog Title', 'elementortestplugin' ),
                'default' => 'Our <span class="color--theme"> Blog </span>',
			]
    );

		$this->add_control(
			'blog_description',
			[
				'label' => __( 'Blog Description', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Blog Description', 'elementortestplugin' ),
                'default' => 'Insert Blog Description',
			]
    );

    
    $this->add_control(
			'posts_per_page' ,
			[
				'label' => __( 'Number of Post', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					'1'  => __( 'One', 'elementortestplugin' ),
					'2' => __( 'Two', 'elementortestplugin' ),
					'3' => __( 'Three', 'elementortestplugin' ),
					'4' => __( 'Four', 'elementortestplugin' ),
					'5' => __( 'Five', 'elementortestplugin' ),
					'6' => __( 'Six', 'elementortestplugin' ),
				],
			]
    );
    
    // global $post;
    $categories = get_categories( array(
      'orderby' => 'name',
      'order' => 'ASC'
    ) );
    // print_r($categories);

    $All_categories = [];
		foreach ( $categories as $values ) {
      $All_categories[ $values->cat_name ] = $values->cat_name;
    }

    $this->add_control(
			'categories_name',
			[
				'label' => __( 'Name of Category', 'elementortestplugin' ),
        'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $All_categories,
			]
    );

		$this->end_controls_section();
  }

	protected function render() {
    $settings = $this->get_settings_for_display();?>

  <!-- Start Recent Post Area -->
  <section class="wn__recent__post bg--gray ptb--80">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section__title text-center">
                      <h2 class="title__be--2"><?php echo $settings['blog_title']?></span></h2>
                      <p><?php echo $settings['blog_description']?></p>
                  </div>
              </div>
          </div>
          <div class="row mt--50">
         <?php     
        $args = array(
          'posts_per_page' => $settings['posts_per_page'],
          'ignore_sticky_posts' => 1,
          'category_name'  => $settings['categories_name'],
        );
        $query = new WP_Query( $args );

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
              <div class="col-md-6 col-lg-4 col-sm-12">
                  <div class="post__itam">
                      <div class="content">
                          <h3><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title();?> </a></h3>
                          <p><?php echo get_the_excerpt()?></p>
                          <div class="post__time">
                              <span class="day"><?php echo get_the_date()?></span>
                              <div class="post-meta">
                                  <ul>
                                      <li><a href="#"><i class="bi bi-love"></i><?php echo get_comments_number()?></a></li>
                                      <li><a href="#"><i class="bi bi-chat-bubble"></i><?php echo get_comments_number()?></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php
                        
                endwhile;        
                wp_reset_postdata();
                endif;
              ?>
          </div>
      </div>
  </section>
  <!-- End Recent Post Area -->
   <?php 
  }

	protected function _content_template() {
    
  }

}