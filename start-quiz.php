<?php
include 'config.php';
session_start();
if(empty($_SESSION['name']))
	echo "<script>alert('Please Login To Participate.');window.location.href='index.php';</script>";
$qname = $_GET['Name'];
$quizname=$qname.'_score';
$_SESSION['qname']=$qname;
$_SESSION['q_no']=1;
$j=$_SESSION['q_no'];
$name=$_SESSION['name'];
$email = $_SESSION['email'];
$result = mysql_query("SELECT * FROM $quizname WHERE email='$email'");
$num_rows = mysql_num_rows($result);
if($num_rows==0)
{
if(isset($_SESSION['name']))
	$entry=mysql_query("INSERT INTO $quizname values('$email','$name',0)") or die(mysql_error());
}
else
	echo "<script>alert('Quiz Already Attempted.');window.location.href='index.php';</script>";
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
            <a href="#" class="brand-logo"><?php echo $qname;?></a>
		</div>
    </nav>
	<marquee>Do not REFRESH on this page.</marquee>
    <!--end Header-->


    <!--Main Content-->
    <main>
        <!--Make the timer-->
        <div class="timer_location">
            <span><a class="btn-floating btn-large waves-effect waves-light red">00:00</a></span>
        </div>
        <!--End of timer-->

<!--Display Starts-->
		
<?php
for($i=$j;$i<=$j;$i++)
	{
		$display = mysql_query("Select * from $qname WHERE q_no='".$i."'");
		$row = mysql_fetch_array($display);
		$row['q_no']=$i;
?>		
<div class="row register_form">
            <div class="col m4 s2 card-panel"></div>
            <form class="col m4 s8 card-panel teal" action="check_answer.php" method="POST">
                <div class="row">
                    <div class="col m10 s10 white-text"><h4><?php echo $row['q_no'];?></h4></div>
                    <div class="col m1 s1"></div>
                    <div class="col m1 s1"></div>
                </div>
                <div class="row white-text">
                    <div class="input-field col m1 s1"></div>
                    <div class="input-field col m10 s10 white-text">
                        <p><?php echo $row['question'];?></p>
                    </div>
                    <div class="input-field col m1 s1"></div>
                </div>
                <div class="row">
                    <div class="col s1 m1"></div>
                    <div class="input-field col m5 s5 white-text center-align">
                        <input class="with-gap" name="group1" value="<?php echo $row['option1'];?>" type="radio" id="option1"  />
                        <label for="option1" class="white-text"><?php echo $row['option1'];?></label>
                    </div>
                    <div class="input-field col m5 s5 white-text center-align">
                        <input class="with-gap" name="group1" value="<?php echo $row['option2'];?>" type="radio" id="option2"  />
                        <label for="option2" class="white-text"><?php echo $row['option2'];?></label>
                    </div>
                    <div class="col s1 m1"></div>
                </div>
                <div class="row">
                    <div class="col s1 m1"></div>
                    <div class="input-field col m5 s5 white-text center-align">
                        <input class="with-gap" name="group1" value="<?php echo $row['option3'];?>" type="radio" id="option3"  />
                        <label for="option3" class="white-text"><?php echo $row['option3'];?></label>
                    </div>
                    <div class="input-field col m5 s5 white-text center-align">
                        <input class="with-gap" name="group1" value="<?php echo $row['option4'];?>" type="radio" id="option4"  />
                        <label for="option4" class="white-text"><?php echo $row['option4'];?></label>
                    </div>
                    <div class="col s1 m1"></div>
                </div>
                <div class="row">
                    <div class="col s12 m12"></div>
                </div>
                <div class="row">
                    <div class="col m12 s12 center-align">
					<button class="btn waves-effect waves-light pink" type="submit" name="action">Submit
						<i class="mdi-content-send right"></i>
					</button>
                    </div>
                </div>
            </form>
            <div class="col m4 s2 card-panel"></div>
        </div>
<!--Display Ends-->
<?php
	}
?>
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