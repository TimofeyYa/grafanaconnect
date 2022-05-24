<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$grafana_srv_path = 'http://localhost:3000';
$grafana_api_key = 'eyJrIjoiUE5YMkl1MXB3QnAxenN5RldqUnRMOEFpcGFrR0g4Q2MiLCJuIjoidGVzdCIsImlkIjoxfQ==';

$ch = curl_init($grafana_srv_path);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $grafana_api_key"));

$img1_url = $grafana_srv_path."/render/d-solo/8SRhf8u7k/test?orgId=1&from=".(time()+24*60*17+170)."000&to=".(time()+24*58*18+165)."000&panelId=2&width=1000&height=500&tz=Asia%2FBarnaul&theme=light";

curl_setopt($ch, CURLOPT_URL,$img1_url);
$png1 = curl_exec($ch); // выполняем запрос curl для получения картинки

$handle = fopen("./321.png", "w");
fwrite($handle, $png1); # и нагло перезаписываем файл картинки прямо на сайте
fclose($handle);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="./321.png" alt="">
    <script>
    setTimeout(() => {
        window.location.reload();
    }, 1500);
</script>
</body>
</html>
