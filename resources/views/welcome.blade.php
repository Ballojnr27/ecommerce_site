<head>
  <style>
    header{
background:#35424b;
color:white;
padding-top:30px;
min-height:70px;
border-bottom: red 3px solid;
}

header a{
color:white;
text-decoration:none;
text-transform:uppercase;
font-size:16px;
}

header li{
float:left;
display:inline;
padding: 0 20px 0 20px;
}

header #branding{
float:left;
}

header #branding h1{
margin:0;
}

header nav{
float:right;
margin-top:10px;
}

header .highlight, header .current a{
color:#e8491d;
font-weight:bold;
}

header a:hover{
color:black;
font-weight:bold;
}

<!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/cssbootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/select2.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css"
    />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->




    <!-- ace settings handler -->
    <script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>


    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="{{ asset('assets/css/bootstrap-custom.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
  <script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->


                               <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.ico') }}">




                               <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="assets/js/bootstrap-custom.min.js"></script>
    <script>
      $(document).ready(function(){

        $('.carousel').carousel();

      }); // end document.ready
    </script><!-- basic scripts -->


    <!--[if !IE]> -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="assets/js/bootstrap.min.js"></script>


    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>

        <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/cssbootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/select2.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css"
    />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->




  </style>
</head>

<body>
<header>
<div class="container">
<div id="branding">
<h1><span class="highlight">De'light </span>Footwears</h1>
</div>

<nav>
<ul>
<li><a href="/login">Login</a></li>
<li><a href="/register">Register</a></li>

</ul>
</nav>
</div>
</header>



      <br><br><div class="container">
        <center>
      <div class="carousel slide" id="home-carousel">
        <div class="carousel-inner">
          <div class="item active">
            <img src="assets/images/img/mshoe1.jpg" alt="butterfly"  width="800" />
            <div class="carousel-caption"><p>Handcrafted male black shoe<br><a href="/login">Order Now</a></p></div>
          </div><!-- .item -->
          <div class="item">
            <img src="assets/images/img/palm1.jpg" alt="colors" width="450"/>
            <div class="carousel-caption"><p>Handcrafted male palm <br><a href="/login">Order Now</a></p></div>
          </div><!-- .item -->
          <div class="item">
            <img src="assets/images/img/sandal.jpg" alt="galaxies" width="800"/>
            <div class="carousel-caption"><p>Handcrafted male sandals<br><a href="/login">Order Now</a></p></div>
          </div><!-- .item -->
          <div class="item">
            <img src="assets/images/img/babyshoe.jpg" alt="jupiter" width="800" height="50"/>
            <div class="carousel-caption"><p>Handcrafted female black babyshoe<br><a href="/login">Order Now</a></p></div>
          </div><!-- .item -->        <!-- .carousel-inner -->
          <div class="item">
            <img src="assets/images/img/view more.jpg" alt="galaxies" width="700"/>
            <div class="carousel-caption"><p><a href="/login">Sign Up</a> to view more</p></div>
          </div><!-- .item -->
          <a class="carousel-control left" href="#home-carousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#home-carousel" data-slide="next">&rsaquo;</a>
          </center>
      </div><!-- .carousel -->

  <footer>
  <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">De'light Footwears &copy; 2024</span>

            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
  </footer>
  </body>
