<?php 

class newsletter_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Newsletter';
	}

	public function get_title() {
		return __( 'Boighor Newsletter', 'boighor' );
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
			'newsletter_background_image',
			[
				'label' => __( 'Newsletter Background Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

      
        $this->add_control(
			'newsletter_title',
			[
				'label' => __( 'Newsletter Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Stay With Us')
			]

        );


        $this->add_control(
			'newsletter_description',
			[
				'label' => __( 'Product Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Newsletter description')
			]

        );


        $this->add_control(
			'newsletter_button',
			[
				'label' => __( 'Button Text', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Subscribe')
			]

        );


        

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

   	<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2" style="background-image: url(<?php echo $settings['newsletter_background_image']['url']?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2><?php echo $settings['newsletter_title']?></h2>
						</div>
						<div class="newsletter__block text-center">
							<p><?php echo $settings['newsletter_description']?></p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Enter your e-mail">
									<button><?php echo $settings['newsletter_button']?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        