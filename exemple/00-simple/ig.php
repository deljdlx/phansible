<?php


ini_set('display_errors', 'on');


function httpQuery($url, $method='get', $content) {
    //$raw=http_build_query($data);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json; charset=UTF-8\r\nContent-Length: ".strlen($content)
                                    ."\r\nAccept: application/json; charset=UTF-8\r\nVERSION: 2\r\nX-IG-API-KEY: ".'86aceb44f1a5a003e7efba2fc0e426dc2037bb7a',
            'method'  => strtoupper($method),
            'content' => $content,
            'request_fulluri' => true
        ),
    );
    $context  = stream_context_create($options);


    $stream=fopen($url, 'r', false, $context);

    $headers=stream_get_meta_data($stream);

    print_r($headers);

    $content=stream_get_contents($stream);
    fclose($stream);

    //$headers=get_headers($url, true);

    /*
    $body=file_get_contents($url, false, $context);
    print_r($headers);
    return $body;
    */
}





$key='86aceb44f1a5a003e7efba2fc0e426dc2037bb7a';

// https://api.ig.com/gateway/deal/positions



echo httpQuery('https://api.ig.com/gateway/deal/session', 'POST', '{
"identifier": "elbiniou",
"password": "1664IsGood"
} ');





