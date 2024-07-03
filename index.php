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
    <style>
        .user-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .avatar {
            width: 50px;
            height: 50px;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>User Profiles</h1>
    <?php foreach ($users as $user): ?>
        <?php echo $user->toHTML(); ?>
    <?php endforeach; ?>
</body>
</html>