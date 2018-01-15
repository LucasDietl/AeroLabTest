<?php
function getUser(){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://aerolab-challenge.now.sh/user/me");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA"
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function getProducts(){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://aerolab-challenge.now.sh/products");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA"
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    return $response;

}

function getProductsAsc(){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://aerolab-challenge.now.sh/products");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA"
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    //return json_decode($response, true);

    function cmp($a, $b)
    {
        if ($a['cost'] == $b['cost']) {
            return 0;
        }
        return ($a['cost'] < $b['cost']) ? -1 : 1;
    }
    usort($response, "cmp");
    return $response;

}

function getProductsDesc(){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://aerolab-challenge.now.sh/products");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA"
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    //return json_decode($response, true);

    function cmp($a, $b)
    {
        if ($a['cost'] == $b['cost']) {
            return 0;
        }
        return ($a['cost'] < $b['cost']) ? -1 : 1;
    }
    usort($response, "cmp");
    return $response;

}
?>