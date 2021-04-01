<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊頁面</title>
</head>

<body>
    <form action="addmember.php" method="POST" name="form1" enctype="multipart/form-data">
        <p>請輸入會員資料:</p>
        <p>
            登入帳號:<input type="text" name="id" maxlength="20" size="20" required><br>
            登入密碼<input type="password" name="password" maxlength="20" size="20"><br>
        <p></p>
        會員姓名:<input type="text" name="name" maxlength="20" size="20"><br>
        會員電話:<input type="text" name="tel" maxlength="20" size="20"><br>
        會員住址:<input type="text" name="address" maxlength="20" size="20"><br>
        會員照片:<input type="file" name="gif" maxlength="20" size="20"><br>
        <p></p>
        <input type="submit" value="註冊">
        <input type="reset">
        </p>
    </form>


</body>

</html>