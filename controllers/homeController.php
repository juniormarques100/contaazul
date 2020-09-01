<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
            header('Location: '.BASE_URL.'/login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();

        $s = new Sales();

        $data['statuses'] = array(
            '0' => 'Aguardando Pagto.',
            '1' => 'Pago',
            '2' => 'Cancelado'
        );

        $data['product_sold'] = $s->getSoldProducts(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());;
        $data['revenue'] = $s->getTotalRevenue(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());
        $data['expenses'] = $s->getTotalExpenses(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());
        
        $data['days_list'] = array();

        for($i=30; $i > 0; $i--) {
            $data['days_list'][] = date('d/m', strtotime('-'.$i.' days'));
        }

        $data['revenue_list'] = $s->getRevenueList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());

        $data['expenses_list'] = $s->getExpensesList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());

        $data['status_list'] = $s->getQuantStausList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());

        $this->loadTemplate('home', $data);
    }

}