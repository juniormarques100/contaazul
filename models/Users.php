<?php

class Users extends model
{
    private $userInfor;
    private $permissions;

    public function isLogged() 
    {

        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($email, $password)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['id'];

            return true;
        } else {
            return false;
        }
    }

    public function setLogged()
    {
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            $id = $_SESSION['ccUser'];

            $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $this->userInfor = $sql->fetch();
                $this->permissions = new Permissions();
                $this->permissions->setGroup($this->userInfor['id_group'], $this->userInfor['id_company']);
            }
        }
    }

    public function logout() {
        unset($_SESSION['ccUser']);
    }

    public function hasPermission($name) {
        return $this->permissions->hasPermission($name);
    }

    public function getCompany()
    {
        if(isset($this->userInfor['id_company'])) {
            return $this->userInfor['id_company'];
        } else {
            return 0;
        }
    }

    public function getId()
    {
        if(isset($this->userInfor['id'])) {
            return $this->userInfor['id'];
        } else {
            return '';
        }
    }

    public function getEmail()
    {
        if(isset($this->userInfor['email'])) {
            return $this->userInfor['email'];
        } else {
            return '';
        }
    }

    public function getInfo($id, $id_company) {
        $array = array();

        $sql = $this->db->prepare('SELECT * FROM users WHERE id = :id AND id_company = :id_company');
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function findUsersInGroup($id) {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :id_group");
        $sql->bindValue(':id_group', $id);
        $sql->execute();

        $row = $sql->fetch();

        if($row['c'] == '0') {
            return false;
        } else {
            return true;
        }
    }

    public function getList($id_company) {
        $array = array();

        $sql = $this->db->prepare("SELECT u.id, u.email, pg.name FROM users u, permission_groups pg WHERE u.id_group = pg.id AND u.id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($email, $pass, $group, $id_company) {

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        $row = $sql->fetch();

        if($row['c'] == '0') {
            $sql = $this->db->prepare('INSERT INTO users SET email = :email, password = :pass, id_group = :group, id_company = :id_company');
            $sql->bindValue(':email', $email);
            $sql->bindValue(':pass', md5($pass));
            $sql->bindValue(':group', $group);
            $sql->bindValue(':id_company', $id_company);
            $sql->execute();

            return '1';
        } else {
            return '0';
        }
    }

    public function edit($pass, $group, $id, $id_company) {
        $sql = $this->db->prepare('UPDATE users SET id_group = :id_group WHERE id = :id AND id_company = :id_company');
        $sql->bindValue(':id_group', $group);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if(!empty($pass)) {
            $sql = $this->db->prepare('UPDATE users SET password = :pass WHERE id = :id AND id_company = :id_company');
            $sql->bindValue(':pass', md5($pass));
            $sql->bindValue(':id', $id);
            $sql->bindValue(':id_company', $id_company);
            $sql->execute();
        }
    }

    public function delete($id, $id_company) {
        $sql = $this->db->prepare('DELETE FROM users WHERE id = :id AND id_company = :id_company');
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
    }

}