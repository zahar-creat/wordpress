<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'news');
function news()
{

    Container::make('post_meta', 'Настройки страницы')
        ->where('post_type', '=', 'news')
        ->add_fields(array(

            Field::make('textarea', 'crb_text_news', __('Текст новости')),
            Field::make('image', 'crb_image_news', __('Картинка новости')),
            Field::make('date', 'crb_date_news', __('Дата новости'))
                ->set_storage_format('d:m:Y')




        ));
}
add_action('carbon_fields_register_fields', 'product');
function product()
{

    Container::make('post_meta', 'Настройки страницы')
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('textarea', 'crb_description', __('Описание')),
            Field::make('text', 'crb_price', __('Стоимость')),
            Field::make('textarea', 'crb_complect', __('Комплектация')),
            Field::make('media_gallery', 'crb_gallery', __('Галерея'))->set_type(array('image', 'video')),
            Field::make('select', 'crb_manufacturer', 'Производитель')
                ->set_options(
                    array(
                        '2' => 'Apple',
                        '3' => 'Google',
                        '4' => 'Xiaomi',

                    )
                )

        ));
}
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function my_scripts_enqueue()
{
    wp_register_script('bootstrap-js', '://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), NULL, true);
    wp_register_style('bootstrap-css', '://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', false, NULL, 'all');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_style('bootstrap-css');
}
add_action('wp_enqueue_scripts', 'my_scripts_enqueue');