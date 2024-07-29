<?php
 
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url= $_SERVER['REQUEST_URI'];    
      
    $variable_for_actionform ='https://proxyencase.cut.ac.cy:8090'.$url.'&show_answers=true';  

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../../variable_settings/vars.php');
$fb_url= $_GET['fb_url'];
$json = file_get_contents('https://backendencase.cut.ac.cy:18085/dal/GetChildGroups/'.$fb_url,false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
//echo $fb_url;
if(isset($_POST['SubmitButton'])){ //check if form was submitted

$imagePath = $_POST['inputText'];
$newPath = "../../avatars/selectedavatar/";
$ext = '.png';
$newName  = $newPath."avatar".$ext;
$copied = copy($imagePath , $newName);

if ((!$copied)) 
{
echo $imagePath;
    echo "Error : Not Copied";
}else{
}
}    


// Quiz

// Mock database connection (replace with your actual connection)
require_once '../../../../db.php';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve available quizzes from the database (replace with actual SQL query)
$sql = "SELECT * FROM quizzes";
$result = $conn->query($sql);
$quiz_data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quiz_data[] = $row;
    }
}

// Handle quiz submission
if (isset($_POST['submit_quiz'])) {

    // Store student's answers in session
    $_SESSION['student_answers'] = $_POST['answers'];
 //    // Redirect to show the correct answers
   $quiz_id = $_POST['quiz_id'];
   $_SESSION['quiz_id'] =  $_POST['quiz_id'];
 // header("Location: student.php?quiz_id=" . $quiz_id . "&show_answers=true");

//        echo "<script>
//document.getElementsByTagName('form')[1].action = window.location.href.split('&quiz_id')[0]+'&quiz_id=" . $quiz_id . "&show_answers=true';
// window.location.href = window.location.href.split('&quiz_id')[0]+'&quiz_id=" . $quiz_id . "&show_answers=true'

//";

}


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Options page - <?= $fb_url ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="https://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style type="text/css">

button#save_groups {
    background-color: green;
    border-color: green;
    width: 200pt;
}
button.btn.btn-danger.delete-row {
    width: 200pt;
}

input{
margin-bottom: 5%;
}
input[type=button]{
width:300pt;}

::placeholder{
  color: blue;
    font-style: italic;
    font-size: x-small;
}
.center{
  text-align:center;
}
.forms_style{

    padding-left: 20%;
    padding-right: 20%; 
}

