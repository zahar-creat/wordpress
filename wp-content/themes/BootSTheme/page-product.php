<?php get_header();


$my_posts = get_posts(array(
    'numberposts' => 5,
    'post_type'   => 'product',
    'orderby' => 'text_field',
    'order' => 'asc',
    'meta_query' => array(
        'text_field' => array(
            'key' => 'crb_price',
            'compare' => 'EXISTS',
        ),
    ),



));
global $post;

?>
<div class="container">
    <div class="flex">
        <?php
        foreach ($my_posts as $post) {
            setup_postdata($post);
            $description = carbon_get_post_meta($post->ID, 'crb_description');
            $manufacturer = carbon_get_post_meta($post->ID, 'crb_manufacturer');
            $price = carbon_get_post_meta($post->ID, 'crb_price');
            $complect = carbon_get_post_meta($post->ID, 'crb_complect');
            $slides = carbon_get_post_meta($post->ID, 'crb_gallery'); // получим ID картинки из опции темы






        ?>

        <div class="card mb-3 margin-10" style="max-width: 440px;">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="flex">
                        <?php
                            foreach ($slides as $slide) : ?>

                        <img src="<?php echo wp_get_attachment_image_url($slide, 'full'); ?>" class="d-block width-100"
                            alt="...">

                        <?php endforeach; ?>
                    </div>



                </div>




            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title"><?php if ($manufacturer == 2) {
                                                    echo 'Apple ';
                                                } elseif ($manufacturer == 3) {
                                                    echo 'Google ';
                                                } else {
                                                    echo 'Xiaomi ';
                                                }
                                                the_title();  ?>
                        <?php echo $complect; ?></h5>

                    <p class="card-text" align="justify"><?php echo $description; ?></p>

                    <p class="card-text"><button class="btn btn-success">
                            <?php echo $price ?>
                            рублей</button></p>
                </div>
            </div>
        </div>

        <?php }

        wp_reset_postdata(); // сброс
        ?>
    </div>
</div>

<?php get_footer(); ?>