<?php
// File: /app/Controller/PostsController.php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $nome = $this->request->data('nome');

        $consultall = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        order by post_id";

        $consulta = "SELECT p.id as post_id, p.title, p.body, p.created as post_created, u.id as user_id, u.username
        FROM posts p
        INNER JOIN users u
        ON p.user_id = u.id
        WHERE p.title ILIKE '%$nome%' OR p.body ILIKE '%$nome%'
        order by post_id";

        if(!empty($this->request->data)){
            $sql = $this->Post->query($consulta);

            $this->set('posts', $sql);
        }else{
            $sql = $this->Post->query($consultall);

            $this->set('posts', $sql);
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
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
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
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
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
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