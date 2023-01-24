<?php

App::uses('Controller', 'Controller');

// app/Controller/AppController.php
class AppController extends Controller {
    
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
            $this->set('logado', 'Visitante');
        }else{
            $logado = $_SESSION['Auth']['User']['name'];
            $this->set('logado', $logado);
        }
    }
    
}

?>