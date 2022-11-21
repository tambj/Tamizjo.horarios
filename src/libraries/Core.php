<?php

    // App Core Class
    // Creación & format URL  /controller/method/params
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      
    // Creamos la variable que contendrá la URL
      $url = $this->getUrl();

      // Busca dentro de controller por el nombre de archivo que coincida.
        // ucwords() capitaliza la primera letra
      if(file_exists('../src/controller/' . ucwords($url[0]). '.php')){
        // Si el archivo existe, se asigna el valor a la variable currentController
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

     // Importamos el controlador
      require_once '../src/controller/'. $this->currentController . '.php';

      // Instanciamos la clase controlador
      $this->currentController = new $this->currentController;

      // Comprobamos la segunda parte de la URL
      if(isset($url[1])){
        // Comprobamos si el método existe en el controlador
        if(method_exists($this->currentController, $url[1])){
            // Si el método existe, se asigna el valor a la variable currentMethod
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Callback con array de parametros
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  