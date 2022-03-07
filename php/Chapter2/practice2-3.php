<?php
    $hamburger = 4.95;
    $chocolate_milkshake = 1.95;
    $coke = 0.85;

    $food = ($hamburger *2 + $chocolate_milkshake + $coke);
    $tax = 0.075;
    $tip = 0.16;

    $total_btax = $food;
    $total_atax = $food * (1 + $tax);
    $total = $food * (1 + $tax + $tip);


    print "세전 총 가격은 $total_btax 입니다.";
    print "</br>";
    print "세후 총 가격은 $total_atax 입니다.";
    print "</br>";
    print "팁 포함 총 가격은 $total 입니다.";
?>