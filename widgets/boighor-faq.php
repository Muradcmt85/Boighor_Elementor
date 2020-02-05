<?php 

class boighor_faq extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Faq_page';
	}

	public function get_title() {
		return __( 'Boighor Faq Page', 'boighor' );
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
			'boighor_faq_banner_image',
			[
				'label' => __( 'Contact Us Background Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

        $this->add_control(
			'faq_title',
			[
				'label' => __( 'Faq Top Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Blog Title', 'boighor' ),
                'default' => 'Enter Top Title',
			]
    );

		$this->add_control(
			'faq_description',
			[
				'label' => __( 'Faq Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Blog Description', 'boighor' ),
                'default' => 'Insert Faq Description',
			]
    );
   


	$repeater = new \Elementor\Repeater();
	
	$repeater->add_control(
		'accordion_title',
		[
			'label' => __( 'Accordion Title Here', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Accordion Title')
		]
	);

	$repeater->add_control(
		'accordion_description',
		[
			'label' => __( 'Accordion Description', 'boighor' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'default' => __('Accordion Description Enter here')
		]
	);

		
	$repeater->add_control(
		'accordion_show',
		[
			'label' => __( 'Open anyone write show', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Wirte just =>show')
		]
	);
	$repeater->add_control(
		'accordion_id',
		[
			'label' => __( 'ID Must Need Unique', 'boighor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('heading_one')
		]
	);

	
	$this->add_control(
		'Main_accordion',
		[
			'label' => __( 'All Accordion List', 'boighor' ),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => 'Accordion Item',
		]
	);
        

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_faq_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Faq Page</h2>
                    <nav class="bradcaump-content">
                    <?php the_breadcrumb(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
  
<!-- end breadcumb section -->
		<!-- Start Faq Area -->
		<section class="wn__faq__area bg--white pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wn__accordeion__content">
							<h2><?php echo $settings['faq_title']?></h2>
							<p><?php echo $settings['faq_description']?></p>
						</div>
						<div id="accordion" class="wn_accordion" role="tablist">
						<?php foreach($settings['Main_accordion'] as $item) {?>
							<div class="card">
						        <div class="acc-header" role="tab" id="headingOne">
						          	<h5>
						                <a data-toggle="collapse" href="#<?php echo $item['accordion_id']?>" role="button" aria-expanded="true" aria-controls="collapseOne"><?php echo $item['accordion_title']?></a>
						          	</h5>
						        </div>
						        <div id="<?php echo $item['accordion_id']?>" class="collapse <?php echo $item[accordion_show]?>" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            	<div class="card-body"><?php echo $item['accordion_description']?></div>
						        </div>
						    </div>
						<?php } ?>
						</div>
					</div> 
				</div> 
			</div> 
		</section>
		<!-- End Faq Area -->


  <?php }

protected function _content_template() {
	?>


<?php }

}
