<?php

//Single page assets 
function oneedu_learning_css()
{
    wp_enqueue_style('single', get_theme_file_uri('/css/singleCourse.css'), false, time(), 'all');
}
add_action("wp_enqueue_scripts", "oneedu_learning_css",);

/* Related Courses short-code by Shoive Start */

function sh_23_singleCourse_add_related_course_for_single_course()
{
    $currentID = get_queried_object_id();

    $current_course_terms = get_the_terms($currentID, 'course-cat');

    $current_course_term_ids = array();

    if ($current_course_terms) {
        foreach ($current_course_terms as $term) {
            $current_course_term_ids[] = $term->term_id;
        }
    }

    $args = array(
        'post_type' => 'course',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'course-cat',
                'field' => 'id',
                'terms' => $current_course_term_ids,
            ),
        ),
    );

    $related_courses_query = new WP_Query($args);

    if ($related_courses_query->have_posts()) {
        echo '<div class="row">';
        while ($related_courses_query->have_posts()) {
            $related_courses_query->the_post();
?>
            <div class="col-md-4 col-sm-6">
                <div class="sh_23_singleCourse_top_courses">
                    <div class="sh_23_singleCourse_thumb">
                        <a href="<?php the_permalink(); ?>" class="sh_23_singleCourse_thumbimg">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else {
                                echo '<img src="https://dummyimage.com/600x400/7d797d/ffffff" alt="alt image" />';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="sh_23_singleCourse_details">
                        <div class="sh-23-rattings-level">
                            <?php
                            $courseID = get_the_ID();
                            $average_rating = get_post_meta($courseID, 'average_rating', true);
                            $countRating = get_post_meta($courseID, 'rating_count', true);
                            $terms = get_the_terms($courseID, 'level');
                            $studentNumers = get_post_meta($courseID, 'vibe_students', true);
                            $product_ID = get_post_meta($courseID, 'vibe_product', true);
                            $regular_price = get_post_meta($product_ID, '_regular_price', true);
                            $sale_price = get_post_meta($product_ID, '_sale_price', true);
                            $totalDiscount = (100 - ((100 * $sale_price) / $regular_price));
                            $current_currency = get_woocommerce_currency_symbol();
                            ?>

                            <div class="rating_sh_content">
                                <div class="sh_rating">
                                    <div class="sh_rating-upper" style="width:<?php echo $average_rating ? 20 * $average_rating : 0; ?>%">
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                    </div>
                                    <div class="sh_rating-lower">
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                        <span>★</span>
                                    </div>
                                </div>
                            </div>
                            <?php if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                            ?>
                                    <div class=c-lvl-sh-23>
                                        <p><i class="fa fa-signal" aria-hidden="true"></i>
                                            <?php echo $term->name; ?></p>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                        <div class="sh_23_singleCourse_title_box"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="sh_23_singleCourse_footer">
                            <div class="sh_23_singleCourse_price">
                                <?php
                                if (!empty($product_ID)) {
                                    if ($sale_price !== "") {
                                        $m_price =   '<span>' . $current_currency . $sale_price . '</span>' . ' ' . '<del>' . $current_currency . $regular_price . '</del>' . '<p>' . number_format($totalDiscount, 2, '.', '') . '% OFF' . '</p>';
                                    } elseif ($regular_price !== "") {
                                        $m_price = '<span>' . $current_currency . $regular_price . '</span>';
                                    } else {
                                        $m_price = '';
                                    }
                                    echo $m_price;
                                } else {
                                    echo "Free";
                                }
                                ?>
                            </div>
                            <div class="for-std-single-course-sh-23">
                                <p><i class="fas fa-users"></i> <?php echo $studentNumers; ?></p>
                            </div>
                        </div>
                        <div class="the-sh-add-to-cart-button-23-single">
                            <a href="<?php echo get_site_url();  ?>/cart/?add-to-cart=<?php echo $product_ID; ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>

<?php
        }
        echo '</div>';
        wp_reset_query();
    } else {
        echo 'No course found';
    }
}
add_shortcode('related_course', 'sh_23_singleCourse_add_related_course_for_single_course');

/* Related Courses short-code by Shoive End */