.selected{
 border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;
}
      body{
    background:#eee;    
}
.widget-author {
  margin-bottom: 58px;
}
.author-card {
  position: relative;
  padding-bottom: 48px;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.author-card .author-card-cover {
  position: relative;
  width: 100%;
  height: 100px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.author-card .author-card-cover::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  content: '';
  opacity: 0.5;
}
.author-card .author-card-cover > .btn {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 0 10px;
}
.author-card .author-card-profile {
  display: table;
  position: relative;
  margin-top: -22px;
  padding-right: 15px;
  padding-bottom: 16px;
  padding-left: 20px;
  z-index: 5;
}
.author-card .author-card-profile .author-card-avatar, .author-card .author-card-profile .author-card-details {
  display: table-cell;
  vertical-align: middle;
}
.author-card .author-card-profile .author-card-avatar {
  width: 85px;
  border-radius: 50%;
  box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
  overflow: hidden;
}
.author-card .author-card-profile .author-card-avatar > img {
  display: block;
  width: 100%;
}
.author-card .author-card-profile .author-card-details {
  padding-top: 20px;
  padding-left: 15px;
}
.author-card .author-card-profile .author-card-name {
  margin-bottom: 2px;
  font-size: 14px;
  font-weight: bold;
}
.author-card .author-card-profile .author-card-position {
  display: block;
  color: #8c8c8c;
  font-size: 12px;
  font-weight: 600;
}
.author-card .author-card-info {
  margin-bottom: 0;
  padding: 0 25px;
  font-size: 13px;
}
.author-card .author-card-social-bar-wrap {
  position: absolute;
  bottom: -18px;
  left: 0;
  width: 100%;
}
.author-card .author-card-social-bar-wrap .author-card-social-bar {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.btn-style-1.btn-white {
    background-color: #fff;
}
.list-group-item i {
    display: inline-block;
    margin-top: -1px;
    margin-right: 8px;
    font-size: 1.2em;
    vertical-align: middle;
}
.mr-1, .mx-1 {
    margin-right: .25rem !important;
}

.list-group-item.active:not(.disabled) {
    border-color: #e7e7e7;
    background: #fff;
    color: #ac32e4;
    cursor: default;
    pointer-events: none;
}
.list-group-flush:last-child .list-group-item:last-child {
    border-bottom: 0;
}

.list-group-flush .list-group-item {
    border-right: 0 !important;
    border-left: 0 !important;
}

.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
a.list-group-item, .list-group-item-action {
    color: #404040;
    font-weight: 600;
}
.list-group-item {
    padding-top: 16px;
    padding-bottom: 16px;
    -webkit-transition: all .3s;
    transition: all .3s;
    border: 1px solid #e7e7e7 !important;
    border-radius: 0 !important;
    color: #404040;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    text-decoration: none;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.125);
}
.list-group-item.active:not(.disabled)::before {
    background-color: #ac32e4;
}

.list-group-item::before {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background-color: transparent;
    content: '';
}
body{
font-family: 'Roboto',apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
}




/*Quiz*/

        h1 {
            text-align: center;
        }
        ul.quiz-list {
            list-style: none;
            padding: 0;
        }
        ul.quiz-list li {
            margin-bottom: 10px;
        }
        a.quiz-link {
            display: block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        a.quiz-link:hover {
            background-color: #0056b3;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }


section {
    background: #a8c0ff;
    background: -webkit-linear-gradient(to right, #3f2b96, #a8c0ff);
    background: linear-gradient(to right, #ac32e4, #eee);
    padding-top: 80px;
    overflow-y: hidden;
}

main {
    background: rgba(217, 214, 228, 0.12);
    border-radius: 10px;
    padding: 5px 20px 50px;
    width: 95%;
    margin: 0 auto 214px;
}

.text-container {
    text-align: center;
}

.quiz-options {
    margin: 60px 0;
}

[type=radio] {
    border: 0;
    height: 0.0625rem;
    width: 0.0625rem;
    position: absolute;
}

label {
    display: flex;
    align-items: center;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.72);
    margin-bottom: 15px;
    padding: 6px 0;
    position: relative;
    width: 100%;
    color: #000;
}

.answer_style:hover {
    background: linear-gradient(to right, #000, #fff);
    
}


label .span_answer {
    border-radius: 5px;
    border: solid 1px #000; 
    padding: .4rem .5rem .4rem;
    width: 2.3rem;
    margin: 0 1.3rem 0 .7rem;
    display: flex;
    justify-content: center;
    color: #000;
    cursor: pointer !important;
}

label .icon {
    height: auto;
    position: absolute;
    left: 92%;
    top: 12px;
}

@keyframes flash {
    0% {
        background-color: #4cf5c2;
    }

    49% {
        background-color: #4cf5c2;
    }

    50% {
        background-color: #000;
    }

    99% {
        background-color: #000;
    }

    100% {
        background-color: #4cf5c2;
    }
}


#btn {
    border: 1px solid #000;
    border-radius: 50px;
    background: rgb(247, 206, 206);
    color: #000;
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    width: 57%;
    margin: 0 auto;
    outline: none;
    padding: 11px 0;
    text-align: center;
    cursor: pointer;
    -webkit-tap-highlight-color: transparent;
}

#btn:hover {
    background: rgba(255, 255, 255, 0.671);
    color: rgba(0, 0, 0, 0.749);
    border: 1px solid #000;
}

form:invalid #btn {
    pointer-events: none;
    background: rgba(248, 214, 214, 0.767);
}

.btn:hover {
    background: #000;
    color: #fff;
}

.score-counter {
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    width: 210px;
    height: 9%;
    background: rgba(0, 0, 0, 0.749);
    border: 4px solid #000;
    position: fixed;
    top: 5px;
    right: 10px;
    box-shadow: inset 2px -2px 9px #020202, inset -2px 2px 9px #d2d2d2;
}

.score-text {
    margin: 0 20px;
}

.score-counter::after {
    content: counter(points) "/5";
}

.one-a:checked,
.two-c:checked,
.three-c:checked,
.four-b:checked,
.five-a:checked {
    counter-increment: points;
}

#game-over {
    background: linear-gradient(rgb(28, 22, 49), rgba(18, 18, 25, 0.9)), repeating-linear-gradient(0, transparent, transparent 2px, black 3px, black 3px);
    font-family: 'Bungee', cursive;
    /* position: absolute; */
    width: 100%;
    height: 100vh;
}

.game-over-content {
    display: grid;
    justify-items: center;
    width: 80%;
    margin: 0 auto;
    padding: 120px 0;
}

#game-over h1 {
    background: url("https://res.cloudinary.com/dvhndpbun/image/upload/e_brightness:-20/v1588605696/01-01_web_designers_code_ld_img_dgytil.png");
    -webkit-background-clip: text;
    color: transparent;
    background-size: contain;
    font-size: 5rem;
    line-height: 1.2;
    margin: 0;
    position: relative;
}

h1::before {
    content: attr(data-heading);
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0) 45%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0) 55%, rgba(255, 255, 255, 0) 100%);
    -webkit-background-clip: text;
    color: transparent;
    mix-blend-mode: screen;
    background-size: 200%;
    text-shadow: 2px 2px 10px rgba(#000, 0.2), -2px 2px 10px rgba(#000, 0.2), -2px -2px 10px rgba(#000, 0.2);
}

