<?php
require __DIR__ . '/vendor/autoload.php';
require 'i.config.php';

$router = new \Bramus\Router\Router();
$pug = new Pug();

//

$router->get('/', function() {
    Phug::displayFile('views/index.pug');
});

$router->get('/about', function() {
    Phug::displayFile('views/index.pug');
});

$router->get('/@(\w+)', function($user) {
    if(! $user)
    {
        die(header("Location: /"));
    }
    $base1 = file_get_contents("https://instagram.com/${user}?__a=1");
    $base = json_decode($base1, true);
    $username = htmlspecialchars($user);
    $bio = htmlspecialchars($base["graphql"]["user"]["biography"]);
    $trimmed = trim($bio["graphql"]["user"]["profile_pic_url_hd"], "https://scontent-bos3-1.cdninstagram.com");
    $pfp = image_proxy . $trimmed;
    $followers = $base["graphql"]["user"]["edge_followed_by"]["count"];
    $fowolling = $base["graphql"]["user"]["edge_follow"]["count"];
    $pug = new Pug();

    $output = $pug->render('views/user.pug', array(
        'user_name' => $username,
        'bio' => $bio,
        'user_photo' => $pfp,
        'following' => $fowolling,
        'followers' => $followers
    ));
    echo $output;
});

$router->run();