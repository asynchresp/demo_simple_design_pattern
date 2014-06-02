<?php
include('my_observable.php');
include('cart_item_logger.php');
class CartItem implements myObservable{

 private $cart_observers = array();

 public function addItem( $itemName ){

   if(is_array($itemName)){

      foreach($itemName as $item){
         foreach( $this->cart_observers as $obs )
         {
           $obs->onChanged( $this, $item);
         }
     }

   }else{
         foreach( $this->cart_observers as $obs )
         {
           $obs->onChanged( $this, $itemName);
         }
   }
 }

 public function addObserver( $observer ){
    $this->cart_observers []= $observer;
 }

}
$cart = new CartItem();
$cart->addObserver( new CartItemLogger() );
$cart->addItem(array( "Book","Pen","Pencil","Mouse") );
$cart->addItem("Laptop");
?>
