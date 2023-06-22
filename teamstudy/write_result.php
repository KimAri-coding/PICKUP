<?php
session_start(); // 세션 시작

    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

$title = $_POST['title'];
$writer = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$content = $_POST['content'];
$pw = $_POST['pw'];
$lo_post = isset($_POST['lockpost']) ? '1' : '0';
$hit = 0;

if (!$title) {
    echo "<script>alert('제목을 입력하시오');</script>";
    echo("<script>history.back();</script>");
    return;
}
if (!$content) {
    echo "<script>alert('내용을 입력하시오');</script>";
    echo("<script>history.back();</script>");
    return;
}
if (!$pw) {
    echo "<script>alert('비밀번호를 입력하시오');</script>";
    echo("<script>history.back();</script>");
    return;
}

// 최대 com_num 값을 가져옴
$selectSql = "SELECT MAX(com_num) AS max_com_num FROM board";
$result = mysqli_query($con, $selectSql);
$row = mysqli_fetch_assoc($result);
$maxComNum = $row['max_com_num'];

// 새로운 게시물의 com_num 값을 설정
$com_num = $maxComNum + 1;

$currentDate = date('Y-m-d');

// 파일을 저장할 디렉토리 생성
if (!is_dir('uploads/')) {
    mkdir('uploads/');
}

$filePath = '';

// 파일 처리 로직 추가
if (isset($_FILES['b_file'])) {
    $file = $_FILES['b_file'];

    // 파일을 업로드했을 때만 처리합니다.
    if ($file['name']) {
        // 필요한 검증 및 처리 로직을 수행합니다.

        // 파일을 저장할 경로 설정
        $targetPath = 'uploads/' . $file['name'];

        // 파일 이동
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $filePath = $targetPath;
        } else {
            echo "<script>alert('파일 업로드 실패');</script>";
            echo("<script>history.back();</script>");
            return;
        }
    }
}

$statement = mysqli_prepare($con, "INSERT INTO board (title, writer, content, hit, date, pw, lo_post, com_num, file) VALUES (?,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($statement, "sssssssss", $title, $writer, $content, $hit, $currentDate, $pw, $lo_post, $com_num, $filePath);
mysqli_stmt_execute($statement);

echo "<script>alert('글등록완료!');</script>";
echo("<script>location.href='./board.php';</script>");
?>
