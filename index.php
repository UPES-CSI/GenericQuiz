<?php
include 'config.php';
session_start();
$result = mysql_query("Select COUNT(*) from quizzes");
$count = mysql_result($result, 0);
// $_SESSION['email'] contains email
// $_SESSION['name'] contains name
?>
<!DOCTYPE html>
<html>
<!--image dimensions for card: 200px X 150px-->
<!--begin of head-->
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Deepankar Agrawal & Varun Bawa">
    <link href="css/materialize.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon">
    <title>Online Quiz Manager</title>
    <style>
        .quiz_margin{
            margin: 35px 41px 7px 0px;
        }
        .content_margin{
            margin: 0px 0px 0px 11px;
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
<!--end of Head-->

<!--begin of Body-->
<body>

    <!--Begin header-->
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Online Quiz <?php if(isset($_SESSION['name'])){ $abc=$_SESSION['name']; echo "<font size='3pt'> for $abc";}?></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="#login" class="modal-trigger">Login</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="authtocreate.php">Create Quiz</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </nav>
    <!--end Header-->

    <!--Begin Content-->
    <main>
		<div class="content_margin">
<?php
$abc=0;
for($i=1;$i<=$count;$i++)
	{
		$query=mysql_query("Select * from quizzes WHERE quiz_no='$i'");
		$table=mysql_fetch_array($query);
		$name= $table['quiz_name'];
		$start_date= $table['start_date'];
		$start_time= $table['start_time'];
		$end_date= $table['end_date'];
		$end_time= $table['end_time'];

?>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
if($abc==0)
{	
	echo '<div class="row">';
}
$abc++;
?>
           
				<!--Begin Column-->
                        <div class="quiz_margin col s5 m2" id="section">
                            <!--Begin Card-->
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="images/image.jpg">
                                    </div>
							<!--		<div class="card-title activator grey-text text-darken-4" style="font-size:15px; position:absolute; top: 0px; left: 0px;">
										
                                    				<ul>Start Date&nbsp&nbsp<?php echo $table['start_date'];?></ul>
													<ul>Time&nbsp&nbsp<?php echo $table['start_time'];?></ul>
													<ul>End Date&nbsp&nbsp<?php echo $table['end_date'];?></ul>
													<ul>Time&nbsp&nbsp<?php echo $table['end_time'];?></ul>
									
                                    </div>
                               -->     <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?php echo $table['quiz_name'];?><i class="mdi-navigation-more-vert right"></i></span>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Test-Down<i class="mdi-navigation-close right"></i></span>
                                        <div class="row">
                                            <div class="col s6 m6">
                                                <div><a href="start-quiz.php?Name=<?php echo $table['quiz_name']?>"><i class="small mdi-av-play-arrow tooltipped" data-position="top" data-delay="50" data-tooltip="Participate"></i></a></div>
                                            </div>
                                            <div class="col s6 m6">
                                                <div><a href="result.php?Name=<?php echo $table['quiz_name']?>"><i class="small mdi-av-equalizer tooltipped" data-position="top" data-delay="50" data-tooltip="Ranking"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s6 m6">
												<span class="card-title grey-text text-darken-4"></span>
											</div>
											<div class="col s6 m6">
                                                <div><a href="timetest.php?Name=<?php echo $table['quiz_name'];?>"><i class="small mdi-device-access-alarm tooltipped" data-position="top" data-delay="50" data-html="true" data-tooltip="<?php echo $table['start_date']; echo $table['start_time'];?><br /><?php echo $table['end_date']; echo $table['end_time'];?>"></i></a></div>
                                            </div>
											<div class="col s6 m6">
                                                <div><a href="information.html"><i class="small mdi-action-info-outline tooltipped" data-position="top" data-delay="50" data-tooltip="Information"></i></a></div>
                                            </div>
										</div>

                                    </div>
                                </div>
                            <!--End card-->
                        </div>
                    <!--End Column-->
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php
	if($abc==5)
	{
		echo '</div>';
		$abc=0;
	}
?>
<?php

	}

?>
</div>
	</main>
    <!--end Content-->

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

    <!-- Login Modal Structure -->
    <div id="login" class="modal">
        <div class="modal-content">
            <h4>Login</h4>
            <div class="row">
                <form class="col s12" method="POST" action="logincheck.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input id="icon_prefix" type="text" class="validate" name="email">
                            <label for="icon_prefix">Email ID</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-action-lock prefix"></i>
                            <input id="icon_telephone" type="password" class="validate" name="password">
                            <label for="icon_telephone">Password</label>
                        </div>
                    </div>
					<div class="modal-footer">
						<button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Login
							<i class="mdi-content-send right"></i>
						</button>
					</div>
                </form>
            </div>
        </div>
    </div>
    <!--end of modal-->
</body>
<!--end of Body-->

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