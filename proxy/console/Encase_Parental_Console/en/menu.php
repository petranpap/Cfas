<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
 session_start();

  if (isset($_SESSION["parent_id"])) {
     	$url = $proxyencase.'/api/public/menu/child/'.$_SESSION["parent_id"];
					 //echo $url;
				$content =file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
				$json = json_decode($content, true);

}
?>
 <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                        <div id="container_name">
  <div id="name">

   </div>
</div>
                    </div>
                    <div class="pull-left info">
                        <?php

                                     if (isset($_SESSION["parent_id"])) {
                                        echo '<p>'.$_SESSION["parent_first_name"].' '.$_SESSION["parent_last_name"].'</p>';


                             }

                                ?>

                                <script type="text/javascript">

  var name = "<?php echo $_SESSION["parent_first_name"];?>";
  var lastname = "<?php echo $_SESSION["parent_last_name"];?>";
  var initials = name.charAt(0)+""+lastname.charAt(0);

  document.getElementById("name").innerHTML = initials;

                                </script>

                    </div>
                </div>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN MENU</li>
  <li>
    <a href="home.php">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>

    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Children</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>

    <ul class="treeview-menu">
              <?php
foreach($json as $json) {

?>

      <li class="treeview">
        <a href="#"><i class="fa fa-circle-o"></i> <?php echo str_replace(" <script>"," .",$json["child_first_name"]);?>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
           <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-facebook"></i> Facebook
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>
            <a href='options.php?childid=<?php echo $json["child_id"]?>'><i class="fa fa-circle-o"></i>Options for <?php echo str_replace(" <script>"," .",$json["child_first_name"]);?></a>
          </li>
          <li><a href='chat.php?childid=<?php echo $json["child_id"]?>'><i class="fa fa-circle-o"></i><?php echo str_replace(" <script>"," .",$json["child_first_name"]);?>'s chat</a></li>
          <li>
            <a href='wall.php?childid=<?php echo $json["child_id"]?>'><i class="fa fa-circle-o"></i><?php echo str_replace(" <script>"," .",$json["child_first_name"]);?>'s wall</a>
          </li>
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#"><i class="fa fa-twitter"></i> Twitter
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                </li>
                 <li class="treeview">
                  <a href="#"><i class="fa fa-instagram"></i> Instagram
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                </li>
                 <li class="treeview">
                  <a href="#"><i class="fa fa-snapchat-ghost"></i> Snapchat
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>

                </li>

                  <li class="">
                  <a href='settings.php?childid=<?php echo $json["child_id"]?>'><i class="fa fa-cog"></i>Social Media Settings

                  </a>

                </li>
		 <li class="">
                  <a href='trainonimg.php?childid=<?php echo $json["child_id"]?>'><i class="fa fa-picture-o"></i>Train On Images

                  </a>

                </li>

              </ul>


      </li>
            <?php }?>
    </ul>
 <li>
    <a href="edu.php">
      <i class="fa fa-graduation-cap"></i> <span>Educational Material</span>

    </a>
  </li>

 <li>
    <a href="quiz.php">
      <i class="fa fa-laptop"></i> <span>Quiz</span>

    </a>
  </li>


      <li>
    <a href="/">
      <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>

    </a>
  </li>
  </li>

</section>
<style>
/* Style the buttons */
#langdiv .btn {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #8987870d;
  cursor: pointer;
  font-size: 18px;
}

/* Style the active class, and buttons on mouse-over */
#langdiv .activebtn, #langdiv .btn:hover {
  background-color: #205269;
  color: white !important;
}
#langdiv .activebtn {
    cursor: not-allowed;
}
</style>

<div id="langdiv">
<ul class="sidebar-menu tree" data-widget="tree">
  <li class="header">Select Language</li>
</ul>
  <button class="btn activebtn" value="en" disabled>
<!--?xml version="1.0" encoding="UTF-8"?-->

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="15" viewBox="0 0 7410 3900">

<rect width="7410" height="3900" fill="#b22234"></rect>

<path d="M0,450H7410m0,600H0m0,600H7410m0,600H0m0,600H7410m0,600H0" stroke="#fff" stroke-width="300"></path>

<rect width="2964" height="2100" fill="#3c3b6e"></rect>

<g fill="#fff">

<g id="s18">

<g id="s9">

<g id="s5">

<g id="s4">

<path id="s" d="M247,90 317.534230,307.082039 132.873218,172.917961H361.126782L176.465770,307.082039z"></path>

<use xlink:href="#s" y="420"></use>

<use xlink:href="#s" y="840"></use>

<use xlink:href="#s" y="1260"></use>

</g>

<use xlink:href="#s" y="1680"></use>

</g>

<use xlink:href="#s4" x="247" y="210"></use>

</g>

<use xlink:href="#s9" x="494"></use>

</g>

<use xlink:href="#s18" x="988"></use>
<use xlink:href="#s9" x="1976"></use>

<use xlink:href="#s5" x="2470"></use>

</g>

</svg>  </button>
  <button class="btn" value="el">
<!--?xml version="1.0" encoding="UTF-8"?-->
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="15" viewBox="0 0 27 18">
<rect fill="#1453AD" width="27" height="18"></rect>
<path fill="none" stroke-width="2" stroke="#FFF" d="M5,0V11 M0,5H10 M10,3H27 M10,7H27 M0,11H27 M0,15H27"></path>
</svg> 
 </button>
</div>
<!-- /.sidebar -->

</body>
</html>


