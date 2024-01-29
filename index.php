<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhotoUploader</title>
</head>
<body style="font-family: sans-serif" >

<h1 style="text-align:center; margin-top: 150px;">Upload d'image</h1>
<form action="upload.php" method="post" enctype="multipart/form-data" style="width: 40%; margin: 50px auto; padding: 15px 25px; background-color: lightblue; border-radius: 15px; display: flex; flex-direction: column " >
    Sélectionnez une image à uploader :
    <input style="margin-bottom: 15px;" type="file" name="fileToUpload" id="fileToUpload">
    Nom souhaité pour le fichier (sans extension) :
    <input style="margin-bottom: 15px" type="text" name="name" id="desiredName">
    <input type="submit" value="Uploader l'image" name="submit">
</form>
</body>
</html>

