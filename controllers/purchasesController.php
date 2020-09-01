<?php
class purchasesController extends controller 
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

        if($u->hasPermission('purchases_view')) {
            $p = new Purchases();
            $offset = 0;

            $data['purchases_list'] = $p->getList($offset, $u->getCompany());   
            
            $this->loadTemplate('purchases', $data);
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

        if($u->hasPermission('purchases_view')) {
            $p = new Purchases();

            if(isset($_POST['total_price']) && !empty($_POST['total_price'])) {  

                $total_price = addslashes($_POST['total_price']);
                $date_purchase = addslashes($_POST['date_purchase']);
                $id_company = $u->getCompany();
            

                $total_price = str_replace(',','.', $total_price);

                $p->addPurchases($id_company, $u->getId(), $total_price, $date_purchase);

                header('Location: '.BASE_URL.'/purchases');
            }
            $this->loadTemplate('purchases_add', $data);
        } else {
            header('Location: '.BASE_URL.'/purchases');
        }
    }
}