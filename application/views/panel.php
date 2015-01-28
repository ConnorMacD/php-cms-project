<?php
/**
 * Created by PhpStorm.
 * User: Connor
 * Date: 1/26/2015
 * Time: 5:14 PM
 */ ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Back-end Panel</title>
    </head>

    <body>
        <header>
            <h1>Back-end Panel</h1>
        </header>


        <!--Editor roles? Link those pages here-->
        <?php if(in_array(2, $data['roles'])):?>
            <h2>Editor Settings</h2>
            <ul>
                <li><?php echo anchor("panel/spreadsheets/", "Edit Spreadsheets")?></li>
            </ul>
        <?php endif ?>
    </body>
</html>