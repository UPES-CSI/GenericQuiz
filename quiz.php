<?php
include 'config.php';
session_start();
$qname = $_GET['Name'];
$_SESSION['qname']=$qname;
$j=$_SESSION['q_no'];
$email = $_SESSION['email'];
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
		<ul class="right hide-on-med-and-down">
                <li class="active"><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="index.html">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
		</div>
    </nav>
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
		$src=$row['img_url'];
?>		
<div class="row register_form">
            <div class="col m3 s2 card-panel"></div>
            <form class="col m6 s8 card-panel teal" action="check_answer.php" method="POST">
                <div class="row">
                    <div class="col m10 s10 black-text"><h5>Ques.<?php echo $row['q_no'];?></h5></div>
                </div>
				<?php
				if(isset($src))
				{
				?>
				<img src="<?php echo $src;?>" style="height: 400px; width: 650px;"/>
                <?php
				}
				?>
				<div class="row white-text">
                        <p><?php echo $row['question'];?></p>
                </div>
                    <div class="col s1 m1"></div>
				<div class="row">
						<input type="checkbox" id="test1"  name="check_list[0]" value="<?php echo $row['option1'];?>"/>
						<label for="test1" class="white-text"><?php echo $row['option1'];?></label>
				</div>
				<div class="row">
						<input type="checkbox" id="test2"  name="check_list[1]" value="<?php echo $row['option2'];?>"/>
						<label for="test2" class="white-text"><?php echo $row['option2'];?></label>
  				</div>
				<div class="row">
						<input type="checkbox" id="test3"  name="check_list[2]" value="<?php echo $row['option3'];?>"/>
						<label for="test3" class="white-text"><?php echo $row['option3'];?></label>
				</div>
				<div class="row">
						<input type="checkbox" id="test4"  name="check_list[3]" value="<?php echo $row['option4'];?>"/>
						<label for="test4" class="white-text"><?php echo $row['option4'];?></label>
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