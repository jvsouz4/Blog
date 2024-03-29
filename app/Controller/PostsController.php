<?php
// File: /app/Controller/PostsController.php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $nome = $this->request->data('nome');
        $this->Session->write('nome', $nome);

        $dtinicial = $this->request->data('dtinicial');
        $this->Session->write('dtinicial', $dtinicial);

        $dtfinal = $this->request->data('dtfinal');
        $this->Session->write('dtfinal', $dtfinal);
        
        $agora = $this->Post->query("select now(),
        TO_CHAR(
            now(),
            'YYYY-MM-DD'
        )");
        
        $this->set('agora', $agora);
        
        if(isset($_SESSION['Auth']['User']['role']) && $_SESSION['Auth']['User']['role'] == 'admin'){
            $consultall = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            order by p.created DESC";

            $consulta = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%'
            order by p.created DESC";

            $consulta2 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE p.created BETWEEN '$dtinicial 00:00' AND '$dtfinal 23:59'
            order by p.created DESC";
            
            $consulta3 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created BETWEEN '$dtinicial 00:00' AND '$dtfinal 23:59')
            order by p.created DESC";

            $consulta4 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created >= '$dtinicial 00:00')
            order by p.created DESC";

            $consulta5 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created <= '$dtfinal 23:59')
            order by p.created DESC";

            $consulta6 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE p.created >= '$dtinicial 00:00'
            order by p.created DESC";

            $consulta7 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE p.created <= '$dtfinal 23:59'
            order by p.created DESC";

            if(!empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta);

                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta2);

                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta3);
    
                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta4);
    
                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta5);
    
                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta6);
    
                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta7);
    
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
        }elseif (isset($_SESSION['Auth']['User']['role']) && $_SESSION['Auth']['User']['role'] == 'author') {

            $idauthor = $_SESSION['Auth']['User']['id'];

            $consultall = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE u.id = ($idauthor)
            order by p.created DESC";

            $consulta = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND u.id = ($idauthor)
            order by p.created DESC";

            $consulta2 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.created BETWEEN '$dtinicial 00:00' AND '$dtfinal 23:59') AND (u.id = $idauthor)
            order by p.created DESC";
            
            $consulta3 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created BETWEEN '$dtinicial 00:00' AND '$dtfinal 23:59') AND (u.id = $idauthor)
            order by p.created DESC";

            $consulta4 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created >= '$dtinicial 00:00') AND (u.id = $idauthor)
            order by p.created DESC";

            $consulta5 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%') AND (p.created <= '$dtfinal 23:59') AND (u.id = $idauthor)
            order by p.created DESC";

            $consulta6 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.created >= '$dtinicial 00:00') AND (u.id = $idauthor)
            order by p.created DESC";

            $consulta7 = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.name,
            TO_CHAR(
                p.created,
                'DD-MM-YYYY'
            )post_date
            FROM posts p
            INNER JOIN users u
            ON p.user_id = u.id
            WHERE (p.created <= '$dtfinal 23:59') AND (u.id = $idauthor)
            order by p.created DESC";

            if(!empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta);

                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta2);

                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta3);
    
                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta4);
    
                $this->set('posts', $sql);
            }elseif(!empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta5);
    
                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && !empty($this->request->data('dtinicial')) && empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta6);
    
                $this->set('posts', $sql);
            }elseif(empty($this->request->data('nome')) && empty($this->request->data('dtinicial')) && !empty($this->request->data('dtfinal'))){
                $sql = $this->Post->query($consulta7);
    
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
        }else{
            $this->Flash->set('Você não pode acessar esta área.', array(
                'element' => 'error'
            ));
        }
        
    }

    public function view($id = null) {
        $consultall = "SELECT p.id as post_id, p.title, p.body, p.created, u.id as user_id, u.name,
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
            throw new NotFoundException(__('Post inválido'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Post inválido'));
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
            throw new NotFoundException(__('Post inválido'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Post inválido'));
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
            }else{
                $this->Flash->error(__('Você não pode deletar/editar um post que não é seu.'));
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>