/*
 This is my own code, you can use according to your requirement 
 You can change your cart item price 
*/

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );
function add_custom_price($cart_object) {
		global $current_user;
		$current_user_qty_code = get_user_meta($current_user->ID, 'distributor_quantity', true);
		$current_user_discount_code=get_user_meta($current_user->ID,'price_discount_code',true);
		$per='100';
		$discount=$current_user_discount_code / $per ;
      foreach ( $cart_object->cart_contents as $key =>$value ) {
          if(($current_user_qty_code=='A')){
              $single_product_price = $value['data']->price;
              $single_product_price=$single_product_price * $discount ;
              $value['data']->price = $single_product_price;
              }else{
                    $single_product_price = $value['data']->price;
                    $value['data']->price = $single_product_price;
                 }
          
          }
       }  
