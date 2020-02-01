<?php 

class portfolio_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_portfolio';
	}

	public function get_title() {
		return __( 'Boighor Portfolio', 'boighor' );
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
			'products_title',
			[
				'label' => __( 'All Products Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('All <span class="color--theme">Products</span>')
			]

        );


        $this->add_control(
			'Product_description',
			[
				'label' => __( 'Product Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Product description')
			]

        );

        
    

       
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'product_hot_sell',
			[
				'label' => __( 'Best Sell', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Best Sell')
			]
        );

        $repeater->add_control(
			'product_new_price',
			[
				'label' => __( 'New Price', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('New Price')
			]
        );

        $repeater->add_control(
			'product_old_price',
			[
				'label' => __( 'Old Price', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Old Price')
			]
        );

        
		$this->add_control(
			'products_list',
			[
				'label' => __( 'All Proudcts List', 'boighor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => 'Proudcts List Item',
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
                            <h2 class="bradcaump-title">Portfolio Page</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start Portfolio Area -->
		<section class="wn__portfolio__area gallery__masonry__activation bg--white mt--40 pb--100">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="gallery__menu">
                            <button data-filter="*" class="is-checked">Filter - All</button>
                            <button data-filter=".cat--1">Company News</button>
                            <button data-filter=".cat--2">Computers</button>
                            <button data-filter=".cat--3">General News</button>
                            <button data-filter=".cat--4">Hipster Content</button>
                            <button data-filter=".cat--5">Just Food</button>
                      	</div>
					</div>
				</div>
				<div class="row masonry__wrap">
					<!-- Start Single Portfolio -->
					<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--1">
						<div class="portfolio">
							<div class="thumb">
								<a href="portfolio-details.html">
									<img src="images/portfolio/md-img/1.jpg" alt="portfolio images">
								</a>
								<div class="search">
									<a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg" data-title="My caption"><i class="zmdi zmdi-search"></i></a>
								</div>
								<div class="link">
									<a href="portfolio-details.html"><i class="fa fa-link"></i></a>
								</div>
							</div>
							<div class="content">
								<h6><a href="portfolio-details.html">Coffee & Cookie Time</a></h6>
								<p>road theme</p>
							</div>
						</div>
					</div>
					<!-- End Single Portfolio -->
				</div>
			</div>
		</section>
		<!-- End Portfolio Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        