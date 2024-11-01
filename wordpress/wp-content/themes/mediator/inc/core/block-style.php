<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package mediator
 * @since 1.0.0
 */

if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 0.1
     *
     * @return void
     */
    function hello_agency_register_block_styles()
    {
        register_block_style(
            'core/columns',
            array(
                'name'  => 'mediator-boxshadow',
                'label' => __('Box Shadow', 'mediator')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'mediator-boxshadow',
                'label' => __('Box Shadow', 'mediator')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'mediator-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'mediator')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'mediator-boxshadow-large',
                'label' => __('Box Shadow Large', 'mediator')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'mediator-boxshadow',
                'label' => __('Box Shadow', 'mediator')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'mediator-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'mediator')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'mediator-boxshadow-large',
                'label' => __('Box Shadow Larger', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-boxshadow',
                'label' => __('Box Shadow', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-boxshadow-larger',
                'label' => __('Box Shadow Large', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-image-pulse',
                'label' => __('Iamge Pulse Effect', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-image-hover-pulse',
                'label' => __('Hover Pulse Effect', 'mediator')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'mediator-image-hover-rotate',
                'label' => __('Hover Rotate Effect', 'mediator')
            )
        );
        register_block_style(
            'core/columns',
            array(
                'name'  => 'mediator-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'mediator')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'mediator-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'mediator')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'mediator-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'mediator')
            )
        );

        register_block_style(
            'core/post-terms',
            array(
                'name'  => 'categories-background-with-round',
                'label' => __('Background Color', 'mediator')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-color',
                'label' => __('Hover: Primary Color', 'mediator')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'mediator')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-bgcolor',
                'label' => __('Hover: Primary color fill', 'mediator')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-bgcolor',
                'label' => __('Hover: Secondary color fill', 'mediator')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-white-bgcolor',
                'label' => __('Hover: White color fill', 'mediator')
            )
        );

        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-color',
                'label' => __('Hover: Primary Color', 'mediator')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'mediator')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-fill',
                'label' => __('Hover: Primary Fill', 'mediator')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-fill',
                'label' => __('Hover: secondary Fill', 'mediator')
            )
        );

        register_block_style(
            'core/list',
            array(
                'name'  => 'list-style-no-bullet',
                'label' => __('Hide bullet', 'mediator')
            )
        );
        register_block_style(
            'core/gallery',
            array(
                'name'  => 'enable-grayscale-mode-on-image',
                'label' => __('Enable Grayscale Mode on Image', 'mediator')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-size-small',
                'label' => __('Small Size', 'mediator')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-size-large',
                'label' => __('Large Size', 'mediator')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'mediator-page-list-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'mediator')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'mediator-page-list-bullet-hide-style-white-color',
                'label' => __('Hide Bullet Style with White Text Color', 'mediator')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'mediator-categories-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'mediator')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'mediator-categories-bullet-hide-style-white-color',
                'label' => __('Hide Bullet Style with Text color White', 'mediator')
            )
        );
    }
    add_action('init', 'hello_agency_register_block_styles');
}
