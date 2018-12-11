<!-- Display_Edit_a.php
<?php
require 'dbconnect.php';

// Build sql  - Table 1 Questions by count
$sql_selectEdit1 = "SELECT qQuestionNumber, qQuestion, 
	qResponse1, (Select count(aResponse) from tbl_poll_a 
                 where aResponse = qResponse1 and aQuestion_Id = qQuestion_Id) as 'Response1Count',
    qResponse2, (Select count(aResponse) from tbl_poll_a 
                 where aResponse = qResponse2 and aQuestion_Id = qQuestion_Id) as 'Response2Count',
    qResponse3, (Select count(aResponse) from tbl_poll_a 
                 where aResponse = qResponse3 and aQuestion_Id = qQuestion_Id) as 'Response3Count',
    qResponse4, (Select count(aResponse) from tbl_poll_a 
                 where aResponse = qResponse4 and aQuestion_Id = qQuestion_Id) as 'Response4Count'
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestion_Id = qQuestion_Id
Group By qQuestionNumber
ORDER BY qQuestionNumber";
//run the query                  
$result_edit1 = $pdo->query($sql_selectEdit1);


// Build sql  - Table 1.1 - Percents
$sql_selectEdit1_1 = "SELECT qQuestionNumber, qQuestion, 
-- 1st Response 
	  qResponse1,
	 (Select count(*) from tbl_poll_a 
      where aResponse = qResponse1 and aQuestion_Id = qQuestion_Id) as 'R_1_Count',
     	 FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestion_Id = qQuestion_Id 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse1 and y.aQuestion_Id = qQuestion_Id
      and   y.aQuestion_Id = aQuestion_Id),0) as 'R_1_Pct', 
-- 2nd Response 
	  qResponse2,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse2 and aQuestion_Id = qQuestion_Id) as 'R_2_Count',
     	  FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestion_Id = qQuestion_Id 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse2 and y.aQuestion_Id = qQuestion_Id
      and   y.aQuestion_Id = aQuestion_Id),0) as 'R_2_Pct', 
-- 3rd Response
	  qResponse3,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse3 and aQuestion_Id = qQuestion_Id) as 'R_3_Count',
     	 FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestion_Id = qQuestion_Id 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse3 and y.aQuestion_Id = qQuestion_Id
      and   y.aQuestion_Id = aQuestion_Id),0) as 'R_3_Pct', 
-- 4th Response  
	  qResponse4,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse4 and aQuestion_Id = qQuestion_Id) as 'R_4_Count',
     	  FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestion_Id = qQuestion_Id 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse4 and y.aQuestion_Id = qQuestion_Id
      and   y.aQuestion_Id = aQuestion_Id),0) as 'R_4_Pct'       
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestion_Id = qQuestion_Id
Group By qQuestionNumber
ORDER BY qQuestionNumber";
//run the query                  
$result_edit1_1 = $pdo->query($sql_selectEdit1_1);

try
{
// Build sql  - Table 2  Comments
/*
$sql_selectEdit = "SELECT aQuestionNumber, qQuestion, aResponse
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestionNumber = qQuestionNumber
ORDER BY aQuestionNumber, count(aResponse) desc, aResponse_Id";

//run the query                  
$result_edit = $pdo->query($sql_selectEdit);
*/


// Build sql  - Table 3
$sql_selectEdit2 = "SELECT qQuestionNumber, qQuestion, aResponse, aComment
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestion_Id = qQuestion_Id
WHERE aComment != ''
ORDER BY qQuestionNumber, aResponse, aComment";
//run the query                  
$result_edit2 = $pdo->query($sql_selectEdit2);
}
catch (PDOException $e)
{
	echo($e->getMessage());
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

	<h2>Response Count by Question</h2>
    <table border="2"> <!-- width="100%"> -->
   <thead>  
            <tr>
                 <th width="34%">Question</th>
                 <th width="14%">Response1</th>
				 <th width="3%">Count</th>
                 <th width="14%">Response2</th>
				 <th width="3%">Count</th>
                 <th width="14%">Response3</th>
				 <th width="3%">Count</th>
                 <th width="14%">Response4</th>
				 <th width="3%">Count</th>
            </tr>
    </thead> 
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit1->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['qQuestion'].'</td>'.
             //    '<td>'.$row['qQuestionNumber'].'. '.$row['qQuestion'].'</td>'.
                 '<td>'.$row['qResponse1'].'</td>'.
                 '<td style="text-align:center">'.$row['Response1Count'].'</td>'.
                 '<td>'.$row['qResponse2'].'</td>'.
                 '<td style="text-align:center">'.$row['Response2Count'].'</td>'.
                 '<td>'.$row['qResponse3'].'</td>'.
                 '<td style="text-align:center">'.$row['Response3Count'].'</td>'.
                 '<td>'.$row['qResponse4'].'</td>'.
                 '<td style="text-align:center">'.$row['Response4Count'].'</td>'.
            '</tr>'
            );
        }
    ?>
    </tbody>
    </table>

	<h2>Response Percent by Question</h2>
    <table border="2" width="100%">
    <thead>
            <tr>
                 <th width="34%">Question</th>
                 <th width="14%">Response1</th>
				 <th width="3%">%</th>
                 <th width="14%">Response2</th>
				 <th width="3%">%</th>
                 <th width="14%">Response3</th>
				 <th width="3%">%</th>
                 <th width="14%">Response4</th>
				 <th width="3%">%</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit1_1->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['qQuestion'].'</td>'.
            //     '<td>'.$row['qQuestionNumber'].'. '.$row['qQuestion'].'</td>'.
                 '<td>'.$row['qResponse1'].'</td>'.
                 '<td style="text-align:center">'.$row['R_1_Pct'].'</td>'.
                 '<td>'.$row['qResponse2'].'</td>'.
                 '<td style="text-align:center">'.$row['R_2_Pct'].'</td>'.
                 '<td>'.$row['qResponse3'].'</td>'.
                 '<td style="text-align:center">'.$row['R_3_Pct'].'</td>'.
                 '<td>'.$row['qResponse4'].'</td>'.
                 '<td style="text-align:center">'.$row['R_4_Pct'].'</td>'.
            '</tr>'
            );
        }
    ?>
    </tbody>
    </table>

<h2>Comments by Question</h2>
	    <table border="2" width="100%">
    <thead>
            <tr>
                 <th>Question</th>
                 <th>Response</th>
                 <th>Comment</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit2->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['qQuestionNumber'].'. '.$row['qQuestion'].'</td>'.
				 '<td>'.$row['aResponse'].'</td>'.
                 '<td>'.$row['aComment'].'</td>'.
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