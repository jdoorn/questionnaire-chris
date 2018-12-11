<!-- Display_Edit.php

<?php
require 'dbconnect.php';

if(isset($_POST))
{
    if(!empty($_POST['action']))
    {
        // Check if Delete button was pressed
        if($_POST['action']==='Delete')
        {
        
            // first delete the answers to the question that is being removed
            //sql string
            $sql_delete1 = "DELETE FROM tbl_poll_a WHERE aQuestion_Id = :questionID";
            
            //prepare the string
			$sqlh_delete1 =  $pdo->prepare($sql_delete1);
            
            //sanitize input
            $questionID = filter_var($_POST['qQuestion_Id'],FILTER_SANITIZE_STRING);
            
            //bind our parameters
			$sqlh_delete1->bindparam(":questionID",$questionID);
            
            //execute the query			
            $sqlh_delete1->execute();
            


            // second delete the question
            //sql string
            $sql_delete = "DELETE FROM tbl_poll_q WHERE qQuestion_Id = :questionID";
            
            //prepare the string
			$sqlh_delete =  $pdo->prepare($sql_delete);
            
            //bind our parameters
			$sqlh_delete->bindparam(":questionID",$questionID);
            
            //execute the query			
			$sqlh_delete->execute();
        }
        
        // Check if Edit button was pressed
        if($_POST['action']==='Edit')
        {
            $_SESSION['questEditID'] = filter_var($_POST['qQuestion_Id'],
                                FILTER_SANITIZE_STRING);
            
            // header takes us to a new page
            header("Location:Edit_Data.php");
            
        }
    }
}


$sql_selectEdit = "SELECT * ".
                  "FROM tbl_poll_q ".
                  "ORDER BY qQuestionNumber";

//run the query                  
$result_edit = $pdo->query($sql_selectEdit);

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
	<h1>Questions from database</h1>
</header>

<?php
  include 'menu.php';
?>

<main>
    <table border="2">
    <thead>
            <tr>
                 <th>Question</th>
                 <th>Response 1</th>
                 <th>Response 2</th>
                 <th>Response 3</th>
                 <th>Response 4</th>
                 <th>Edit / Delete</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['qQuestionNumber'].". ".$row['qQuestion'].'</td>'.
			 //	 '<td>'.$row['qQuestion'].'</td>'.
                 '<td>'.$row['qResponse1'].'</td>'.
                 '<td>'.$row['qResponse2'].'</td>'.
                 '<td>'.$row['qResponse3'].'</td>'.
                 '<td>'.$row['qResponse4'].'</td>'.
                 '<td><form method="POST" 
                        action="Display_Edit.php"
                        onsubmit="return confirm('."'".'Are you sure?'.
                        "')".'">'.
                        '<input type ="hidden" 
                                name="qQuestion_Id"
                                value="'.$row['qQuestion_Id'].'">'.
                        '<input type="submit"  
                                value="Edit"
                                name="action"> &nbsp;&nbsp;'.
                        '<input type="submit"  
                                value="Delete"
                                name="action">
                                </form></td>'.
            '</tr>'
            );
        }
    ?>
    </tbody>
    </table>

</main>
</div>
</body>
</html>