@keyframes pulse {
    0% {
        opacity: 1;
    }

    49% {
        opacity: 9;
    }

    50% {
        opacity: .8;
    }

    99% {
        opacity: .5;
    }

    100% {
        opacity: .3;
    }
}

@keyframes shine {
    0% {
        background-position: -100%;
    }

    100% {
        background-position: 100%;
    }
}

.over-text-cont {
    text-align: center;
}

.over-text-cont h2 {
    font-family: 'Sirin Stencil', cursive;
}

.over-text-cont h2::after {
    content: counter(points) "0/50";
    margin-left: 15px;
}

#refresh {
    color: #fff;
    position: relative;
    height: 100vh;
}

.refresh-content {
    display: grid;
    font-size: 1.2rem;
    place-items: center;
    width: 70%;
    line-height: 2;
    margin: 0 auto;
    text-align: center;
}

.refresh-content svg {
    width: 50px;
    height: auto;
}


/* MEDIA QUERY */

@media (max-width: 420px) {
    body {
        font-size: .8rem;
    }

    main {
        width: 92%;
    }

    section {
        background: linear-gradient(to right, #3f2b96, #1f0961);
    }

    label {
        font-size: .71rem;
    }

    label .span_answer {
        margin: 0 .9rem 0 .7rem;
    }


    #game-over h1 {
        font-size: 3rem;
    }

    .score-counter {
        width: 120px;
        height: 5%;
        font-size: .7rem;
    }

    .score-text {
        margin: 0 20px 0 0;
    }

    .over-text-cont h2 {
        margin-bottom: 40px;
    }

    .over-text-cont #btn {
        padding: 3px 0;
    }

    .refresh-content {
        width: 90%;
    }

    .refresh-content {
        display: grid;
        font-size: .8rem;
    }
}

@media (max-width: 325px) {

    label {
        font-size: .63rem;
    }

    label .span_answer {
        margin: 0 .55rem 0 .7rem;
    }


}


.exit{
 --color: #560bad;
 font-family: inherit;
 display: inline-block;
 width: 8em;
 height: 2.6em;
 line-height: 2.5em;
 margin: 20px;
 position: relative;
 overflow: hidden;
 border: 2px solid var(--color);
 transition: color .5s;
 z-index: 1;
 font-size: 17px;
 border-radius: 6px;
 font-weight: 500;
 color: var(--color);
cursor: pointer;
}

