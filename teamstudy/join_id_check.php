<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');

		//세션 시작
		session_start();

    //데이터 ajax리턴할 변수
      $num  =0;
      $num1 =1;
      $num2 =2;

    $id = $_POST['userid'];  
    
   if (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $id)) {
      echo $num2; // 아이디 형식 오류
      return;
  } else {
      // 데이터베이스 연결 확인
      if ($con) {
          $id_check = mysqli_query($con, "SELECT * FROM member WHERE id='$id'");
          $row_count = mysqli_num_rows($id_check);

          if ($row_count > 0) {
              echo $num1; // 아이디 중복
              return;
          } else {
              echo $num; // 사용 가능한 아이디
          }
      } else {
          echo $num1; // 데이터베이스 연결 오류
          return;
      }
  }

?>