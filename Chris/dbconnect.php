<!-- dbconnect.php file 
	 created by: Joyce Doorn 
	 date: 10/14/2018
	 Purpose:  Create a Poll -->
	 
<?php

// connect to database
try
{

    $pdo = new PDO('mysql:host=localhost;dbname=wp_poll_chris','PollSite','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // only for educational purposes
    $dbstatus = "Good database connection<br>";

}
catch(PDOException $e)
{
    $dbstatus = 'Database connection failed<br>'.
                    $e->getMessage();
    $die();	
} 
SESSION_START();


?>