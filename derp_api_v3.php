<?php
header('Content-Type: application/json; charset=utf-8');
$derplink = $_POST['link'];
$version = $_POST['version'];
$agent= 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36';

//if (!$derplink==null && $version==3) {
    
    $pos = strpos($derplink, 'derpibooru');
    
    if ($pos === false) {
        
        /*
                if (strpos($derplink, '&page=2') !== false) {
            exit;
        }*/
        
        $page = stristr($derplink, '&page=');
        
        
        $derplink = 'https://derpibooru.org/api/v1/json/search/images?key=5jit9sGAGzRezuu5hys1&q=first_seen_at.gt%3A3+days+ago+AND+oc:*+AND+solo+AND+safe+AND+NOT+*alcohol*';
        
        $derplink .= $page;
        
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_URL, $derplink);
    $result=curl_exec($ch);
    echo $result;

//}
//else {
  //  echo 'Таков путь.' ;
//}
    
?>
