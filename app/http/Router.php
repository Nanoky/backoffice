<?php

    class Router {

        /**
         * Catch GET request to a specific $url and do the action from a function
         */
        public static function get(String $url, String $class, $function)
        {
            if ($_SERVER["REQUEST_METHOD"] == "GET")
            {
                $i = strpos($url, ':');
                $param = [];

                if ($i == false)
                {
                    if ($_SERVER['REQUEST_URI'] != $url)
                    {
                        return false;
                    }
                }
                else
                {
                    $url = explode("/", trim($url, "/"));
                    $uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

                    if (count($url) != count($uri))
                    {
                        return false;
                    }

                    foreach ($url as $key => $value) {
                        if (strncmp($value, ":", 1) != 0)
                        {
                            if ($value != $uri[$key])
                            {
                                return false;
                            }
                            continue;
                        }

                        $param[substr($value, 1)] = $uri[$key];
                    }
                }

                try {
                    if (!empty($class))
                    {
                        call_user_func(array($class, $function), $param);
                    }
                    else
                    {
                        call_user_func($function, $param);
                    }
                } catch (\Exception $e) {
                    //throw $th;
                }
            
            }
        }

        /**
         * Catch POST request to a specific $url and do the action from a function
         */
        public static function post(String $url, String $class, $function)
        {

            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER['REQUEST_URI'] == $url)
            {
                $_data = $_POST;
                

                try {
                    if (!empty($class))
                    {
                        call_user_func(array($class, $function), $_data);
                    }
                    else
                    {
                        call_user_func($function, $_data);
                    }
                } catch (\Exception $e) {
                    //throw $th;
                }
            }
        }
    }

?>