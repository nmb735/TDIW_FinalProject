<?php
    function printConfirmationMessage($name, $emptyCart)
    {
        if(!$emptyCart){
            echo '<section id="confirmation-message" style="grid-area: message;">';
            echo '<h2 id="confirmation-thanks"> THANK YOU, '.$name.'</h2>';
            echo '
                <p id="confirmation-text"> Your order has been placed and confirmed. We will begin to process your order shortly. You may now return to the home page or track your order.</p>
                <div id="confirmation-button-container">
                    <a class="confirmation-hp-return" href="./index.php"> <button id="return-hp-button" type="button"> <span id="return-hp-span"></span> Return to Home Page </button></a>
                    <a class="confirmation-hp-return" href="./index.php?resource=orders"> <button id="track-order-button" type="button"> <span id="track-order-span"></span> Track Your Order</button></a>
                </div>
            </section>';
        }
        else
        {
            echo '<section id="confirmation-message" style="grid-area: message;">';
            echo '<h2 id="confirmation-thanks"> SORRY!, '.$name.'</h2>';
            echo '
                <p id="confirmation-text"> Your order was empty. You may now return to the home page or check your previous orders.</p>
                <div id="confirmation-button-container">
                    <a class="confirmation-hp-return" href="./index.php"> <button id="return-hp-button" type="button"> <span id="return-hp-span"></span> Return to Home Page </button></a>
                    <a class="confirmation-hp-return" href="./index.php?resource=orders"> <button id="track-order-button" type="button"> <span id="track-order-span"></span> Track Your Previous Orders</button></a>
                </div>
            </section>';
        }
        
    }
?>