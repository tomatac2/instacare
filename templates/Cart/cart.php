<?php
    echo  $cart ? $this->element('website/pages/cart/full_items') 
                :  $this->element('website/pages/cart/empty') ;
?>
