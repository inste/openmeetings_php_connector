

<?php
require("nusoap.php");
		$client_userService = new nusoap_client("http://localhost:5080/openmeetings/services/UserService?wsdl", "wsdl");
		$client_userService->setUseCurl(true);

		$result = $client_userService->call('getSession');
				$session_id = $result["return"]["session_id"];
				$params = array(
	    			'SID' => $session_id,
	    			'username' => "admin",
	    			'userpass' => "123456"
				);

				$result = $client_userService->call('loginUser',$params);
		$result = $client_userService->call('addNewUser',array(
			'SID' => $session_id,
			'username' => "test",
			'userpass' => "pass",
			'lastname' => "Prsn",
			'firstname' => "Txt",
			'email' => 'mail@mail.com',
			'additionalname' => 'addname',
			'street' => 'street',
			'zip' => 'street',
			'fax' => 'street',
					'states_id' => 5,
			'town' => 'street',
			'language_id' => 5,
				'baseURL' => 'http://localhost/',
			));
var_dump($result);



/*
$client = new
    SoapClient(
        "http://localhost:5080/openmeetings/services/UserService?wsdl");

$session = $client->getSession();
var_dump($session->return);
var_dump($client->loginUser($session->return->session_id, "admin", "123456")); */
//var_dump($session);
?>