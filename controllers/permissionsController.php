<?php
class permissionsController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
            header('Location: '.BASE_URL.'/login');
        }
    }

    public function index() {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        if($u->hasPermission('permission_view')) {
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());

            $this->loadTemplate('permissions', $data);
        } else {
            header('Location: '.BASE_URL);
        }
    }

    public function add() {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        if($u->hasPermission('permission_view')) {
            $permissions = new Permissions();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $permissions->add($pname, $u->getCompany());
                header('Location: '.BASE_URL.'/permissions');
            }

            $this->loadTemplate('permissions_add', $data);
        } else {
            header('Location: '.BASE_URL);
        }
    }

    public function delete($id) {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        if($u->hasPermission('permission_view')) {
            $permissions = new Permissions();

            $permissions->delete($id);
            header('Location: '.BASE_URL.'/permissions');

            $this->loadTemplate('permissions_delete', $data);
        } else {
            header('Location: '.BASE_URL);
        }
    }
}