<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options'); // Для версии 2.0 и выше

function crb_attach_theme_options()
{
    Container::make('theme_options', __('Theme Options', 'crb'))
        ->add_fields(array(
            Field::make('text', 'crb_text', 'Text Field'),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
function news()
{


    Container::make('post_meta', 'custom news')
        ->where('post_type', '=', 'news')
        ->add_fields(array(
            Field::make('map', 'crb_location')
                ->set_position(37.423156, -122.084917, 14),
            Field::make('sidebar', 'crb_custom_sidebar'),
            Field::make('image', 'crb_photo'),
        ));
}
function product()
{


    Container::make('post_meta', 'custom product')
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('map', 'crb_location')
                ->set_position(37.423156, -122.084917, 14),
            Field::make('sidebar', 'crb_custom_sidebar'),
            Field::make('image', 'crb_photo'),
        ));
}