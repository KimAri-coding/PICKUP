<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

$date = isset($_GET['date']) ? $_GET['date'] : '';

if (!empty($date)) {
    // 캘린더에서 선택한 날짜값을 기준으로 예약된 좌석, 입실시간, 퇴실시간 가져오기
    $query = "SELECT st_time, end_time, seat FROM book WHERE date = '". mysqli_real_escape_string($con, $date) ."'";
    $result = mysqli_query($con, $query);

    $reservationData = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $seat = $row['seat'];
            $st_time = $row['st_time'];
            $end_time = $row['end_time'];

            // 좌석이 이미 배열에 존재하는 경우, 중복 예약이므로 배열에 추가합니다.
            if (isset($reservationData[$seat])) {
                $reservationData[$seat][] = array(
                    'st_time' => $st_time,
                    'end_time' => $end_time
                );
            } else {
                // 좌석이 처음 예약된 경우, 배열에 새로운 항목으로 저장합니다.
                $reservationData[$seat] = array(
                    array(
                        'st_time' => $st_time,
                        'end_time' => $end_time
                    )
                );
            }
        }
    }

    // JSON 형식으로 결과 반환
    echo json_encode($reservationData);
} else {
    echo "날짜가 정확히 전달되지 않았습니다.";
}
?>