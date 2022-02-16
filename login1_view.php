<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
    function check_userid(){
        var str = document.getElementsByName('userid')[0].value;
        var len = str.length;
        var str2 = document.getElementsByName('pass1')[0].value;
        var len2 = str2.length;
        if(len < 4 ){
            alert("아이디는 4자 이상입니다.");
            return false;
        }
        if(len2 < 8 ){
            alert("비밀번호는 8자 이상입니다.");
            return false;
        }
        return true;
    }
    </script>
</head>
<body>
    <form name = "login1_server" action="login1_server.php" onsubmit="return check_userid()" method = "post">
        <h1>login</h1>
        <label>Id:</label>
        <input type="text" placeholder="ID" name="userid" value="">
        <label>pw:</label>
        <input type="password" placeholder="PW" name="pass1" value="">
        <button type="button" name = "btn">login</button>
    </form>
    <script>
    $(document).ready(function(){
        $.ajax({
            url:'/login1_server.php',
            type:'post',
            datetype:'json',
            data:{'userid':'id', 'pass1':'password'},
            success:function(res){
                res = $.parseJSON(res);
                console.log(res.id)
            }
        })
    })
    </script>
</body>
</html>