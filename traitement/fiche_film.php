<?php
$recherche="man";
 
 $curl = curl_init();
$url = "http://www.omdbapi.com/?t=".$recherche."&apikey=26c135a9";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 
 $data = curl_exec($curl);

 if($data === false){
     
    echo 'Erreur Curl : ' . curl_error($curl);

 }else{
    
    $data = json_decode($data);
    echo $data->Poster;
}


curl_close($curl);