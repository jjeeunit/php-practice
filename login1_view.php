<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <form name = "login1_server" action="login1_server.php" method = "post">
        <h1>login</h1>
        <label>Id:</label>
        <input type="text" placeholder="ID" name="userid" value="">
        <label>pw:</label>
        <input type="password" placeholder="PW" name="pass1" value="">
        <button type="button" id = "btn">login</button>
    </form>
    <script>
        var btn = document.getElementById('btn');
        btn.onclick = function() {
            var str = document.getElementsByName('userid')[0].value,
                len = str.length,
                str2 = document.getElementsByName('pass1')[0].value,
                len2 = str2.length;
            if(len < 4 ){
                alert("아이디는 4자 이상입니다.");
                return false;
            }
            if(len2 < 8 ){
                alert("비밀번호는 8자 이상입니다.");
                return false;
            }
            /**********fetch 사용 */
            var frm = document.login1_server;
            var formData = new FormData(frm);
        
            fetch('./login1_server.php',{
            method:"POST",
            headers : new Headers(),
            body : formData
            })
            .then((data) => {
                if (data.err !== false) {
                    var test = data.text();
                    test.then(console.log);
                    alert(data.text());
                } else {
                    alert('로그인 성공');
                    location.href="login1_ajax.php";
                }
            })
            .catch(error=>console.log(error));
            
            
            // /******참고 */
            // var ajaxHeader = new Headers();
            // fetch('/super/main/newpick.ajax.php', {
            //     body : formData,
            //     method :'post',
            //     dataType : 'json',
            //     headers : ajaxHeader
            // }).then(function(response){
            //     if (response.ok) return response.json();
            //     else {
            //         alert('error');
            //     }
            // }).then(function(json) {
            //     if (json.err == true) {
            //         alert(json.msg)
            //     }else {
            //         alert('정상적으로 ' + act + ' 되었습니다.');
            //         location.reload();
            //     }
            // }).catch(function(error){
            //     alert('System Error');
            
            // });
            /**********아작스 사용*/
            // var frm = document.login1_server;
            
            // $.ajax({
            //     url:'./login1_server.php',
            //     type:'post',
            //     datetype:'json',
            //     data:{'userid':frm.userid.value, 'pass1':frm.pass1.value},
            //     success:function(res){
            //         var json = $.parseJSON(res);
                    
            //         if (json.err !== false) {
            //             alert(json.msg);
            //         } else {
            //             alert('로그인 성공');
            //             location.href="login1_ajax.php";
            //         }
            //     }
            // })
        }
    </script>
</body>
</html>