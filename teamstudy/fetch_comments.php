<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_set_charset($con, 'utf8');

if (isset($_GET['com_num'])) {
  $comNum = $_GET['com_num'];

  $statement = mysqli_prepare($con, "SELECT post_id, content FROM comment WHERE com_num = ?");
  mysqli_stmt_bind_param($statement, "s", $comNum);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

  $comments = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $content = $row['content'];

    // com_num 값을 기준으로 댓글을 저장
    if (isset($comments[$comNum])) {
      $comments[$comNum][] = array(
        'post_id' => $post_id,
        'content' => $content
      );
    } else {
      $comments[$comNum] = array(
        array(
          'post_id' => $post_id,
          'content' => $content
        )
      );
    }
  }

  mysqli_stmt_close($statement);
  mysqli_close($con);

  echo json_encode($comments);
} else {
  echo json_encode(array('error' => 'Invalid request'));
}
?>