.exit:before {
 content: "";
 position: absolute;
 z-index: -1;
 background: var(--color);
 height: 150px;
 width: 200px;
 border-radius: 50%;
}

.exit:hover {
 color: #fff;
}

.exit:before {
 top: 100%;
 left: 100%;
 transition: all .7s;
}

.exit:hover:before {
 top: -30px;
 left: -30px;
}

.exit:active:before {
 background: #3a0ca3;
 transition: background 0s;
}
    </style>
</head>
<body>

<div id="header" style="background: white;color: #222d32;padding-left: 0pt;"><img src="../../../../cfas_logo_no_letters.png"><span style="padding-left: 3pt;"><b>CFAS</b></span></div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://demo.createx.studio/createx-html/img/widgets/author/cover.jpg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i></a></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="../../avatars/selectedavatar/avatar.png?nocache=<?php echo time(); ?>" alt="avatar">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">Hello! I am here to help you stay safe online</h5><span class="author-card-position">From this page you can edit your online safety settings.</span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item active" href="#pictures" id="loadpicsettings"><i class="fe-icon-user text-muted"></i>Choose who can see your pictures</a>
        <a class="list-group-item" href="#avatarlook"><i class="fe-icon-user text-muted"></i>Choose your Guardian Avatar's look</a>
        <a class="list-group-item" href="#visibility"><i class="fe-icon-map-pin text-muted"></i>Edit Visibility & Safety options</a>
              <a class="list-group-item" href="#languages"><i class="fe-icon-map-pin text-muted"></i>Select Language</a>
                </nav>
            </div>
        </div>
   <!-- Picture Settings-->
        <div class="col-lg-8 pb-5" id="pictures">
          <div class="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#info" aria-expanded="false" aria-controls="collapseOne">
          Information
        </button>
      </h2>
    </div>

    <div id="info" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
      <div class="card-body">
       <p>If you upload a picture, Cyber Safety Family Advice Suite automatically protects<br>it with encryption.<br>
          From <b>Preview</b> tab you can find the list of the accounts that can see your picture,<br>whoever is not in the list, they can not see your uploaded picture.<br>
          From the <b>Edit</b> tab, you can edit the list by adding/removing an account using his/her<br>Facebook URL.</p><img src="../../images/get_fb_url.jpg" style="width: 90%">
      </div>
    </div>

  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#modal_show" aria-expanded="false" aria-controls="collapseTwo">
          Preview
        </button>
      </h2>
    </div>
    <div id="modal_show" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
      
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#modal_edit" aria-expanded="false" aria-controls="collapseThree">
          Edit
        </button>
      </h2>
    </div>
    <div id="modal_edit" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
     
    </div>
  </div>
</div>
        </div>
<!-- Avatar Look-->
   <div class="col-lg-8 pb-5" id="avatarlook">
            <div>
    <?php
$dirname = "../../avatars/";
$images = glob($dirname."*.png");

foreach($images as $key=>$image) {
    echo '<img class="avatar" src="'.$image.'" style="height: 50px; border-radius: 50%;" />';
if ($key % 7 === 0){
echo '<br>';
}
}
//echo $key;
?>
   </div>
<div>
<form action="" method="post">
<?php echo $message; ?>
<input id="inputText" type="text" name="inputText" style="display:none"/>
<br>
  <input class="btn btn-success" id="SubmitButton" type="submit" name="SubmitButton" value="Save"/style=" float: left; ">
