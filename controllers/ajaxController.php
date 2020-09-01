<?php
class ajaxController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
            header('Location: '.BASE_URL.'/login');
            exit;
        }
    }

    public function index(){}

    public function search_clients() 
    {
        $data = array();
        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $c = new Clients();

        if(isset($_GET['q']) && !empty($_GET['q'])) {
            $q = addslashes($_GET['q']);

            $clients = $c->searchClientByName($q, $u->getCompany());

            foreach($clients as $item) {
                $data[] = array(
                    'name' => $item['name'],
                    'link' => BASE_URL.'/clients/edit/'.$item['id'],
                    'id' => $item['id']
                );
            }
        }
        echo json_encode($data);
    }

    public function search_products() 
    {
        $data = array();
        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $i = new Inventory();

        if(isset($_GET['q']) && !empty($_GET['q'])) {
            $q = addslashes($_GET['q']);

            $products = $i->searchProductstByName($q, $u->getCompany());
            
            foreach($products as $item) {
                $data[] = array(
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'id' => $item['id']
                );
            }
            
        }
        echo json_encode($data);
    }

    public function add_client()
    {
        $data = array();
        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $c = new Clients();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);

            $data['id'] = $c->add($u->getCompany(), $name);
        }
        echo json_encode($data);
    }


}