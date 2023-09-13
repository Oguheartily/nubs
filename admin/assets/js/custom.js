$(document).ready(function () {

    $(document).on('click', '.delete_mypost_btn', function (e) {
        e.preventDefault();

        var postID = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'myPost_id': postID,
                            'delete_mypost_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success!", "Product Deleted Successfully!", "success");
                                $("#myPosts_table").load(location.href + " #myPosts_table");
                            }
                            else if (response == 500) {
                                swal("Error!", "Something went wrong!", "success");
                            }
                        }
                    });
                } else {

                }
            });
    });
    $(document).on('click', '.delete_category_btn', function (e) {
        e.preventDefault();

        var catID = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'category_id': catID,
                            'delete_category_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success!", "Category Deleted Successfully!", "success");
                                $("#category_table").load(location.href + " #category_table");
                            }
                            else if (response == 500) {
                                swal("Error!", "Something went wrong!", "success");
                            }
                        }
                    });
                } else {

                }
            });
    });
    $(document).on('click', '.delete_otherpost_btn', function (e) {
        e.preventDefault();

        var postID = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'eventpost_id': postID,
                            'delete_otherpost_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success!", "Product Deleted Successfully!", "success");
                                $("#otherPosts_table").load(location.href + " #otherPosts_table");
                            }
                            else if (response == 500) {
                                swal("Error!", "Something went wrong!", "success");
                            }
                        }
                    });
                } else {

                }
            });
    });
});