</form>    
 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

        </div>
        </div>
        <!-- Visibility Settings-->
        <div class="col-lg-8 pb-5" id="visibility">
      <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Parental Visibility
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       Through the Parental Visibility options, Cyber Safety Family Advice Suite offers options about what the parent can see, while enabling various levels of monitoring for parents. <i><b>*These options are sent to you as a request and can only be applied after you give your consent by accepting them.</b></i>
       <div id="parental"></div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Back-end Visibility Level
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
Through the Back-end Visibility options, Cyber Safety Family Advice Suite offers options about what data the Back-End can receive from your online social network account. The received data will be used to improve the accuracy of the Suite and help to enhance your online protection.<br><i><b>*These options are sent to you as a request and can only be applied after you give your consent by accepting them.</b></i>
        <div id="backend"></div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Cybersafety Level
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Through the Cybersafety options, the parent can select the Level of your Cybersafety. These options let the parent select what you will see and what the Intelligent Web-Proxy will filter, replace, encrypt or watermark respectively.  <i><b>*These options are sent to you as a request and can only be applied after you give your consent by accepting them.</b></i>
        <div id="security"></div>
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- Language -->
        <div class="col-lg-8 pb-5" id="languages" style="display: block;">
          <div class="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        
       <button onclick="englishURL();" class="btn btn-link collapsed" type="submit" data-toggle="collapse" data-target="#english" aria-expanded="false" aria-controls="collapseOne">
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

  </svg> English
      </button>
      </h2>
    </div>

    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0"> 
       <button onclick="greekURL();"  type="submit" name="button1" value="Button1" class="btn btn-link collapsed"  data-toggle="collapse" data-target="#greek" aria-expanded="false" aria-controls="collapseTwo" value="greek">
<!--?xml version="1.0" encoding="UTF-8"?-->
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="15" viewBox="0 0 27 18">
  <rect fill="#1453AD" width="27" height="18"></rect>
<path fill="none" stroke-width="2" stroke="#FFF" d="M5,0V11 M0,5H10 M10,3H27 M10,7H27 M0,11H27 M0,15H27"></path>
</svg> Ελληνικά</button>
      </h2>
    </div>
</div>
        </div>

                <!-- Quiz -->
        <div class="col-lg-8 pb-5" id="quiz" style="display: block;">
          <div class="accordion">
  <div class="card">

        <div class="quiz-container">
                <?php if (!empty($quiz_data)): ?>

                    <ul class="quiz-list">
                        <?php foreach ($quiz_data as $quiz): ?>
                            <?php //if($quiz['start_datetime'] >=time()){?>
                            <li>
                                <a class="quiz-link" href="#" onclick="gotoquiz(<?php echo $quiz['id']; ?>)">
                                    <?php echo $quiz['title']; ?>
                                </a>
                            </li>
                            <script type="text/javascript">
                                function gotoquiz(id) {
                                    window.location.href = window.location.href.split('#')[0]+"&quiz_id="+id
                                }
                            </script>
                            <?php //}else{ ?>
                                <!--  <p>No quizzes available.</p> -->
                                 <?php // break;  } ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No quizzes available.</p>
                <?php endif; ?>
        </div>
<?php


