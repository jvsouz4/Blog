<?php

App::uses('Controller', 'Controller');

// app/Controller/AppController.php
class AppController extends Controller {
    
    public $components = array(
        'Flash',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'visualizacao', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller') // Added this line
        )
    );
    
    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
    
        // Default deny
        return false;
    }

    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }
    
}

?>