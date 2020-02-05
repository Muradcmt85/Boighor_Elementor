<?php 

class boighor_account extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_account';
	}

	public function get_title() {
		return __( 'Boighor My-Account', 'boighor' );
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
			'boighor_account_banner_image',
			[
				'label' => __( 'About Us Banner Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );



		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

		        <!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_account_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">My Account</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
       	<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
						<?php echo do_shortcode( '[contact-form-7 id="16903" title="Login wpc"]' )?>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<?php echo do_shortcode('[contact-form-7 id="16904" title="Register wpc"]')?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        