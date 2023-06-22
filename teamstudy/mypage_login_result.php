<?php
    session_start();
    
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');
	//세션 시작


    $cookieName = "LoginUser";
    $id = $_POST['id'];
    $pw = $_POST['pw'];
	$loginCheck=false; 

    $query = "select * from member where id = '".$id."' and pw='".$pw."'";
    $result = $con->query($query);

    while($row = $result->fetch_assoc())
     {
        $loginCheck=true; 
		
        $_SESSION['user_name'] = $row['name'];

		//세션 변수 등록
		$_SESSION['login_check'] = "true";		

        if (isset($_POST["auto_login"]) && $_POST["auto_login"] === "on") {
            // 쿠키에 사용자 정보 저장
            setcookie($cookieName, $id, time() + (86400 * 30), "/");
        } 
    }


     if($loginCheck == true)
     {
		
		$_SESSION['user_id'] = $id; 
        echo("<script>location.href='./mypage.php';</script>"); 
        echo(""); 
       
     }
     else{
        echo "<script>alert('아이디 또는 비밀번호가 틀립니다!');</script>"; 
        echo("<script>history.back();</script>"); 
     }

     
?> 