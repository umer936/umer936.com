 <?php function randomImage ( $array ) { $total = count($array); $call = rand(0,$total-1); return $array[$call]; } $my_images = array ( "sonic.jpg", "sonic2.jpg" ); echo "<img src=".randomImage($my_images).">"; ?>