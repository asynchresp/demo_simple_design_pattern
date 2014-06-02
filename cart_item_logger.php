<?php

include('my_observer.php');
class CartItemLogger implements myObserver {

 public function onChanged( $sender, $args ){
    echo( "<p> Logging: <b>$args</b> added to cart log</p>" );
 }

}

?>
