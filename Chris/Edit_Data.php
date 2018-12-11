<!-- Edit_Data.php -->
<?php
require 'dbconnect.php';

             

// Update Data here
//---------------

if(!empty($_POST['qQuestion_Id']))
{
    print_r($_POST);
    //update query
    $sql_update = "UPDATE tbl_poll_q 
                    SET qQuestion_Id = :qQuestion_Id,
                    qQuestionNumber = :qQuestionNumber,
                    qQuestion = :qQuestion,
                    qResponse1 = :qResponse1,
                    qResponse2 = :qResponse2,
                    qResponse3 = :qResponse3,
                    qResponse4 = :qResponse4
                    WHERE qQuestion_Id = :qQuestion_Id";
                    
    // prepare our sql statement
    $sqlh_update = $pdo->prepare($sql_update);
    
    //sanitize the data
    $uqQuestionNumber = filter_var($_POST['qQuestionNumber'], FILTER_SANITIZE_STRING);
    $uqQuestion = filter_var($_POST['qQuestion'], FILTER_SANITIZE_STRING);
    $uqResponse1 = filter_var($_POST['qResponse1'], FILTER_SANITIZE_STRING);
    $uqResponse2 = filter_var($_POST['qResponse2'], FILTER_SANITIZE_STRING);
    $uqResponse3 = filter_var($_POST['qResponse3'], FILTER_SANITIZE_STRING);
    $uqResponse4 = filter_var($_POST['qResponse4'], FILTER_SANITIZE_STRING);
    $uqQuestion_Id = filter_var($_POST['qQuestion_Id'], FILTER_SANITIZE_STRING);
    
    //bind our parameters
    $sqlh_update->bindparam(":qQuestionNumber", $uqQuestionNumber);
    $sqlh_update->bindparam(":qQuestion", $uqQuestion);
    $sqlh_update->bindparam(":qResponse1", $uqResponse1);
    $sqlh_update->bindparam(":qResponse2", $uqResponse2);
    $sqlh_update->bindparam(":qResponse3", $uqResponse3);
    $sqlh_update->bindparam(":qResponse4", $uqResponse4);
    $sqlh_update->bindparam(":qQuestion_Id", $uqQuestion_Id);
    
    //execute the sql statement
    $sqlh_update->execute();
    
    //return to display data page
    header("Location: Display_Edit.php");
    
}

//--------------

//Select Query (Only pulls data)
  $sql_editData = "SELECT * FROM tbl_poll_q 
  			WHERE qQuestion_Id = ". $_SESSION['questEditID'];
                                                                                    
//execute the query
  $row_data = $pdo->query($sql_editData);

//pull row data into an array
  $row_edit = $row_data->fetch();

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
	<h2>Edit Data</h2>
</header>
<?php
    include 'menu.php';
?>

<main>
<form method="POST" action="Edit_Data.php" 
        onsubmit="return confirm('Are you sure?')">
        
<table border="2">
    <thead>
           <tr>
             <th colspan="2">Question</th>
           </tr>
    </thead>
    <tr>
             <td>Question Number</td>
             <td><input type="text" name="qQuestionNumber" 
                     value="<?php echo($row_edit['qQuestionNumber'])?>"
                        size="20">
             </td>
    </tr>
        <tr>
             <td>Question</td>
             <td><input type="text" name="qQuestion" 
                     value="<?php echo($row_edit['qQuestion'])?>"
                        size="150">
             </td>
    </tr>
        <tr>
             <td>Response 1</td>
             <td><input type="text" name="qResponse1" 
                     value="<?php echo($row_edit['qResponse1'])?>"
                        size="20">
             </td>
    </tr>
        <tr>
             <td>Response 2</td>
             <td><input type="text" name="qResponse2" 
                     value="<?php echo($row_edit['qResponse2'])?>"
                        size="20">
             </td>
    </tr>
        <tr>
             <td>Response 3</td>
             <td><input type="text" name="qResponse3" 
                     value="<?php echo($row_edit['qResponse3'])?>"
                        size="20">
             </td>
    </tr>
    <tr>
             <td>Response 4</td>
             <td><input type="text" name="qResponse4" 
                     value="<?php echo($row_edit['qResponse4'])?>"
                        size="20">
             </td>
    </tr>
        <tr>
      	<td>Record ID: <?php echo($row_edit['qQuestion_Id']) ?>
                        <input type="hidden" name="qQuestion_Id" 
                            value="<?php echo($row_edit['qQuestion_Id']) ?>"> 
        </td>
    	<td><input type="submit" value="Enter"></td>
    </tr>
</table>
</form>
</main>
</div>
</body>
</html>