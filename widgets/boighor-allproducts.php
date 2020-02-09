<?php 

class Allproducts_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_products';
	}

	public function get_title() {
		return __( 'Boighor All Products', 'boighor' );
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
			'allproducts_title',
			[
				'label' => __( 'All Products Top Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('All <span class="color--theme">Products</span>')
			]

        );


        $this->add_control(
			'allproducts_description',
			[
				'label' => __( 'All Product Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Product description')
			]

        );



		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>s

	<!-- Start Best Seller Area -->
	<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><?php echo $settings['allproducts_title']?></h2>
							<p><?php echo $settings['allproducts_description']?></p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
							<a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">ALL</a>
							<?php 
								$terms = get_terms( 'product_cat', array(
									'hide_empty' => false,
								) );
								foreach ($terms as $term) { ?>
							<a class="nav-item nav-link" data-toggle="tab" href="#<?php echo $term->slug; ?>" role="tab"><?php echo $term->name; ?></a>
							<?php } ?>
                        </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">	
						<?php 

				$args = array(
					'post_type' => 'product',
					 'posts_per_page' => 2, 
					 'taxonomy' => 'product_cat'  
				);
				// the query
				$the_query = new WP_Query( $args ); ?>

						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							<div class="single__product">
								<!-- Start Single Product -->
				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); global $product;?>
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="<?php echo get_the_permalink()?>"><?php echo woocommerce_get_product_thumbnail()?></a>
											<a class="second__img animation1" href="<?php echo get_the_permalink()?>"><?php echo woocommerce_get_product_thumbnail()?></a>
											<div class="hot__box">
											
												<span class="hot-label">BEST SALER</span>
												
											</div>
										</div>
										<div class="product__content content--center content--center">
											<h4><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h4>
											<ul class="prize d-flex">
												<li><?php woocommerce_template_single_price()?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="http://localhost/wordpress/cart/"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
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
								</div><?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
						
						<?php else : ?>
							<p><?php _e( 'Sorry, not found Products item.' ); ?></p>
						<?php endif; ?>
								<!-- Start Single Product -->
							</div>
						</div>
						
					</div>
					<!-- End Single Tab Content -->
							</div>
						</div>
					</div>
					<!-- End Single Tab Content -->
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->



  <?php }

protected function _content_template() {
	?>


<?php }

}

        