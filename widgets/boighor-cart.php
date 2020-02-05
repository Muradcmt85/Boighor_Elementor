<?php 

class boighor_cart extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Cart_page';
	}

	public function get_title() {
		return __( 'Boighor Cart Page', 'boighor' );
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
			'boighor_cart_banner_image',
			[
				'label' => __( 'Contact Us Background Image', 'boighor' ),
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

<div class="ht__bradcaump__area bg-image--6" style="background-image: url(<?php echo $settings['boighor_cart_banner_image']['url']?>);  background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Cart Page</h2>
                    <nav class="bradcaump-content">
                    <?php the_breadcrumb(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
  
<!-- end breadcumb section -->

<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="#">               
                    <div class="table-content wnro__table table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 

                                $args = array(
                                    'post_type' => 'Product',
                                    'posts_per_page' => 12,
                                );
                                // the query
                                $the_query = new WP_Query( $args ); ?>

                                <?php if ( $the_query->have_posts() ) : ?>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><?php echo get_the_post_thumbnail()?></a></td>
                                    <td class="product-name"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></td>
                                    <td class="product-price"><span class="amount">$165.00</span></td>
                                    <td class="product-quantity"><input type="number" value="1"></td>
                                    <td class="product-subtotal">$165.00</td>
                                    <td class="product-remove"><a href="#">X</a></td>
                                </tr>
                                <?php  endwhile;  ?>
										<?php wp_reset_postdata(); ?>
									
									<?php else : ?>
										<p><?php _e( 'Sorry, No products found.' ); ?></p>
									<?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form> 
                <div class="cartbox__btn">
                    <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                        <li><a href="#">Coupon Code</a></li>
                        <li><a href="#">Apply Code</a></li>
                        <li><a href="#">Update Cart</a></li>
                        <li><a href="#">Check Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area">
                    <div class="cartbox-total d-flex justify-content-between">
                        <ul class="cart__total__list">
                            <li>Cart total</li>
                            <li>Sub Total</li>
                        </ul>
                        <ul class="cart__total__tk">
                            <li>$70</li>
                            <li>$70</li>
                        </ul>
                    </div>
                    <div class="cart__total__amount">
                        <span>Grand Total</span>
                        <span>$140</span>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<!-- cart-main-area end -->


  <?php }

protected function _content_template() {
	?>


<?php }

}

        