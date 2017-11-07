<?php
$source_url = "http://www.myreviewreporter.com/"; //This could be anything URL source including stripslashes($_POST['url'])

$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
/*echo $url; 
echo "<br />";*/

$xml = file_get_contents($url);
/*echo "<pre />";
print_r($xml);
echo "<br />";*/

$xml = simplexml_load_string($xml);
/*echo "<pre />";
print_r($xml);*/

$shares = $xml->link_stat->share_count;
$likes = $xml->link_stat->like_count;
echo $likes ;
$comments = $xml->link_stat->comment_count;
$total = $xml->link_stat->total_count;
$max = max($shares,$likes,$comments);

?>


<!---------------------------------------------------------------------------------------------------------------------->

<?php
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);

$source_url = "http://www.myreviewreporter.com/"; //This could be anything URL source including stripslashes($_POST['url'])

$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);

$xml = file_get_contents($url , false , $context);

$xml = simplexml_load_string($xml);
echo "sasasa";
$shares = $xml->link_stat->share_count;
$likes = $xml->link_stat->like_count;

print($likes)  ;
$comments = $xml->link_stat->comment_count;
$total = $xml->link_stat->total_count;
$max = max($shares,$likes,$comments);


?>


<!---------------------------------------------------------------------------------------------------------------------->

<?php
$source_url = "http://www.myreviewreporter.com/?page=home"; //This could be anything URL source including stripslashes($_POST['url'])

$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
$xml = file_get_contents($url);
$xml = simplexml_load_string($xml);
$shares = $xml->link_stat->share_count;
$likes = $xml->link_stat->like_count;

print($likes)  ;
$comments = $xml->link_stat->comment_count;
$total = $xml->link_stat->total_count;
$max = max($shares,$likes,$comments);
?>


<!---------------------------------------------------------------------------------------------------------------------->


<?php

$profileurl = "https://graph.facebook.com/http://www.myreviewreporter.com/?page=home";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $profileurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    // To see output print output
    curl_close($ch);

    $output = str_replace("{","",$output);
    $output = str_replace("}","",$output);
    $temp_array = explode(",",$output);

    for($i = 0; $i < count($temp_array); $i++)
    {
      $temp_arr2 = explode(":",$temp_array[$i]);
      $key = str_replace('"','',$temp_arr2[0]);
      $val = str_replace('"','',$temp_arr2[1]);
      if($key == "name")
        $profilename = $val;

    }
	
    $profilename = addslashes($profilename);
?>