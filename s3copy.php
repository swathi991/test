<?php

use Aws\S3\S3Client;

require 'vendor/autoload.php';

// Set up the S3 client
$s3 = new S3Client([
    'region' => 'us-east-2', // Replace with your region
    'version' => 'latest',
    'credentials' => [
        'key' => '', // Replace with your access key
        'secret' => '', // Replace with your secret key
    ],
]);

// Variables for the source and destination
$bucket = 'source-test12'; // Replace with your bucket name
$sourceKey = 's3://source-test12/interviewQues 7.txt'; // Replace with the full path to the file
$destinationKey = 's3://target-test1234/interviewQues 7.txt'; // Replace with the new path

// 1. Copy the file
try {
    $result = $s3->copyObject([
        'Bucket' => $bucket,
        'CopySource' => '/' . $bucket . '/' . $sourceKey, // Full path to the source object
        'Key' => $destinationKey, // The new destination path
        'Metadata' => [
            'Content-Type' => 'application/octet-stream', // Or the appropriate content type
        ],
    ]);
    echo "File copied to " . $destinationKey . "\n";
} catch (Exception $e) {
    echo "Error copying file: " . $e->getMessage() . "\n";
}
?>
