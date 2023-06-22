<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');

    $idx = $_GET['idx'];    
	
    $del_sql = "DELETE FROM board WHERE idx='$idx';";

    if ($con->query($del_sql)) {
        echo "<script>alert('정상적으로 삭제되었습니다.')</script>";
        echo "<script>location.href='/teamstudy/board.php';</script>";
    } else {
        echo "<script>alert('삭제 시 오류가 발생했습니다. 관리자에게 문의해주세요.')</script>";	   
        echo "<script>location.href='/teamstudy/board.php';</script>";
    }
?>
