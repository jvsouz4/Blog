<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function index() {
        
        $title = $this->request->data('title');
        $this->Session->write('title', $title);
        
        $cargo = $this->request->data('cargo');

        $consulta ="SELECT u.id as user_id, u.name as user_name, u.username as user_username, u.role as user_role
        FROM users u
        order by u.id";

        $consulta3 = "SELECT u.id as user_id, u.name as user_name, u.username as user_username, u.role as user_role
        FROM users u
        WHERE  (u.username ILIKE '%$title%' OR u.name ILIKE '%$title%') AND u.role ILIKE '%$cargo%'
        order by u.id";

        $consultatitulo = "SELECT u.id as user_id, u.name as user_name, u.username as user_username, u.role as user_role
        FROM users u
        WHERE  u.username ILIKE '%$title%' OR u.name ILIKE '%$title%'
        order by u.id";

        $consulta2 = "SELECT u.id as user_id, u.name as user_name, u.username as user_username, u.role as user_role
        FROM users u
        WHERE  u.role ILIKE '%$cargo%'
        order by u.id";
        

        
        if ($_SESSION['Auth']['User']['role'] == 'admin'){
            
            if(!empty($this->request->data('title')) && !empty($this->request->data('cargo'))) {
                $sql = $this->User->query($consulta3);
    
                $this->set('users', $sql);
    
            }elseif(!empty($this->request->data('title')) && empty($this->request->data('cargo'))){
                $sql = $this->User->query($consultatitulo);
    
                $this->set('users', $sql);
    
            }elseif(empty($this->request->data('title')) && !empty($this->request->data('cargo'))){
                $sql = $this->User->query($consulta2);
    
                $this->set('users', $sql);

            }else{
                $sql = $this->User->query($consulta);
    
                $this->set('users', $sql);
            }

            if (sizeof($sql) == 0){
                $this->Flash->set('Não foram encontrados registros.', array(
                    'element' => 'error'
                ));
            }

        }else{
            $this->set('users', []);
            $this->Flash->set('Você não pode acessar este local', array(
                'element' => 'error'
            ));
        }
    }

    public function view($id = null) {

        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }

        $consultall = "SELECT u.name , u.created, u.role,
        TO_CHAR(
            u.created,
            'DD-MM-YYYY'
        )user_date
        FROM users u
        WHERE u.id = $id";

        $sql = $this->User->query($consultall);
        
        $this->set('user', $sql);

    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi criado.'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Flash->error(
                __('O usuário não foi criado. Por favor, tente novamente.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi atualizado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('O usuário não foi salvo. Por favor, tente novamente.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário deletado.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('O usuário não foi deletado.'));
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'visualizacao', 
                'action' => 'index'));
            }
            $this->Flash->error(__('Usuário/senha inválido, tente novamente.'));
        }

    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}

?>