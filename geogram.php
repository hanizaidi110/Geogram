<?php
if(isset($_GET['location'])){
$location=$_GET['location'];
$map_url='https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location);

$map_json=file_get_contents($map_url);
$map_array=json_decode($map_json,true);
 
$lat=$map_array['results'][0]['geometry']['location']['lat'];
$lan=$map_array['results'][0]['geometry']['location']['lng'];
 
$instagram_url='https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lan.'&client_id=67a50b268dda4a6d8881c1404c9687f6';
 
$instagram_json=file_get_contents($instagram_url); 
$instagram_array=json_decode($instagram_json,true); 
}
 ?>

<html>
<head><title> GEOGRAM </title>
</head>
<body>
<form action="">
<input type='text' name='location'/>
<button type='submit'>Submit</button>
<br/>
<?php
if(isset($instagram_array)){
foreach($instagram_array['data'] as $image){
echo '<img src="'.$image['images']['low_resolution']['url'].'"alt=""/>'.'<br/>';

}}
?>
</form>
</body>