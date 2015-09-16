<!DOCTYPE html >
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PS Printing</title>
<meta name="keywords" content="PS printing" />
<meta name="description" content="This is a printing press website for new coustomers and employees" />

<link rel="stylesheet" type="text/css" href="css/example.css" />

<!--[if lte IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('*');
</script>
<![endif]-->


<?php require_once('Connections/con_knap.php'); ?>
<?php
$reg=$_POST["regions"];
$reg=ord(strtolower($reg)) - 97;

?>
<?php
mysql_select_db($database_con_knap,$con_knap);
$query_out="SELECT `out` FROM output where name='Final'";
$oq=mysql_query($query_out,$con_knap) or die(mysql_error());
$otq=mysql_fetch_assoc($oq);
$ot=$otq['out'];
?>
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

   $ans=dijkstra($graph,0,$reg);

$fans=$ans*10 + $ot*10;



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
            <div id="example_75">The Final Estimated Cost for The Project is -
               </br>
               
               
               
</div>  
             </br><h2><?php
			   
			   echo "Rs. ".$fans;
			   ?> </h2>       
             
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
