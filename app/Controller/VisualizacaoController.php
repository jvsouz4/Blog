<?php
App::uses('AppController', 'Controller');

class VisualizacaoController extends AppController {

    public $uses = array('Post');
    
    public function index() {

        $nome = $this->request->data('nome');
        $this->Session->write('nome2', $nome);
        
        $dtinicial = $this->request->data('dtinicial');
        $this->Session->write('dtinicial2', $dtinicial);

        $dtfinal = $this->request->data('dtfinal');
        $this->Session->write('dtfinal2', $dtfinal);

        $agora = $this->Post->query("select now(),
            TO_CHAR(
                now(),
                'YYYY-MM-DD'
            )");
            
        $this->set('agora', $agora);

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


        
    }

}

?>