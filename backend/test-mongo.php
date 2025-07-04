<?php

// Test MongoDB connection directly
try {
    echo "Testing MongoDB Connection...\n";
    echo "PHP version: " . phpversion() . "\n";
    echo "MongoDB extension version: " . phpversion("mongodb") . "\n\n";
    
    // Use the same connection string from your .env file but with modified options
    $connectionString = "mongodb+srv://NoteflowUser:O6EaN47HKweWOaRA@noteflow.rhotdaj.mongodb.net/noteflow?tls=true&tlsAllowInvalidCertificates=true&tlsAllowInvalidHostnames=true";
    
    // Create MongoDB client with TLS options required by MongoDB Atlas
    $options = [
        'tls' => true,
        'tlsAllowInvalidCertificates' => true,
        'tlsAllowInvalidHostnames' => true,
        'serverSelectionTimeoutMS' => 5000,
        'connectTimeoutMS' => 10000,
        'retryWrites' => false,
        'serverSelectionTryOnce' => false
    ];
    
    echo "Connection options: " . json_encode($options, JSON_PRETTY_PRINT) . "\n\n";
    echo "Attempting connection...\n";
    
    $client = new MongoDB\Driver\Manager($connectionString, $options);
    
    // Execute a simple ping command to check connection
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    $result = $client->executeCommand('admin', $command);
    
    echo "MongoDB Connection Successful!\n";
    
    // Try to get a list of databases
    $listDatabases = new MongoDB\Driver\Command(['listDatabases' => 1]);
    $databases = $client->executeCommand('admin', $listDatabases);
    $databasesList = $databases->toArray()[0];
    
    echo "Available databases:\n";
    foreach ($databasesList->databases as $db) {
        echo " - " . $db->name . "\n";
    }
    
} catch (Exception $e) {
    echo "Connection Error: " . $e->getMessage() . "\n";
    
    // Additional debugging information
    echo "\nDebugging info:\n";
    
    // Check DNS resolution for the MongoDB host
    echo "Checking DNS for host: noteflow.rhotdaj.mongodb.net\n";
    $ips = gethostbynamel("noteflow.rhotdaj.mongodb.net");
    if ($ips) {
        echo "DNS resolution successful. IP addresses:\n";
        foreach ($ips as $ip) {
            echo "- $ip\n";
        }
    } else {
        echo "DNS resolution failed for noteflow.rhotdaj.mongodb.net\n";
    }
    
    // Try with direct connection to one of the servers
    try {
        echo "\nTrying direct connection to one shard...\n";
        $directClient = new MongoDB\Driver\Manager(
            "mongodb://NoteflowUser:O6EaN47HKweWOaRA@ac-vhrccnj-shard-00-00.rhotdaj.mongodb.net:27017",
            [
                'tls' => true,
                'tlsAllowInvalidCertificates' => true,
                'tlsAllowInvalidHostnames' => true,
                'retryWrites' => false,
                'serverSelectionTimeoutMS' => 5000
            ]
        );
        $pingCmd = new MongoDB\Driver\Command(['ping' => 1]);
        $directClient->executeCommand('admin', $pingCmd);
        echo "Direct connection successful!\n";
    } catch (Exception $e2) {
        echo "Direct connection failed: " . $e2->getMessage() . "\n";
    }
}