if (isset($_GET['quiz_id'])) {
    ?>
    <script type="text/javascript">
        document.querySelectorAll(".quiz-container")[0].style.display='none'
    </script>
    <?php 
    $quiz_id = $_GET['quiz_id'];

    // Retrieve quiz details from the database (replace with actual SQL query)
    $sql = "SELECT * FROM quizzes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $quiz_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $quiz = $result->fetch_assoc();

    if ($quiz) {
        // Retrieve questions and answer options for the selected quiz
        $sql = "SELECT * FROM questions WHERE quiz_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $quiz_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

      if (isset($quiz)): ?>
    <div class="quiz-data">
        <section class="section-1" id="section-1">
            <main>
                <div class="text-container">
                <!-- HTML !-->
<button class="exit" onclick="history.back()"> X Cancel Quiz
</button>

                    <h2><?php echo $quiz['title']; ?></h2>
                </div>
<form method="post" action="<?php echo $variable_for_actionform; ?>" >
    
        <?php foreach ($questions as $question): ?>

                <div class="quiz-options_<?php echo $question['id']; ?>">
                <p><?php echo $question['question_text']; ?></p>
                <?php
                // Retrieve answer options for the current question
                $sql = "SELECT * FROM answers WHERE question_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $question['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $numbering =1;
                while ($row = $result->fetch_assoc()) {
                    $answer_text = $row['answer_text'];
                    $answer_id = $row['id'];
                    $is_correct = $row['is_correct'];
                    $input_name = 'answers[' . $question['id'] . ']';


                    echo '<div class="answer_style"><input type="radio" id="answer_' . $answer_id . '" name="' . $input_name . '" value="' . $answer_id . '" class="input-radio  one-a jshdgdgwgdwfdfwdwjfdjwwdwdco">';
                    echo '<label class="radio-label" jsjwjdwjdwjdwco" for="answer_' . $answer_id . '">';
                    echo '<span class="span_answer">' . $numbering . '</span> ' . $answer_text;
                    echo '</label></div><br>';
                    $numbering =$numbering+1;
                }
                 $numbering =1;
                ?>
            </div>

        <?php endforeach; ?>
            <input type="text" id="answers" name="answers">
            <input type="text" name="quiz_id" value="<?php echo $quiz_id; ?>" id="quiz_id">
        <input type="submit" name="submit_quiz" value="Submit Quiz" id="submit_quiz">
        <script type="text/javascript">
          document.getElementById('answers').style.display='none';
                   document.getElementById('quiz_id').style.display='none';
        </script>

</form>
<h2 id="res_per" style='text-align:center'></h2>
    </div>
<?php endif;
}


if (isset($_GET['show_answers']) && isset($_SESSION['quiz_id'])) {
    $sql = "SELECT  a.id,a.question_id,a.answer_text,a.is_correct,q.quiz_id FROM answers a INNER JOIN questions q ON a.question_id=q.id INNER JOIN quizzes qu ON qu.id=q.quiz_id WHERE qu.id=".$_SESSION['quiz_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
        $is_correct_db = [];
        while ($row = $result->fetch_assoc()) {

            
            if ($row['is_correct'] ==1) {
array_push($is_correct_db,$row['id']);
               echo "<script>
               document.getElementById('answer_".$row['id']."').parentElement.style.background='green'
               document.getElementById('answer_".$row['id']."').parentElement.innerHTML = document.getElementById('answer_".$row['id']."').parentElement.innerHTML +'Correct Answer ✔';
               </script>";

            }

        }
           $myArray = explode(',', $_SESSION['student_answers']);
               foreach ($myArray as $key => $value) {
                   echo "<script>
                   document.getElementById('answers').style.display='none';
                   document.getElementById('submit_quiz').style.display='none';
                   document.getElementById('quiz_id').style.display='none';
               document.getElementById('answer_".$value."').parentElement.style.background='RED'
               document.getElementById('answer_".$value."').parentElement.innerHTML = document.getElementById('answer_".$value."').parentElement.innerHTML +'Your Answer X';
                

               </script>";
               }
               echo "<script>
                for (let index = 0; index < $('.answer_style').length; index++) {
                    var innserhtml_el = $('.answer_style')[index].innerHTML;
                   
                    if($('.answer_style')[index].innerHTML.includes('Correct Answer ✔Your Answer X')){
                        var innserhtml_el = innserhtml_el.replace('Correct Answer ✔Your Answer X','');
                    //     console.log(innserhtml_el)
                        $('.answer_style')[index].innerHTML =innserhtml_el + 'Correct Answer (Your Answer) ✔';
                        document.getElementsByClassName('answer_style')[index].setAttribute('style', 'background: blue !important');
                        document.getElementsByClassName('answer_style')[index].style.color='white';
                    }

}

               </script>";

$corect_std = 0;
foreach ($myArray as $key => $value) {
if($value == $is_correct_db[$key]){
$corect_std = $corect_std+1;

}
}
$percentage_result = $corect_std*100/ count($myArray);
echo "<script>$('#res_per').text('Total Result: ".$percentage_result."%')</script>";
    ?>
    <script type="text/javascript">
        $("#answers").hide()
        $("#quiz_id").hide()
        $("#submit_quiz").hide()
    </script>
<?php 
}




?>
<!-- ... -->
 



    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
 if (window.location.href.indexOf("&show_answers=true") > -1) {
     document.getElementsByClassName("exit")[0].style.display="none" 
}


    const quizLinks = document.querySelectorAll(".quiz-link");
    const quizContainers = document.querySelectorAll(".quiz-container");

    quizLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();

            // Hide all quiz containers
            quizContainers.forEach(container => {
                container.style.display = "none";
            });

            // Show the selected quiz container
            const quizId = link.dataset.quizId;
            const selectedQuizContainer = document.getElementById(`quiz_${quizId}`);
            if (selectedQuizContainer) {
                selectedQuizContainer.style.display = "block";
            }
        });
    });


