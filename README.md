# Faveo Probe

<br><img src="https://travis-ci.org/ladybirdweb/faveo-probe.svg?branch=master">&nbsp;<img src="https://img.shields.io/badge/License-OSL-blue.svg">&nbsp;<a href="https://styleci.io/repos/51975719/shield" target="_blank"><img src="https://styleci.io/repos/51975719/shield" alt="StyleCI"></a></br>

Use Faveo Probe script to check if your system can run [Faveo](https://www.faveohelpdesk.com) or not. 

Prerequisite:

Before you run this test following components have to be installed on your server

1. Web Server: Apache or IIS or Nginx
2. PHP Version: 5.5+
3. Database: MySQL(5.0+) or Postgres or SQLite or SQL Server
4. Pretty URLs or Search Engine Friendly URL's have to be enabled in your web server configuration

Instructions:

1. Download latest Faveo Probe from GitHub, 
2. Open ``index.php`` in your browser, 
3. Script will run the Environment test and show you the results, 
4. Click continue to run Database test, Script will run the test and show you the results.

Each test can have one of the three outputs:

1. <span style="color: green">**Ok** (green)</span> - requirement is met.
2. <span style="color: orange">**Warning** (orange)</span> - test did not pass, but Faveo does not require that environment option to run. Warnings are usually thrown in case of missing extensions that are optional, but good to have, or in cases in early warning about deprecated functionality.
3. <span style="color: red">**Error** (red)</span> - requirement is not met and you will not be able to run Faveo until you reconfigure your environment to support it. Errors are thrown in case of missing extensions, or environment settings that will break Faveo (like some unsupported opcode cache extensions).

Faveo probe is designed & developed by <a href="http://www.ladybirdweb.com" target="_blank">Ladybird Web Solution Pvt Ltd</a>, and launched in February 2016.

That's it. If you have any questions or need our assistance, please get in touch: [http://www.faveohelpdesk.com/contact-us/](http://www.faveohelpdesk.com/contact-us/).
