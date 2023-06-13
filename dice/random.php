<?
require("cfd.php");
if(isset($_POST)){    
    //change this URL to your read URL
    $ch = curl_init('https://tyberius.dev/at/wealdapi/move/read.php');

    $request = array(
        "jsonrpc" => "2.0",
        "method" => "generateDecimalFractions",
        "params" => array(
            "apiKey" => $API_KEY,
            "n" => $_POST["n"],
            "decimalPlaces" => 2,
            "replacement" => true,
            "pregeneratedRandomization" => null
        ),
        "id" => 1
    ); 
    //echo "<pre>". var_dump($request)."</pre>";
    $data_string = json_encode($request);
    
    //curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_URL, "https://tyberius.dev/at/wealdapi/move/read.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                   
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    $result = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    //decode into a PHP array
    echo $API_KEY;
}
?>