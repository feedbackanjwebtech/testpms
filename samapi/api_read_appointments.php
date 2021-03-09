<?php 
	
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->userId;	
	
	//sample data  - comment below line for live 
	
	if($user_id>0)
	{
		require( '../../wp-load.php' );
		global $wpdb;
		
		$strquery="SELECT * FROM appointments   WHERE user_id='".$user_id."'   ORDER BY created_datetime DESC";
		$results = $wpdb->get_results( $strquery, OBJECT );
		ob_clean();
		echo json_encode($results);
		exit;
		
		
		
	}
	
	
?>