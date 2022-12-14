<?php

// Path: inc\acf-blocks.php


function tdcomm_acf_init_block_types()
{

    if (function_exists('acf_register_block_type')) {


        // Products Grid block
        acf_register_block_type(
            array(
                'name'              => 'products-grid',
                'title'             => __('Products Grid'),
                'description'       => __('A block to display product cards.'),
                'render_template'   => 'block-templates/products-grid.php',
                'category'          => 'tdComm',
                'icon'              => 'tdcomm',
                'keywords'          => array('products', 'product', 'grid'),
                'supports'          => array(
                    'mode' => true,
                ),
            ),
        );

        // TdComm Columns block
        acf_register_block_type(array(
            'name'              => 'tdcomm-media-with-content',
            'title'             => 'TdComm Media With Content',
            'description'       => 'TdComm Media with Content',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template'   => 'block-templates/media-with-content.php',
        ));

        // TdComm Full Width block
        acf_register_block_type(array(
            'name'              => 'tdcomm-full-width-content',
            'title'             => 'TdComm Full Width Content',
            'description'       => 'Display Content with background image and full width',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true,
            ),
            'render_template'   => 'block-templates/full-width-tdcomm-content.php',
        ));

        // TdComm Buttons block
        acf_register_block_type(array(
            'name'              => 'tdcomm-buttons',
            'title'             => 'TdComm Buttons',
            'description'       => 'Display Buttons',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports' => array(
                'mode' => true,
            ),
            'render_template'   => 'block-templates/tdcomm-buttons.php',
        ));

        // TdComm Slider block
        acf_register_block_type(array(
            'name'              => 'tdcomm-slider',
            'title'             => 'TdComm Slider',
            'description'       => 'Display Slider',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports' => array(
                'mode' => true,
            ),
            'render_template'   => 'block-templates/tdcomm-slider.php',
        ));

        // TdComm Icon Box block
        acf_register_block_type(array(
            'name'              => 'tdcomm-icon-box',
            'title'             => 'TdComm Icon Box',
            'description'       => 'Display Icon Box',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports' => array(
                'mode' => true,
            ),
            'render_template'   => 'block-templates/tdcomm-icon-box.php',
        ));

        // TdComm Contact Form block
        acf_register_block_type(array(
            'name'              => 'tdcomm-contact-form',
            'title'             => 'TdComm Contact Form',
            'description'       => 'Display Contact Form',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports' => array(
                'mode' => true,
            ),
            'render_template'   => 'block-templates/tdcomm-contact-form.php',
        ));

        // TdComm List block
        acf_register_block_type(array(
            'name'              => 'tdcomm-list',
            'title'             => 'TdComm List',
            'description'       => 'Display List',
            'category'          => 'tdComm',
            'icon'              => 'tdcomm',
            'mode'              => 'preview',
            'supports' => array(
                'mode' => true,
            ),
            'render_template'   => 'block-templates/tdcomm-list.php',
        ));
    }
}

add_action('acf/init', 'tdcomm_acf_init_block_types');
