<?php

/**
 * Title: Post List for Front Page
 * Slug: mediator/homepage-section
 * Categories: mediator
 */
$mediator_agency_url = trailingslashit(get_template_directory_uri());
$mediator_images = array(
    $mediator_agency_url . 'assets/images/icon_meta_user.png',
    $mediator_agency_url . 'assets/images/icon_meta_date.png'
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:var(--wp--preset--spacing--50);padding-bottom:24px;padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column {"width":"70%"} -->
        <div class="wp-block-column" style="flex-basis:70%"><!-- wp:query {"queryId":18,"query":{"perPage":"8","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":2}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","bottom":"16px","left":"16px","right":"16px"}},"border":{"radius":"12px","width":"0px","style":"none"}},"backgroundColor":"light-color","className":"is-style-mediator-boxshadow mediator-post-box","layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-mediator-boxshadow mediator-post-box has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:12px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:columns {"verticalAlignment":"center"} -->
                    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:post-featured-image {"isLink":true,"height":"240px","style":{"border":{"radius":"7px"}}} /--></div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:post-terms {"term":"category","prefix":"Posted On ","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"none"}},"className":"is-style-default","fontSize":"small"} /-->

                            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"8px"}}}} /-->

                            <!-- wp:group {"style":{"spacing":{"margin":{"top":"10px","bottom":"10px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group" style="margin-top:10px;margin-bottom:10px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":251,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|meta-white"}}} -->
                                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($mediator_images[0]) ?>" alt="" class="wp-image-251" style="width:auto;height:18px" /></figure>
                                    <!-- /wp:image -->

                                    <!-- wp:post-author-name {"style":{"typography":{"textTransform":"capitalize","lineHeight":"1.6"},"spacing":{"padding":{"top":"3px"}}},"fontSize":"small"} /-->
                                </div>
                                <!-- /wp:group -->

                                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                                <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":255,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|meta-white"}}} -->
                                    <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($mediator_images[1]) ?>" alt="" class="wp-image-255" style="width:auto;height:18px" /></figure>
                                    <!-- /wp:image -->

                                    <!-- wp:post-date {"style":{"typography":{"lineHeight":"1.6"},"spacing":{"padding":{"top":"3px"}}}} /-->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:post-excerpt {"excerptLength":20,"style":{"spacing":{"padding":{"top":"0rem","bottom":"0rem"},"margin":{"top":"16px","bottom":"0"}}}} /-->

                            <!-- wp:group {"style":{"spacing":{"margin":{"top":"20px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                            <div class="wp-block-group" style="margin-top:20px"><!-- wp:read-more {"content":"Continue Reading...","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}},"border":{"width":"0px","style":"none","radius":"4px"}},"backgroundColor":"primary","textColor":"light-color","className":"mediator-post-more is-style-readmore-hover-secondary-fill"} /--></div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->
                    </div>
                    <!-- /wp:columns -->
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
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"30%"} -->
        <div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","bottom":"16px","left":"20px","right":"20px"}},"border":{"radius":"7px","width":"0px","style":"none"}},"backgroundColor":"light-color","className":"is-style-mediator-boxshadow","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-mediator-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:7px;padding-top:16px;padding-right:20px;padding-bottom:16px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"0px","width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"24px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
                    <h4 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:24px;font-style:normal;font-weight:600"><?php esc_html_e('Categories', 'mediator') ?></h4>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->

                <!-- wp:categories {"showPostCounts":true,"className":"is-style-mediator-categories-bullet-hide-style mediator-sidebar-categories","style":{"typography":{"lineHeight":"2.1","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"10px"}}}} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","bottom":"16px","left":"20px","right":"20px"}},"border":{"radius":"7px","width":"0px","style":"none"}},"backgroundColor":"light-color","className":"is-style-mediator-boxshadow","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-mediator-boxshadow has-light-color-background-color has-background" style="border-style:none;border-width:0px;border-radius:7px;padding-top:16px;padding-right:20px;padding-bottom:16px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"0px","width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:heading {"textAlign":"left","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"24px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
                    <h4 class="wp-block-heading has-text-align-left has-heading-color-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:24px;font-style:normal;font-weight:600"><?php esc_html_e('Featured Posts', 'mediator') ?></h4>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:group -->

                <!-- wp:query {"queryId":13,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"15px"}}} -->
                    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"15px"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px"><!-- wp:post-featured-image {"isLink":true,"height":"70px","style":{"border":{"radius":"7px"}}} /--></div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"75%"} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%"><!-- wp:post-title {"level":4,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"16px"}}} /-->

                            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":255,"width":"auto","height":"14px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|meta-white"}}} -->
                                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url($mediator_images[1]) ?>" alt="" class="wp-image-255" style="width:auto;height:14px" /></figure>
                                <!-- /wp:image -->

                                <!-- wp:post-date {"style":{"typography":{"lineHeight":"1.3"},"spacing":{"padding":{"top":"6px"}}}} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->
                    </div>
                    <!-- /wp:columns -->
                    <!-- /wp:post-template -->
                </div>
                <!-- /wp:query -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->