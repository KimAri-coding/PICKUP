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

    // 탭에 따라서 예약정보 조회 및 JSON 응답
    if ($_GET['tabName'] === 'book-list') {
        // 1인석 예약정보 조회
        $sql = "SELECT * FROM book WHERE id = '$userId'";
        $result = $con->query($sql);
        $bookingData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // 조회한 예약정보를 배열에 추가
                $bookingData[] = $row;
            }
        }
    } else if ($_GET['tabName'] === 'books-list') {
        // 회의실 예약정보 조회
        $sql = "SELECT * FROM books WHERE id = '$userId'";
        $result = $con->query($sql);
        $bookingData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // 조회한 예약정보를 배열에 추가
                $bookingData[] = $row;
            }
        }

    } else if ($_GET['tabName'] === 'together-list') {
        // 함께해요 예약정보 조회
        $sql = "SELECT * FROM together WHERE id = '$userId'";
        $result = $con->query($sql);
        $bookingData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // 조회한 예약정보를 배열에 추가
                $bookingData[] = $row;
            }
        }

    } else if ($_GET['tabName'] === 'community-list') {
        // 커뮤니티 예약정보 조회
        $sql = "SELECT * FROM community WHERE id = '$userId'";
        $result = $con->query($sql);
        $bookingData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // 조회한 예약정보를 배열에 추가
                $bookingData[] = $row;
            }
        }
    }

    // 데이터베이스 연결 종료
    $con->close();

    // JSON 형식으로 응답
    header('Content-Type: application/json');
    echo json_encode($bookingData);
?>