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

    echo $nubsIDCard . "</br>";
    echo $nubsIDCard_ext . "</br>";
    echo $_FILES['nubsIdCard']['tmp_name'] . "</br>";
}
/*********************************************************************
   Purpose  : function to truncate text and show read more links.
   Parameters     : @$story_desc : story description
   @$link         : story link
   @$targetFile   : target redirect file name
   @$id           : story id
   Returns  : string
 ***********************************************************************/
function readMoreFunction($story_desc, $link, $targetFile, $id)
{
    //Number of characters to show  
    $chars = 25;
    $story_desc = substr($story_desc, 0, $chars);
    $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
    $story_desc = $story_desc . " <a href='$link?$targetFile=$id'>Read More...</a>";
    return $story_desc;
}
$lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, at inventore. Nam tempora, mollitia atque reprehenderit eos nemo voluptatum ab itaque doloribus libero temporibus, quaerat fuga hic sed iste exercitationem tenetur praesentium voluptatem quia eligendi officia quidem dolorem rerum dolor!";
// echo readMoreFunction($lorem, header("Location: testerOutput.php"), "tester.php", "lila");


function readMore($content, $link, $var, $id, $limit)
{
    $content = substr($content, 0, $limit);
    $content = substr($content, 0, strrpos($content, ' '));
    $content = $content . " <a href='$link?$ var=$id'>Read More... </a>";
    return $content;
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div><?php $lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, at inventore. Nam tempora, mollitia atque reprehenderit eos nemo voluptatum ab itaque doloribus libero temporibus, quaerat fuga hic sed iste exercitationem tenetur praesentium voluptatem quia eligendi officia quidem dolorem rerum dolor!";
echo readMoreFunction($lorem, header("Location: testerOutput.php"), "testerOutput.php", "lila");?></div>
    <div id="lila"></div>
</body>

</html>