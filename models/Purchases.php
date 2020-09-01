<?php
class Purchases extends model
{
    public function getList($offset, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * 
        FROM purchases WHERE id_company = :id_company ORDER BY date_purchase DESC LIMIT $offset, 10");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addPurchases($id_company, $id_user, $total_price, $date_purchase)
    {
        $i = new Inventory();
        
        $sql = $this->db->prepare("INSERT INTO purchases SET id_company = :id_company, id_user = :id_user, total_price = :total_price, date_purchase = :date_purchase");
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':id_user', $id_user);
        $sql->bindValue(':total_price', $total_price);
        $sql->bindValue(':date_purchase', $date_purchase);
        $sql->execute();

        $id_purchase = $this->db->lastInsertId();

        $total_price = 0;

        foreach($quant as $id_prod => $quant_prod) {
            $sql = $this->db->prepare("SELECT price FROM inventory WHERE id = :id AND id_company = :id_company");
            $sql->bindValue('id', $id_prod);
            $sql->bindValue('id_company', $id_company);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $price = $row['price'];

                $sqlp = $this->db->prepare("INSERT INTO purchases_products SET id_company = :id_company, id_purchase = :id_purchase, 
                id_product = :id_product, quant = :quant, purchase_price = :purchase_price");
                $sqlp->bindValue(':id_company', $id_company);
                $sqlp->bindValue(':id_purchase', $id_purchase);
                $sqlp->bindValue(':id_product', $id_prod);
                $sqlp->bindValue(':quant', $quant_prod);
                $sqlp->bindValue(':purchase_price', $price);
                $sqlp->execute();

                $i->increase($id_prod, $id_company, $quant_prod, $id_user);

                $total_price += $price * $quant_prod;
            }
        }

        $sql = $this->db->prepare("UPDATE purchases SET total_price = :total_price WHERE id = :id");
        $sql->bindValue(':total_price', $total_price);
        $sql->bindValue('id', $id_purchase);
        $sql->execute();
    }
}