<?php 

class boighor_about extends \Elementor\Widget_Base {

	public function get_name() {
		return 'boighor_aboutUs';
	}

	public function get_title() {
		return __( 'Boighor About Us', 'boighor' );
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
			'boighor_about_banner_image',
			[
				'label' => __( 'About Us Banner Image', 'boighor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/assets/images/slider/bg1.jpg',
				],
			]
        );

      
        $this->add_control(
			'about_title_top',
			[
				'label' => __( 'About Title Top', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('OUR PROCESS SKILL OF HIGH')
			]

        );

      
        $this->add_control(
			'about_description_top',
			[
				'label' => __( 'About Description Top', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('The right people for your project')
			]

        );
      
        $this->add_control(
			'about_skill_title',
			[
				'label' => __( 'About Skill Title', 'boighor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enter Skill Title')
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
                            <h2 class="bradcaump-title">About Page</h2>
                            <nav class="bradcaump-content">
                            <?php the_breadcrumb(); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start About Area -->
        <div class="page-about about_area bg--white section-padding--lg">
        	<div class="container">
				<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center pb--30">
        					<h2><?php echo $settings['about_title_top']?></h2>
        					<p><?php echo $settings['about_description_top']?></p>
        				</div>
        			</div>
        		</div>
        		<div class="row align-items-center">
					<div class="col-lg-6 col-sm-12 col-12">
        				<div class="content text-left text_style--2">
    					    <h2><?php echo $settings['about_skill_title']?></h2>
    					    <div class="skill-container">
    					        <!-- Start single skill -->
    					        <div class="single-skill">
    					            <p>Customer Favorites</p>
    					            <div class="progress">
    					                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%"><span class="pen-lable"></span>
    					                </div>
    					            </div>
    					        </div>
    					        <!-- End single skill -->
    					        <!-- Start single skill -->
    					        <div class="single-skill">
    					            <p>Popular Authors</p>
    					            <div class="progress">
    					                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width:95%"><span class="pen-lable"></span>
    					                </div>
    					            </div>
    					        </div>
    					        <!-- End single skill -->
    					        <!-- Start single skill -->
    					        <div class="single-skill">
    					            <p>Bestselling Series</p>
    					            <div class="progress">
    					                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:93%"><span class="pen-lable"></span>
    					                </div>
    					            </div>
    					        </div>
    					        <!-- End single skill -->
    					        <!-- Start single skill -->
    					        <div class="single-skill">
    					            <p>Bargain Books</p>
    					            <div class="progress">
    					                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%"><span class="pen-lable"></span>
    					                </div>
    					            </div>
    					        </div>
    					        <!-- End single skill -->
    					    </div>
        				</div>
        			</div>
        			<div class="col-lg-6 col-sm-12 col-12">
        				<div class="content">
        					<h3>Buy Book</h3>
        					<h2>Different Knowledge</h2>
        					<p class="mt--20 mb--20">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
        					<strong>London Address</strong>
        					<p>34 Parer Place via Musk Avenue Kelvin Grove, QLD, 4059</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End About Area -->
        <!-- Start Team Area -->
        <section class="wn__team__area pb--75 bg--white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="section__title--3 text-center">
        					<h2>Meet our team of experts</h2>
        					<p>the right people for your project</p>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<!-- Start Single Team -->
        			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
        				<div class="wn__team">
        					<div class="thumb">
        						<img src="images/about/team/1.jpg" alt="Team images">
        					</div>
        					<div class="content text-center">
        						<h4>JOHN SMITH</h4>
        						<p>Manager</p>
        						<ul class="team__social__net">
        							<li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
        						</ul>
        					</div>
        				</div>
        			</div>
        			<!-- End Single Team -->
        			<!-- Start Single Team -->
        			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
        				<div class="wn__team">
        					<div class="thumb">
        						<img src="images/about/team/2.jpg" alt="Team images">
        					</div>
        					<div class="content text-center">
        						<h4>ALICE KIM</h4>
        						<p>Co-Founder</p>
        						<ul class="team__social__net">
        							<li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
        						</ul>
        					</div>
        				</div>
        			</div>
        			<!-- End Single Team -->
        			<!-- Start Single Team -->
        			<div class="col-lg-4 col-md-4 col-sm-6 col-12">
        				<div class="wn__team">
        					<div class="thumb">
        						<img src="images/about/team/3.jpg" alt="Team images">
        					</div>
        					<div class="content text-center">
        						<h4>VICTORIA DOE</h4>
        						<p>Marketer</p>
        						<ul class="team__social__net">
        							<li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
        						</ul>
        					</div>
        				</div>
        			</div>
        			<!-- End Single Team -->
        		</div>
        	</div>
        </section>
        <!-- End Team Area -->

  <?php }

protected function _content_template() {
	?>


<?php }

}

        