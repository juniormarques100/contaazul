<?php
class inventoryController extends controller 
{

    public function __construct()
    {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
            header('Location: '.BASE_URL.'/login');
        }
    }

    public function index() 
    {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        if($u->hasPermission('inventory_view')) {
            $i = new Inventory();
            $offset = 0;

            $data['inventory_list'] = $i->getList($offset, $u->getCompany());

            $data['add_permission'] = $u->hasPermission('inventory_add');
            $data['edit_permission'] = $u->hasPermission('inventory_edit');
            
            $this->loadTemplate('inventory', $data);
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

        if($u->hasPermission('inventory_add')) {

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $i = new Inventory();

                $name = addslashes($_POST['name']);
                $price = addslashes($_POST['price']);
                $quant = addslashes($_POST['quant']);
                $min_quant = addslashes($_POST['min_quant']);
                $id_company = $u->getCompany();

                $price = str_replace(',','.', $price);

                $i->add($id_company, $name, $price, $quant, $min_quant, $u->getId());

                header('Location: '.BASE_URL.'/inventory');
            }
            $this->loadTemplate('inventory_add', $data);
        } else {
            header('Location: '.BASE_URL.'/inventory');
        }
    }

    public function edit($id) {

        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        if($u->hasPermission('inventory_edit')) {
            $i = new Inventory();

            if(isset($_POST['name']) && !empty($_POST['name'])) {

                $name = addslashes($_POST['name']);
                $price = addslashes($_POST['price']);
                $quant = addslashes($_POST['quant']);
                $min_quant = addslashes($_POST['min_quant']);
                $id_company = $u->getCompany();

                $price = str_replace('.','', $price);
                $price = str_replace(',','.', $price);

                $i->edit($id, $id_company, $name, $price, $quant, $min_quant, $u->getId());

                header('Location: '.BASE_URL.'/inventory');
            }
            $data['inventory_info'] = $i->getInfo($id, $u->getCompany());

            $this->loadTemplate('inventory_edit', $data);
        } else {
            header('Location: '.BASE_URL.'/inventory');
        }
    }

    public function delete($id)
    {
        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();

        if($u->hasPermission('inventory_edit')) {
            $i = new Inventory();
            $i->delete($id, $u->getCompany(), $u->getId());
            header('Location: '.BASE_URL.'/inventory');
        } else {
            header('Location: '.BASE_URL);
        }
    }
    
}