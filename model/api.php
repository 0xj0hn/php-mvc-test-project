<?php


class ApiModel{
    public function get_corona_info(){
        header("Content-Type: application/json");
        $curl = curl_init(); //initializing curl engine
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/latest_stat_by_country.php?country=%3CREQUIRED%3E",
            CURLOPT_RETURNTRANSFER => true, //it returns the response instead of echoing out.
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [ //some specified headers.
                "X-RapidAPI-Host: coronavirus-monitor.p.rapidapi.com",
                "X-RapidAPI-Key: SIGN-UP-FOR-KEY" //you have to sign up for getting the token or the key.
            ],
        ]);

        $response = curl_exec($curl); //get response into $response
        $err = curl_error($curl); //get errors in $err var if it has errors :D

        curl_close($curl); //close and freeing the $curl var.

        //if $err wasn't empty then return $response otherwise echo the error out.
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
        /* to be honest this url is censored that's why if you
         * implement it in an iranian server, you cannot get access to it.
         */

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl); //destroying the curl value.

        if($err){
            return json_encode([
                "status" => "error",
                "message" => $err
            ]); //return if error occurs
        }else{
            return $response; //return if the result successfuly returned. 
        }
    }
    
}


?>
