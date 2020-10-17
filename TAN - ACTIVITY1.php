<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<style type="text/css">

	body {
		background-image: linear-gradient(to right, blue, black);
		color: white;
		font-family: 'Proxima Nova Alt';
		font-size: 30px;
		text-align: center;
	}

	h1 {
		font-size: 50px;
	}
	a {
		color: white;
	}
 
</style>
<body>

<center><marquee><h1><u>ACTIVITY 1: 99 BOTTLES OF BEER</h1></u></marquee></center>

<?php

$colortext = ["red", "green", "blue", "orange", "yellow"];
$countcolor = 0;

// This is the condition where every bottle takes 1 beer away and the count decreases to 1.
  for($beer = 99; $beer > 0; $beer--)
  {

  $count = $colortext[$countcolor];	
  $s = $beer > 1?"s":"";

  //If the bottle reaches 2, here is the result:
  if ($beer == 2) {
  echo "<p style='color: $count;'>$beer Bottle$s of beer on the wall, $beer bottle$s of beer.<br>";
  echo "Take one down and pass it around, ";
  echo ($beer-1)." bottle of beer on the wall.</p>";	
  // $countcolor++;
  // $count = $colortext[$countcolor];	

  // For every 5 sentences, it will change color.
  if ($countcolor == 4) 
  {
  	$countcolor = 0;
  }
  else
  {
  	$countcolor++;
  }

  }

   //If the bottle reaches 1, here is the result:
  else if ($beer == 1) {
  echo "<p style='color: $count;'>$beer Bottle$s of beer on the wall, $beer bottle$s of beer.<br>";
  echo "Take one down and pass it around, ";
  echo "no more bottle of beer on the wall.</p>";	
  // $countcolor++;
  // $count = $colortext[$countcolor];	

  // For every 5 sentences, it will change color.
  if ($countcolor == 4) 
  {
  	$countcolor = 0;
  }
  else
  {
  	$countcolor++;
  }

  }

  else {
  echo "<p style='color: $count;'>$beer Bottle$s of beer on the wall, $beer bottle$s of beer.<br>";
  echo "Take one down and pass it around, ";
  echo ($beer-1)." bottles of beer on the wall.</p>";	
  // $countcolor++;
  // $count = $colortext[$countcolor];	

  // For every 5 sentences, it will change color.
  if ($countcolor == 4) 
  {
  	$countcolor = 0;
  }
  else
  {
  	$countcolor++;
  }
 }

}
?>

<!-- If there is no bottle left, it will left a message. -->
<p>No more bottles of beer on the wall.
No more bottles of beer<br>
<a href="<?php echo $PHP_SELF ?>">Go to the store</a> and buy some more,
 99 bottles of beer on the wall.</p>

</body>
</html>