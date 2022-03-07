<?php
    $hamburger = 4.95;
    $chocolate_milkshake = 1.95;
    $coke = 0.85;

    $food = ($hamburger *2 + $chocolate_milkshake + $coke);
    $tax = $food * 0.075;
    $tip = $food * 0.16;

    $total = $food + $tax + $tip;

    print "총 가격: $" .$total ." 입니다.";
    print "</br>";
    print "총 가격은 $total 입니다.";
?>