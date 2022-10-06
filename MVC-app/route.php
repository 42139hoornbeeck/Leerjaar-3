<?php

class Route
{
	private $route;
	private $segments;

	public function __construct()
	{
		$this->route = preg_replace('/(.*\/autobedrijf_mvc\/)/', '', $_SERVER['REQUEST_URI']);
		$this->segments = explode('/', $this->route);

		// als er geen route is dan naar de home-pagina
		if (empty($this->route)) {
			header('Location: ' . APP_BASE_URL . '/home');
			exit;
		}
	}

	public function start()
	{
		// route en parameters bepalen
		$route = $this->findRoute();
		$params = $this->getParams();

		if ($route) {
			// Controller en method splitsen
			$controller = explode('@', $route)[0];
			$method = explode('@', $route)[1];

			// Include controller en maak een niewue instantie
			require_once('controllers/' . $controller . '.php');
			$controller = new $controller;

			// methode van controller met paramters aanroepen
			call_user_func_array(array($controller, $method), $params);
		} else { // als de route niet bestaat
			require_once('views/404.php');
			exit;
		}
	}

	public function findRoute()
	{
		// alle mogelijke routes met acties
		$routes = [
			'home' => 'HomeController@showPage',
			'auto/overzicht' => 'CarController@showCars',
			'auto/overzicht/zoeken' => 'CarController@showCarsBySearch',
			'auto/add' => 'CarController@showFormCar',
			'auto/add/save' => 'CarController@addToCars',
			'auto/edit/{param}' => 'CarController@showCarById',
			'inloggen' => 'AuthenticationController@showLogin',
			'uitloggen' => 'AuthenticationController@logOut'
			// er moeten nog meer routes worden gemaakt uiteraard
		];

		$tmp_replace_param = preg_replace('/[0-9]+/', '{param}', $this->route);
		$tmp_replace_get = preg_replace('/\?.+/', '', $this->route);

		// check of url matched met mogelijke routes
		foreach ($routes as $route => $action) {
			if ($route == $tmp_replace_param || $route == $tmp_replace_get) {
				return $action;
			}
		}
		return;
	}

	// haalt parameters uit de URL
	public function getParams()
	{
		$params = [];
		foreach ($this->segments as $key => $segment) {
			// check voor numerieke parameters (ID's)
			if (is_numeric($segment)) {
				$params[] = $segment;
			}
		}
		// check de url op een $_GET-parameter als er geen 'normale' parameter is gevonden
		if (count($params) == 0 && strstr($this->route, '?')) {
			$params[] = preg_replace('/.*=/', '', $this->route);
		}

		return $params;
	}
}
