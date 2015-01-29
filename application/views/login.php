<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <header>
        <h1>Please Login</h1>
    </header>

    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin'); ?>
        <label for="">Username:</label>
        <input type="text" size="45" id="username" name="username"/>
        <br/>
        <label for="">Password:</label>
        <input type="password" size="45" id="password" name="password"/>
        <br/>
        <input type="submit" value="Login"/>
    </form>
</body>

</html>