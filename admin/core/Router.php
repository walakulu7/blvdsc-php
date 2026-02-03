<?php
/**
 * Router Class
 * Handles URL routing and dispatching to controllers
 */
class Router {
    private $routes = [];
    private $basePath = '/blvdsc-web-php/admin';
    
    /**
     * Register a GET route
     */
    public function get($path, $controller, $action, $middleware = []) {
        $this->addRoute('GET', $path, $controller, $action, $middleware);
    }
    
    /**
     * Register a POST route
     */
    public function post($path, $controller, $action, $middleware = []) {
        $this->addRoute('POST', $path, $controller, $action, $middleware);
    }
    
    /**
     * Register a PUT route
     */
    public function put($path, $controller, $action, $middleware = []) {
        $this->addRoute('PUT', $path, $controller, $action, $middleware);
    }
    
    /**
     * Register a DELETE route
     */
    public function delete($path, $controller, $action, $middleware = []) {
        $this->addRoute('DELETE', $path, $controller, $action, $middleware);
    }
    
    /**
     * Add route to routes array
     */
    private function addRoute($method, $path, $controller, $action, $middleware) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }
    
    /**
     * Dispatch request to appropriate controller
     */
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        
        // Handle PUT and DELETE via POST with _method override
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }
        
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = str_replace($this->basePath, '', $uri);
        
        // Default to dashboard if accessing root
        if ($path === '' || $path === '/') {
            $path = '/dashboard';
        }
        
        // Find matching route
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $path, $params)) {
                // Run middleware
                foreach ($route['middleware'] as $middleware) {
                    if (!$this->runMiddleware($middleware)) {
                        return;
                    }
                }
                
                // Instantiate controller and call action
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $actionName)) {
                        call_user_func_array([$controller, $actionName], $params);
                        return;
                    }
                }
                
                $this->notFound();
                return;
            }
        }
        
        $this->notFound();
    }
    
    /**
     * Match path pattern with actual path
     */
    private function matchPath($pattern, $path, &$params) {
        $params = [];
        
        // Convert pattern to regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $pattern);
        $pattern = '#^' . $pattern . '$#';
        
        if (preg_match($pattern, $path, $matches)) {
            array_shift($matches); // Remove full match
            $params = $matches;
            return true;
        }
        
        return false;
    }
    
    /**
     * Run middleware
     */
    private function runMiddleware($middleware) {
        if ($middleware === 'auth') {
            return Auth::check();
        }
        
        if ($middleware === 'guest') {
            return !Auth::check();
        }
        
        return true;
    }
    
    /**
     * Handle 404 Not Found
     */
    private function notFound() {
        http_response_code(404);
        require_once __DIR__ . '/../app/Views/errors/404.php';
    }
}
