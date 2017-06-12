<?php
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    

    require 'vendor/autoload.php';
    require 'config.slim.php';
    
    $app = new \Slim\App(['settings'=>$config]);
    
    $container = $app->getContainer();
    
    $container['db']= function($c){
        $db=$c['settings']['db'];
        $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'], $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };
    $app->get('/user', function(Request $req, Response $res){
        $stmt=$this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->response->withJson($result);
    });
    
    
    $app->get('/user/{id}', function(Request $req, Response $res, $args){
        $id=(int)$args['id'];
        $stmt=$this->db->prepare('SELECT * FROM users WHERE idusers = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_OBJ);
        return $this->response->withJson($result);
    });
    
    $app->post('/user/add/', function(Request $req, Response $res){
        $data = $req->getParsedBody();
        
        $idusers = $data['idusers'];
        $roles = $data['roles'];
        $email = $data['email'];
        $pass = $data['pass'];
        $username = $data['username'];
        
        $stmt=$this->db->prepare('INSERT INTO users(idusers, roles, email, password, usersname) VALUES (:idusers, :roles, :email, :password, :usersname)');
        
        $stmt->bindValue(':idusers', $idusers);
        $stmt->bindValue(':roles', $roles);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pass);
        $stmt->bindValue(':usersname', $username);
        
        $stmt->execute();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos anadido un nuevo usuario."));
    });
    
    $app->put('/user/update/', function(Request $req, Response $res){
        $data = $req->getParsedBody();
        
        $idusers = $data['idusers'];
        $roles = $data['roles'];
        $email = $data['email'];
        $pass = $data['pass'];
        $username = $data['username'];
        
        $stmt=$this->db->prepare('UPDATE users SET roles= :roles, email= :email, password= :password, usersname= :usersname WHERE idusers = :idusers;');
        
        $stmt->bindValue(':idusers', $idusers);
        $stmt->bindValue(':roles', $roles);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pass);
        $stmt->bindValue(':usersname', $username);
        
        $stmt->execute();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos actualizado un nuevo usuario."));
    });
    
    $app->delete('/user/delete/{idusers}', function(Request $req, Response $res, $args){
        
        $iduser=(int)$args['idusers'];
        
        $stmt=$this->db->prepare('DELETE FROM users WHERE idusers = :idusers;');
        
        $stmt->bindValue(':idusers', $iduser);
        
        $stmt->execute();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos eliminado un nuevo usuario."));
    });
    
    $app->run();

        