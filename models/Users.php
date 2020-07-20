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
                $this->permissions->setGroup($this->userInfor['group'], $this->userInfor['id_company']);
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

    public function getEmail()
    {
        if(isset($this->userInfor['email'])) {
            return $this->userInfor['email'];
        } else {
            return '';
        }
    }

}