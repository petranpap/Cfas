 <?php
//                ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
include('../variable_settings/vars.php');
include('head.php');
include('menu.php');

  if (isset($_SESSION["parent_id"])) {
        $url = $proxyencase.'/api/public/menu/child/'.$_SESSION["parent_id"];
                                         //echo $url;
                $content =file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
                                $json = json_decode($content, true);

}



//print_r($json);


?>

<style>
  .checkbox-wrapper-28 {
    --size: 25px;
    position: relative;
  }

  .checkbox-wrapper-28 *,
  .checkbox-wrapper-28 *:before,
  .checkbox-wrapper-28 *:after {
    box-sizing: border-box;
  }

  .checkbox-wrapper-28 .promoted-input-checkbox {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }

  .checkbox-wrapper-28 input:checked ~ svg {
    height: calc(var(--size) * 0.6);
    -webkit-animation: draw-checkbox-28 ease-in-out 0.2s forwards;
            animation: draw-checkbox-28 ease-in-out 0.2s forwards;
  }
  .checkbox-wrapper-28 label:active::after {
    background-color: #e6e6e6;
  }
  .checkbox-wrapper-28 label {
    color: #0080d3;
    line-height: var(--size);
    cursor: pointer;
    position: relative;
  }
  .checkbox-wrapper-28 label:after {
    content: "";
    height: var(--size);
    width: var(--size);
    margin-right: 8px;
    float: left;
    border: 2px solid #0080d3;
    border-radius: 3px;
    transition: 0.15s all ease-out;
  }
  .checkbox-wrapper-28 svg {
    stroke: #0080d3;
    stroke-width: 3px;
    height: 0;
    width: calc(var(--size) * 0.6);
    position: absolute;
    left: calc(var(--size) * 0.21);
    top: calc(var(--size) * 0.2);
    stroke-dasharray: 33;
  }

  @-webkit-keyframes draw-checkbox-28 {
    0% {
      stroke-dashoffset: 33;
    }
    100% {
      stroke-dashoffset: 0;
    }
  }

  @keyframes draw-checkbox-28 {
    0% {
      stroke-dashoffset: 33;
    }
    100% {
      stroke-dashoffset: 0;
    }
  }

