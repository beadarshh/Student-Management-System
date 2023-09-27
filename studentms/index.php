<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>
<head>
<title>GJIMT</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
	<body>
<?php include_once('includes/header.php');?>
<div class="banner">
  <div class="container">
  <script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<div class="slider">
       <div class="callbacks_container">
        <ul class="rslides" id="slider">
         <li>      
          <h3  style="color: #c54521; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);" ><strong >GJIMT Student Mangment System</strong></h3>        
          <div class="readmore">
          <a href="user/login.php" style="border-radius: 250px">Student Login<i class="glyphicon glyphicon-menu-right"> </i></a>
          </div>
         </li>
        </ul>
      </div>
    </div>
</div>      
  </div>
<div class="welcome">
	<div class="container">
		<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
		<h2><?php  echo htmlentities($row->PageTitle);?></h2>
		<p><?php  echo ($row->PageDescription);?></p><?php $cnt=$cnt+1;}} ?>
	</div>
</div>
<div class="testimonials">
	<div class="container">
			<div class="testimonial-nfo">
        <h3 style="color:#000000;"><strong >Notices</strong></h3>
         <marquee  style="height:350px;  color:#000000;" direction ="up" onmouseover="this.stop();" onmouseout="this.start();">
				<?php
$sql="SELECT * from tblpublicnotice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

 
		<a href="view-public-notice.php?viewid=<?php echo htmlentities ($row->ID);?>" target="_blank" style="color:#000000; font-size: 30px">
          <?php  echo htmlentities($row->NoticeTitle);?>(<?php  echo htmlentities($row->CreationDate);?>)</a>
          <hr /><br />
				    
			<?php $cnt=$cnt+1;}} ?>
	</marquee></div>
	</div>
</div>
<?php include_once('includes/.footerphp');?>
	</body>
</html>
