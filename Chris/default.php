 <!--   default.php
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

if(!isset($_SESSION['keepqn']))
{
	
$_SESSION['errorVar'] = "";
$_SESSION['keepqn'] = "";
$_SESSION['keepq'] = "";
$_SESSION['keepr1'] = "";
$_SESSION['keepr2'] = "";
$_SESSION['keepr3'] = "";
$_SESSION['keepr4'] = "";
}

?>

<html>
<head>
<!-- CSS Stylesheet -->	
<link rel="stylesheet" href="../styles.css">
<title>Questionnaire</title>

<style>

	td {
		text-align: left;
		padding: 8px;
	}
	th {
		background-color: rgb(180, 194, 221);
		color: white;
        text-align: center;
		padding: 8px;
	}

</style>  
<body>
<div id="wrapper">
<header>
	<h1>Questionnaire</h1>
</header>

<?php
  include 'menu.php';
?>

<main>

<form method="POST" action="Inputdata_DisplayData.php">
<table border="2">
    <thead>
        <tr>
            <th colspan="2">Question</th>
        </tr>
    </thead>
        <tr>
            <th>Question Number</th>
            <td><input type="text" name="qQuestionNumber" size="4"
				value = "<?php echo($_SESSION['keepqn']); ?>">
				<?php echo($_SESSION['errorVar']); ?>
				</td>
        </tr>
        <tr>
            <th>Question</th>
            <td><input type="text" name="qQuestion" size="150"
			value = "<?php echo($_SESSION['keepq']); ?>">
			</td>
        </tr>
        <tr>
            <th>Response 1</th>
            <td><input type="text" name="qResponse1" size="50"
			value = "<?php echo($_SESSION['keepr1']); ?>">
			</td>
        </tr>
        <tr>
        <th>Response 2</th>
            <td><input type="text" name="qResponse2" size="50"
			value = "<?php echo($_SESSION['keepr2']); ?>">
			</td>
        </tr>
        <tr>
        <th>Response 3</th>
            <td><input type="text" name="qResponse3" size="50"
			value = "<?php echo($_SESSION['keepr3']); ?>">
			</td>
        </tr>
        <tr>
        <th>Response 4</th>
            <td><input type="text" name="qResponse4" size="50"
			value = "<?php echo($_SESSION['keepr4']); ?>">
			</td>
        </tr>
        <tr>
      	<td></td>
    	<td><input type="submit" value="Enter" >
    	</td>
    </tr>

        </table>
        </form>
</main>
</div>
</body>
</html>
        