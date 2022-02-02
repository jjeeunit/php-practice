<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

if(isset($_GET['page'])) $page = $_GET['page'];
else $page = 1;

$db = new mysqli('localhost','root','whwpdms','je');
$sql = "select * from wpdms";
$result = mysqli_query($db, $sql);

$total_record = mysqli_num_rows($result); //게시판 총 레코드 수(20개)
$list = 5; // 한 페이지에 보여줄 개수
$block_cnt = 3;  //블록당 보여줄 페이지 개수
$block_num = ceil($page / $block_cnt); //현재 블록 페이지 
$block_start = (($block_num - 1) * $block_cnt + 1); //블록의 시작번호
$block_end = $block_start + $block_cnt - 1; //블록 마지막 번호
$page_start = ($page - 1) * $list; // db에서 보여줄 자료순번
//total
$total_page = ceil($total_record / $list); //페이징한 페이지 수 구하기
if($block_end > $total_page){ //마지막번호는 페이징 수 
    $block_end = $total_page;
}
$total_block = ceil($total_page / $block_cnt); //블록 총 개수

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원리스트</title>
</head>
<body>
    <h2>회원리스트</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>no</th>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>휴대폰번호</th>
                    <th>-</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql2 = "select * from wpdms w inner join wpdms_detail d on w.naming = d.naming LIMIT $page_start, $list";    
                $result = mysqli_query($db, $sql2);
                    while($tmp = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $tmp['no']?></td>
                        <td><?php echo $tmp['naming']?></td>
                        <td><?php echo $tmp['userid']?></td>
                        <td><?php echo $tmp['phonenum']?></td>
                        <td><button onclick="location.href='modify_view.php?no=<?=$tmp['no']?>'">수정</button></td>
                        <td><button onclick="location.href='delete.php?no=<?=$tmp['no']?>'">삭제</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>  
        <div id="page_num">
            <?php 
                if($page <= 1){
                    
                }else{
                    echo "<a href ='list.php?page=1'>처음</a>";
                }
                if($page <= 1){

                }else{
                    $pre = $page -1;
                    echo "<a href='list.php?page= $pre'>이전</a>";
                }
                for($i = $block_start; $i <= $block_end; $i++){
                    if($page == $i){
                        echo "<b>$i</b>";
                    }else{
                        echo "<a href='list.php?page= $i'>$i</a>";
                    }
                }
                if($page >= $total_page){

                }else{
                    $next = $page +1;
                    echo "<a href ='list.php?page= $next'>다음</a>";
                }
                if($page >= $total_page){

                }else{
                    echo "<a href='list.php?page= $total_page'>마지막</a>";
                }
            ?>
        </div>   
</body>
</html>