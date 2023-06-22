<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');
	//세션 데이터에 접근하기 위해 세션 시작
	if (!session_id()) {
		session_start();
	}

    $id = $_POST['id'];
    $pw = $_POST['pw'];
	$pw_r = $_POST['pw_r'];

	if(!$id)
	{
		echo "<script>alert('아이디를 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
	if(!$pw)
	{
		echo "<script>alert('비밀번호를 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
	if(!$pw_r)
	{
		echo "<script>alert('비밀번호확인을 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
	if($pw !=$pw_r)
	{
		echo "<script>alert('비밀번호가 서로 다릅니다!');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}

	$num = preg_match('/[0-9]/u', $id);
	$eng = preg_match('/[a-z]/u', $id);
  
	if(strlen($id) < 6 || strlen($id) > 12)
	{        
		echo "<script>alert('아이디를 확인해주세요.');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
 
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
 
    if(strlen($pw) < 8 || strlen($pw) > 14)
    {        
		echo "<script>alert('비밀번호를 확인해주세요.');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
    }
 
    if(preg_match("/\s/u", $pw) == true)
    {        
		echo "<script>alert('비밀번호를 확인해주세요.');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {        
		echo "<script>alert('비밀번호를 확인해주세요.');</script>"; 
        echo("<script>history.back();</script>"); 
		return;
    }
	

    $name = $_POST['name'];
    $hp = $_POST['hp'];
    $email_id = $_POST['email_id'];
	$email_domain = $_POST['email_domain'];

	$email = $email_id . "@" . $email_domain;
	$role = "user";

	if(!$name)
	{
		echo "<script>alert('이름을 입력하시오');</script>"; 
		echo("<script>history.back();</script>");
		return; 
	}
	if(!$hp)
	{
		echo "<script>alert('연락처를 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}
	if(!$email_id || !$email_domain)
	{
		echo "<script>alert('이메일을 입력하시오');</script>"; 
		echo("<script>history.back();</script>"); 
		return;
	}

		$id_check = mysqli_query($con, "SELECT * FROM member WHERE id='$id'");
		$row_count = mysqli_num_rows($id_check);

		$id_check = $id_check->fetch_array();
		if($row_count > 0){
			echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
		}else{
    $statement = mysqli_prepare($con, "INSERT INTO member VALUES (null,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssssss", $id, $pw, $name, $hp, $email, $role);
    mysqli_stmt_execute($statement);

    echo "<script>alert('회원가입완료!');</script>"; 
    echo("<script>location.href='./join_ok.php';</script>"); }
?> 

