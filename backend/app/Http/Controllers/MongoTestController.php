<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MongoTestController extends Controller
{
    public function index()
    {
        try {
            // Get database connection information
            $connectionName = config('database.default');
            $dbConfig = config('database.connections.' . $connectionName);
            
            // Extract connection details (hiding password)
            $connectionInfo = [
                'driver' => $dbConfig['driver'],
                'database' => $dbConfig['database'],
                'dsn' => preg_replace('/(:.*@)/', ':***@', $dbConfig['dsn']), // Hide password
                'options' => $dbConfig['options'],
            ];
            
            // Check if we can get collections
            $collections = DB::connection($connectionName)->listCollections();
            $collectionNames = [];
            
            foreach ($collections as $collection) {
                $collectionNames[] = $collection->getName();
            }
            
            return response()->json([
                'connection' => 'successful',
                'database_name' => $dbConfig['database'],
                'connection_info' => $connectionInfo,
                'collections' => $collectionNames,
                'version' => DB::connection($connectionName)->getMongoClient()->selectServer()->getInfo()->getVersion(),
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'connection' => 'failed',
                'error' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}
