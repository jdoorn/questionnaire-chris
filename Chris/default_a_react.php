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

<script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

<title>Questionnaire</title>
<style>
	 
	th, option {
		text-align: left;
		padding: 3px;
		font-weight: bold;
	}
}
	td {
		text-align: left;
		padding: 3px;
		width: 250px;
	}
	input {
		width: 800px;
	}
	#submitbutton {
		width: 200px;
		margin-left: 400px;
		padding: 12px;
		font-weight: bold;
	}
	/* h3 element  - sets text color to medium blue*/
	h3 {
	background-color : rgb(122, 136, 166);
	color : #FFFFFF;
	font-family : Georgia, sans-serif;
	line-height : 200%;
	font-size: 200%;
    text-align: center;
	margin-top: 1px;
	margin-bottom: 1px;
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

<div id="root"></div>
    <script type="text/babel">
        function tick() {
        const element = (<h3>{new Date().toLocaleTimeString()}</h3>);
        ReactDOM.render(element, document.getElementById('root'));
        }setInterval(tick, 1000);
    </script>


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
			<td><select id="Response" name="Response'.$_SESSION['cntr'].'" required> 
			
                <option value="">Select</option>.
				<option value="'.$row ['qResponse1'].'">'.
                            $row ['qResponse1'].'</option>
                <option value="'.$row ['qResponse2'].'">'.
                            $row ['qResponse2'].'</option>
                <option value="'.$row ['qResponse3'].'">'.
                            $row ['qResponse3'].'</option>
                <option value="'.$row ['qResponse4'].'">'.
                            $row ['qResponse4'].'</option>
		</td>
		</tr>
		<tr>
			<td><input type="hidden" id="QuestionNumber" name="QuestionNumber'.$_SESSION['cntr'].'" 
										value="'.$row ['qQuestionNumber'].'">
			</td>



		</tr>
		<tr>
			<th>Comment</th>
			<td><input type="text" width="250" name="Comment'.$_SESSION['cntr'].'"">
			</td>
		</tr>

		<tr>
			<th>React Text Box</th>
			<td>
			<div id="root'.$_SESSION['cntr'].'"></div> 
			<script type="text/babel">
			ReactDOM.render(
				<textarea rows="2" cols="111">
					"React.js Text area root'.$_SESSION['cntr'].'" 
				</textarea>, 
					document.getElementById("root'.$_SESSION['cntr'].'"));
			</script>
			</td>
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