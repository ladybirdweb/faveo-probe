<?php
$var = isset($_POST['submit']);
$redirect = isset($_GET['return']);
if (!($var || $redirect)) {
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="css/load-styles.css" type="text/css" media="all">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="css/css.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/wc-setup.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="css/ggpopover.css" rel="stylesheet" />



	</head>

<body class="wc-setup wp-core-ui">
	<h1 id="wc-logo"><a href="http://www.faveohelpdesk.com" target="_blank">
            <img src="images/logo.png" alt="faveo"></a></h1>
    <ol class="wc-setup-steps">
        
        <li class="done">Environment Test</li>
        <li class="active">Database Test</li>
       
        <li class="">Ready</li>
    </ol>
    <div class="wc-setup-content">
        <h1 style="text-align: center;">Database Setup</h1>

<!--
=====================//Note: Future reference of tooltip//---------------------


		<div id="sectool">
			<div class="w-clearfix column-right chat">
				<div class="arrow-globe"></div>
				<div class="chat-text" id="backend">Tooltip...</div>
			</div>
		</div>
-->

      <p>
               Below you should enter your database connection details. If you’re not sure about these, contact your host.</p>
               
                <?php if (isset($_GET['error_message'])) {
        ?>
                <div class="woocommerce-message woocommerce-tracker " >
               
                <p id="fail"><?= $_GET['error_message']?></p>
              </div>
                <?php

    }
    ?>
              

        <form action="step2a.php" method="post">
            <table>
                <tr>
                    <td>
							<label for="selectbox1">Database <span style="color
								: red;font-size:12px;">*</span></label>
                    </td>
			
					<td>
						<div class="side-by-side clearfix moveleftthre">
							<div>
								<select id="database-type" name="database-type" data-placeholder="Choose a SQL format..." class="chosen-select" style="width:290px;" tabindex="2" required>
									<option name="database-type" value=""></option>


									<option name="database-type"  value="MySQL">MySQL</option>

									<!-- <option value="mm/dd/yyyy">PgSQL</option> -->
									<!-- <option value="SQLSRV">SQLSRV</option> -->
									
								</select>
							</div>
						</div>
					
						
                    </td>
                    <td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database type"
								data-content="Faveo supports 3 databases, choose anyone which your server supports" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
                    </td>
                </tr>

                <tr>


                    <td>
						<label for="box1">Host<span style="color
							: red;font-size:12px;">*</span></label>
                    </td>
                    <td>
                        <input type="text" id="host-name" name="host-name"  required>
                    </td>
					<td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database Host"
								data-content="You should be able to get this info from your web host, if localhost doesn’t work
" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
					</td>
                </tr>
                <tr>
                    <td>
						<label for="box2">Port</label>
                    </td>
                    <td>
                        <input type="text" id="port-no" name="port-no">
                    </td>
					<td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database port no"
								data-content="This is an optional field, by default port no wil be default port no of the database choosen, enter this field only if your database is not running on default port no" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
					</td>
                </tr>
                <tr>
                    <td>
						<label for="box3">Database Name<span style="color
							: red;font-size:12px;">*</span></label>
                    </td>
                    <td>
                        <input type="text" id="database-name" name="database-name" required>
                    </td>
					<td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database name"
								data-content="The name of the database you want to run Faveo in" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
					</td>
                </tr>
                <tr>
                    <td>
						<label for="box4">User Name<span style="color
							: red; font-size: 12px;">*</span></label>
                    </td>
                    <td>
                        <input type="text" id="user-name" name="user-name" required>
                    </td>
					<td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database username"
								data-content="Your Database username" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
					</td>
                </tr>
                <tr>
                    <td>
						<label for="box5">Password</label>
                    </td>
                    <td>
                        <input type="text" id="password" name="password">
                    </td>
					<td>
						<button type="button"
								data-toggle="popover"
								data-placement="right"
								data-arrowcolor="#eeeeee"
								data-bordercolor="#bbbbbb"
								data-title-backcolor="#cccccc"
								data-title-bordercolor="#bbbbbb"
								data-title-textcolor="#444444"
								data-content-backcolor="#eeeeee"
								data-content-textcolor="#888888"
								title="Database Password"
								data-content="Your Database user password" style="padding: 0px;"><i class="fa fa-question-circle" style="padding: 0px;"></i></button>
					</td>
                </tr>
				
				
				
<!--
=====================//Note: Future reference of tooltip//---------------------
 <tr>
                    <td>
						<label for="box5">Password</label>
                    </td>
                    <td>
                        <input type="text" id="box5">
                    </td>
                    <td>
                        <a href="#" class="tooltip"><i class="fa fa-question-circle"></i></a>
                    </td>
                </tr>
-->

            </table>


</div>

            <br>
           
             <div class="border-line">
                <p class="wc-setup-actions step">
                <a href="index.php" class="button button-large button-next" style="float: left">Previous</a>
                        <input type="submit" name="submit" id="submitme" class="button-primary button button-large button-next" value="Continue">
                        
            </p>
        
    </div></form>

	<p style="text-align: center;">Copyright © 2015 - 2016 · Ladybird Web Solution Pvt Ltd. All Rights Reserved. Powered by <a href="http://www.faveohelpdesk.com" target="_blank">Faveo</a>
    </p>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--
    <script>
        $(document).ready(function() {
            $("button").mouseover(function() {
                $.ajax({
                    url: "demo_test.txt",
                    success: function(result) {
                        $("#div1").html(result);
                    }
                });
            });
            $("button").mouseout(function() {
                $("#div1").hide(20000);
            });
        });
    </script>
    
-->


    <!--
    <script>
        $(document).ready(function() {
            $("#sectool").hide();
            $(".tooltip").mouseover(function() {


                $.ajax({
                    url: "demo_test.txt",
                    type: "POST",
                    success: function(result) {
                        $("#backend").html(result);
                    }
                });
                $("#sectool").show();
            });

            $(".tooltip").mouseout(function() {
                //                setInterval(function() {
               $("#sectool").hide();
                //                }, 10000);
            });
        });
    </script>
-->
<!--
=====================//Note: Future reference of tooltip//---------------------
	<script type="text/javascript">
		$(document).ready(function() {
			$('.tooltip').mouseover(function(e) {
				$('#sectool').hide();
				$('#sectool').css({
					'top': e.pageY - 20,
					'left': e.pageX + 15,
					'position': 'absolute'
				});
				$.ajax({
					url: "demo_test.txt",
					type: "POST",
					success: function(result) {
						$("#backend").html(result);
					}
				});
				$('#sectool').show();
			});
			$('.tooltip').mouseout(function() {
				
				$("#sectool").hide();
				
			});

		});
	</script>
-->
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="js/ggpopover.js"></script>
	<script type="text/javascript">
		$('[data-toggle="popover"]').ggpopover();
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var config = {
			'.chosen-select': {},
			'.chosen-select-deselect': {
				allow_single_deselect: true
			},
			'.chosen-select-no-single': {
				disable_search_threshold: 10
			},
			'.chosen-select-no-results': {
				no_results_text: 'Oops, nothing found!'
			},
			'.chosen-select-width': {
				width: "95%"
			}
		}
		for (var selector in config) {
			$(selector).chosen(config[selector]);
		}
	</script>
</body>
<!--
    <script>
        var first = document.getElementById('submitme').disabled = true;
        var checkme = document.getElementById('Acceptme');
        var submiter = document.getElementById('submitme');

        checkme.onchange = function() {
            submiter.disabled = !this.checked;
            if (submiter.disabled) {
                alert("Click to enable the button");
            };
        };
    </script>
-->



</html>
<?php

}
?>
