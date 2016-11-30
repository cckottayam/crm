<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sankara Online</title>
    <!-- Bootstrap -->
    <link href="<?php if(isset($base_url)) echo $base_url; ?>css/bootstrap.min.css" rel="stylesheet">
    
    <!-- bxSlider CSS file -->
    <link href="<?php if(isset($base_url)) echo $base_url; ?>css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php if(isset($base_url)) echo $base_url; ?>css/animate_rth.css" rel="stylesheet" />
    <link href="<?php if(isset($base_url)) echo $base_url; ?>css/main_style.css" rel="stylesheet" />
	<link href="<?php if(isset($base_url)) echo $base_url; ?>css/font-awesome.css" rel="stylesheet" />
    <link href="<?php if(isset($base_url)) echo $base_url; ?>css/page.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
}

.topright {
 float: right;
 cursor: pointer;
 font-size: 20px;
}

.topright:hover {color: red;}
</style>
<script>

$(document).ready(function(){
	$("#aca").click(function(e){
		e.preventDefault();
		$.ajax
		({
		  method: "POST",
		  url: "<?php echo $link; ?>"
		})
		  .done(function( msg ) {
		    $(".white_form").html(msg);
			});
	})
	document.getElementById("defaultOpen").click();
})
</script>

<script>
function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>
 
</head>
<body data-anm=".anm">
<header>
	<aside class="container">
            <img src="<?php if(isset($base_url)) echo $base_url; ?>images/leaf.png" alt="logo" style="max-width:100%;"/>
            <img src="<?php if(isset($base_url)) echo $base_url; ?>images/lap.png" alt="logo" class="lap"/>
    	<aside class="head_in">
            <aside class="logo">
                <a href=""><img src="<?php if(isset($base_url)) echo $base_url; ?>images/logo.png" alt="logo" /></a>
            </aside>
        </aside>
    </aside>
    <!--/top-->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Stories</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</header>
<!--/header-->
<section class="section_1">
		<h3>SO</h3>
        <div class="container">
        	<div class="inner_pstn">
            	<h2 class="anm" data-speed-x="6" data-speed-scale="15" data-speed-opacity="50"><img src="<?php if(isset($base_url)) echo $base_url; ?>images/book_coffee.png" alt="logo" class="la_coffe"></h2>
                <h4 class="anm" data-speed-y="-2" data-speed-scale="-15" data-speed-opacity="50"><img src="<?php if(isset($base_url)) echo $base_url; ?>images/book_pen.png" alt="logo" class="book_pen"/></h4>
                <h3 class="anm" data-speed-x="4" data-speed-scale="-25" data-speed-opacity="50"><img src="<?php if(isset($base_url)) echo $base_url; ?>images/phone.png" alt="logo" class="mobile"/></h3>
            </div>
        </div>
</section>
<section class="section_2">
	<div class="popular_qst_outr">
        <div class="container">
            <aside class="row">
            	<aside class="col-sm-5">
                	<div class="white_form">
                	<ul class="tab">
					  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'London')" id="defaultOpen">login</a></li>
					  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Paris')">register</a></li>
					</ul>
					
					<div id="London" class="tabcontent">
                    	<h3>Sign In</h3>
                        <p class="create">Or create new <span style="color:#0abcfa;"><a href="" id="aca"  >account</a></span></p>
                    	<form action="<?php if(isset($form_action)) echo $form_action; ?>" method="post" >
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" required id="exampleInputEmail1" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
                              </div>
                              
                              <div class="checkbox">
                                <!--<label>
                                  <input type="checkbox"> Remember me
                                </label>-->
                                <label style="float:right;color:#0abcfa;">
                                  Forgot password?
                                </label>
                              </div>
                              <button type="submit" class="btn btn-default">Login</button>
                              <p class="signup">Sign up to your account</p>
                        </form>
</div>

