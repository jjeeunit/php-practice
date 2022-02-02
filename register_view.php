<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <form action="register_server.php" method = "post">
      <label for="naming">이름: </label><input type="text" name="naming" id="naming">
      <label for="userid">아이디: </label><input type="text" name="userid" id="userid">
      <label for="password">비밀번호: </label><input type="text" name="pass1" id="pass1">
      <label for="password">비밀번호 확인: </label><input type="text" name="pass2" id="pass2">
      <label for="phonenum">휴대폰 번호: </label><input type="text" name="phonenum" id="phonenum">
      <button type="submit">회원가입</button>
    </form>
</body>
</html>