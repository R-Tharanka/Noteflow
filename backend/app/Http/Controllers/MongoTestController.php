<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MongoTestController extends Controller
{
    public function index()
    {
        try {
            // Use the MongoDB PHP extension directly to test the connection
            ob_start();
            
            $dsn = config('database.connections.mongodb.dsn');
            $options = config('database.connections.mongodb.options');
            
            $client = new \MongoDB\Driver\Manager($dsn, $options);
            
            // Execute a simple ping command to check connection
            $command = new \MongoDB\Driver\Command(['ping' => 1]);
            $result = $client->executeCommand('admin', $command);
            
            // If we get here, the connection was successful
            $output = ob_get_clean();
            
            return response()->json([
                'connection' => 'successful',
                'message' => 'MongoDB connection is working',
                'database' => config('database.connections.mongodb.database'),
                'connection_type' => 'MongoDB Atlas',
                'php_version' => phpversion(),
                'mongodb_version' => phpversion('mongodb')
            ]);
            
        } catch (\Exception $e) {
            $output = ob_get_clean();
            
            return response()->json([
                'connection' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
