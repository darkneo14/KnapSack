<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
$V=10;

function minDistance($dist, $sptSet)
{

   $min = PHP_INT_MAX;
   $min_index=0;;
   $V=10;
   for ($v = 0; $v < $V; $v++)
     if ($sptSet[$v] == false && $dist[$v] <= $min)
         {
         $min = $dist[$v]; 
         $min_index = $v;
         }
	
   return $min_index;
}


function dijkstra($graph,$src,$destn)
{
     $dist=array();    
     $sptSet=array(); 
     $V=10;
     
     for ($i = 0; $i < $V; $i++)
        {
        $dist[] = PHP_INT_MAX;
        $sptSet[] = 0;
        }

     $dist[$src] = 0;
     for ($count = 0;$count< $V-1; $count++)
     {
       $u = minDistance($dist, $sptSet);

       $sptSet[$u] = true;

       for ($v = 0; $v < $V; $v++)
         if (!$sptSet[$v] && $graph[$u][$v] && $dist[$u] != PHP_INT_MAX && $dist[$u]+$graph[$u][$v] < $dist[$v])
            $dist[$v] = $dist[$u] + $graph[$u][$v];
     }
    return($dist[$destn]);
}

   
   $graph = array(array(0,20,40,60,80,100,120,140,160,180),
                  array(20,0,15,45,85,72,140,160,150,158),
                  array(40,15,0,20,40,25,45,68,140,129),
                  array(60,45,20,0,27,45,23,90,140,120),
                  array(80,85,40,27,0,90,68,58,135,32),
                  array(100,72,25,45,90,0,40,50,60,70),
                  array(120,140,45,23,68,40,0,25,50,35),
                  array(140,160,68,90,58,50,25,0,70,130),
                  array(160,150,140,140,135,60,50,70,0,44),
                  array(180,158,129,120,32,70,35,130,44,0)                  
                  );

   $ans=dijkstra($graph,0,4);
echo $ans;


	?>

	</body>
	</html>
<body>
</body>
</html>