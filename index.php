<?php

	$profileurl = "http://graph.facebook.com/http://www.myreviewreporter.com/?page=home";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $profileurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

   echo "output=".$output;
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
	  echo "<br /><br /><br />". $key;
      if($key == "shares")
	  {
        $count = $val;
		echo "<br /><br /><br />";
	  	echo $count;
	  }
    }
		
    // $profilename = addslashes($profilename);
	
?>