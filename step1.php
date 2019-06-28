<?php 
session_start();
//$check = $_SESSION['check'];
error_reporting(0);
if (isset($_SESSION['check']) == 1) {
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
								<strong>Probe Version:</strong> 2.1
								<br><br><strong>Testing For:</strong>
                                <ul>
                                    <li>Faveo HELPDESK Community v1.10 or newer</li>
                                    <li>Faveo HELPDESK Pro v2.0 or newer</li>
                                </ul>
                        </p>




						<p class="wc-setup-actions step">

								This test will check prerequisites required to install Faveo
<br/>
								
						
						<!-- -->
						<?php


    // -- No need to change anything below this line --------------------------------------

    define('PROBE_VERSION', '4.2');
    define('PROBE_FOR', 'Faveo 4.2 and Newer');
    define('STATUS_OK', 'ok');
    define('STATUS_WARNING', 'warning');
    define('STATUS_ERROR', 'error');
    class TestResult
    {
        public $message;
        public $status;

        public function __construct($message, $status = STATUS_OK)
        {
            $this->message = $message;
            $this->status = $status;
        }
    } // TestResult
    // ---------------------------------------------------
    //  Validators
    // ---------------------------------------------------

    /**
     * Validate PHP platform.
     *
     * @param array $results
     */
    function validate_php(&$results)
    {
        if (!version_compare(PHP_VERSION, '7.1.3', '>=')) {
            $results[] = new TestResult('Faveo requires PHP version 7.1.3 or greater. Your PHP version: '.PHP_VERSION, STATUS_ERROR);

            return false;
        } else {
            $results[] = new TestResult('Your PHP version is '.PHP_VERSION, STATUS_OK);

            return true;
        } // if
    } // validate_php

    /**
     * Validate maximum execution time.
     *
     * @param array $results
     */
    function checkMaxExecutiontime(&$results)
    {
        $ok = true;
        if ((int) ini_get('max_execution_time') >= 120) {
            $results[] = new TestResult('Maximum execution time is as per requirement.', STATUS_OK);
        } else {
            $results[] = new TestResult('Maximum execution time is too low. Recommneded execution time is 120 seconds ', STATUS_WARNING);
        }

        return $ok;
    }

    /**
     * Validate memory limit.
     *
     * @param array $results
     */
    function validate_memory_limit(&$results)
    {
        $memory_limit = php_config_value_to_bytes(ini_get('memory_limit'));
        $formatted_memory_limit = $memory_limit === -1 ? 'unlimited' : format_file_size($memory_limit);
        if ($memory_limit === -1 || $memory_limit >= 67108864) {
            $results[] = new TestResult('Your memory limit is: '.$formatted_memory_limit, STATUS_OK);

            return true;
        } else {
            $results[] = new TestResult('Your memory is too low to complete the installation. Minimal value is 64MB, and you have it set to '.$formatted_memory_limit, STATUS_ERROR);

            return false;
        } // if
    } // validate_memory_limit

    /**
     * Validate Apache modules.
     *
     *@param array $results
     */
    function validate_apache_module(&$results)
    {
        $sapi_type = php_sapi_name();
        if (substr($sapi_type, 0, 3) == 'cgi') {
            $results[] = new TestResult('We are unable to detect mod_rewrite your web server. Please make sure search engine friendly URL’s or pretty URLS’s are enabled on your web server. '/*Check the article here on how to enable it.*/, STATUS_WARNING);

            return true;
        } else {
            $modules = apache_get_modules();
            if (in_array('mod_rewrite', $modules) === true) {
                $results[] = new TestResult("Apache module 'mod_rewrite' found.", STATUS_OK);

                return true;
            } else {
                $results[] = new TestResult("Apache module 'mod_rewrite' is required.", STATUS_ERROR);

                return false;
            }
        }
    }

    /**
     * Validate PHP extensions.
     *
     * @param array $results
     */
    function validate_extensions(&$results)
    {
        $ok = true;

        $required_extensions = ['curl', 'ctype', 'imap', 'mbstring', 'openssl', 'tokenizer', 'pdo_mysql', 'zip', 'pdo', 'mysqli', 'bcmath', 'XML', 'json', 'fileinfo'];

        foreach ($required_extensions as $required_extension) {
            if (extension_loaded($required_extension)) {
                $results[] = new TestResult("Required extension '$required_extension' found", STATUS_OK);
            } else {
                $results[] = new TestResult("Extension '$required_extension' is required in order to run Faveo", STATUS_ERROR);
                $ok = false;
            } // if
        } // foreach
        // Check for eAccelerator
        if (extension_loaded('eAccelerator') && ini_get('eaccelerator.enable')) {
            $results[] = new TestResult('eAccelerator opcode cache enabled. <span class="details">eAccelerator opcode cache causes Faveo to crash. <a href="https://eaccelerator.net/wiki/Settings">Disable it</a> for folder where Faveo is installed, or use APC instead: <a href="http://www.php.net/apc">http://www.php.net/apc</a>.</span>', STATUS_ERROR);
            $ok = false;
        } // if
        // Check for XCache
        if (extension_loaded('XCache') && ini_get('xcache.cacher')) {
            $results[] = new TestResult('XCache opcode cache enabled. <span class="details">XCache opcode cache causes Faveo to crash. <a href="http://xcache.lighttpd.net/wiki/XcacheIni">Disable it</a> for folder where Faveo is installed, or use APC instead: <a href="http://www.php.net/apc">http://www.php.net/apc</a>.</span>', STATUS_ERROR);
            $ok = false;
        } // if

        $recommended_extensions = [
            'gd'    => 'GD is used for image manipulation. Without it, system is not able to create thumbnails for files or manage avatars, logos and project icons. Please refer to <a href="http://www.php.net/manual/en/image.installation.php">this</a> page for installation instructions',
            'iconv' => 'Iconv is used for character set conversion. Without it, system is a bit slower when converting different character set. Please refer to <a href="http://www.php.net/manual/en/iconv.installation.php">this</a> page for installation instructions',
            'ldap' => 'Recommended for Faveo pro versions. If you plan to access AD using LDAP you must install the extension to enable LDAP support in PHP.',
            'redis' => 'This extension provides client access to the Redis server. It is recommended as it allows system to use Redis server for caching data and use it as a queue driver for processing queued jobs.',
            'ionCube Loader' => 'Faveo pro versions have code files which are encoded using ionCube encoder for PHP. If you wish to run any pro version of Faveo on your server you must have ionCube loader installed on the server.',
        ];
        foreach ($recommended_extensions as $recommended_extension => $recommended_extension_desc) {
            if (extension_loaded($recommended_extension)) {
                $results[] = new TestResult("Recommended extension '$recommended_extension' found", STATUS_OK);
            } else {
                $results[] = new TestResult("Extension '$recommended_extension' was not found. <span class=\"details\">$recommended_extension_desc</span>", STATUS_WARNING);
            } // if
        } // foreach

        return $ok;
    } // validate_extensions

    /**
     * Validate Zend Engine compatibility mode.
     *
     * @param array $results
     */
    function validate_zend_compatibility_mode(&$results)
    {
        $ok = true;

        if (version_compare(PHP_VERSION, '5.0') >= 0) {
            if (ini_get('zend.ze1_compatibility_mode')) {
                $results[] = new TestResult('zend.ze1_compatibility_mode is set to On. This can cause some strange problems. It is strongly suggested to turn this value to Off (in your php.ini file)', STATUS_WARNING);
                $ok = false;
            } else {
                $results[] = new TestResult('zend.ze1_compatibility_mode is turned Off', STATUS_OK);
            } // if
        } // if

        return $ok;
    } // validate_zend_compatibility_mode
    /**
     * Convert filesize value from php.ini to bytes.
     *
     * Convert PHP config value (2M, 8M, 200K...) to bytes. This function was taken from PHP documentation. $val is string
     * value that need to be converted
     *
     * @param string $val
     *
     * @return int
     */
    function php_config_value_to_bytes($val)
    {
        $val = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        switch ($last) {
            // The 'G' modifier is available since PHP 5.1.0
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        } // if
        return (int) $val;
    } // php_config_value_to_bytes
    /**
     * Format filesize.
     *
     * @param string $value
     *
     * @return string
     */
    function format_file_size($value)
    {
        $data = [
            'TB' => 1099511627776,
            'GB' => 1073741824,
            'MB' => 1048576,
            'kb' => 1024,
        ];
        // commented because of integer overflow on 32bit sistems
        // http://php.net/manual/en/language.types.integer.php#language.types.integer.overflow
        // $value = (integer) $value;
        foreach ($data as $unit => $bytes) {
            $in_unit = $value / $bytes;
            if ($in_unit > 0.9) {
                return trim(trim(number_format($in_unit, 2), '0'), '.').$unit;
            } // if
        } // foreach
        return $value.'b';
    } // format_file_size
    /**
     * Return true if MySQL supports InnoDB storage engine.
     *
     * @param resource $link
     *
     * @return bool
     */
    function check_have_inno($link)
    {
        if ($result = mysql_query('SHOW ENGINES', $link)) {
            while ($engine = mysql_fetch_assoc($result)) {
                if (strtolower($engine['Engine']) == 'innodb' && in_array(strtolower($engine['Support']), ['yes', 'default'])) {
                    return true;
                } // if
            } // while
        } // if
        return true;
    } // check_have_inno

    /**
     * function to check if there are laravel required functions are disabled.
     */
    function checkDisabledFunctions(&$results)
    {
        $ok = true;
        $sets = explode(',', ini_get('disable_functions'));
        $required_functions = ['escapeshellarg'];
        // dd($required_functions,$sets);
        foreach ($sets as $key) {
            $key = trim($key);
            foreach ($required_functions as $value) {
                if ($key == $value) {
                    if (strpos(ini_get('disable_functions'), $key) !== false) {
                        $results[] = new TestResult("Function '$value' is required in order to run Faveo Helpdesk. Please check php.ini to enable this function or contact your server administrator", STATUS_ERROR);
                        $ok = false;
                    } else {
                        $results[] = new TestResult('All required functions found', STATUS_OK);
                    }
                }
            }
        }

        return $ok;
    }
    // ---------------------------------------------------
    //  Do the magic
    // ---------------------------------------------------
    $results = [];

    $php_ok = validate_php($results);
    $memory_ok = validate_memory_limit($results);
    $extensions_ok = validate_extensions($results);
    $module_ok = validate_apache_module($results);
    $required_functions = checkDisabledFunctions($results);
    $check_execution_time = checkMaxExecutiontime($results);
    // $compatibility_mode_ok = validate_zend_compatibility_mode($results);

    foreach ($results as $result) {
        echo '<br/><span class="'.$result->status.'">'.$result->status.'</span> &mdash; '.$result->message.'';
    } // foreach?>
						<!-- -->
						</p>
						
						<?php if ($php_ok && $memory_ok && $extensions_ok && $module_ok && $required_functions && $check_execution_time) {
        ?>
			<div class="woocommerce-message woocommerce-tracker" >
				<p id="pass">OK, this system can run Faveo</p>
				
			</div>
<?php
    } else {
        ?>
			<div class="woocommerce-message woocommerce-tracker " >
				<p id="fail">This system does not meet Faveo system requirements</p>
				</div>
		 <?php
    } ?>
						
			
						
						 <form action="step2.php" method="post">
						<div class="border-line">
								<p class="wc-setup-actions step">
										<a href="#" class="button button-large button-next" style="float: left">Previous</a>
									 
												<input type="submit" id="submitme" name="submit" class="button-primary button button-large button-next" value="Continue"  <?php if ($php_ok && $memory_ok && $extensions_ok && $module_ok && $required_functions) {
    } else {
        ?> disabled <?php
    } ?>
												
								</p>
						</div>
						</form>
						<br><span class="ok">Ok</span> — All Ok
						<br><span class="warning">Warning</span> — Not a deal breaker, but it's recommended to have this installed for some features to work
						<br><span class="error">Error</span> — Faveo HELPDESK require this feature and can't work without it

						<br>
						<br>


				</div>
		<p style="text-align: center;">Copyright © 2015 - <?php echo date('Y'); ?> · Ladybird Web Solution Pvt Ltd. All Rights Reserved. Powered by <a href="http://www.faveohelpdesk.com" target="_blank">Faveo</a>
				</p>

		</body>
	
</html>
<?php
    unset($_SESSION['check']);
} else {
    header('location: index.php');
}
?>