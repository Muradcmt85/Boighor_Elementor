<?php 

class best_sell_section extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_best_sell';
	}

	public function get_title() {
		return __( 'Boighor Best Sell', 'boighor' );
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
			'best_sell_title',
			[
				'label' => __( 'Best sell Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Best <span class="color--theme">Seller </span>')
			]

        );


        $this->add_control(
			'best_sell_description',
			[
				'label' => __( 'Best sell Description', 'boighor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Enter Best sell description')
			]

        );

        

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

        <!-- Best Sale Area -->
		<section class="best-seel-area pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center pb--50">
							<h2 class="title__be--2"><?php echo $settings['best_sell_title']?></h2>
							<p><?php echo $settings['best_sell_description']?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="slider center">
                <!-- Single product start -->
                <?php 

                $args = array(
                    'post_type' => 'allporduct',
                    'post_per_page' => 8,
                );
                // the query
                $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="single-product.html"><?php the_post_thumbnail()?></a>
					</div>
					<div class="product__content content--center">
						<div class="action">
							<div class="actions_inner">
								<ul class="add_to_links">
									<li><a class="cart" href="<?php echo get_the_permalink();?>"><i class="bi bi-shopping-bag4"></i></a></li>
									<li><a class="wishlist" href="<?php echo get_the_permalink();?>"><i class="bi bi-shopping-cart-full"></i></a></li>
									<li><a class="compare" href="<?php echo get_the_permalink();?>"><i class="bi bi-heart-beat"></i></a></li>
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
                <!-- Single product end -->
                <?php endwhile;  ?>
                    <?php wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, No products found.' ); ?></p>
                <?php endif; ?>
			</div>
		</section>
		<!-- Best Sale Area Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        