<?php
$url = "https://api.ipapi.is";

$one = curl_init($url);
curl_setopt($one, CURLOPT_RETURNTRANSFER, true);
$tow = curl_exec($one);
curl_close($one);
$data = json_decode($tow, true);

$ip = $data['ip'] ?? 'N/A';
$country = $data['location']['country'] ?? 'N/A';
$company_domain = $data['company']['domain'] ?? 'N/A';
$local_time = $data['location']['local_time'] ?? 'N/A';
$proxy = $data['is_proxy'] ?? 'N/A';
$vpn = $data['is_vpn'] ?? 'N/A';

$response = [
    'ip' => $ip,
    'country' => $country,
    'company_domain' => $company_domain,
    'local_time' => $local_time,
    'server' => (($vpn || $proxy === 1) ? '<p style="color:red;">Disconnection</p>' : '<p style="color:green;">Connection</p>')
];

echo json_encode($response);
?>
