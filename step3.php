<?php
$var = isset($_POST['submit']);
// /$redirect = isset($_GET['return']);
if (!$var) {
    header('Location: index.php');
    die();
} else {
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
    <h1 id="wc-logo"><a href="http://www.faveohelpdesk.com" target="_blank"><img src="images/logo.png" alt="Faveo" /></a></h1>
    <ol class="wc-setup-steps">
        
        <li class="done">Environment Test</li>

        <li class="done">Database Test</li>
       
        <li class="active">Ready</li>
    </ol>
    <div class="wc-setup-content">
        <a href="">
        <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQ-uhinU3OzXKj9zlFO7dFxHaChqyHPcWWg5nWgMqYt6N5b3knK" style="width: 86px; float: right;">
        </a>

        <h1 style="text-align: center;">Your System is Ready!</h1>

<div class="woocommerce-message woocommerce-tracker">
        <p>All right, sparky! Your system is ready for installation.</p>
        
      </div>

        <div class="wc-setup-next-steps">
            <div class="wc-setup-next-steps-first">
                <h2>Next Steps</h2>
                <ul>
                    <li class="setup-product"><a class="button button-primary button-large" href="http://www.faveohelpdesk.com" style="float: none; text-align: center; font-size: 24px;    padding: 15px;     line-height: 1;" target="_blank">Download Faveo</a>
                    </li>
                </ul>
            </div>
            <div class="wc-setup-next-steps-last">
                <h2>Learn More</h2>
                <ul>
                    <li class="video-walkthrough"><a target="_blank" href="https://www.youtube.com/channel/UC-eqh-h241b1janp6sU7Iiw">Video walk through</a>
                    </li>
                    <li class="sidekick"><a target="_blank" href="http://www.ladybirdweb.com/support/knowledgebase">Knowledge Base</a>
                    </li>

                    <li class="newsletter"><a href="mailto:support@ladybirdweb.com">Email Support</a>
                    </li>
                    <br>
                    <br>
                    <br>
                </ul>
            </div>
        </div>
  </div>

  <p style="text-align: center;">Copyright © 2015 - 2016 · Ladybird Web Solution Pvt Ltd. All Rights Reserved. Powered by <a href="http://www.faveohelpdesk.com" target="_blank">Faveo</a></p>
        
</body>

</html>
<?php
}
?>