<div id="Paris" class="tabcontent">
                    	<h3>Register</h3>
                        <p class="create">Or create new <span style="color:#0abcfa;">account</span></p>
                    	<form action="<?php if(isset($link)) echo $link; ?>" method="post" >
		<div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" required id="name">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" name="email" required id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" name="password" required id="pwd">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Gender:</label>
		    <select name="gender" class="form-control" required >
				<option value="0">select</option>
				<option value="male">male</option>
				<option value="female">female</option>
			</select>
		  </div>
		  <button type="submit" class="btn btn-success">Register</button>
                        </form>
</div>

                    </div>
                </aside>
                <aside class="col-sm-7"></aside>
                <aside class="col-sm-12">
                	<div class="about_content">
                        <h1>Popular Questions</h1>
                        <img src="<?php if(isset($base_url)) echo $base_url; ?>images/underline.png" alt="logo" class="underline"/>
                        <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
     when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </aside>
            </aside>
        </div>
    </div>
</section>
<section class="section_3">
	<div class="container">
        	<div class="slider1">
              <div class="slide"></div>
              <div class="slide"></div>
              <div class="slide"></div>
            </div>
    </div>
</section>
<section class="section_4">
	<h3>How Does It Work</h3>
	<div class="how_it_wrks">
    	<img src="<?php if(isset($base_url)) echo $base_url; ?>images/dotted.png" alt="img" class="dotted"/>
        <div class="container">
            <div class="row">
            	<aside class="col-sm-4"></aside>
                <aside class="col-sm-4 anm_frm_left">
                	<div class="ask_question">
                		<img src="<?php if(isset($base_url)) echo $base_url; ?>images/how1.png" alt="logo" />
                        <h4>Asking Questions</h4>
                        <p>
                        Lorem Ipsum is simply dummy text of the printing 
						and typesetting industry.
                        </p>
                    </div>
                </aside>
                <aside class="col-sm-4"></aside>
             </div>   
             <div class="row">
                <aside class="col-sm-4"></aside>
                <aside class="col-sm-4"></aside>
                <aside class="col-sm-4 anm_frm_right">
                	<div class="ask_question">
                		<img src="<?php if(isset($base_url)) echo $base_url; ?>images/payment.png" alt="logo" />
                        <h4>Making Payments</h4>
                        <p>
                        You should make payment to begin the question answer section
                        </p>
                    </div>
                </aside>
            </div>
            <div class="row">
                <aside class="col-sm-4 anm_frm_left">
                	<div class="ask_question getg_ask">
                		<img src="<?php if(isset($base_url)) echo $base_url; ?>images/getng_answer.png" alt="logo" />
                        <h4>Getting Answer</h4>
                        <p>
                        Lorem Ipsum is simply dummy text of the printing 
						and typesetting industry.
                        </p>
                    </div>
                </aside>
                <aside class="col-sm-4"></aside>
                <aside class="col-sm-4"></aside>
            </div>
            <div class="row">
                <aside class="col-sm-4"></aside>
                <aside class="col-sm-4 anm_frm_right">
                	<div class="ask_question">
                		<img src="<?php if(isset($base_url)) echo $base_url; ?>images/happy_end.png" alt="logo" />
                        <h4>Happy End</h4>
                        <p>
                        Lorem Ipsum is simply dummy text of the printing 
						and typesetting industry.
                        </p>
                    </div>
                </aside>
                <aside class="col-sm-4"></aside>
            </div>
        </div>
    </div>
