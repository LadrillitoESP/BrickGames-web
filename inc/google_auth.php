<?php 

	class GoogleAuth{

		protected $client;

		public function __construct(Google_Client $googleClient = null){
			$this->client = $googleClient;
			if ($this->client) {
				$this->client->setClientId('1080863684025-hgca3osgik3ub3qd4nt58rcbc00pol3c.apps.googleusercontent.com');
				$this->client->setClientSecret('LZM_ozt9vchfoqfcHKvD_zZf');
				$this->client->setRedirectUri('https://gamesbreak.kozow.com/');
				$this->client->setScopes('email');
			}
		}

		public function isLoggedIn(){
			return isset($_SESSION['access_token']);
		}

		public function getAuthUrl(){
			return $this->client->createAuthUrl();
		}

		public function checkRedirectCode(){
			if(isset($_GET['code'])){
				$this->client->authenticate($_GET['code']);
				$this->setToken($this->client->getAccessToken());
				$payload = $this->getPayload();
				$this->createUser($payload);
				echo "<pre>", print_r($payload),"</pre>";
				return true;
			}
			return false;
		}


		public function setToken($token){
			$_SESSION['access_token'] = $token;
			$this->client->setAccessToken($token);
		}

		public function logout(){
			unset($_SESSION['access_token']);
		}

		public function getPayload(){
			if($this->client->getAccessToken()){ $payload = $this->client->verifyIdToken(); }

			return $payload;
		}

		public function createUser($payload){
			$post = [
				'google_id' => $payload['sub'],
				'correo' => $payload['email']
			];


			$ch = curl_init('https://gamesbreak.kozow.com/crud.php?op=11');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			$response = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response);

			if ($response->otrodato == 'ok') {
				$_SESSION["idUsuario"] = $response->usuario;
				$_SESSION["nombreUsuario"] = $response->nombreUsuario;
				header('Location: index.php');
			}
			die ($response);
		}

	}
 ?>
