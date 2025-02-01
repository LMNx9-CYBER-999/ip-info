<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    $url = "https://ipinfo.io/widget/demo/" . urlencode($ip);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    if ($response) {
        $data = json_decode($response, true);
        $data['data']['Developer'] = "Limon Hossain";
        $data['data']['Channel'] = "@TEAM_LMNx9";
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(["Error" => "Failed to Get Info"]);
    }
} else {
    echo json_encode(["Error" => "No IP address provided"]);
}
?>
