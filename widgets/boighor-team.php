<?php 

class boighor_team extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team_page';
	}

	public function get_title() {
		return __( 'Boighor Team Page', 'boighor' );
	}

	public function get_icon() {
		return 'fa fa-star';
	}

	public function get_categories() {
		return [ 'Basic' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'boighor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


        $this->add_control(
			'boighor_team_banner_image',
			[
				'label' => __( 'Contact Us Background Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );



	$repeater = new \Elementor\Repeater();
	
    $repeater->add_control(
        'member_image',
        [
            'label' => __( 'Team Member Image', 'boighor' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
            ],
        ]
    );

		
	$repeater->add_control(
		'Member_name',
		[
			'label' => __( 'Member Name', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Jhone Doe')
		]
    );
    
    
	$repeater->add_control(
		'member_designation',
		[
			'label' => __( 'Member Designation', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Developer')
		]
	);

	$repeater->add_control(
		'member_facebook_profile',
		[
			'label' => __( 'Member Social Profile', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('<a href="#"><i class="icon-social-facebook icons"></i></a>')
		]
	);

	$repeater->add_control(
		'member_twitter_profile',
		[
			'label' => __( 'Member Social Profile', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('<a href="#"><i class="icon-social-facebook icons"></i></a>')
		]
	);

	$repeater->add_control(
		'member_tumblr_profile',
		[
			'label' => __( 'Member Social Profile', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('<a href="#"><i class="icon-social-facebook icons"></i></a>')
		]
	);

	$repeater->add_control(
		'member_linkedin_profile',
		[
			'label' => __( 'Member Social Profile', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('<a href="#"><i class="icon-social-facebook icons"></i></a>')
		]
	);

	$repeater->add_control(
		'member_pinterest_profile',
		[
			'label' => __( 'Member Social Profile', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('<a href="#"><i class="icon-social-facebook icons"></i></a>')
		]
	);

	
	$this->add_control(
		'Team_member_list',
		[
			'label' => __( 'All Members List', 'boighor' ),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => 'Team Members',
		]
	);
        

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_team_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Team Page</h2>
                    <nav class="bradcaump-content">
                    <?php the_breadcrumb(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
  
<!-- end breadcumb section -->
  <!-- Start Team Area -->
  <section class="wn__team__area pt--40 pb--75 bg--white">
        	<div class="container">
        		<div class="row">
        			<!-- Start Single Team -->
                    <?php foreach($settings['Team_member_list'] as $items) {?>
        			<div class="col-lg-3">
        				<div class="wn__team text-center">
        					<div class="thumb">
        						<img src="<?php echo $items['member_image']['url']?>" alt="Team images">
        					</div>
        					<div class="content">
        						<h4><?php echo $item['member_name']?></h4>
        						<p><?php echo $item['member_designation']?></p>
        						<ul class="team__social__net">
        							<li><?php echo $items['member_facebook_profile']?></li>
        							<li><?php echo $items['member_twitter_profile']?></li>
        							<li><?php echo $items['member_tumblr_profile']?></li>
        							<li><?php echo $items['member_linkedin_profile']?></li>
        							<li><?php echo $items['member_pinterest_profile']?></li>
        						</ul>
        					</div>
                        </div>
        			</div>
                        <?php } ?>
        			<!-- End Single Team -->
        		</div>
        	</div>
        </section>
        <!-- End Team Area -->


  <?php }

protected function _content_template() {
	?>


<?php }

}
      
      
      
    