$("input").click(function(){
     var selector = 'label[for=' +this.id + ']';
    var label = document.querySelector(selector);
    $('.'+label.parentElement.parentElement.className+' > .answer_style').css("background","none")


    label.parentElement.style.background="green"
});

var check_ans = $("[class^=quiz-options_]").length //get the number of the div that contains all the answers of a question (so that we will know how may answers we should have.
// 3 questions --> check_ans will be 3


$("#submit_quiz").mouseenter(function(){

var answers_data = '';

$(".answer_style").each(function( index ) {

    if($( this ).css("background") =="rgb(0, 128, 0) none repeat scroll 0% 0% / auto padding-box border-box"){
        answers_data = answers_data+'__'+$( this ).find( "input" ).val();
        

    }
});

const answers_dataArray = answers_data.split("__");
    answers_dataArray.shift();
    console.log(answers_dataArray)
    if(check_ans == answers_dataArray.length){
  $("#answers").val(answers_dataArray  );
    }else{
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Please Answer All The Questions!',
  allowOutsideClick:false
})
    }

  
});



});




    </script>
  </div>

        </div>
    </div>
</div>

<script src="https://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
$('.list-group-item').on('click', function() {

$('.col-lg-8.pb-5').hide()
$(this.hash).show()
 $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");




}); 
$('.col-lg-8.pb-5').hide()
$('#pictures').show()
$(".avatar").click(function(){
    $(this).addClass("selected");
        $(".avatar").not($(this)).removeClass('selected');
  });
$(".avatar").click(function() {
$('#inputText').val($(".selected").attr('src'));

 
        });


if(window.location.hash){
  var hash = window.location.hash; 
$('.col-lg-8.pb-5').hide();
$(hash).show();
$('.list-group-item').siblings('a.active').removeClass("active");
$('.list-group-item').each(function( index ) {
if($( this )[0].hash ==hash ){
$( this ).addClass("active")
   }
  
});


}
 if((window.location.hash=="#quiz") || (window.location.href.includes("quiz_id="))){

$(".col-lg-8.pb-5").hide()
$("#quiz").show()
 }

});
</script>
<script type="text/javascript" language="javascript">
$("#button1").click(function() {
  $.ajax({
    type: "PUT",
    url: "https://proxyencase.cut.ac.cy:8090/api/public/update/avatar_lang/gr/https:--www.facebook.com-peter.encase?fbclid=IwAR11q9pfRKDQGAs0mMtf9ehmcM3zCzNTHWdOmFSEBRJUFNYxiLj0QZsEx7I",
  }).done(function(msg) {
    alert( "Data Saved: " + msg );
  });
});
</script>
<script src="../js/vars.js"></script>
<script type="text/javascript">var fb_url = "<?= $fb_url ?>";</script>
<script> var json = <?php echo $json ?>;</script>
<script src="../js/options.js"></script>
<script src="../js/languages.js"></script>
<footer style="
    text-align: center;
    color: white;
background: white;
    border-top: 1px solid black;
">
 <img src="https://proxyencase.cut.ac.cy:8090/fundedeu.jpg" alt="School Bus" style="
    width: 300px;
"><img src="https://proxyencase.cut.ac.cy:8090/proxy_api/avatar_module/en/edu/cybersafety.jpg" alt="School Bus" style="
    width: 200px;
    height: 100px;
">
</footer>
</body>
</html>
