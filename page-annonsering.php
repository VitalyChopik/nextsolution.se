<?php get_header('landing');?>
    <main class="main">
		<section class="main-section">
			<div class="container__fluid">
				<div class="main-section__block">
                <?php if( have_rows('main_section') ): 
                    while( have_rows('main_section') ): the_row(); 
                        
                        // переменные
                        $image = get_sub_field('image');
                        
                        ?>
                        <span class="title" data-wow-delay="1.5s"><?php the_sub_field('title'); ?></span>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="logo">
                        <span class="subtitle" data-wow-delay="1.5s"><?php the_sub_field('subtitle'); ?></span>
                    <?php endwhile; ?>
                <?php endif; ?>

				</div>
			</div>
		</section>

		<section class="cta" id="about">
			<div class="container">
				<div class="cta__block d-flex">
                    <?php if( have_rows('cta') ): 
                        while( have_rows('cta') ): the_row(); ?>
                            <h2 class="section__title cta__title" data-wow-delay="0.5s"><?php the_sub_field('title'); ?></h2>
                            <div class="cta__box">
                                <p data-wow-delay="0.5s"><?php the_sub_field('subtitle'); ?></p>
                                <a href="#form" class="btn-click" data-wow-delay="0.5s"><?php the_sub_field('button_text'); ?></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

				</div>
			</div>
		</section>
		<section class="strategy" id="service">
			<div class="container">
				<div class="strategy__block d-flex">
                    <?php if( have_rows('service') ): 
                        while( have_rows('service') ): the_row(); 
                            $image = get_sub_field('image');
                            ?>
                            <div class="img" data-wow-delay="1s"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
                            <div class="strategy__box">
                                <h2 class="strategy__title section__title" data-wow-delay="0.5s"><?php the_sub_field('title'); ?></h2>
                                <div class="accordion__block" data-wow-delay="0.5s">
                                <?php
                                    if( have_rows('accordion') ):
                                        while ( have_rows('accordion') ) : the_row();
                                            ?>
                                                <div class="accordion">
                                                    <div class="accordion__intro">
                                                        <h4><?php  the_sub_field('accordion__title');?></h4>
                                                        <img src="<?php echo get_template_directory_uri()?>/landing-page/img/arrow-down.svg" alt="">
                                                    </div>
                                                    <div class="accordion__content">
                                                        <?php  the_sub_field('text');?>
                                                    </div>
                                                </div>
                                            <?php
                                        endwhile;
                                    endif;

                                    ?>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

				</div>
			</div>
		</section>
		<section class="recent">
			<div class="container__fluid">
				<div class="recent__block">
                    <?php if( have_rows('our_recent_work') ): 
                        while( have_rows('our_recent_work') ): the_row(); ?>
                    <h2 class="recent__title section__title"><?php the_sub_field('title'); ?></h2>
					<p><?php the_sub_field('subtitle'); ?></p>

                        <?php endwhile; ?>
                    <?php endif; ?>

				</div>
			</div>
		</section>
		<section class="project" id="work">
			<div class="container">
				<div class="project__block d-flex">
                    <?php if( have_rows('work') ): 
                        while( have_rows('work') ): the_row(); 
                            $image = get_sub_field('image');
                            ?>
                            <div class="img"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
                            <div class="project__box">
                                <div class="ready d-flex">
                                    <?php
                                        if( have_rows('subtitle') ):
                                            while ( have_rows('subtitle') ) : the_row();
                                                ?>
                                                <h3><?php  the_sub_field('text');?></h3>
                                                <?php
                                            endwhile;
                                        endif;
                                    ?>
                                </div>
                                <h2 class="projet__title section__title"><?php the_sub_field('title');?></h2>
                                <div class="result d-flex">
                                    <?php
                                        if( have_rows('result') ):
                                            while ( have_rows('result') ) : the_row();
                                                ?>
                                                <div class="box">
                                                    <h4><?php  the_sub_field('title');?></h4>
                                                    <span class="count"><?php  the_sub_field('count');?></span>
                                                    <div class="progress">
                                                        <div class="take">
                                                            <img src="<?php echo get_template_directory_uri()?>/landing-page/img/take.svg" alt="">
                                                            <span><?php  the_sub_field('progress_take');?></span>
                                                        </div>
                                                        <div class="prev">
                                                            <?php  the_sub_field('progress_prev');?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            endwhile;
                                        endif;
                                    ?>
                                    <div class="box-score">
                                        <?php
                                            $image_score = get_sub_field('score');
                                        ?>
                                        <img src="<?php echo $image_score['url']; ?>" alt="<?php echo $image_score['alt']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
				</div>
			</div>
		</section>
		<section class="reviews" id="reviews">
			<div class="container">
                <?php if( have_rows('reviews') ): 
                        while( have_rows('reviews') ): the_row(); ?>
                        <h2 class="reviews__title section__title"><?php the_sub_field('title'); ?></h2>
                            <?php
                                if( have_rows('reviews__block') ):
                                    ?><div class="reviews__block d-flex"><?php
                                    $i=0.3;
                                    while ( have_rows('reviews__block') ) : the_row();
                                    $image = get_sub_field('photo');
                                    $i= $i+0.3;
                                    ?>
                                        <div class="reviews__box" data-wow-delay="<?php echo $i?>s">
                                            <div class="name">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="photo">
                                                <h3 class="name"><?php  the_sub_field('name');?></h3>
                                            </div>
                                            <?php  the_sub_field('text');?>
                                            <span class="date"><?php  the_sub_field('date');?></span>
                                        </div>
                                        <?php
                                    endwhile;
                                    ?></div><?php
                                endif;
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
				
			</div>
		</section>
		<section class="form" id="form">
			<div class="container">
				<div class="form__block">
					<h2 class="form__title"><?php the_field('form_title');?></h2>
					<div class="form">
                        <?php echo do_shortcode('[contact-form-7 id="14" title="MainForm"]')?>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php get_footer('landing');?>