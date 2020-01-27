<?php 

class boighor_best_sell_product_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'best_sell_Product';
	}

	public function get_title() {
		return __( 'Boighor Best Sell Products', 'boighor' );
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
			'best_sell_products_title',
			[
				'label' => __( 'All Best Sell Products Top Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('New <span class="color--theme">Products</span>')
			]

        );


        $this->add_control(
			'best_sell_products_description',
			[
				'label' => __( 'Best Sell Product Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Product description')
			]

        );

        
    

       
		$repeater = new \Elementor\Repeater();
		
		
        $repeater->add_control(
			'best_sell_products_img1',
			[
				'label' => __( 'Product Image One', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
		);
		
		
        $repeater->add_control(
			'best_sell_products_img2',
			[
				'label' => __( 'Product Image Two', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

        $repeater->add_control(
			'product_hot_sell',
			[
				'label' => __( 'Best Sell', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Best Sell')
			]
        );

        $repeater->add_control(
			'product_title',
			[
				'label' => __( 'Products Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Products Title')
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

       	<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><?php echo $settings['best_sell_products_title']?></h2>
							<p><?php echo $settings['best_sell_products_description']?></p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					
					<?php foreach( $settings['products_list'] as $item) {?>
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="<?php echo get_the_permalink()?>"><img src="<?php echo $item['best_sell_products_img1']['url']?>" alt="product image"></a>
								<a class="second__img animation1" href="<?php echo get_the_permalink()?>"><img src="<?php echo $item['best_sell_products_img2']['url']?>" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label"><?php echo $item['product_hot_sell']?></span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="<?php echo get_the_permalink()?>"><?php echo $item['product_title']?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo '$'. $item['product_new_price']?></li>
									<li class="old_prize"><?php echo '$'. $item['product_old_price']?></li>
								</ul>
								<div class="action">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><a class="cart" href="<?php echo get_the_permalink()?>"><i class="bi bi-shopping-bag4"></i></a></li>
											<li><a class="wishlist" href="<?php echo get_the_permalink()?>"><i class="bi bi-shopping-cart-full"></i></a></li>
											<li><a class="compare" href="<?php echo get_the_permalink()?>"><i class="bi bi-heart-beat"></i></a></li>
											<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product__hover--content">
									<ul class="rating d-flex">
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li><i class="fa fa-star-o"></i></li>
										<li><i class="fa fa-star-o"></i></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					<!-- Start Single Product -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        