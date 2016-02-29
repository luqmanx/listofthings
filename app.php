<?php
require_once "vendor/autoload.php";

$exedra = new \Exedra\Exedra(__DIR__);
$myapp = $exedra->build("Apps", function($app)
  {
    $app->structure->set('view', 'View');

    date_default_timezone_set('Asia/Kuala_Lumpur');
    
    // create baseUrl from components in _SERVER.
    $baseUrl = trim(str_replace('/index.php', '', $_SERVER['PHP_SELF']));
    $baseUrl = 'http'.'://'.$_SERVER['HTTP_HOST'].$baseUrl;

    $app->config->set('app.url', $baseUrl);
    $app->config->set('asset.url', $baseUrl.'/assets');

    //set database
    if($app->loader->has('../env'))
    {
      $app->config->set($app->loader->load('../env'));
    }

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
          //'module' => 'frontend',
          'subroutes' => array(
            'index' => array(
              'uri' => '',
              'execute' => 'controller=Main@index'
              ),
            'register' => array(
              'uri' => 'register',
              'execute' => 'controller=Main@register'
              ),
            'signup' => array(
              'uri' => 'signup',
              'execute' => 'controller=Main@signup'
              ),
            'login' => array(
              'uri' => 'login',
              'execute' => 'controller=Main@login'
              ),
            'reset' => array(
              'uri' => 'reset',
              'execute' => 'controller=Main@reset'
              ),
            'reset_password' => array(
              'uri' => 'reset_password',
              'execute' => 'controller=Main@reset_password'
              ),
            'forgot' => array(
              'uri' => 'forgot',
              'execute' => 'controller=Main@forgot'
              ),
            'forgot_password' => array(
              'uri' => 'forgot_password',
              'execute' => 'controller=Main@forgot_password'
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