<?php 

class boighor_about extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_aboutUs';
	}

	public function get_title() {
		return __( 'Boighor About Us', 'boighor' );
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
			'boighor_about_banner_image',
			[
				'label' => __( 'About Us Banner Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

      
        $this->add_control(
			'about_title_top',
			[
				'label' => __( 'About Title Top', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('OUR PROCESS SKILL OF HIGH')
			]

        );

      
        $this->add_control(
			'about_description_top',
			[
				'label' => __( 'About Description Top', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG ,
				'default' => __('The right people for your project')
			]

        );
      
        $this->add_control(
			'about_skill_title',
			[
				'label' => __( 'About Skill Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Skill Title')
			]

        );


       
      
		// Skill section repeater are here

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'about_skill_title',
			[
				'label' => __( 'About Skill Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Skill Title')
			]
		);
		
        $repeater->add_control(
			'about_skill_width',
			[
				'label' => __( 'About Skill Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('90')
			]
        );


        
		$this->add_control(
			'Skill_title',
			[
				'label' => __( 'All About Skills', 'boighor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => 'About Skills',
			]
		);



		$this->add_control(
			'book_title1',
			[
				'label' => __( 'Skill right section Title1', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Buy Book')
			]
		);
		
		$this->add_control(
			'book_title2',
			[
				'label' => __( 'About Skill right section Title1', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('DIFFERENT KNOWLEDGE')
			]
        );
		
		$this->add_control(
			'book_description',
			[
				'label' => __( 'About Skill right section description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG ,
				'default' => __('Enter description here')
			]
        );
		
		$this->add_control(
			'book_address_title',
			[
				'label' => __( 'About Skill right section Address Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Address title here')
			]
		);
		
		$this->add_control(
			'book_address',
			[
				'label' => __( 'About Skill right section Address', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Enter Address here')
			]
		);
		

		//Team section are here
		 
		$this->add_control(
			'about_team_title',
			[
				'label' => __( 'About Team Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Team Title')
			]
        );
        
		$this->add_control(
			'about_team_description',
			[
				'label' => __( 'About Team Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Team Desciption')
			]
        );

		
		// Team section repeater are here

		$repeater->add_control(
			'about_team_image',
			[
				'label' => __( 'About Team Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'about_team_member_name',
			[
				'label' => __( 'Team Member Name', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Member Name here')
			]
		);
		

		$repeater->add_control(
			'about_team_member_designation',
			[
				'label' => __( 'Team Member Designation', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Member Designation here')
			]
		);
		

		$repeater->add_control(
			'about_team_member_social_icon',
			[
				'label' => __( 'Member Social Profile', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Member Social icons here')
			]
		);
		

		     
		$this->add_control(
			'team_section',
			[
				'label' => __( 'All Team Members', 'boighor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => 'About Team Members',
			]
		);


		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

		        <!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_about_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">About Page</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start About Area -->
        <div class="page-about about_area bg--white section-padding--lg">
        	<div class="container">
				<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center pb--30">
        					<h2><?php echo $settings['about_title_top']?></h2>
        					<p><?php echo $settings['about_description_top']?></p>
        				</div>
        			</div>
        		</div>
        		<div class="row align-items-center">
					<div class="col-lg-6 col-sm-12 col-12">
        				<div class="content text-left text_style--2">
    					    <h2><?php echo $settings['about_skill_title']?></h2>
    					    <div class="skill-container">
								<!-- Start single skill -->
								<?php foreach($settings['Skill_title'] as $item) {?>
    					        <div class="single-skill">
    					            <p><?php echo $item['about_skill_title']?></p>
    					            <div class="progress">
    					                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $item['about_skill_width']?>%"><span class="pen-lable"></span>
    					                </div>
    					            </div>
								</div>
								<?php } ?>
    					        <!-- End single skill -->
    					    </div>
        				</div>
        			</div>
        			<div class="col-lg-6 col-sm-12 col-12">
        				<div class="content">
        					<h3><?php echo $settings['book_title1']?></h3>
        					<h2><?php echo $settings['book_title2']?></h2>
        					<p class="mt--20 mb--20"><?php echo $settings['book_description']?></p>
        					<strong><?php echo $settings['book_address_title']?></strong>
        					<p><?php echo $settings['book_address']?></p>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End About Area -->
        <!-- Start Team Area -->
        <section class="wn__team__area pb--75 bg--white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center">
        					<h2><?php echo $settings['about_team_title']?></h2>
        					<p><?php echo $settings['about_team_description']?></p>
        				</div>
        			</div>
        		</div>
        		<div class="row">
					<!-- Start Single Team -->
					<?php foreach($settings['team_section'] as $team) {?>
        			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
        				<div class="wn__team">
        					<div class="thumb">
        						<img src="<?php echo $team['about_team_image']['url']?>" alt="Team images">
        					</div>
        					<div class="content text-center">
        						<h4><?php echo $team['about_team_member_name']?></h4>
        						<p><?php echo $team['about_team_member_designation']?></p>
        						<ul class="team__social__net">
        							<li><?php echo $team['about_team_member_social_icon']?></li>
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

        