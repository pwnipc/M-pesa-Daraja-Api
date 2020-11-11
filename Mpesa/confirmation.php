<?php

    # if this is your first time, you might need to check the directory 'Tutorial 1'  File first.
    require 'dbconnect.php';
    header("Content-Type: application/json");
    
    if (!isset($_GET["token"]))
    {
        echo "Technical error";
        exit();
    }

    if ($_GET["token"]!='c9b10b9a7b1f4ff9824743cc741eaea29c4e5e8880502bab86f5e87b1b1d6e7c$')
    {
        echo "Invalid authorization";
        exit();
    }

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

    // Response from M-PESA Stream
    $mpesaResponse = file_get_contents('php://input');

    // log the response
    $logFile = "M_PESAConfirmationResponse.txt";

    $jsonMpesaResponse = json_decode($mpesaResponse, true); // We will then use this to save to database

    $transaction = array(
            ':TransactionType'      => $jsonMpesaResponse['TransactionType'],
            ':TransID'              => $jsonMpesaResponse['TransID'],
            ':TransTime'            => $jsonMpesaResponse['TransTime'],
            ':TransAmount'          => $jsonMpesaResponse['TransAmount'],
            ':BusinessShortCode'    => $jsonMpesaResponse['BusinessShortCode'],
            ':BillRefNumber'        => $jsonMpesaResponse['BillRefNumber'],
            ':InvoiceNumber'        => $jsonMpesaResponse['InvoiceNumber'],
            ':OrgAccountBalance'    => $jsonMpesaResponse['OrgAccountBalance'],
            ':ThirdPartyTransID'    => $jsonMpesaResponse['ThirdPartyTransID'],
            ':MSISDN'               => $jsonMpesaResponse['MSISDN'],
            ':FirstName'            => $jsonMpesaResponse['FirstName'],
            ':MiddleName'           => $jsonMpesaResponse['MiddleName'],
            ':LastName'             => $jsonMpesaResponse['LastName']
    );

    // write to file
    $log = fopen($logFile, "a");
    fwrite($log, $mpesaResponse);
    fclose($log);

    echo $response;

    insert_response($transaction);
?>