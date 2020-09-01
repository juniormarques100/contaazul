<?php

class reportController extends controller 
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
        if($u->hasPermission('report_view')) {
            $this->loadTemplate('report', $data);
        } else {
            header('Location: '.BASE_URL);
        }
    }

    public function sales() {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        $company = new Companies($u->getCompany());

        $data['company_name'] = $company->getName(); 
        $data['user_email'] = $u->getEmail();
        /*Fim*/

        $data['statuses'] = array(
            '0' => 'Aguardando Pagto.',
            '1' => 'Pago',
            '2' => 'Cancelado'
        );

        if($u->hasPermission('report_view')) {
           
            $this->loadTemplate('report_sales', $data);
        } else {
            header('Location: '.BASE_URL);
        }
    }

    public function sales_pdf() {
        $data = array();

        /*Informações devem serem repetidas nos controllers */
        $u = new Users();
        $u->setLogged();
        /*Fim*/

        $data['statuses'] = array(
            '0' => 'Aguardando Pagto.',
            '1' => 'Pago',
            '2' => 'Cancelado'
        );

        if($u->hasPermission('report_view')) {
            $client_name = addslashes($_GET['client_name']);
            $period1 = addslashes($_GET['period1']);
            $period2 = addslashes($_GET['period2']);
            $status = addslashes($_GET['status']);
            $order = addslashes($_GET['order']);

            $s = new Sales();
            $data['sales_list'] = $s->getSalesFiltered($client_name, $period1, $period2, $status, $order, $u->getCompany());
            $data['filters'] = $_GET;

            $this->loadLibrary('mpdf-6.0.0/mpdf');

            ob_start();
            $this->loadView('report_sales_pdf', $data);
            $html = ob_get_contents();
            ob_end_clean();
            
            
            $mpdf = new mPDF();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            
           
            
        } else {
            header('Location: '.BASE_URL);
        }
    }
}