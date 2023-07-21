<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>heyliotTest</title>
</head>
<body>
    <?php
    $api_key = 'YOUR_API_KEY';
    $api_url = "https://api.thecatapi.com/v1/images/search?api_key=$api_key";
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);

    //list breed in tab for display after
    if (is_array($data) && count($data) > 0) {
        $image_url = $data[0]['url'];
        echo "<img src='$image_url'>";
    } else {
        echo "Error img cat";
    }
    ?>
</body>
</html>