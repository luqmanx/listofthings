<?php
require_once "vendor/autoload.php";

$exedra = new \Exedra\Exedra(__DIR__);
$myapp = $exedra->build("Apps", function($app)
  {
    $app->setFailRoute('error');

    $app->map->addRoutes(array(
      'error' => array(
        'uri' => false,
        'execute' => function($exe)
          {
            if($exe->param('exception'))
              $message = $exe->param('exception')->getMessage();
            else
              $message = $exe->param('message');

            return $exe->view->create('404', array('message' => $message))->render();
          }
        ),
      'admin' => array(
        'base' => 'admin',
        'middleware' => function($exe)
        {
          if(!$exe->session->has('user.userid'))
            throw new Exception("Unauthorized user!");

          return $exe->next($exe);
        },
        'subroutes' => array(
          'default' => array(
            'uri' => '[:controller]/[:action]',
            'execute' => 'controller={controller}@{action}'
            )
          )
        )
      ));
     $app->map->addRoutes(array(

         'main' => array(
          'uri' => '',
          
          'subroutes' => array(
            'index' => array(
              'uri' => '',
              'execute' => 'controller=Main@index'
              ),
            'maintest'=>array(
              'uri' => 'maintest',
              'execute' => 'controller=Main@test'
              ),
            'register' => array(
              'uri' => 'register',
              'execute' => 'controller=Main@register'
              ),
            'signup' => array(
              'uri' => 'signup',
              'execute' => 'controller=Main@signup'
              ),
            'signupprocess' => array(
              'uri' => 'signupprocess',
              'execute' => 'controller=Main@signupprocess'
              ),
            'login' => array(
              'uri' => 'login',
              'execute' => 'controller=Main@logintemplate'
              ),
             'loginprocess' => array(
                'uri' => 'loginprocess',
                'execute' => 'controller=Main@loginprocess'
              )

              

            )
              
              
          )

        ));

  });

return $myapp;

?>