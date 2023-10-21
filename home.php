<?php get_header(); ?>
	
<section class="hero relative">
    <div class="hero__slideshow relative">
        <canvas class="block w-100 h-auto" width="1512" height="1080"></canvas>
        <img src="<?= get_stylesheet_directory_uri()?>/assets/images/banner.jpg" alt="slide1" class="block w-100 absolute h-100 top-0 left-0 object-fit-cover object-position-top "> 
    </div>
    <div class="hero__content absolute w-100">
        <div class="default-container">
            <h1>Spider-Man’s 60th</h1>
            <p>Celebrate Spidys 60th annivessary with most of is most iconic <br> stories!</p>
            <div class="default-button">
                <a href="#">Read More</a>
            </div>
        </div>
    </div>
</section>

<section class="comics">
   <div class="default-container comics__container">
        <div class="comics__row flex flex-wrap-wrap">
             <?php 
                echo do_shortcode('
                [marvel_api endpoint="comics" limit="8"]
                    [loop_start]
                        <div class="comics__col">
                            <div class="comics__image relative">
                                <canvas class="block w-100 h-auto" width="285" height="350"></canvas>
                                [thumbnail]
                             </div>
                            <div class="comics__content">
                                <h3>[title]</h3>
                                <ul>
                                    <li><span>[author]</span></li>
                                    <li>|</li>
                                    <li><span>[date]</span></li>
                                </ul>
                            </div>
                        </div><!-- end of col -->
                    [loop_end]
                [/marvel_api]');
            ?>
        </div>
        <div class="comics__more">
            <a href="/more-comics/">More...</a>
        </div>
    </div>
</section>

<section class="marvelHeroes">
    <div class="default-container marvelHeroes__container">
        <h2>See Marvel Heros</h2>

        <div class="marvelHeroes__row flex flex-wrap-wrap">

        
            <?php 
                echo do_shortcode('
                [marvel_api endpoint="characters" limit="8"]
                    [loop_start]
                        <div class="marvelHeroes__col">
                            <a href="#" class="block relative globPopup">
                                <div class="marvelHeroes__img relative">
                                    <canvas class="block w-100 h-auto" width="285" height="350"></canvas>
                                    [thumbnail]
                                </div>
                                <div class="marvelHeroes__content">
                                    <div class="marvelHeroes__content--title">
                                        <h3>[name]</h3>
                                        <span>[real_name]</span>
                                    </div>
                                    <div class="marvelHeroes__content--year">
                                        [year]
                                    </div>
                                </div>

                                <div class="HeroesMoreInfo">
                                    <div class="profile-photo">
                                        [thumbnail]
                                    </div>
                                    <div class="profile-content">
                                        <h2>[name]</h2>
                                        <p>[description]</p>
                                        <h3>Series</h3>
                                        <ul>
                                            [stories]
                                        </ul>

                                        <h3>Comics Lists</h3>
                                        <ul>
                                            [comics]
                                            
                                        </ul>
                                        <h3>Stories</h3>
                                        <ul>
                                            [stories]
                                        </ul>
                                    </div>

                                    <div class="popup-modal-dismiss">close</div>
                                </div>
                            </a>
                        </div><!-- end of col -->
                    [loop_end]
                [/marvel_api]');
            ?>
        </div>
    </div>
</section>

<section class="latestNews">
    <div class="default-container latestNews__container">
        <h2>Latest News</h2>

        <div class="latestNews__row flex flex-wrap-wrap">

            <?php 

                    $args = array(
                       'category_name'   => 'latest-news',
                        'post_type'       => 'post',
                        'posts_per_page'  => -1,
                        'orderby'         => 'date',
                        'order'           => 'DESC' 
                    );

                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            // Your post content here

                            echo ' <div class="latestNews__col">
                                <a href="'.get_the_permalink().'" class="flex block w-100">
                                    <div class="latestNews__img relative">
                                        <canvas class="block w-100 h-auto" width="215" height="126"></canvas>
                                        '.get_the_post_thumbnail(null, 'full').'
                                    </div>
                                    <div class="latestNews__content">
                                        <h3>'. get_the_title() .'</h3>
                                    </div>
                                </a>
                            </div>';
                        }
                    } else {
                        // No posts found
                    }

                    wp_reset_postdata();
            ?>
        </div>
    </div>
</section>


<section class="marvelInsider">
    <div class="marvelInsider__container flex items-center">
        <div class="marvelInsider__img">
            <img src="<?= get_stylesheet_directory_uri()?>/assets/images/marvel-insider.jpg" alt="slide1" class="block w-100 h-auto" width="783" height="445"> 
        </div>
        <div class="marvelInsider__content">
            <h4>MARVEL INSIDER</h4>
            <h5>watch, Earn, Redeem!</h5>
            <p>Get a reward for what you already do as a fan.</p>
           <div class="default-button">
                <a href="#">Read More</a>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>
