<?php
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// composer autoload
require_once 'vendor/autoload.php';
use Helpers\RandomGenerator;

// get query parameters
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;

// comform parameters
$min = (int)$min;
$max = (int)$max;

// generate random users 
$users = RandomGenerator::users($min, $max);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <style>/*user card styling*/</style>
</head>
<body>
    <h1>User Profiles</h1>

    <?php foreach ($users as $user): ?>
    <div class="user-card">
        <!-- display user card -->
    </div>
    <?php endforeach; ?>
</body>
</html>
