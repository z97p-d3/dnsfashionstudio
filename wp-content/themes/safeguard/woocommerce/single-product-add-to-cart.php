<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <form class="cart form-cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>">
        <?php do_action( 'woocommerce_before_variations_form' ); ?>

            <div class="table-container">
                <table class="form-cart-table variations">
                    <thead>
                        <tr>
                            <th colspan="2"><?php echo esc_html__( 'Item Name', 'safeguard' ); ?></th>
                            <th><?php echo esc_html__( 'Unit Price', 'safeguard' ); ?></th>
                            <th><?php echo esc_html__( 'Quantity', 'safeguard' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <?php echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">'.get_the_title().'</a>'; ?>
                            </td>
                            <td>
                            <?php
                                $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
                                $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
                                $full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
                                $image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
                                $placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
                                $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
                                    'woocommerce-product-gallery',
                                    'woocommerce-product-gallery--' . $placeholder,
                                    'woocommerce-product-gallery--columns-' . absint( $columns ),
                                    'images',
                                ) );
                            ?>
                                <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
                                    <figure class="woocommerce-product-gallery__wrapper">
                                        <?php
                                        $attributes_img = array(
                                            'title'                   => $image_title,
                                            'data-src'                => $full_size_image[0],
                                            'data-large_image'        => $full_size_image[0],
                                            'data-large_image_width'  => $full_size_image[1],
                                            'data-large_image_height' => $full_size_image[2],
                                        );

                                        if ( has_post_thumbnail() ) {
                                            $html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
                                            $html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes_img );
                                            $html .= '</a></div>';
                                        } else {
                                            $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                                            $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'safeguard' ) );
                                            $html .= '</div>';
                                        }

                                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

                                        do_action( 'woocommerce_product_thumbnails' );
                                        ?>
                                    </figure>
                                </div>
                            </td>
                            <td>
                                <div class="single_variation_wrap woocommerce-variation-price">
                                    <p class="price"><?php echo wp_kses_post($product->get_price_html()); ?></p>
                                </div>

                            </td>
                            <td>
                                <div class="shopping_cart-quantity">
                                <?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1, 'min_value' => 1, 'max_value' => 999, ) ); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


            </div>
            <div class="form-cart__section form-cart__price clearfix">
                <div class="form-cart__price-title form-cart__title"><i class="icon pe-7s-cart"></i><?php echo esc_html__( 'Subtotal', 'safeguard' ); ?></div>
                <div class="form-cart__price-total"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <input type="hidden" class="safeguard_woo_price" value="<?php echo esc_attr ( $product->get_price() ) ?>">
                <input type="hidden" class="safeguard_woo_currency" value="<?php echo esc_attr( get_woocommerce_currency_symbol() ) ?>">
                <input type="hidden" class="safeguard_woo_decimal_separator" value="<?php echo esc_attr( wc_get_price_decimal_separator() ) ?>">
                <input type="hidden" class="safeguard_woo_thousand_separator" value="<?php echo esc_attr( wc_get_price_thousand_separator() ) ?>">
                <input type="hidden" class="safeguard_woo_decimals" value="<?php echo esc_attr( wc_get_price_decimals() ) ?>">
                <input type="hidden" class="safeguard_woo_currency_pos" value="<?php echo esc_attr(get_option( 'woocommerce_currency_pos' )) ?>">
            </div>
            <div class="single_variation_wrap text-center">
                <div class="woocommerce-variation-add-to-cart variations_button">
                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button form-cart__submit"><?php echo esc_html__( 'Continue with checkout', 'safeguard' ); ?></button>
                </div>
                <div class="form-cart__note"><?php echo esc_html__( 'You\'ll be redirected to our secure payment server', 'safeguard' ); ?></div>
            </div>

            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>


        <?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>
</div>


<?php
do_action( 'woocommerce_after_add_to_cart_form' );
