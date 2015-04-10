<?php

use Everyman\Neo4j\Client;
require_once 'neo4jphp/bootstrap.php';

class OC_ActivityGraph_DAO {
	public static function insert($userId, $time, $fileId, $action) {
		
		$client = new Client();
		
		// Search user
		
		
		// User Node
		$user = $client->makeNode();
		$user->setProperty('userId', $userId)
		->setProperty('time', $time)				
		->save();
		
		// File Node
		$file = $client->makeNode();
		$file->setProperty('fileId', $fileId)
		->save();
		
		// Relationship nodes: User -> File
		$user->relateTo($file, 'ACTION')
		->setProperty('name', $action)
		->save();
		
		//Debug		
		$userNodeId = $user->getId();
		$fileNodeId = $file->getId();
		 
	
		OCP\Util::writeLog("ActivityGraph", "User node id: ".$userNodeId.", File node id:".$fileNodeId, 1);
	}	
}
