<?php
require_once("connection/header.php");
if(isset($_POST['submit']))
{
?>
    <style>
        body{
            background-color:<?php echo $_POST["color"];?>;
        }
    </style>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        font-size: 2vh;
    }
    fieldset{
        margin: 30vh 15vw;
        max-width: 80vw;
    }
</style>
<body>
    <form action="" method="post">
        <fieldset style="display: flex; align-items: center;flex-direction: column;text-align: center;">
            <legend>
                Form
            </legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            
            <label for="email">Email:</label>
            <input type="email" id="" name="email">

            <label for="password" id="pw">Password:</label>
            <input type="Password" id="password" name="password">
            
            
            <input type="file">
            <input type="color" name="color" >
            <input type="submit" name="submit"></input>
        </fieldset>
    </form>

    <?php
    if(isset($_GET['Pasword']))
    {
        echo("hello hello");
    }
    ?>
</body>
<script>
    // x=prompt()
    // document.body.style.backgroundColor=x
</script>
</html>
