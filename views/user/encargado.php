<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>local</title>
</head>
<body>
    <h1>Encargado de empaque</h1>
     <?php echo session::getValue('id');?><br>
    <?php echo session::getValue('nom');?><br>
    <?php echo session::getValue('ap');?><br>
    <?php echo session::getValue('am');?><br>
    <?php echo session::getValue('fono');?><br>
    <?php echo session::getValue('dir');?><br>
    <?php echo session::getValue('emi');?><br>
    <a href="<?php echo URL;?>User/matar">matar la session</a>
</body>
</html>