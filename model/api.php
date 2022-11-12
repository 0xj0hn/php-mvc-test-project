<?php


class ApiModel{
    public function get_corona_info(){
        header("Content-Type: application/json");
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/latest_stat_by_country.php?country=%3CREQUIRED%3E",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coronavirus-monitor.p.rapidapi.com",
                "X-RapidAPI-Key: SIGN-UP-FOR-KEY"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function get_dog_info(){
        header("Content-Type: application/json");
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => "https://api.apify.com/v2/key-value-stores/moxA3Q0aZh5LosewB/records/LATEST?disableRedirect=true",
                CURLOPT_ENCODING => "",
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
            ]
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if($err){
            return json_encode([
                "status" => "error",
                "message" => $err
            ]);
        }else{
            return $response;
        }
    }
    
}


?>
