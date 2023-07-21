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
    $breeds_api_url = "https://api.thecatapi.com/v1/breeds";
    $breeds_response = file_get_contents($breeds_api_url);
    $breeds_data = json_decode($breeds_response, true);

    if (is_array($breeds_data) && count($breeds_data) > 0) {
        echo "<h1>List of Cat Breeds</h1>";
        echo "<ul>";
        foreach ($breeds_data as $breed) {
            $breed_name = $breed['name'];
            $breed_id = $breed['id'];
            echo "<li><a href='breed.php'>$breed_name</a></li>";

        }
        echo "</ul>";
    } else
        echo "<p>Error breeds not found.</p>";
    ?>
</body>
</html>