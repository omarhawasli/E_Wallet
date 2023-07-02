<?php
$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

function secure_generate_string($input, $secure = true)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < 5; $i++) {
        if ($secure) {
            $random_character = $input[random_int(0, $input_length - 1)];
        } else {
            $random_character = $input[mt_rand(0, $input_length - 1)];
        }
        $random_string .= $random_character;
    }

    return $random_string;
}
$string_length = 6;
$captcha_string = secure_generate_string($permitted_chars, $string_length);


    $image = imagecreatetruecolor(200, 50);
        imageantialias($image, true);

    $colors = [];
    $red = rand(125, 175);
    $green = rand(125, 175);
    $blue = rand(125, 175);

    for ($i = 0; $i < 5; $i++) {
        $colors[] = imagecolorallocate($image, $red - 20 * $i, $green - 20 * $i, $blue - 20 * $i);
        }

    imagefill($image, 0, 0, $colors[0]);

        for ($i = 0; $i < 10; $i++) {
            imagesetthickness($image, rand(2, 10));
            $rect_color = $colors[rand(1, 4)];
            imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
}
