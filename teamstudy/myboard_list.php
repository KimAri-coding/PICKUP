<?php
session_start();

// 데이터베이스 연결
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con,'SET NAMES utf8');

if ($con->connect_error) {
    die("데이터베이스 연결 실패: " . $con->connect_error);
}

// 세션에서 로그인한 사용자의 아이디 가져오기
$userId = $_SESSION['user_id'];

// 탭에 따라서 정보 조회 및 JSON 응답
if (isset($_GET['tabName'])) { // GET 매개변수가 있는지 확인

    if ($_GET['tabName'] === 'board_list') {
        $sql = "SELECT * FROM board WHERE writer = '$userId'";
        $result = $con->query($sql);
        $boardData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $boardData[] = $row;
            }
        }
        
        // 데이터베이스 연결 종료
        $con->close();

        // JSON 형식으로 응답
        header('Content-Type: application/json');
        echo json_encode($boardData);
    } elseif ($_GET['tabName'] === 'comment_list') {
        $sql = "SELECT * FROM comment WHERE post_id = '$userId'";
        $result = $con->query($sql);
        $commentData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentData[] = $row;
            }
        }

        // 데이터베이스 연결 종료
        $con->close();

        // JSON 형식으로 응답
        header('Content-Type: application/json');
        echo json_encode($commentData);
    } else {
        // 잘못된 탭 이름이 전달된 경우에 대한 처리
        echo "잘못된 탭 이름입니다.";
    }

} else {
    // 탭 이름이 전달되지 않은 경우에 대한 처리
    echo "탭 이름이 전달되지 않았습니다.";
}
?>
