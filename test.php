<?php 
$A=array(-1,3,-1,-2,5,1,-6,1);
for($i=0;$i<count($A); $i++)
{     $l=0;
	$h=0;
	$j=0;
	$k=0;
	while($j<$i){
		$l=$l+$A[$j];
		$j++;
	}
	for($k=$i+1;$k<count($A);$k++){
		$h=$h+$A[$k];
	}
	echo $l==$h? "Prime index:$i":" ";
	
}
?>