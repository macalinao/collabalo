<?php
/**
 * Collabalo
 *
 * Copyright 2010 Ian Macalinao
 * http://www.simplyian.com
 */
require_once "collabalo.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css" media="screen">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Collabalo</title>
    </head>
    <body>
        <div align="center">
            <h1>Welcome to Collabalo!!!</h1><br /><br />

            Unfortunately we are stupid. Now here are some things we'd like to debug and make sure are working at all times.<br /><br />

            <h2>Debug</h2>
            <table id="debug">
                <tr>
                    <th>Code</th>
                    <th>Result</th>
                </tr>
                <tr>
                    <td>$cbdb->get_var("SELECT name FROM users WHERE user_id = '1'");</td>
                    <td><?php echo $cbdb->get_var("SELECT user_name FROM users WHERE user_id = '1'"); ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>
