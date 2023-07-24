<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breed of cat</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .image_container img {
            width: 25%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php
    $api_key = 'YOUR_API_KEY';
    $breed_id = $_GET['breed_id'];
    if (isset($breed_id) != FALSE) {
        $breed_api_url = "https://api.thecatapi.com/v1/breeds/$breed_id";
        $breed_response = file_get_contents($breed_api_url);
        $breed_data = json_decode($breed_response, true);

        if ($breed_data != NULL) {
            $breed_name = $breed_data['name'];
            $breed_desc = $breed_data['description'];

            echo "<h1>Breed Details</h1>";
            echo "<p><strong>Name:</strong> $breed_name</p>";
            echo "<p><strong>Description:</strong> $breed_desc</p>";
            function displayBreedImages($breed_id, $breed_name)
            {
                $images_api_url = "https://api.thecatapi.com/v1/images/search?breed_ids=$breed_id&limit=10&api_key=$api_key";
                $images_response = file_get_contents($images_api_url);
                $images_data = json_decode($images_response, true);

                if ($images_data && is_array($images_data) && count($images_data) > 0) {
                    echo "<h2>Images of $breed_name</h2>";
                    echo "<div class='image_container'>";
                    foreach ($images_data as $image) {
                        $img_pol = $image['url'];
                        echo "<img src=$img_pol alt='Cat Image'>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Error: Fetching images.</p>";
                }
            }
            displayBreedImages($breed_id, $breed_name);
        } else {
            echo "<p>Error: Fetching breed details.</p>";
        }
    } else {
        echo "<p>Error: Breed ID not provided.</p>";
    }
    ?>
</body>
</html>