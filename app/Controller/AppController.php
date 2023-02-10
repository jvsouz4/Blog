<?php

App::uses('Controller', 'Controller');

// app/Controller/AppController.php
class AppController extends Controller {
    
    public $_SESSION;
    
    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
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
        if ($this->Auth->login() == false){
            $_SESSION['user.name']='Visitante';
            $_SESSION['user.role']='visitante';
        }else{
            $_SESSION['user.name'] = $_SESSION['Auth']['User']['name'];
            $_SESSION['user.role'] = $_SESSION['Auth']['User']['role'];
        }

    }

    public function afterFilter() {

    }
    
}

?>