<?php
// File: /app/Controller/PostsController.php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $nome = $this->request->data('nome');
        
        $dtinicial = $this->request->data('dtinicial');
        $dtformatada = str_replace("/", "-", $dtinicial);
        $dtiformatada = date('Y-m-d', strtotime($dtformatada));

        $dtfinal = $this->request->data('dtfinal');
        $dtformatada2 = str_replace("/", "-", $dtfinal);
        $dtfformatada = date('Y-m-d', strtotime($dtformatada2));

        $consultall = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username,
        TO_CHAR(
            p.created,
            'DD-MM-YYYY'
        )post_date
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        order by post_id";

        $consulta = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username,
        TO_CHAR(
            p.created,
            'DD-MM-YYYY'
        )post_date
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%'
        order by post_id";

        $consulta2 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username,
        TO_CHAR(
            p.created,
            'DD-MM-YYYY'
        )post_date
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.created BETWEEN '$dtiformatada' AND '$dtfformatada 23:59'
        order by post_id";
        
        $consulta3 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username,
        TO_CHAR(
            p.created,
            'DD-MM-YYYY'
        )post_date
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%' AND p.created BETWEEN '$dtiformatada' AND '$dtfformatada'
        order by post_id";
        

        if(!empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
            $sql = $this->Post->query($consulta);

            $this->set('posts', $sql);
        }elseif(empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
            $sql = $this->Post->query($consulta2);

            $this->set('posts', $sql);
        }elseif(!empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
            $sql = $this->Post->query($consulta3);

            $this->set('posts', $sql);
        }else{
            $sql = $this->Post->query($consultall);

            $this->set('posts', $sql);
        }

        if($sql == []){
            $this->Flash->set('Não foram encontrados registros.', array(
                'element' => 'error'
            ));
        }
    }

    public function view($id = null) {
        $consultall = "SELECT p.id as post_id, p.title, p.body, p.created, u.id as user_id, u.username,
        TO_CHAR(
            p.created,
            'DD-MM-YYYY'
        )post_date
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.id = $id
        order by post_id";

        $sql = $this->Post->query($consultall);

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('posts', $sql);
    }

    public function add() {
        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Seu post foi salvo.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Seu post foi atualizado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível atualizar seu post.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Post->delete($id)) {
            $this->Flash->success(
                __('O post com id: %s foi deletado.', h($id))
            );
        } else {
            $this->Flash->error(
                __('O post com id: %s não pode foi deletado.', h($id))
            );
        }
    
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }
    
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>