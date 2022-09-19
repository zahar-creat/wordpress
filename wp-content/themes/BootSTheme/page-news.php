<?php
get_header();

$my_posts = get_posts(array(
    'numberposts' => 5,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  => '',
    'post_type'   => 'news',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));

global $post; ?>
<div class="container">
    <h2>Новости</h2>
    <?php
    foreach ($my_posts as $post) {
        setup_postdata($post);
        $text_news = carbon_get_post_meta($post->ID, 'crb_text_news');

        $date = carbon_get_post_meta($post->ID, 'crb_date_news');
        $thumbnail_id = carbon_get_post_meta($post->ID, 'crb_image_news'); // получим ID картинки из опции темы
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');  // ссылка на полный размер картинки по ID вложения


    ?>
    <div>

        <div class="card mb-3">
            <img src="<?php echo $thumbnail_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php echo $text_news; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
            </div>
        </div>
    </div>
    <?php }

    wp_reset_postdata(); // сброс
    ?>
</div>
<?php get_footer(); ?>