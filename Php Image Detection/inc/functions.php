
<?php 

function colorPalette($imageFile, $pixel_skip=1) 
{ 
   $colors = []; 
//    took this method for php.net
   $size = getimagesize($imageFile); 

//    took this code from php.net i wanted to know how to soppurt all the files
   $image = imagecreatefromstring(file_get_contents($imageFile));

   for($x = 0; $x < $size[0]; $x += $pixel_skip) 
   { 
      for($y = 0; $y < $size[1]; $y += $pixel_skip) 
      { 
        //   learned this two methods from php.net
         $pixel_color = imagecolorat($image, $x, $y); 
         $rgb_arr = imagecolorsforindex($image, $pixel_color); 
     
        //  this code is from stackoverflow i didn't know how to convert the RGB to Hexa
         $red = round(round(($rgb_arr['red'] / 0x33)) * 0x33); 
         $green = round(round(($rgb_arr['green'] / 0x33)) * 0x33); 
         $blue = round(round(($rgb_arr['blue'] / 0x33)) * 0x33); 
         $color_value_hexa = sprintf('%02X%02X%02X', $red, $green, $blue); 

         if(array_key_exists($color_value_hexa, $colors)){ 
            $colors[$color_value_hexa]++; 
         } 
         else{ 
            $colors[$color_value_hexa] = 1; 
         } 
      } 
   } 
   arsort($colors); 
   $total_colors=count($colors);

   $top_colors=array_slice($colors, 0, 5, true);

   return $top_colors;

} 
// sample usage: 

