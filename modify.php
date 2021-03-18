<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更改檔案名稱</title>
</head>

<body>
    <form name="form1" method="get" action="modify.php">
        舊檔案名稱
        <input type="text" name="old" maxlength="50" size="50" value="<?php echo $_GET['modify']; ?>"><br>
        新檔案名稱
        <input type="text" name="new" maxlength="50" size="50">
        <p></p>
        <input type="submit" value="更改檔案名稱">
        <input type="reset">
    </form>

</body>

</html>

<?php

$old = './upload/' . $_GET['old'];

$new = './upload/' . $_GET['new'];

rename($old, $new);


echo "<a href=readlist.php>回到檔案上傳區</a>"





?>