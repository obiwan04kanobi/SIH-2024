<?php

namespace App\Extensions;

use MongoDB\Client;
use SessionHandlerInterface;

class MongoSessionHandler implements SessionHandlerInterface
{
    protected $collection;

    public function __construct()
    {
        $client = new Client(env('MONGODB_URI'));
        $this->collection = $client->selectCollection(env('DB_DATABASE'), 'sessions');
    }

    public function open($savePath, $sessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($sessionId)
    {
        $session = $this->collection->findOne(['_id' => $sessionId]);
        return $session ? $session['data'] : '';
    }

    public function write($sessionId, $data)
    {
        if (!$sessionId) {
            // Generate a new session ID if it's null or invalid
            $sessionId = bin2hex(random_bytes(16));
        }
    
        $this->collection->updateOne(
            ['_id' => $sessionId],
            ['$set' => ['data' => $data, 'last_accessed' => new \MongoDB\BSON\UTCDateTime()]],
            ['upsert' => true]
        );
        return true;
    }
    

    public function destroy($sessionId)
    {
        $this->collection->deleteOne(['_id' => $sessionId]);
        return true;
    }

    public function gc($maxLifetime)
    {
        $past = new \MongoDB\BSON\UTCDateTime((time() - $maxLifetime) * 1000);
        $this->collection->deleteMany(['last_accessed' => ['$lt' => $past]]);
        return true;
    }
}
