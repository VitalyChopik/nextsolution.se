<?php
/*
Template Name: Privacy Page Template
*/

get_header(); 
do_action( 'corppix_before_page_content' );
?>

<style>
  .base-editor-b h1 {
    font-weight: 500;
    font-size: 60px;
    line-height: 160%;
  }

  .base-editor-b h2 {
    font-weight: 500;
    font-size: 44px;
    line-height: 160%;
    margin-top: 80px;
  }

  .base-editor-b h3 {
    font-weight: 500;
    font-size: 36px;
    line-height: 160%;
    margin-top: 60px;
  }

  .base-editor-b h2,
  .base-editor-b h3 {
    margin-bottom: 60px;
  }

  .base-editor-b p,
  .base-editor-b li {
    font-weight: 300;
    font-size: 16px;
    line-height: 160%;
  }

  .base-editor-b p,
  .base-editor-b li {
    margin-bottom: 20px;
  }

  .base-editor-b li {
    list-style-type: disc;
  }

  .base-editor-b strong {
    font-weight: 700;
  }

  @media (max-width: 1440px) {
    .base-editor-b h1 {
      font-size: 45px;
    }

    .base-editor-b h2 {
      font-size: 36px;
      margin-top: 50px;
    }

    .base-editor-b h3 {
      font-size: 30px;
      margin-top: 50px;
    }

    .base-editor-b h2,
    .base-editor-b h3 {
      margin-bottom: 40px;
    }

    .base-editor-b p,
    .base-editor-b li {
      margin-bottom: 15px;
    }
  }

  @media (max-width: 767px) {
    .base-editor-b h1 {
      font-size: 24px;
    }

    .base-editor-b h2 {
      font-size: 20px;
      margin-top: 40px;
    }

    .base-editor-b h3 {
      font-size: 18px;
      margin-top: 40px;
    }

    .base-editor-b h2,
    .base-editor-b h3 {
      margin-bottom: 30px;
    }

    .base-editor-b p,
    .base-editor-b li {
      margin-bottom: 10px;
    }
  }
  </style>

<div class="section__wrapper info-omoss bg">
    <section class="privacy-content">
        <div class="container">
          <div class="row">
              <div class="col-12">
                     <div class="base-editor-b" style="color: #fff;">
                          <?php the_content(); ?>
                     </div>
              </div>
           </div>
        </div>
    </section>
</div>
  
<?php
do_action( 'corppix_after_page_content' );
get_footer(); ?>