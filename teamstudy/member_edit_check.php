<?php
    session_start();

        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con, 'SET NAMES utf8');
    // 세션 시작

    $id = $_SESSION['user_id'];
    $pw = $_POST['pw'];

    $query = "SELECT * FROM member WHERE id = '".$id."'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['pw'];

        if ($pw === $stored_password) {
            // 비밀번호가 일치하는 경우
            header("Location: member_edit_page.php"); // 개인정보 수정 페이지로 이동
            exit();
        } else {
            $error_message = "비밀번호가 일치하지 않습니다.";
            $_SESSION['error_message'] = $error_message;
            header("Location: member_edit_intro.php"); // 에러 메시지가 있는 페이지로 이동
            exit();
        }
    } else {
        $error_message = "사용자 정보를 찾을 수 없습니다.";
        $_SESSION['error_message'] = $error_message;
        header("Location: member_edit_intro.php"); // 에러 메시지가 있는 페이지로 이동
        exit();
    }
?>
