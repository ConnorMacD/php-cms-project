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
        <?php if(in_array(2, $roles)):?>
            <h2>Editor Settings</h2>
            <ul>
                <li><?php echo anchor("panel/stylesheets/", "Edit Stylesheets")?></li>
                <li><?php echo anchor("panel/articles/", "Edit Articles")?></li>
                <li><?php echo anchor("panel/pages/", "Edit Pages")?></li>
                <li><?php echo anchor("panel/contentarea/", "Edit Content Areas")?></li>

            </ul>
        <?php endif ?>
        <?php if(in_array(3, $roles)):?>
            <h2>Administrator Settings</h2>
            <ul>
                <li><?php echo anchor("panel/users/", "Edit Users")?></li>
                <li><?php echo anchor("panel/roles/", "Edit User Roles")?></li>
            </ul>
        <?php endif ?>

        <?php echo anchor("panel/logout/", "Log Out") ?>
    </body>
</html>