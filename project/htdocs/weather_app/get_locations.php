<?php
$location_name=$_POST["location1"];
// get current data
$url="http://api.openweathermap.org/data/2.5/weather?q=$location_name&appid=5bcd507d4ed38da76b9b0224ff3dcc6f";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
if($result['cod']==404)
{
	$msg_arr=array("err"=>404,"msg"=>"No data found. Try entering another location");
	echo json_encode($msg_arr);
	die();
}
$date_n=date('d M',$result['dt']);
$temp_n=round($result['main']['temp']-273.15);
$icon=$result['weather'][0]['icon'];
$location=$result['name'];

// get forecast data
$lat=$result['coord']['lat'];
$lon=$result['coord']['lon'];
$url="http://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lon&exclude=hourly,current,minutely,alerts&appid=df8c52eecfa4592c071ead7d4ddaf64f";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);

$day1= date('d M',$result['daily'][1]['dt']);
$day2= date('d M',$result['daily'][2]['dt']);
$day3= date('d M',$result['daily'][3]['dt']);
$day4= date('d M',$result['daily'][4]['dt']);
$day5= date('d M',$result['daily'][5]['dt']);
$day6= date('d M',$result['daily'][6]['dt']);
$tempd1=round($result['daily'][1]['temp']['day']-273.15);
$tempd2=round($result['daily'][2]['temp']['day']-273.15);
$tempd3=round($result['daily'][3]['temp']['day']-273.15);
$tempd4=round($result['daily'][4]['temp']['day']-273.15);
$tempd5=round($result['daily'][5]['temp']['day']-273.15);
$tempd6=round($result['daily'][6]['temp']['day']-273.15);
$tempn1=round($result['daily'][1]['temp']['night']-273.15);
$tempn2=round($result['daily'][2]['temp']['night']-273.15);
$tempn3=round($result['daily'][3]['temp']['night']-273.15);
$tempn4=round($result['daily'][4]['temp']['night']-273.15);
$tempn5=round($result['daily'][5]['temp']['night']-273.15);
$tempn6=round($result['daily'][6]['temp']['night']-273.15);

// fetch  image icon from local database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weather_img";

$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT src FROM img_src where icon_id='$icon'";
$result_db = $conn->query($sql);

if ($result_db->num_rows > 0) {
  // output data of each row
  while($row = $result_db->fetch_assoc()) {
    $img_source=$row["src"];
  }
} else {
  $img_source="sky_bg.jpg";
}


// send data
$result=array("err"=>0,"dt" => $date_n,"temp"=>$temp_n,"location" =>$location,"img"=>$img_source,"day1"=>$day1,"day2"=>$day2,"day3"=>$day3,"day4"=>$day4,"day5"=>$day5,"day6"=>$day6,"tempd1"=>$tempd1,"tempd2"=>$tempd2,"tempd3"=>$tempd3,"tempd4"=>$tempd4,"tempd5"=>$tempd5,"tempd6"=>$tempd6,"tempn1"=>$tempn1,"tempn2"=>$tempn2,"tempn3"=>$tempn3,"tempn4"=>$tempn4,"tempn5"=>$tempn5,"tempn6"=>$tempn6);
$result=json_encode($result);
echo $result;
?>