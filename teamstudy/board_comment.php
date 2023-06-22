<?php
$con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

if (isset($_POST['content']) && isset($_POST['post_id']) && isset($_POST['com_num'])) {
    $content = $_POST['content'];
    $postId = $_POST['post_id'];
    $comNum = $_POST['com_num']; 
    $title = $_POST['post_title'];

    // 글 제목을 가져오는 쿼리
    $query = "SELECT title FROM board WHERE com_num = ?";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, "i", $comNum);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $title);
    mysqli_stmt_fetch($statement);
    mysqli_stmt_close($statement);

    // 댓글 삽입
    $statement = mysqli_prepare($con, "INSERT INTO comment (post_id, content, date, post_title, com_num) VALUES (?, ?, now(),?,?)"); 
    mysqli_stmt_bind_param($statement, "sssi", $postId, $content, $title, $comNum); 

    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement);
        mysqli_close($con);
        echo "success";
        exit();
    } else {
        echo "댓글 등록 실패";
        exit();
    }
} else {
    echo "Invalid request";
}
?>
