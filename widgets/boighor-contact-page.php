<?php 

class boighor_contact extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Contact_page';
	}

	public function get_title() {
		return __( 'Boighor Contact Us', 'boighor' );
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
			'boighor_contact_banner_image',
			[
				'label' => __( 'Contact Us Background Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

      
        $this->add_control(
			'contact_page_maps',
			[
				'label' => __( 'Maps Iframe type here', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Iframe Drop here')
			]

        );
      
        $this->add_control(
			'contact_title',
			[
				'label' => __( 'Contact Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Get In Touch')
			]

        );


        $this->add_control(
			'contact_description',
			[
				'label' => __( 'Product Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Newsletter description')
			]

        );



        $this->add_control(
			'contact_office_title',
			[
				'label' => __( 'Contact Us Office Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Get office info.')
			]

        );

        

        $this->add_control(
			'contact_office_description',
			[
				'label' => __( 'Contact Us Office Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Office description')
			]

        );

        $this->add_control(
			'contact_office_address',
			[
				'label' => __( 'Contact Us Office Address', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Office Address')
			]

        );

        $this->add_control(
			'contact_office_phone',
			[
				'label' => __( 'Contact Us Office Phone', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Office Phone Number')
			]

        );

        $this->add_control(
			'contact_office_email',
			[
				'label' => __( 'Contact Us Office Email', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Office Email')
			]

        );

        $this->add_control(
			'contact_office_website',
			[
				'label' => __( 'Contact Us Office Website', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Office Website')
			]

        );

        

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_contact_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Contact Page</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Contact Area -->
        <section class="wn_contact_area bg--white pt--80 pb--80">
			<div class="google__map pb--80">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="googleMap">
                                <?php echo $settings['contact_page_maps']?>
                            </div>
						</div>
					</div>
				</div>
        	</div>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8 col-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title"><?php echo $settings['contact_title']?></h2>
                            <p><?php echo $settings['contact_description']?></p>
                            <?php echo do_shortcode('[contact-form-7 id="16829" title="contact us wpc"]') ?>
                            <!-- <form id="contact-form" action="#" method="post">
                                <div class="single-contact-form space-between">
                                    <input type="text" name="firstname" placeholder="First Name*">
                                    <input type="text" name="lastname" placeholder="Last Name*">
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" name="email" placeholder="Email*">
                                    <input type="text" name="website" placeholder="Website*">
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" name="subject" placeholder="Subject*">
                                </div>
                                <div class="single-contact-form message">
                                    <textarea name="message" placeholder="Type your message here.."></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit">Send Email</button>
                                </div>
                            </form> -->
                        </div> 
                        <div class="form-output">
                            <p class="form-messege">
                        </div>
        			</div>
        			<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__address">
        					<h2 class="contact__title"><?php echo $settings['contact_office_title']?></h2>
        					<p><?php echo $settings['contact_office_description']?></p>
        					<div class="wn__addres__wreapper">

        						<div class="single__address">
        							<i class="icon-location-pin icons"></i>
        							<div class="content">
        								<span>address:</span>
        								<p><?php echo $settings['contact_office_address']?></p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-phone icons"></i>
        							<div class="content">
        								<span>Phone Number:</span>
        								<p><?php echo $settings['contact_office_phone']?></p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-envelope icons"></i>
        							<div class="content">
        								<span>Email address:</span>
        								<p><?php echo $settings['contact_office_email']?></p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-globe icons"></i>
        							<div class="content">
        								<span>website address:</span>
        								<p><?php echo $settings['contact_office_website']?></p>
        							</div>
        						</div>

        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Contact Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        