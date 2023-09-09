$(document).ready(function () {
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