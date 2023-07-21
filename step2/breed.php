<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breed of cat</title>
</head>
<body>
    <?php
    //add security if name and id empty
    $breed_name = $_GET['name'];
    $breed_id = $_GET['id'];

    echo "<h1>$breed_name</h1>";
    /*echo "<img src=https://api.thecatapi.com/v1/img/search?limit=10&breed_ids=$breed_id&api_key=$api_key>";
    } else {
        header("Location: index.php");
        exit();
    }*/
    ?>
</body>
</html>