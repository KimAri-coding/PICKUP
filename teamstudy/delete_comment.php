<?php
    session_start();

        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con, 'SET NAMES utf8');

    $commentId = $_POST['post_id']; 
    $content = $_POST['content'];
    $comNum = $_POST['com_num'];

    // 값 확인
    echo "post_id: " . $commentId . "<br>";
    echo "content: " . $content . "<br>";
    echo "com_num: " . $comNum . "<br>";
  
    $del_sql = "DELETE FROM comment WHERE post_id = ? AND content = ? AND com_num = ?";
    $stmt = mysqli_prepare($con, $del_sql);
    mysqli_stmt_bind_param($stmt, "ssi", $commentId, $content, $comNum);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('댓글이 정상적으로 삭제되었습니다.')</script>";
        echo "<script>history.back();</script>";
    } else {
        echo "<script>alert('삭제 시 오류가 발생했습니다. 관리자에게 문의해주세요.')</script>";
        echo "<script>history.back();</script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>
