<?php
if (version_compare(PHP_VERSION, '5.4') == -1) {

?>
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
    <h1 id="wc-logo"><a href="http://www.faveohelpdesk.com" target="_blank"><img src="images/logo.png" alt="faveo"></a></h1>
        <ol class="wc-setup-steps">
            
            <li class="active">Environment Test</li>

            <li class="">Database Test</li>
           
            <li class="">Ready</li>
        </ol>
        <div class="wc-setup-content">
            <h1 style="text-align: center;"> Environment Test
      </h1>
            <h2>Probe</h2>
            <p>
                <strong>Probe Version:</strong> 1.0
                <br><strong>Testing For:</strong> Faveo HELPDESK 1.0.6 and Newer</p>
                <div><p>Minimum PHP version required in order to run Faveo is PHP 5.5.*. Your PHP version: <?php echo PHP_VERSION ?></p></div>
                 <br><span class="ok">Ok</span> — All Ok
            <br><span class="warning">Warning</span> — Not a deal breaker, but it's recommended to have this installed for some features to work
            <br><span class="error">Error</span> — Faveo HELPDESK require this feature and can't work without it

            <br>
            <br>


        </div>
    <p style="text-align: center;">Copyright © 2015 - 2016 · Ladybird Web Solution Pvt Ltd. All Rights Reserved. Powered by <a href="http://www.faveohelpdesk.com" target="_blank">Faveo</a>
        </p>

    </body>
  
</html>

<?php
   
} else {
// Start the session
    session_start();
    $_SESSION['check'] = 1;
    header('location: step1.php');
}
?>