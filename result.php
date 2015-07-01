<?php
include 'config.php';
session_start();
$qname = $_GET['Name'];
$_SESSION['qname']=$qname;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Varun Bawa">
    <link href="css/materialize.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon">
    <title>Quiz Display</title>
    <style>
        .register_form{
            margin:41px 0px 22px 0px;
        }
        .timer_location{
            bottom: 45px; right: 24px;
            position: fixed;
        }
        .pagination_position{

        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>
<body>
    <!--Begin header-->
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"><?php echo $qname;?> Leaderboard</a>
	        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="index.html">Home</a></li>
    			<li><a href="logout.php">Logout</a></li>
	            <li><a href="about.html">About</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="index.html">Home</a></li>
            	<li><a href="logout.php">Logout</a></li>
	            <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </nav>
	<!--end Header-->


    <!--Main Content-->
    <main>
		<!--Quiz Database Display Block Start-->
<?php
$display = mysql_query("Select * from ".$qname."_score ORDER BY score DESC") or die(mysql_error());
?>
<table class="striped">
        <thead>
          <tr>
              <th>Name</th>
              <th>Score</th>
          </tr>
        </thead>
<?php 
	 while($row = mysql_fetch_array($display)) 
	 {
?>
         <tbody>
			<tr>
				<th><?php echo $row["name"]?></th>
				<th><?php echo $row["score"]?></th>
			</tr>
		</tbody>
<?php
     }
?>
</table>
<!--Quiz Database Display Block End-->

    </main>
    <!--End Main Content-->

    <!--Begin Footer-->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">UPES-CSI Student Chapter</h5>
                    <p class="grey-text text-lighten-4">Hello world the content goes in here in rows and columns</p>
                </div>
                <div class="col l4 s12" style="overflow: hidden;">
                    <h5 class="white-text">Connect with us</h5>

                    <a href="https://twitter.com/upescsi" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @upescsi</a>


                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Developed and Maintained by UPES-CSI Student Chapter  &copy; 2015-2016
                <a class="grey-text text-lighten-4 right" href="http://materializecss.com/" target="_blank">Developed using materializecss</a>
            </div>
        </div>
    </footer>
    <!--end Footer-->

</body>

<!--Begin of Script Section-->
<script>

    //responsive initialization
    $(".button-collapse").sideNav();

    //Tooltip initialization
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });

    //Modal Initialization
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!--End of Script Section-->

</html>