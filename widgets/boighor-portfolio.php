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
			'boighor_portfolio_banner_image',
			[
				'label' => __( 'About Us Banner Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

        $this->add_control(
			'portfolio_button',
			[
				'label' => __( 'Button Text', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Read More')
			]

        );


        
    

       

		$this->end_controls_section();

	}

	protected function render() { 

		$settings = $this->get_settings_for_display(); ?>

        
                <!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_portfolio_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
							<?php 
								$terms = get_terms( 'portfolio_category', array(
									'hide_empty' => false,
								) );
								// print_r($terms);
								foreach ($terms as $term) { ?>
                            <button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
							<?php } ?>
                      	</div>
					</div>
				</div>
				
				<div class="row masonry__wrap">
				<?php 

				$args = array(
					'post_type' => 'portfolio',
					'showposts' => 12,
				);
				// the query
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
				
				
					<!-- Start Single Portfolio -->
					<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item <?php 
					$portfolio= wp_list_pluck( get_the_terms( get_the_ID(), 'portfolio_category' ), 'slug');
					print_r($portfolio);
					foreach( $portfolio as $term ) {
						echo $term;
					  }
					?> " >
	
						<div class="portfolio">
							<div class="thumb">
								<a href="<?php echo get_the_permalink();?>">
									<img src="<?php echo get_the_post_thumbnail_url();?>" alt="portfolio images">
								</a>
								<div class="search">
									<a href="<?php echo get_the_post_thumbnail_url();?>" data-lightbox="grportimg" data-title="My caption"><i class="zmdi zmdi-search"></i></a>
								</div>
								<div class="link">
									<a href="<?php echo get_the_permalink();?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
							<div class="content">
								<h6><a href="<?php echo get_the_permalink();?>"><?php the_title()?></a></h6>
								<p><?php echo $settings['portfolio_button']?></p>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
						
						<?php else : ?>
							<p><?php _e( 'Sorry, not found portfolio item.' ); ?></p>
						<?php endif; ?>
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

        