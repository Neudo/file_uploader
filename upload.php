<?php

require 'FileImageUploader.php';

$uploader = new FileImageUploader();
$photoName = '';
$url = '';

$uploadDir = './uploads';
$files = scandir($uploadDir);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'], $_POST['name'])) {
    $uploadPath = $uploader->upload($_FILES['fileToUpload'], $_POST['name']);
    if ($uploadPath) {
        $photoName = $_POST['name'];
        $url = $uploadPath;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des photos</title>
</head>
<body style="font-family: sans-serif; margin:0" >
<?php if( empty($uploader->getErrorMessage())  ):?>
    <div style="display:flex; justify-content: space-between; flex-wrap: wrap;background-color: darkcyan" >
        <?php foreach ($files as $file):
            if ($file === '.' || $file === '..') continue;
            $formattedFile = 'test'
            ?>
            <div style="padding: 15px; width: 30%">
                <h2><?= $formattedFile?></h2>
                <div style="width: 300px; height: 300px">
                    <img style="width: 100%; height: 100%; object-fit: cover"  src="./uploads/<?=$file?>" alt="<?= $file?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <h1 style="text-align:center; margin-top: 150px;"><?= $uploader->getErrorMessage()?></h1>
    <a style="text-align: center; display: block" href="/">Réessayer</a>
<?php endif; ?>
</body>
</html>


