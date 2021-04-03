<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="array1.php" method="post">
<span>Choose Array type:</span>
<input type="radio" name="array_size" value=6 <?php
if (isset($_POST ['array_size'])){
    if (($_POST["array_size"]==6)) {echo 'checked="checked"';}
}?>>6x6

<input type="radio" name="array_size" value=8 <?php
if (isset($_POST ['array_size'])){
    if (($_POST["array_size"]==8)) {echo 'checked="checked"';}
}?>>8x8


<input type="radio" name="array_size" value=10 <?php
if (isset($_POST ['array_size'])){
    if (($_POST["array_size"]==10)) {echo 'checked="checked"';}
}?>>10x10

<input type="radio" name="array_size" value=12 <?php
if (isset($_POST ['array_size'])){
    if (($_POST["array_size"]==12)) {echo 'checked="checked"';}
}?>>12x12

<input type="radio" name="array_size" value=14 <?php
if (isset($_POST ['array_size'])){
    if (($_POST["array_size"]==14)) {echo 'checked="checked"';}
}?>>14x14





<input type="submit" name="button" value="Submit"/></form>
</body>
</html>



<?php


if (isset($_POST ['array_size'])){
    $array_size= $_POST ['array_size'];
    





echo "<br>";
echo "<br>";

echo "<b>Input Array(".$array_size."x".$array_size.")</b>";
echo "<br>";
echo "<br>";

// $input = array(array(),array(),array(),array(),array(),array());

// for($k=0; $k<6; $k++){
//     if($k==0){
//         for($l=0; $l<6; $l++){
//             $input[$k][$l] = $l+1;
           
            
//         }
//     }
//     else if ($k==1){
//         for($l=6; $l<12; $l++){
//             $input[$k][$l-6] = $l+1;
           
            
//         }
//     }
//     else if($k==2){
//         for($l=12; $l<18; $l++){
//             $input[$k][$l-12] = $l+1;
           
            
//         }
//     }
//     if($k==3){
//         for($l=18; $l<24; $l++){
//             $input[$k][$l-18] = $l+1;
           
            
//         }
//     }
//     if($k==4){
//         for($l=24; $l<30; $l++){
//             $input[$k][$l-24] = $l+1;
           
            
//         }
//     }
//     if($k==5){
//         for($l=30; $l<36; $l++){
//             $input[$k][$l-30] = $l+1;
           
            
//         }
//     }  
    
// }

$input=  array();
foreach (range(0,$array_size-1) as $row) {
 foreach (range(0,$array_size-1) as $col) {
     $input[$row][$col]=($array_size*$row)+$col+1;
  
 }
}







echo "<table border='1px' cellpadding='5px' cellspacing='0px' >";
for($i=0; $i<$array_size; $i++){
    echo "<tr>";
for($j=0; $j<$array_size; $j++){
    if($j==0 || $i==0 || $i==$array_size-1 || $j==$array_size-1){
        echo "<td style='background-color:#006400 ; color:#fff; text-align:center;'>";  
        echo $input[$i][$j];
        echo "</td>";  
    }else if (((($i-$j)==1) && ($i==($array_size/2))) ||  ((($j-$i)==1) && ($j==($array_size/2))) || (($i==$j) && ($j==($array_size/2))) || (($i==$j) && ($i==($array_size/2)-1))){
        echo "<td style='background-color:#ff0000 ; color:#fff; text-align:center;'>";  
        echo $input[$i][$j];
        echo "</td>";
    }else{
        echo "<td style='text-align:center;'>";  
        echo $input[$i][$j];
        echo "</td>";
    }
    
}
echo"</tr>";
}
echo "</table>";

//Output Array
echo "<br>";
echo "<br>";
echo "<b>Output Array</b>";

echo "<br>";
echo "<br>";

$output=  array();

foreach (range(0,$array_size-1) as $row) {
 foreach (range(0,$array_size-1) as $col) {
    //Transposing the green areas 
    if($row == 0 || $col ==0 || $row==($array_size-1) || $col ==($array_size-1)){
        $output[$row][$col] = $input[$col][$row];
     }
     else{
        $output[$row][$col] = $input[$row][$col];
     }
  
 }
}

//Exchanging top and bottom rows
$temp=  array();
$temp=$output[0];
$output[0]=$output[$array_size-1];
$output[$array_size-1]=$temp;

//Correcting row1 elements
for($i=1; $i<$array_size/2; $i++){
$temp1=$output[$i][0];
$output[$i][0]=$output[($array_size-1)-$i][0];
$output[($array_size-1)-$i][0]=$temp1;
}

//Correcting lastrow elements

for($i=1; $i<$array_size/2; $i++){
    $temp1=$output[$i][($array_size-1)];
    $output[$i][($array_size-1)]=$output[($array_size-1)-$i][($array_size-1)];
    $output[($array_size-1)-$i][($array_size-1)]=$temp1;
}

// Transposing the red section
foreach (range(0,($array_size-1)) as $row) {
    foreach (range(0,($array_size-1)) as $col){
        if(($row==$col)&&($row==($array_size/2-1))){
            $temp3=$output[$row][$col+1];
            $output[$row][$col+1]=$output[$row][$col];
            $temp4=$output[$row+1][$col+1];
            $output[$row+1][$col+1]=$temp3;
            $temp3=$output[$row+1][$col];
            $output[$row+1][$col]=$temp4;
            $output[$row][$col]=$temp3;
        }
    }

}


//Displaying the output table

echo "<table border='1px' cellpadding='5px' cellspacing='0px' >";
for($s=0; $s<$array_size; $s++){
    echo "<tr>";
for($t=0; $t<$array_size; $t++){
    if($s==0 || $t==0 || $s==$array_size-1 || $t==$array_size-1){
        echo "<td style='background-color:#006400 ; color:#fff; text-align:center;'>";  
        echo $output[$s][$t];
        echo "</td>";  
    }else if (((($s-$t)==1) && ($s==($array_size/2))) ||  ((($t-$s)==1) && ($t==($array_size/2))) || (($s==$t) && ($t==($array_size/2))) || (($s==$t) && ($s==($array_size/2-1)))){
        echo "<td style='background-color:#ff0000 ; color:#fff; text-align:center;'>";  
        echo $output[$s][$t];
        echo "</td>";
    }else{
        echo "<td style='text-align:center;'>";  
        echo $output[$s][$t];
        echo "</td>";
    }
    
}
echo"</tr>";
}
echo "</table>";




}

?>

