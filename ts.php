<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
error_reporting(0);
function max1($a,$b)
{
	if($a>$b)
		return($a);
	return($b);
}

function knapSackGr($w,$weight,$value,$n)
{
	$u=array();
	for($i=0;$i<$n;$i++)
		array_push($u,0);
	$cur=$w;
		
	
	
	$total=0.0;
	while($cur>0)
	{
		$maxi=-1;
		for($i=0;$i<$n;$i++)
		{
			if(($u[$i]==0)&&(($maxi==-1)||((float)$value[$i]/$weight[$i]> (float)$value[$maxi]/$weight[$maxi])))
				$maxi=$i;
		}
		$u[$maxi]=1;
		
		$cur-=$weight[$maxi];
		$total+=$value[$maxi];
		if($cur<0)
		{
			$total-=$value[$maxi];
			$total+=(1+(float)$cur/$weight[$maxi])*$value[$maxi];
		}
	}
return($total);
}

function knapSackDp($w,$weight,$value,$n)
{
	$dp=array();
	for($i=0;$i<=$n;$i++)
	{
		$dp[$i]=array();
		for($j=0;$j<=$w;$j++)
		{
			$dp[$i][$j]=0;
		}	
	}
	for($i=0;$i<=$n;$i++)
	{
		for($j=0;$j<=$w;$j++)
		{
			if($weight[$i-1]<=$j)
				$dp[$i][$j]=max1($value[$i-1]+$dp[$i-1][$j-$weight[$i-1]],$dp[$i-1][$j]);
			else
				$dp[$i][$j]=$dp[$i-1][$j];
		}
	}
	return($dp[$n][$w]);
}
function knapSackMn($w,$weight,$value,$n)
{
	$z=array();

	for($i=0;$i<$n;$i++)
	{
		$k=$weight[$i]/$value[$i];
		$z[]=$k;
		//echo $z[$i]."\n";
	}
	for($i=0;$i<$n;$i++)
	{
		for($j=0;$j<$n-1-$i;$j++)
		{
			if($z[$j]>$z[$j+1])
			{
				$z[$j]=$z[$j]+$z[$j+1];
				$z[$j+1]=$z[$j]-$z[$j+1];
				$z[$j]=$z[$j]-$z[$j+1];
				
				$weight[$j]=$weight[$j]+$weight[$j+1];
				$weight[$j+1]=$weight[$j]-$weight[$j+1];
				$weight[$j]=$weight[$j]-$weight[$j+1];

				$value[$j]=$value[$j]+$value[$j+1];
				$value[$j+1]=$value[$j]-$value[$j+1];
				$value[$j]=$value[$j]-$value[$j+1];											
			}		
		}
	}
	for($i=0;$i<$n;$i++)
	{
		echo $value[$i]."\n";
		echo $weight[$i]."\n";
	}
	$total=0.0;
	for($i=0;$i<$n && $w!=0;$i++)	
	{
		if($w>=$value[$i])
		{
			$w-=$value[$i];
			$total+=$weight[$i];
		}
		else
		{
			$total+=$z[$i]*$w;
			$w=0;		
		}
	}
return($total);
}




?>
<?php
$wt=array(2,2,3);
$v=array(100,10,120);
$a=knapSackGr(4,$wt,$v,3);
echo $a;
?>
<body>
</body>
</html>