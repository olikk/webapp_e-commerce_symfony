

<?php

    require_once 'vendor/autoload.php';
    
    $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
    $twig = new Twig_Environment($loader);
    
    if(isset($_SERVER['PATH_INFO'])) {
	$args = explode('/', $_SERVER['PATH_INFO']);
	$found = false;

	if(count($args) >= 3) {
		$controller = $args[1];
		$method = $args[2];
		$params = array();
		for ($i=3; $i < count($args); $i++) { 
			$params[] = $args[$i];
		}

		$controller_file = dirname(__FILE__).'/src/Controller/'.$controller.'.php';
		if (is_file($controller_file)) {
			require_once $controller_file;
			$controller_name = ucfirst($controller).'Controller';
			if (class_exists($controller_name)) {
				$c = new $controller_name;
				if (method_exists($c, $method)) {
					$found = true;
					call_user_func_array(array($c, $method), $params);
				}
			}
		}
	}
  
	if (!$found) {
		http_response_code(404);
		header('HTTP/1.0 404 Not Found');
		echo $twig->render('Errors/404.twig'); 
	}
} else {
	 echo $twig->render('about.twig');
}

?>


