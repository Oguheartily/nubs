<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- further verification -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 mt-1">
                <label class="text-bold mb-0">NUBS ID Card</label>
                <input type="file" name="nubsIdCard" placeholder="Upload Image" class="form-control">
            </div>
            <div class="col-md-12 mt-4 text-center">
                <button type="submit" class="btn btn-success border-white" name="image_test">Upload ID</button>
            </div>
        </div>
    </form>
</body>

</html>

<?php


if (isset($_POST['image_test'])) {
    $myUsername = "Ogu";
    $nubsIDCard = $_FILES['nubsIdCard']['name'];
    $userIDpath = "../images/nubsIDCard";
    $nubsIDCard_ext = pathinfo($nubsIDCard, PATHINFO_EXTENSION);
    // $filename = $image;
    $userIDfilename = $myUsername . 'IDCard.' . $nubsIDCard_ext;
    
    echo $nubsIDCard."</br>";
    echo $nubsIDCard_ext."</br>";
    echo $_FILES['nubsIdCard']['tmp_name']."</br>";

}

?>