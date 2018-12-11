<!-- Inputdata_DisplayData.php -->

<?php

require 'dbconnect.php';

try{

$sql_input = "INSERT INTO tbl_poll_q ".
            "(qQuestionNumber, ".
            "qQuestion, ".
            "qResponse1, ".
            "qResponse2, ".
            "qResponse3, ".
            "qResponse4) ".
            "VALUES (".
            ":qQuestionNumber, ".
            ":qQuestion, ".
            ":qResponse1, ".
            ":qResponse2, ".
            ":qResponse3, ".
            ":qResponse4)";
            
//prepare the sql statement - $sqlh_input is defined as an object here
$sqlh_input = $pdo->prepare($sql_input);

//sanitize data
$qQuestionNumber = filter_var($_POST['qQuestionNumber'], FILTER_SANITIZE_STRING);
$qQuestion = filter_var($_POST['qQuestion'], FILTER_SANITIZE_STRING);          
$qResponse1 = filter_var($_POST['qResponse1'], FILTER_SANITIZE_STRING);
$qResponse2 = filter_var($_POST['qResponse2'], FILTER_SANITIZE_STRING);
$qResponse3 = filter_var($_POST['qResponse3'], FILTER_SANITIZE_STRING);
$qResponse4 = filter_var($_POST['qResponse4'], FILTER_SANITIZE_STRING);

//bind our data
$sqlh_input->bindparam(":qQuestionNumber",$qQuestionNumber);
$sqlh_input->bindparam(":qQuestion",$qQuestion);
$sqlh_input->bindparam(":qResponse1",$qResponse1);
$sqlh_input->bindparam(":qResponse2",$qResponse2);
$sqlh_input->bindparam(":qResponse3",$qResponse3);
$sqlh_input->bindparam(":qResponse4",$qResponse4);


// execute query
$sqlh_input->execute();

$_SESSION['errorVar'] = "";
$_SESSION['keepqn'] = "";
$_SESSION['keepq'] = "";
$_SESSION['keepr1'] = "";
$_SESSION['keepr2'] = "";
$_SESSION['keepr3'] = "";
$_SESSION['keepr4'] = "";

}
catch(PDOException $e)
{
	$_SESSION['keepqna'] = "test";
	// Checking to see if question # already exists
	$qQuestionNumber = filter_var($_POST['qQuestionNumber'], FILTER_SANITIZE_STRING);
	$sql_check = "SELECT qQuestionNumber 
					FROM tbl_poll_q 
					WHERE qQuestionNumber = $qQuestionNumber";
					
	$sqlh_check = $pdo->query($sql_check);
	if($sqlh_check->fetch() != NULL)
	{
		$_SESSION['errorVar'] = "Question Number ".filter_var($_POST['qQuestionNumber'], FILTER_SANITIZE_STRING)." already exists, please choose a new number";
		$_SESSION['keepqn'] = filter_var($_POST['qQuestionNumber'], FILTER_SANITIZE_STRING)."**";
		$_SESSION['keepq'] = filter_var($_POST['qQuestion'], FILTER_SANITIZE_STRING);
		$_SESSION['keepr1'] = filter_var($_POST['qResponse1'], FILTER_SANITIZE_STRING);
		$_SESSION['keepr2'] = filter_var($_POST['qResponse2'], FILTER_SANITIZE_STRING);
		$_SESSION['keepr3'] = filter_var($_POST['qResponse3'], FILTER_SANITIZE_STRING);
		$_SESSION['keepr4'] = filter_var($_POST['qResponse4'], FILTER_SANITIZE_STRING);
		header("Location:default.php");
	}
}
?>

<html>
<head>
<!-- CSS Stylesheet -->	
<link rel="stylesheet" href="../styles.css">
<title>Questionnaire</title>
</head>
<body>
<div id="wrapper">
<header>
	<h1>Questionnaire</h1>
	
</header>
<?php
	include 'menu.php';
 ?>
<main>
      <h2>Information entered successfully</h2>
      <?php
        echo("Question: $qQuestionNumber $qQuestion<br>");
        echo("Response 1: $qResponse1<br>");
        echo("Response 2: $qResponse2<br>");
        echo("Response 3: $qResponse3<br>");
        echo("Response 4: $qResponse4<br>");
                                          
      ?>
</main>
</div>
</body>
</html>
