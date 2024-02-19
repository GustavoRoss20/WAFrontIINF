<?php

    require_once 'controllers/errores.php';

    class App{
        function __construct(){
            //Validando al obtener el URL
           $url = isset($_GET['url']) ? $_GET['url'] : null;
           $url = rtrim($url, '/');
           $url = explode('/', $url);

           //Validad si no hay algún controlador definido mostrar por defecto el Home
           if (empty($url[0])) {
                error_log('APP::construct-> no hay controlador especificado');
                $archivoController = 'controllers/home.php';
                require_once $archivoController;
                $controller = new Home();
                $controller->loadModel('home');
                $controller->render();
                return false;
           }

           //Enrutamos los controladores existentes
           $archivoController = 'controllers/' . $url[0] . '.php';

           if(file_exists($archivoController)){
                require_once $archivoController;

                $controller = new $url[0];
                $controller->loadModel($url[0]);
                //Validar si existe un segundo parametro
                if(isset($url[1])){
                    if(method_exists($controller, $url[1])){
                        if(isset($url[2])){
                            //no de parametros
                            $nparam = count($url) - 2;
                            //arreglo de parametros
                            $params = [];

                            for($i = 0; $i < $nparam; $i ++)
                                array_push($params, $url[$i] + 2);
                            
                            $controller->{$url[1]}($params);
                        }else{
                            //no tiene parametros, se manda a llamar
                            //el metodo tal cual
                            $controller->{$url[1]}();
                        }
                    }else{
                        ///error, no existe el metodo
                        $controller = new Errores();
                        $controller->render();
                    }
                }else{
                    //No hay metodo a cargar, se carga el metodo por default
                    $controller->render();
                }
           }else{
                //no existe el archivo, manda error
                $controller = new Errores();
                $controller->render();
           }
        }
    }
?>