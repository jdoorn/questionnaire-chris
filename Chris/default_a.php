<!--   default_a.php
    Created by:  Joyce Doorn
    Created on:  10/11/2018
    Purpose:     This php displays a table to enter poll data 
				 inserts roster data into wp_poll/tbl_poll_a
				 and provides navigation-->

<?php  
// require is all or nothing
// include will still try to run the page
require 'dbconnect.php';
//echo($dbstatus);
//Select Questions
$sql_question = "SELECT * FROM tbl_poll_q ORDER BY qQuestionNumber";

//Execute the state/query
$result = $pdo->query($sql_question);
?>

<html>
<head>
<!-- CSS Stylesheet -->	
<link rel="stylesheet" href="../styles.css">

<title>Questionnaire</title>
<style>
	 
	th, option {
		text-align: left;
		padding: 3px;
		font-weight: bold;
	}
	td {
		text-align: left;
		padding: 3px;
		min-width: 900px;
		color: black;
	}
	#commentbox input{
		width: 900px;
	}
	#submitbutton {
		width: 200px;
		margin-left: 400px;
		padding: 12px;
		font-weight: bold;
	}

</head>
</style>  
<body>
<div id="wrapper">
<header>
	<h1>Emerging Web Technology Final Project</h1>
</header>

<?php
  include 'menu.php';
?>

<main>

<form method="POST" action="Inputdata_DisplayData_a.php">  
<?php
$_SESSION['cntr'] = 0;
                    while($row = $result->fetch())
                    { 
						$_SESSION['cntr'] = $_SESSION['cntr'] + 1;
echo('
<table border="none">
    <thead>
        <tr>
            <th colspan="2">
			<option value="'.$row ['qQuestion'].'">'.
							 $row ['qQuestion'].'</option> 
			</th>
        </tr>
    </thead>
        <tr>
			<th>Select</th>
			<td><input type="radio" name="Response'.$_SESSION['cntr'].'" 
							value="'.$row ['qResponse1'].'">'.$row ['qResponse1'].' &nbsp; &nbsp;
				<input type="radio" name="Response'.$_SESSION['cntr'].'" 
							value="'.$row ['qResponse2'].'">'.$row ['qResponse2'].' &nbsp; &nbsp;
				<input type="radio" name="Response'.$_SESSION['cntr'].'" 
							value="'.$row ['qResponse3'].'">'.$row ['qResponse3'].' &nbsp; &nbsp;				
				<input type="radio" name="Response'.$_SESSION['cntr'].'" 
							value="'.$row ['qResponse4'].'">'.$row ['qResponse4'].' &nbsp; &nbsp;			
		</td>
		</tr>

		
			<input type="hidden" id="Question_Id" name="Question_Id'.$_SESSION['cntr'].'" 
										value="'.$row ['qQuestion_Id'].'">
			
		<tr>
			</td>
			<th>Other Comments:</th>
			<td><div id="commentbox"><input type="text" width="250" name="Comment'.$_SESSION['cntr'].'"">
			</div>			</td>
		</tr>
		</table>
	');
	}
?>
<br>
<tr>
      	<td></td>
    	<td><input id="submitbutton" type="submit" value="Submit Survey" >
    	</td>
	</tr>
	<br>
</form> 	
</main>
</div>
</body>
</html>