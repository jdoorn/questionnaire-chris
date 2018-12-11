<!-- Inputdata_DisplayData_a.php -->

<?php

require 'dbconnect.php';


//Build sql - get next aResponse_Id for set of questions
$sql_select = "SELECT aResponse_Id + 1 as next_response 
FROM tbl_poll_a 
order by aResponse_Id desc
LIMIT 1";

//run the query                  
$result_select = $pdo->query($sql_select);

$recordsexist = $result_select-> rowCount();

if($recordsexist==0){
//Build sql - set next aResponse_Id = 1
$sql_select1 = "SELECT 1 as next_response 
FROM tbl_poll_q 
order by qQuestion_Id desc
LIMIT 1";

//run the query                  
$result_select = $pdo->query($sql_select1);
$recordsexist = $result_select-> rowCount();
}
print_r($recordsexist);
$row1 = $result_select->fetch();

  /*
//Build sql - get next aResponse_Id for set of questions
$sql_select = "SELECT qQuestion_Id, 1 as next_response 
FROM tbl_poll_q 
order by qQuestion_Id desc
LIMIT 1";

//run the query                  
$result_select = $pdo->query($sql_select);

$row1 = $result_select->fetch();
*/
for($c = 0; $c < $_SESSION['cntr']; $c++)

{
	$Response = "Response".($c+1);
	$Question_Id = "Question_Id".($c+1);
	$Comment = "Comment".($c+1);

$sql_input = "INSERT INTO tbl_poll_a 
(aQuestion_Id, 
aResponse, 
aResponse_Id, 
aComment) 
VALUES ('".
$_POST[$Question_Id]."', '".
$_POST[$Response]."', '".
$row1['next_response']."', '".
$_POST[$Comment]."')";
		
//prepare the sql statement - $sqlh_input is defined as an object here
$sqlh_input = $pdo->prepare($sql_input);

//sanitize data
$CommentSanitized = filter_var($_POST[$Comment], FILTER_SANITIZE_STRING);

//bind our data
$sqlh_input->bindparam(":Comment",$CommentSanitized);
 
// execute query
$sqlh_input->execute();
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
	 
	 for($c = 0; $c < $_SESSION['cntr']; $c++)

{
	$Response = "Response".($c+1);
	$Question_Id = "Question_Id".($c+1);
	$Comment = "Comment".($c+1);

// Build sql Select	
$sql_select = "SELECT qQuestion from tbl_poll_q 
	WHERE qQuestion_Id = $_POST[$Question_Id]";

// execute query
$result = $pdo->query($sql_select);
$row = $result->fetch();
			
//		echo("<b>$_POST[$QuestionNumber]".". ".$row['qQuestion']."</b><br>");
//		echo("<b>".$row['qQuestion_Id']."</b><br>");
		echo("<b>".$row['qQuestion']."</b><br>");
        echo("<blockquote> $_POST[$Response]<br>");
        echo("$_POST[$Comment]</blockquote>");
}                                          
      ?>
</main>
</div>
</body>
</html>
