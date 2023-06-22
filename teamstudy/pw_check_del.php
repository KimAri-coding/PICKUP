<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

$pw = $_POST['pw']; // POST 방식으로 비밀번호 가져오기
$idx = $_POST['idx'];
$com_num = $_POST['com_num'];

if ($pw == "") {
    echo "<script>alert('비밀번호를 입력하세요.');</script>";
    echo "<script>history.back();</script>";
    return;
}

$pwCheck = false;
$query = "SELECT * FROM board WHERE idx = '".$idx."'";
$result = $con->query($query);

while ($row = $result->fetch_assoc()) {
    if ($row['pw'] === $pw) {
        $pwCheck = true;
        break;
    }
}

if (!$pwCheck) {
    echo "<script>alert('비밀번호가 틀립니다!');</script>";
    echo "<script>history.back();</script>";
} else {
    // 글 삭제 쿼리
    $del_query = "DELETE FROM board WHERE idx = '".$idx."'";
    if ($con->query($del_query)) {
        // 글 삭제 성공 시 댓글 삭제 실행
        $del_comments_query = "DELETE FROM comment WHERE com_num = '".$com_num."'";
        if ($con->query($del_comments_query)) {
            echo "<script>alert('게시글과 댓글을 삭제하였습니다.');</script>";
        } else {
            echo "<script>alert('댓글 삭제 시 오류가 발생했습니다. 관리자에게 문의하세요.');</script>";
        }
        echo "<script>location.href='/teamstudy/board.php';</script>";
    } else {
        echo "<script>alert('글 삭제 시 오류가 발생했습니다. 관리자에게 문의하세요.');</script>";
        echo "<script>location.href='/teamstudy/board.php';</script>";
    }
}
?>