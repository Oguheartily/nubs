$(document).ready(function () {
    
    /**ADD TO CART */
    $(document).on('click','.addToCartBtn', function () {
        /**if user clicks on add to cart button, get the current value in thr quantity input field */
        let prodExcosId = $(this).closest('.parent_data').find('#prodExcosId').val();
        let qnty = $(this).closest('.parent_data').find('.input-qty').val();
        let prod_id = $(this).val();
        // alert("Product ID is: "+prod_id+ "Excos ID: "+prodExcosId);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prodExcosId": prodExcosId,
                "prod_id": prod_id,
                "prod_qnty": qnty,
                "scope": "add",
            },
            success: function (response) {
                if(response == 201){
                    $('.cartCount').load(location.href + " .cartCount");
                    alertify.success("Product Added to Cart.");
                }
                else if(response == "existing"){
                    alertify.warning("Product already in cart, to increase quantity, go to cart.");
                }
                else if(response == 401){
                    alertify.error("Login to continue.");
                    /** if this response is received, it means the user is not logged in */
                }
                else if(response == 500){
                    alertify.success("Something went wrong.");
                }
            }
        });
    });
    /** UPDATE QUANTITY IN CART PAGE */
    $(document).on('click','.updateQty', function () {
        let qnty = $(this).closest('.parent_data').find('.input-qty').val();
        let prod_id = $(this).closest('.parent_data').find('.prodId').val();
        // alert("and current qnty is"+ qnty);
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qnty": qnty,
                "scope": "update",
            },
            success: function (response) {
                // alert(response);
            }
        });
    });
    
    /** DELETE ITEM IN CART PAGE */
    $(document).on('click','.deleteCartItem', function () {
        let cart_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete",
            },
            success: function (response) {
                // alert(response);
                if(response == 200){
                    $('#myCart').load(location.href + " #myCart");
                    $('.cartCount').load(location.href + " .cartCount");
                    alertify.success("Item Removed from Cart.");
                }
                else{
                    alertify.error(response);
                }
            }
        });
    });
   
});