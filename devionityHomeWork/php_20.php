<?php

    $book = array('author' => 'Fedor Dostaevskiy', 'name book'=> 'Idiot', 'publishing house' => 'Public Domain');
    $laptop = array('brand' => 'ASUS', 'modcel'=> 'K52F', 'memory' => '250Gb', 'diagonal' => '17\"');
    $phone = array('brand'=> 'Iphone', 'model'=> '6s', 'cost'=> '36000UAH');
    $car = array('brand'=> 'BMW', 'model'=> 'Z3', 'horsepower'=> '250HP');
    $home = array('houseroom'=> 'apartment', 'area'=> '1500m', 'address'=> 'Khreshchatyk 1');
    $product = array($book, $laptop, $phone, $car, $home);

    echo '<pre>';
    print_r($product);
    echo '</pre>';
?>