<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">

	<head>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Faveo HELPDESK</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<link rel="stylesheet" href="css/load-styles.css" type="text/css" media="all">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="css/css.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/wc-setup.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	</head>
	
	
	
    <body class="wc-setup wp-core-ui">
    
    <?php 
	define('PROBE_VERSION', '4.2');
  define('PROBE_FOR', 'activeCollab 4.2 and Newer');
  define('STATUS_OK', 'ok');
  define('STATUS_WARNING', 'warning');
  define('STATUS_ERROR', 'error');
	
	$database_type=$_POST["database-type"]; 
	$database_name=$_POST["database-name"]; 
	$database_host=$_POST["host-name"]; 
	$database_portno=$_POST["port-no"]; 
	$database_username=$_POST["user-name"]; 
	$database_password=$_POST["password"]; 
//	Unit Testing
//	echo "db" . $database_type."<br/>";
//	echo $database_name."<br/>";
//	echo $database_host."<br/>";
//	echo $database_portno."<br/>";
//	echo $database_username."<br/>";
//	echo $database_password."<br/>";

 class TestResult {
    
    var $message;
    var $status;
    
    function TestResult($message, $status = STATUS_OK) {
      $this->message = $message;
      $this->status = $status;
    }
    
  } // TestResult
   function check_have_inno($link) {
   // if($result = mysqli_query('SHOW ENGINES', $link)) {
		 if($result = $link('SHOW ENGINES')) {
      while($engine = mysqli_fetch_assoc($result)) {
        if(strtolower($engine['Engine']) == 'innodb' && in_array(strtolower($engine['Support']), array('yes', 'default'))) {
          return true;
        } // if
      } // while
    } // if
    return true;
  } // check_have_inno
	
	?>
		<h1 id="wc-logo"><a href="http://www.faveohelpdesk.com" target="_blank"><img src="images/logo.png" alt="faveo"></a></h1>
		
        <ol class="wc-setup-steps">
           
            <li class="done">Environment Test</li>
    
            <li class="active">Database Test</li>
           
            <li class="">Ready</li>
        </ol>
        <div class="wc-setup-content">

            
			<h1 style="text-align: center;">Database Setup</h1>

                <p class="wc-setup-actions step">

                   This test will check prerequisites required to install Faveo
 <br><br/>
                
                
             
<?php
  $mysql_ok = true;
  $results = array();
  
  //if($connection = mysql_connect($database_host, $database_username, $database_password)) {
//    $results[] = new TestResult('Connected to database as ' . $database_username . '@' . $database_host, STATUS_OK);
    
	if($connection = $connection = mysqli_connect($database_host, $database_username, $database_password, $database_name)) {
		$results[] = new TestResult('Connected to database as ' . $database_username . '@' . $database_host, STATUS_OK);
	
    //if(mysql_select_db($database_name, $connection)) {
//      $results[] = new TestResult('Database "' . $database_username . '" selected', STATUS_OK);
//      
if($connection->select_db($database_name)) {
//      $results[] = new TestResult('Database "' . $database_username . '" selected', STATUS_OK);
      //$mysql_version = mysql_get_server_info($connection);
	  $mysqli_version = $connection->server_version;
	   $results[] = new TestResult('Connected to database as ' . $database_username . '@' . $database_host, STATUS_OK);
   
      
      if(version_compare($mysqli_version, '5.0') >= 0) {
        $results[] = new TestResult('MySQL version is ' . $mysqli_version, STATUS_OK);
        
        //$have_inno = check_have_inno($connection);
        
       // if($have_inno) {
//          $results[] = new TestResult('InnoDB support is enabled');
//        } else {
//          $results[] = new TestResult('No InnoDB support. Although activeCollab can use MyISAM storage engine InnoDB is HIGHLY recommended!', STATUS_WARNING);
//        }
//      } else {
        $results[] = new TestResult('Your MySQL version is ' . $mysqli_version . '. We recommend upgrading to at least MySQL5!', STATUS_ERROR);
        $mysql_ok = false;
      } // if
    } else {
      $results[] = new TestResult('Failed to select database. MySQL said: ' . mysqli_error(), STATUS_ERROR);
      $mysql_ok = false;
    } // if
  } else {
    $results[] = new TestResult('Failed to connect to database. MySQL said: ' . mysqli_error(), STATUS_ERROR);
    $mysql_ok = false;
  } // if
  
  // ---------------------------------------------------
  //  Validators
  // ---------------------------------------------------
  
  foreach($results as $result) {
    print '<br/><span class="' . $result->status . '">' . $result->status . '</span> &mdash; ' . $result->message . '';
  } // foreach
?><br/>
      
<?php $mysql_ok = null; ?>
<?php  // if ?>


<?php if( $mysql_ok !== null && $mysql_ok) { ?>
			<div class="woocommerce-message woocommerce-tracker" >
				<p id="pass">Database connection successful. This system can run Faveo</p>
				
			</div>
<?php } else { ?>
 <div class="woocommerce-message woocommerce-tracker " >
				<p id="fail">Database connection unsuccessful. This system does not meet Faveo system requirements</p>
				</div>
<?php } // if ?>
 <form action="step3.html" method="post">
				<div style="border-bottom: 1px solid #eee;">
                    <p class="wc-setup-actions step" >
                   
                        <input type="submit" id="submitme" class="button-primary button button-large button-next" value="Continue" <?php if( $mysql_ok !== null && $mysql_ok) { } else {?>disabled<?php }?>>
                        
                        <a href="index.php" class="button button-large button-next" style="float: left">Previous</a>
                        
                </p>
				</div> </form>
                <p class="wc-setup-actions step">
                <br><span class="ok">Ok</span> — All Ok
                <br><span class="warning">Warning</span> — Not a deal breaker, but it's recommended to have this installed for some features to work
                <br><span class="error">Error</span> — Faveo HELPDESK require this feature and can't work without it
                    <br>
                </p>
                


   
        
		</div>
		<p style="text-align: center;">Copyright © 2015 - 2016 · Ladybird Web Solution Pvt Ltd. All Rights Reserved. Powered by <a href="http://www.faveohelpdesk.com" target="_blank">Faveo</a></p>
 
    </body>

</html>