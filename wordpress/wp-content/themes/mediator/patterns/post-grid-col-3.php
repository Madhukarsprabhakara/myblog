<?php

/**
 * Title: Post Grid columns 3
 * Slug: mediator/post-grid-col-3
 * Categories: mediator
 */
$mediator_agency_url = trailingslashit(get_template_directory_uri());
$mediator_images = array(
    $mediator_agency_url . 'assets/images/icon_meta_user.png',
    $mediator_agency_url . 'assets/images/icon_meta_date.png'
);
?>
<!-- wp:query {"queryId":18,"query":{"perPage":"12","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"metadata":{"categories":["mediator"],"patternName":"mediator/post-grid-layout","name":"Post Grid Layout"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":"3"}} -->
    <!-- wp:group {"className":"is-style-mediator-boxshadow mediator-post-box","style":{"spacing":{"padding":{"top":"16px","bottom":"16px","left":"16px","right":"16px"}},"border":{"radius":"12px","width":"0px","style":"none"}},"backgroundColor":"light-color","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-mediator-boxshadow mediator-post-box has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:post-featured-image {"isLink":true,"height":"240px","style":{"border":{"radius":"7px"}}} /-->

        <!-- wp:post-terms {"term":"category","prefix":"Posted On ","className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"none"}},"fontSize":"small"} /-->

        <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"8px"}}}} /-->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"10px","bottom":"10px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="margin-top:10px;margin-bottom:10px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":251,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|meta-white"}}} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($mediator_images[0]) ?>" alt="" class="wp-image-251" style="width:auto;height:18px" /></figure>
                <!-- /wp:image -->

                <!-- wp:post-author-name {"style":{"typography":{"textTransform":"capitalize","lineHeight":"1.6"}},"fontSize":"small"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":255,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|meta-white"}}} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($mediator_images[1]) ?>" alt="" class="wp-image-255" style="width:auto;height:18px" /></figure>
                <!-- /wp:image -->

                <!-- wp:post-date {"style":{"typography":{"lineHeight":"1.6"}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-excerpt {"excerptLength":20,"style":{"spacing":{"padding":{"top":"0rem","bottom":"0rem"},"margin":{"top":"16px","bottom":"0"}}}} /-->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"20px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group" style="margin-top:20px"><!-- wp:read-more {"content":"Continue Reading...","className":"mediator-post-more is-style-readmore-hover-secondary-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}},"border":{"width":"0px","style":"none","radius":"4px"}},"backgroundColor":"primary","textColor":"light-color"} /--></div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"className":"mediator-pagination"} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->