<?

// get ip address
$ip_address = "unknown";
$ip_address = $_SERVER['REMOTE_ADDR'];


// get language
$language = "unknown";
$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);


// get operating system
$operating_system = "unknown";
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$op_sys_array = array(
  '/windows nt 10/i'      =>  'Windows 10',
  '/windows nt 6.3/i'     =>  'Windows 8.1',
  '/windows nt 6.2/i'     =>  'Windows 8',
  '/windows nt 6.1/i'     =>  'Windows 7',
  '/windows nt 6.0/i'     =>  'Windows Vista',
  '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
  '/windows nt 5.1/i'     =>  'Windows XP',
  '/windows xp/i'         =>  'Windows XP',
  '/windows nt 5.0/i'     =>  'Windows 2000',
  '/windows me/i'         =>  'Windows ME',
  '/win98/i'              =>  'Windows 98',
  '/win95/i'              =>  'Windows 95',
  '/win16/i'              =>  'Windows 3.11',
  '/macintosh|mac os x/i' =>  'Mac OS X',
  '/mac_powerpc/i'        =>  'Mac OS 9',
  '/linux/i'              =>  'Linux',
  '/ubuntu/i'             =>  'Ubuntu',
  '/iphone/i'             =>  'iPhone',
  '/ipod/i'               =>  'iPod',
  '/ipad/i'               =>  'iPad',
  '/android/i'            =>  'Android',
  '/blackberry/i'         =>  'BlackBerry',
  '/webos/i'              =>  'Mobile'
);

foreach ($op_sys_array as $key => $value) { 
  if (preg_match($key, $user_agent)) {
    $operating_system = $value;
  }
}   


// bring it all together and output
$header_array = array("ipaddress" => "$ip_address","language" => "$language","software" => "$operating_system");

echo json_encode($header_array);


?>