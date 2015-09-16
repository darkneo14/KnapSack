<!DOCTYPE html >
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PS Printing</title>
<meta name="keywords" content="PS printing" />
<meta name="description" content="This is a printing press website for new coustomers and employees" />

<link rel="stylesheet" type="text/css" href="css/example3.css" />

<!--[if lte IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('*');
</script>
<![endif]-->

<?php
$qty=$_POST["quantity"];
$val=$_POST["time"];

?>
<?php require_once('Connections/con_knap.php'); ?>

<?php
function max1($a,$b)
{
	if($a>$b)
		return($a);
	return($b);
}

//0-1 Knapsack

function knapSackDp($w,$weight,$value,$n)
{
	$w=ceil($w);
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


//Fractional Knapsack
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


//Minimization Knapsack

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
/*	for($i=0;$i<$n;$i++)

	{
		echo $value[$i]."\n";
		echo $weight[$i]."\n";

	}*/
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


mysql_select_db($database_con_knap,$con_knap);
$query_weight="SELECT `capacity` FROM workers";
$wq=mysql_query($query_weight,$con_knap) or die(mysql_error());
$weightq=mysql_fetch_assoc($wq);
$query_value="SELECT `hours` FROM workers";
$vq=mysql_query($query_value,$con_knap) or die(mysql_error());
$valueq=mysql_fetch_assoc($vq);
//$query_n="SELECT COUNT(`capacity`) FROM workers";
//$nq=mysql_query($query_n,$con_knap) or die(mysql_error());
//$n=mysql_fetch_assoc($nq);
$n=0;
$weight=array();
do{
	$n++;
array_push($weight,$weightq['capacity']);
}while($weightq=mysql_fetch_assoc($wq));
$value=array();
do{
array_push($value,$valueq['hours']);
}while($valueq=mysql_fetch_assoc($vq));



?>
<?php
$a=knapSackDp($val,$value,$weight,$n);
$b=knapSackGr($val,$value,$weight,$n);
$c=(int)$b;
$d=knapSackMn($qty,$value,$weight,$n);
?>

<?php
$fi="Final";
$qty1=(int)$qty;
$final_ans = "UPDATE `output` SET `out`='$qty1' WHERE name='$fi'";

mysql_query($final_ans,$con_knap) or die(mysql_error());
?>

<script type="text/javascript" src="js/gl_function.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.slide.js"></script>


</head>
<body>
<form action="" method="post" onsubmit=''>
  <center>
         <div id="example_1">
          <div id="example_9"><a href='home.php' target='_self' title='Visit our homepage - SliceMaker Soft'><img id='img_9' src='images/example/example_9.png' width='370' height='138' border='0'  onmouseover="$(this).attr('src','images/example/logo-hover-image.png');" onmouseout="this.src='images/example/example_9.png';"/></a></div>
          <div id="example_10"><a href='home.php' target='_self' title=''><img id='img_10' src='images/example/example_10.png' width='139' height='140' border='0'  onmouseover="$(this).attr('src','images/example/nav-item-hover-1.png');" onmouseout="this.src='images/example/example_10.png';"/></a></div>
          <div id="example_11"><a href='about.php' target='_self' title=''><img id='img_11' src='images/example/example_11.png' width='138' height='140' border='0'  onmouseover="$(this).attr('src','images/example/nav-item-hover-2.png');" onmouseout="this.src='images/example/example_11.png';"/></a></div>
          <div id="example_12"><a href='workers.php' target='_self' title=''><img id='img_12' src='images/example/example_12.png' width='137' height='140' border='0'  onmouseover="$(this).attr('src','images/example/nav-item-hover-3.png');" onmouseout="this.src='images/example/example_12.png';"/></a></div>
          <div id="example_13"><a href='projects.php' target='_self' title=''><img id='img_13' src='images/example/example_13.png' width='142' height='140' border='0'  onmouseover="$(this).attr('src','images/example/nav-item-hover-4.png');" onmouseout="this.src='images/example/example_13.png';"/></a></div>
          <div id="example_14"><a href='contacts.php' target='_self' title=''><img id='img_14' src='images/example/example_14.png' width='142' height='140' border='0'  onmouseover="$(this).attr('src','images/example/nav-item-hover-5.png');" onmouseout="this.src='images/example/example_14.png';"/></a></div>
     </div>
     <div id="example_2">
          <div id="example_15">
          	<div class="w_ctr_15">
          		<div class="JQ-slide">
          			<ul class="JQ-slide-content">
          				<li><a href="home.php"><img src="images/my/1.jpg" width="800" height="418" alt=""/><span></span></a></li>
          				<li><a href="home.php"><img src="images/my/2.jpg" width="800" height="418" alt=""/><span></span></a></li>
          				<li><a href="home.php"><img src="images/my/3.jpg" width="800" height="418" alt=""/><span></span></a></li>
          			</ul>
          			<ul class="JQ-slide-nav">
          				<li class="on">1</li>
          				<li>2</li>
          				<li>3</li>
          			</ul>
          		</div>
          	</div>
          	<script type="text/javascript">
          		$(function (){
          		
          			/* banner图片左右滚动 */
          			$(".w_ctr_15 .JQ-slide").Slide({
          			effect:"scroolX",
          			speed:"normal",
          			timer:5000
          			});
          		
          		});
          	</script>
          </div>
          <div id="example_16" onClick="$('#example_16').css('background-image','none');">
               <div id="example_23">PS Printing Press:</div>
               <div id="example_19">We're So Much More Than What We Print</div>
               <div id="example_20">We're not just enthusiastic printers of business forms and sales and marketing materials, we're dedicated graphic arts professionals who seek to use our creative skills to improve the results of your printed documents and sales and marketing materials. How can we help you reach your goals?<br /></div>
               <div id="example_21"><a href='about.php' target='_self' title=''><img id='img_21' src='images/example/example_21.png' width='137' height='45' border='0'  onmouseover="$(this).attr('src','images/example/banner-hover-button.png');" onmouseout="this.src='images/example/example_21.png';"/></a></div>
          </div>
     </div>
     
     
     <div id="example_5">
          <div id="example_73">
          </div>
          <div id="example_74">
<div id="example_75">Project Analysis -
               </br>
</div>          
            <h2>
              <?php 
			     if($c>=$qty)
				 
					 echo "Yes, We can Complete the Project in the given time frame.";?>
                     </br>
                     <?php
					 if($c>=$qty)
				  echo "We can actually print   ".$c."   Copies During Weekends\n";
				  ?>
                 </br>
                 <?php
				 if($c>=$qty)
				 echo "We can Print  ".$a."  Copies During Weekdays";
				 ?>
				 <?php
				 if($c<$qty)
				 echo "We cannot Diliver in the Given time frame\n";?>
                 </br>
                 <?php
				 if($c<$qty)
				  echo "We require atleast ".number_format($d,2)." Hours";
			   ?>
               </br>
               </br>
               </br>
                <?php if($c>$qty){?> To Enter your Delivery adress...
               </br>
               
               <form action="ad1.php" >
               <input name="Continue" type="submit" id="Continue" formaction="ad1.php" value="Continue" ></form><?php }?>
            </h2>      
 
     </div>
 </div>
     <div id="example_7">
          <div id="example_98">
               <div id="example_99"><h2>About Us</h2>
Founded in 2010, PS Printing has expanded its business rapidly. This company is focused on providing consumers with innovative and comprehensive Printing options for easier and better experience. <br></div>
               <div id="example_100">
                    <div id="example_103"><h2>Glossary</h2></div>
                    <div id="example_104">
                         <div id="example_105"><a href='about.php' target='_self' title=''><img id='img_105' src='images/my/example_105.png' width='60' height='26' border='0' /></a></div>
                         <div id="example_106"><a href='about.php' target='_self' title=''><img id='img_106' src='images/my/example_106.png' width='82' height='26' border='0' /></a></div>
                         <div id="example_107"><a href='about.php' target='_self' title=''><img id='img_107' src='images/my/example_107.png' width='77' height='26' border='0' /></a></div>
                    </div>
                    <div id="example_108">
                         <div id="example_113"><a href='about.php' target='_self' title=''><img id='img_113' src='images/my/example_113.png' width='69' height='27' border='0' /></a></div>
                         <div id="example_114"><a href='about.php' target='_self' title=''><img id='img_114' src='images/my/example_114.png' width='58' height='27' border='0' /></a></div>
                         <div id="example_115"><a href='about.php' target='_self' title=''><img id='img_115' src='images/my/example_115.png' width='56' height='27' border='0' /></a></div>
                    </div>
                    <div id="example_109">
                         <div id="example_110"><a href='about.php' target='_self' title=''><img id='img_110' src='images/my/example_110.png' width='58' height='25' border='0' /></a></div>
                         <div id="example_111"><a href='about.php' target='_self' title=''><img id='img_111' src='images/my/example_111.png' width='47' height='25' border='0' /></a></div>
                         <div id="example_112"><a href='about.php' target='_self' title=''><img id='img_112' src='images/my/example_112.png' width='52' height='25' border='0' /></a></div>
                    </div>
               </div>
               <div id="example_101">
                    <div id="example_116"><h2>News</h2></div>
                    <div id="example_117">
                         <div id="example_120">
                         </div>
                         <div id="example_121">PS Printing News</div>
                    </div>
                    <div id="example_118">
                         <div id="example_122">
                         </div>
                         <div id="example_123">PS Printing News</div>
                    </div>
                    <div id="example_119">
                         <div id="example_124">
                         </div>
                         <div id="example_125">PS Printing News</div>
                    </div>
               </div>
               <div id="example_102">
                    <div id="example_126"><h2>Contact Us for Help</h2></div>
                    <div id="example_127">If you have any problems regarding our products and services,Please feel free to contact us. [Support Email Address: <a href="#">support@PSprinting.com</a>]<br></div>
               </div>
          </div>
</div>
     <div id="example_8">
          <div id="example_128">
               <div id="example_129">Copyright © PS Printing, Inc. All Rights Reserved.</div>
          </div>
     </div>

  </center>
</form>
</body>
</html>
