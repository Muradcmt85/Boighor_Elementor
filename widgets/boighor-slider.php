<?php 

class Main_Slider_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_slider';
	}

	public function get_title() {
		return __( 'Boighor Main Slider', 'boighor' );
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

      
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'slider_img',
			[
				'label' => __( 'Slider Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

        $repeater->add_control(
			'slider_title_one',
			[
				'label' => __( 'Slider Title One', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Buy <span>your </span>')
			]
        );

        $repeater->add_control(
			'slider_title_two',
			[
				'label' => __( 'Slider Title Two', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('favourite <span>Book </span>')
			]
        );

        $repeater->add_control(
			'slider_title_three',
			[
				'label' => __( 'Slider Title Three', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('from <span>Here </span>')
			]
        );

        $repeater->add_control(
			'slider_link',
			[
				'label' => __( 'Slider Link Here', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('https://wpcamel.com')
			]
        );

        $repeater->add_control(
			'slider_button_text',
			[
				'label' => __( 'Slider Text Here', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Shop Here')
			]
        );


        
		$this->add_control(
			'Main_slider',
			[
				'label' => __( 'All Proudcts List', 'boighor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slider image' => __( 'Slide image', 'boighor' ),
						'slider_img' => __( 'Click the edit Slide to change this image.', 'plugin-domain' ),
					],
					[
						'slider title one' => __( 'Slide #1', 'boighor' ),
						'slider_title_one' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					[
						'slider title two' => __( 'Slide #2', 'boighor' ),
						'slider_title_two' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					[
						'slider title three' => __( 'Slide #3', 'boighor' ),
						'slider_title_three' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					[
						'slider button link' => __( 'Slide button link', 'boighor' ),
						'slider_link' => __( 'Click the edit button to change this button link.', 'plugin-domain' ),
					],
					[
						'slider button text' => __( 'Slide button text', 'boighor' ),
						'slider_button_text' => __( 'Click the edit button to change this text.', 'plugin-domain' ),
					],
					
					
				],
				'title_field' => '{{{ slider_title_one }}}',
				
			]
		);

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

          <!-- Start Slider area -->
		  <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
			<!-- Start Single Slide -->
			<?php foreach($settings['Main_slider'] as $item) {?>
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left" style="background-image: url(<?php echo $item['slider_img']['url']?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2><?php echo $item['slider_title_one']?></h2>
		            				<h2><?php echo $item['slider_title_two']?></h2>
		            				<h2><?php echo $item['slider_title_three']?></h2>
				                   	<a class="shopbtn" href="<?php echo $item['slider_link']?>"><?php echo $item['slider_button_text']?></a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
			<!-- End Single Slide -->
			<?php }?>
        </div>

  <?php }

protected function _content_template() {
	?>


<?php }

}

        