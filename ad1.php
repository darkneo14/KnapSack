﻿<?php require_once('Connections/con_knap.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_con_knap, $con_knap);
$query_name = "SELECT region, distance FROM adress";
$name = mysql_query($query_name, $con_knap) or die(mysql_error());
$row_name = mysql_fetch_assoc($name);
$totalRows_name = mysql_num_rows($name);
?>

<?php
/*mysql_select_db($database_con_knap,$con_knap);
$query_out="SELECT `out` FROM output where name='Final'";
$oq=mysql_query($query_out,$con_knap) or die(mysql_error());
$otq=mysql_fetch_assoc($oq);
$ot=$otq['out'];*/
?>
<!DOCTYPE html >
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PS Printing</title>
<meta name="keywords" content="PS printing" />
<meta name="description" content="This is a printing press website for new coustomers and employees" />

<link rel="stylesheet" type="text/css" href="css/example2.css" />

<!--[if lte IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('*');
</script>
<![endif]-->

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
               <div id="example_20">
                 We're not just enthusiastic printers of business forms and sales and marketing materials, we're dedicated graphic arts professionals who seek to use our creative skills to improve the results of your printed documents and sales and marketing materials. How can we help you reach your goals?<br />
                 
               </div>
               <div id="example_21">
                 <h3><a href='about.php' target='_self' title=''><img id='img_21' src='images/example/example_21.png' width='137' height='45' border='0'  onmouseover="$(this).attr('src','images/example/banner-hover-button.png');" onmouseout="this.src='images/example/example_21.png';"/></a></h3>
               </div>
          </div>
     </div>
     <div id="example_5">
          
          <div id="example_74">
            <div id="example_75">
              <h3>Our Regions of Dilivery</h3>
              
<table width="600" border="1">
                   <div id="example_table">
                   <tr>
                     <td><h3>Location</h3></td>
                     <td><h3>Region</h3></td>
                     
                   </tr>
                  <?php do { ?> <tr>
                     <td><?php echo $row_name['distance']; ?></td>
                     <td><?php echo $row_name['region']; ?></td>
                     
                   </tr><?php } while ($row_name = mysql_fetch_assoc($name)); ?>
  </table>
  <div id="example_emp">
  <h3>Enter Your Adress Region Here</h3>
                 <form  action="ad.php" method="post">
                 <table width="200" border="1">
  <tr>
    <td>Region</td>
    <td><input type="text" id="regions" name="regions"></td>
  </tr>
  <tr>
    <td><input type="reset"></td>
    <td><input type="submit" formaction="ad.php"></td>
  </tr>
</table>

                 </form>
                 </div>
            </div>
       </div>
               
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
                         <div id="example_121">PS Printing</div>
                    </div>
                    <div id="example_118">
                         <div id="example_122">
                         </div>
                         <div id="example_123">PS Printing</div>
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
<?php
mysql_free_result($name);
?>