.button-15 {
float:right;
  background-image: linear-gradient(#42A1EC, #0070C9);
  border: 1px solid #0077CC;
  border-radius: 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  direction: ltr;
  display: block;
  font-family: "SF Pro Text","SF Pro Icons","AOS Icons","Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 17px;
  font-weight: 400;
  letter-spacing: -.022em;
  line-height: 1.47059;
  min-width: 30px;
  overflow: visible;
  padding: 4px 15px;
  text-align: center;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-15:disabled {
  cursor: default;
  opacity: .3;
}

.button-15:hover {
  background-image: linear-gradient(#51A9EE, #147BCD);
  border-color: #1482D0;
  text-decoration: none;
}

.button-15:active {
  background-image: linear-gradient(#3D94D9, #0067B9);
  border-color: #006DBC;
  outline: none;
}

.button-15:focus {
  box-shadow: rgba(131, 192, 253, 0.5) 0 0 0 3px;
  outline: none;
}

/* CSS */
.button-24 {
  background: #FF4742;
  border: 1px solid #FF4742;
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
  font-size: 16px;
  font-weight: 800;
  line-height: 16px;
  min-height: 40px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}

.button-24:hover,
.button-24:active {
  background-color: initial;
  background-position: 0 0;
  color: #FF4742;
}

.button-24:active {
  opacity: .5;
}


        .container {

    max-width: 90%;
    margin: 5% auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .intro-text {
            text-align: center;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .button {
            width: 48%;
            padding: 10px;
            margin: 5px;
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            height: 60%;
            position: relative;
            display: flex;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

	.assign-modules{
	   position: absolute;
	   top: 90%;
	   right: 10px;
    	   cursor: pointer;
	}


        .tables {
            display: flex;
            width: 100%;
        }

        .table {
            width: 50%;
padding: 1%;
        }

        .table h3 {
            text-align: center;
        }

        .table table {
            width: 100%;
        }

        .table td {
            padding: 5px;
        }

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

input[type=file] {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #555;
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}

</style>

</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!--         <h1>
	Dashboard
        <small>Control panel</small>
        </h1> -->
	<ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Encase Consent Form</li>
        </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="container">
        <div class="intro-text">
            <p>Introduction text goes here.</p>
        </div>
        <div class="buttons">
            <button class="button" >Assign Knowledge Assessment Quiz (before taking the course)</button>
            <button class="button" onclick="openAssignGainedAssessmentModal()">Assign Knowledge GAINED Assessment Quiz (after completing the course)</button>
            <button class="button " onclick="openAssignCoursesModal()">Assign Courses Button</button>
            <button class="button" onclick="openStdProgressModal()">See Students Progress</button>
            <button class="button">Create a new course</button>
        </div>

        <div id="assignCoursesModal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeAssignCoursesModal()">&#10006;</span>

		<button onclick="assignModules()" class="assign-modules button-15">Assign Modules</button>


                <div class="tables">
                    <div class="table" style="border-right: 1px solid;width: 85%;">
                        <h3>Courses</h3>
                        <table>
  <tr>
    <th>Select Course</th>
    <th>Course Title</th>
    <th>Course Level</th>
    <th>Upload Extra Notes</th>
  </tr>
                            <tr>
				<td> 
					<div class="checkbox-wrapper-28">
					<input type="checkbox" name="courses" id="Course1"  value="Course1" class="promoted-input-checkbox">
					<svg><use xlink:href="#checkmark-28"></use></svg>
					<label for="Course1"></label>
						<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
			    			<symbol id="checkmark-28" viewBox="0 0 24 24">
					      	<path stroke-linecap="round" stroke-miterlimit="10" fill="none" d="M22.9 3.7l-15.2 16.6-6.6-7.1">
      						</path>
    						</symbol>
						  </svg>
					</div>
				</td>
                                <td><a href="course1.html">Course Title 1</a></td>
                                <td>Levels 1</td>
				<td><input type="file" accept="*"></td>
                            </tr>
                            <tr>
                                <td>
                                        <div class="checkbox-wrapper-28">
                                        <input type="checkbox" name="courses" id="Course2"  value="Course2" class="promoted-input-checkbox">
                                        <svg><use xlink:href="#checkmark-28"></use></svg>
                                        <label for="Course2"></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                                <symbol id="checkmark-28" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-miterlimit="10" fill="none" d="M22.9 3.7l-15.2 16.6-6.6-7.1">
                                                </path>
                                                </symbol>
                                                  </svg>
                                        </div>
                                </td>
                                <td><a href="course2.html">Course Title 2</a></td>
                                <td>Levels 2</td>
				<td><input type="file" accept="*"></td>
                            </tr>
                            <!-- Repeat rows for Course Title 2 to 5 as needed -->
                        </table>
                    </div>
                    <div class="table">
                        <h3>Students</h3>
                        <table>
				<?php
foreach ($json as $val) {
$child_id = $val["child_id"];
$child_first_name = $val["child_first_name"];
$child_last_name = $val["child_last_name"];
$checkbox_id = $child_first_name.''.$child_last_name.''.$child_id;
$checkbox_id =  $val["child_fb_url"];
echo "<div class='checkbox-wrapper-28'><input type='checkbox' id='$checkbox_id' name='children_chk' value='$child_id' class='promoted-input-checkbox'>
<svg><use xlink:href='#checkmark-28' /></svg>
<label for='$checkbox_id'> $child_first_name $child_last_name</label><svg xmlns='http://www.w3.org/2000/svg' style='display: none'>
    <symbol id='checkmark-28' viewBox='0 0 24 24'>
      <path stroke-linecap='round' stroke-miterlimit='10' fill='none'  d='M22.9 3.7l-15.2 16.6-6.6-7.1'>
      </path>
    </symbol>
  </svg>
</div>";

}
?>
<button id="select_all" class="button-15" role="button">Select All</button>
<script>

 $("#select_all").click(function() {

        var checkBoxes = $("input[name=children_chk]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
   });


</script>

                        </table>
                    </div>
                </div>
            </div>
        </div>

<div id="StdProgressModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeStdProgressModal()">&#10006;</span>
        <div class="tables">
            <div class="table" style="width: 100%;">
                <h3>Students Progress</h3>
<?php
// Step 1: Make an HTTP request to the API
$api_url = "https://proxyencase.cut.ac.cy:8090/api/public/quiz/grades";
$json_data = file_get_contents($api_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));

// Step 2: Parse JSON data into a PHP array
$data = json_decode($json_data, true);

// Check if the data was successfully fetched and parsed
if ($data) {
    // Step 3: Create an HTML table
    echo '<table>';
    echo '<tr>';
    echo '<th>Child Name</th>';
    echo '<th>Title</th>';
    echo '<th>Score</th>';
    echo '</tr>';

    foreach ($data as $row) {
        $childName = $row['child_first_name'] . ' ' . $row['child_last_name'];
        $title = $row['title'];
        $score = $row['score'];

        echo '<tr>';
        echo '<td class="tg-0pky"><a href="https://proxyencase.cut.ac.cy:8090/en/quiz_view.php?fb_url='.$row["child_fb_url"].'" target="_blank">' . $childName . '</td>';
        echo '<td class="tg-0pky">' . $title . '</td>';
        echo '<td class="tg-0pky">' . $score . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Failed to fetch and parse data from the API.';
}
?>


            </div>
        </div>
    </div>
</div>

    </div>
 </section>
                <!-- /.content --> 
 </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- <div class="row"> -->
                <!-- Left col -->
              <!--   <section class="col-lg-7 connectedSortable">
                                </section> -->
                                <!-- /.Left col -->

                        <!-- </div> -->
                        <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
        </div>
        <!-- /.content-wrapper --> 

<script>
function openAssignCoursesModal() {
var modal = document.getElementById("assignCoursesModal");
modal.style.display = "flex";
}
function closeAssignCoursesModal() {
var modal = document.getElementById("assignCoursesModal");
modal.style.display = "none";
}
closeAssignCoursesModal();

function openStdProgressModal() {
var modal = document.getElementById("StdProgressModal");
modal.style.display = "flex";
}
function closeStdProgressModal() {
var modal = document.getElementById("StdProgressModal");
modal.style.display = "none";
}
closeStdProgressModal();



    </script>

        <?php
        include('footer.php');
        ?>


<script>
function assignModules() {
Swal.fire({
  title: 'Do you want to save the changes?',
  icon:'question',
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    var courseCheckboxes = document.querySelectorAll('input[name="courses"]:checked');
    var studentCheckboxes = document.querySelectorAll('input[name="children_chk"]:checked');
        if (courseCheckboxes.length === 0 || studentCheckboxes.length === 0) {
            Swal.fire({
  		icon: 'error',
  		title: 'Oops...',
  		text: 'Please select at least one course and one student to assign modules!'
	   })
            return;
        }

    var selectedCourses = Array.from(courseCheckboxes).map(checkbox => checkbox.value);
    var selectedStudents_text = Array.from(studentCheckboxes).map(checkbox => checkbox.labels[0].innerText);
var selectedStudents = Array.from(studentCheckboxes).map(checkbox => checkbox.value);
for (let i = 0; i < selectedCourses.length; i++) {
for (let j = 0; j < selectedStudents.length; j++) {
var form = new FormData();
form.append("childid", selectedStudents[j]);
form.append("course", selectedCourses[i].replace("Course", ""));
var settings = {
"url": "https://proxyencase.cut.ac.cy:8090/api/public/edu/add",
"method": "POST",
"timeout": 0,
"processData": false,
"mimeType": "multipart/form-data",
"contentType": false,
"data": form
};
$.ajax(settings).done(function (response) {
  console.log(response);
});       
}
}



            Swal.fire({
		  icon: 'success',
  		  title: 'Saved!',
  		  html: `Assigned modules from courses:<br> ${selectedCourses} <br>To students:<br> ${selectedStudents_text}`
		})

  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
}


$(document).ready(function(){
$('input[name="children_chk"]').each(function() {

    var settings = {
  "url": "https://proxyencase.cut.ac.cy:8090/api/public/edu/get/"+$(this).attr('id'),
  "method": "GET",
  "timeout": 0,
};
$.ajax(settings).done(function (response) {
    
  if(response.length){
      document.getElementById(response[0]['child_fb_url']).checked = 'checked';
	document.getElementById('Course'.concat(response[0]['course'])).checked = 'checked';
  }
});
});
});
</script>