</section>
<section class="section_5">
	<div class="container">
    	<div class="testimonials_area">
        	<h3>WHAT OUR CUSTOMERS ARE SAYING</h3>
            <img src="<?php if(isset($base_url)) echo $base_url; ?>images/underline.png" alt="logo" class="underline">
            <ul class="slider_testimls">
                    	<li class="row" style="margin-left:0px;">
                            <div class="col-sm-12">
                                <p>
                               	Lorem ipsum dolor sit amet, 
                                consectetur adipisicing elit. Doloribus 
                                accusamus expedita repellat similique 
                                odio aspernatur ex, architecto eaque 
                                quo suscipit.
                                </p>
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/down_arrow.png" alt="logo" class="down_aroow">
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/testi1.jpg" alt="logo" class="img-circle">
                                <h4>Kenny James</h4>
                                <span>Manager</span>
                            </div>
                        </li>
                    	<li class="row" style="margin-left:0px;">
                            <div class="col-sm-12">
                                <p>
                               	Lorem ipsum dolor sit amet, 
                                consectetur adipisicing elit. Doloribus 
                                accusamus expedita repellat similique 
                                odio aspernatur ex, architecto eaque 
                                quo suscipit.
                                </p>
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/down_arrow.png" alt="logo" class="down_aroow">
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/testi1.jpg" alt="logo" class="img-circle">
                                <h4>Kenny James</h4>
                                <span>Manager</span>
                            </div>
                        </li>
                    	<li class="row" style="margin-left:0px;">
                            <div class="col-sm-12">
                                <p>
                               	Lorem ipsum dolor sit amet, 
                                consectetur adipisicing elit. Doloribus 
                                accusamus expedita repellat similique 
                                odio aspernatur ex, architecto eaque 
                                quo suscipit.
                                </p>
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/down_arrow.png" alt="logo" class="down_aroow">
                                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/testi1.jpg" alt="logo" class="img-circle">
                                <h4>Kenny James</h4>
                                <span>Manager</span>
                            </div>
                        </li>
			</ul>
        </div>
        <div class="row">
        	<div class="col-sm-12">
            	<h3 style="color:#fff;">Subscribe To our Newsletters</h3>
                <p>
                Subscribe to our newsletter to receive news & updates.<br>
                 We promise to not spam you super promise!
                </p>
                <form class="navbar-form" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="INPUT YOUR EMAIL">
                    </div>
                    <button type="submit" class="btn btn-default">
                    SUBSCRIBE
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--/content-->
<footer>
	<aside class="container">
    	<aside class="row">
            <div class="col-sm-12">
                <img src="<?php if(isset($base_url)) echo $base_url; ?>images/logo_bottom.png" alt="logo" class="logo_bottom">
            </div>
            <div class="col-sm-12">
            	<ul class="menu_area_bottom">
                	<li>Home</li>
                    <li>About Us</li>
                    <li>FAQ</li>
                    <li>Business</li>
                    <li>Stories</li>
                    <li>Testimonials</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div class="col-sm-12 btmscl">
                          <a href="#"><i class="fa fa-facebook" style="background:#225b99;"></i></a>
                          <a href="#"><i class="fa fa-twitter" style="background:#00adf2;"></i></a>
                          <a href="#"><i class="fa fa-google-plus" style="background:#dc4d2d;"></i></a>
			</div>
            <p class="allright_resrved">
            © All rights reserved 2016.
            </p>
        </aside>
    </aside>
</footer>
<!--/footer-->










    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php if(isset($base_url)) echo $base_url; ?>js/bootstrap.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="<?php if(isset($base_url)) echo $base_url; ?>js/jquery.bxslider.min.js"></script>
    <script src="<?php if(isset($base_url)) echo $base_url; ?>js/rth.js"></script>
    <script src="<?php if(isset($base_url)) echo $base_url; ?>js/anm.js"></script>
	<script>
        $(document).ready(function(){
            $('.bxslider').bxSlider({
         auto: true,
         pager:false,
         autoHover: true,
             onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                console.log(currentSlideHtmlObject);
                $('.active-slide').removeClass('active-slide');
                $('.bxslider > li').eq(currentSlideHtmlObject + 1).addClass('active-slide')
            },
            onSliderLoad: function () {
                $('.bxslider > li').eq(1).addClass('active-slide')
            }
              
            });
		
			
        });
        
		$(document).ready(function(){
		  $('.slider1').bxSlider({
			slideWidth: 350,
			minSlides: 2,
			maxSlides: 3,
			moveSlides: 1,
			auto: true,
			controls:false,
			slideMargin: 30
		  });
		});
		//slider_testimls
		$('.slider_testimls').bxSlider({
			mode: 'vertical',
			minSlides: 1,
			maxSlides: 1,
			auto: true,
			slideMargin: 15,
			controls:false,
			moveSlides: 1,
		});

    </script>
    
</body>

    
</html>
