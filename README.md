# Faveo Probe

Use ``probe.php`` script to check if your system can run [Faveo](https://www.faveohelpdesk.com) or not. 

Instructions:

1. Download latest ``probe.php`` from GitHub, 
2. Open ``probe.php`` using your favorite text editor and set database connection parameters. ``DB_HOST`` is your MySQL hostname, ``DB_USER`` is MySQL account that you will be useding to connect to the server, ``DB_PASS`` is account password, and ``DB_NAME`` is the name of database that you plan to use, 
3. Upload it to the server where you plan to host Faveo, 
4. Visit ``probe.php`` using your browser. Script will run the test and show you the results.

Each test can have one of the three outputs:

1. <span style="color: green">**OK** (green)</span> - requirement is met.
2. <span style="color: orange">**Warning** (orange)</span> - test did not pass, but Faveo does not require that environment option to run. Warnings are usually throw in case of missing extensions that are optional, but good to have, or in cases in early warning about deprecated functionality.
3. <span style="color: red">**Error** (red)</span> - requirement is not met and you will not be able to run Faveo until you reconfigure your environment to support it. Errors are throw in case of missing extensions, or environment settings that will break Faveo (like some unsupported opcode cache extensions).

That's it. If you have any questions or need our assistance, please get in touch: [http://www.faveohelpdesk.com/contact-us/](http://www.faveohelpdesk.com/contact-us/).
