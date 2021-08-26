<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826101150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // xml file path
        $path = "/var/www/orders.xml";
        $xmlfile = file_get_contents($path);
        $new = simplexml_load_string($xmlfile);
        $con = json_encode($new);
        $newArr = json_decode($con, true);
        $userArray = array();
        $itemArray = array();
        $productArray = array();
        $orderArray = array();
        foreach ($newArr['order'] as $order) {
            $idOrder = $order["@attributes"]["id"];
            $idUser = $order["customer"]["@attributes"]["id"];
            if (!isset($userArray[$idUser])) {
                $userArray[$idUser] = [
                    "id" => $idUser,
                    "firstname" => $order["customer"]["firstname"],
                    "lastname" => $order["customer"]["lastname"]
                ];
            }
            foreach($order["cart"] as $product) {
                // if only one product
                if (isset($product["@attributes"])) {
                    $this->setProductArrayAndItemArray($productArray, $itemArray, $product, $idOrder);
                } else {
                    foreach ($product as $p) {
                        $this->setProductArrayAndItemArray($productArray, $itemArray, $p, $idOrder);
                    }
                }
            }
            $orderArray[] = [
                "id" => $idOrder,
                "customer" => $idUser,
                "status" => $order["status"],
                "price" => $order["price"],
                "orderDate" => $order["orderDate"]
            ];
        }
        $this->persistInBdd($userArray, $productArray, $itemArray, $orderArray);
    }

    public function down(Schema $schema): void
    {

    }

    private function setProductArrayAndItemArray(
        array &$productArray,
        array &$itemArray,
        array $product,
        string $idOrder
    ) {
        $idProduct = $product["@attributes"]["sku"];
        if (!isset($productArray[$idProduct])) {
            $productArray[$idProduct] = [
                "sku" => $idProduct,
                "name" => $product["name"],
                "price" => $product["price"]
            ];
        }
        $itemArray[] = [
            "product" => $idProduct,
            "quantity" => $product["quantity"],
            "order" => $idOrder
        ];
    }

    private function persistInBdd ($userArray, $productArray, $itemArray, $orderArray) {
        $id = 1;
        $productSkuById = array();
        foreach ($productArray as $product) {
            $this->addSql('INSERT INTO product (id, sku, name, price) VALUES (' . $id . ', \'' . $product["sku"] . '\', \'' . $product["name"] . '\', ' . $product["price"] . ')');
            $productSkuById[$product["sku"]] = $id;
            $id++;
        }
        $id = 1;
        foreach ($userArray as $user) {
            $this->addSql('INSERT INTO user (id, username, first_name, last_name, roles, password) VALUES (' . $id . ', \'' . $user["firstname"] . '_' . $user["lastname"] . '\', \'' . $user["firstname"] . '\', \'' . $user["lastname"] . '\', \'[]\', \'1234\')');
            $id++;
        }
        $this->addSql('INSERT INTO user (id, username, first_name, last_name, roles, password) VALUES (' . $id . ', \'admin\', \'admin\', \'admin\', \'[]\', \'S3cr3T+\')');
        $id = 1;
        foreach ($orderArray as $order) {
            $this->addSql('INSERT INTO `order` (id, customer_id, order_date, status, price) VALUES (' . $id . ', \'' . $order["customer"] . '\', \'' . $order["orderDate"] . '\', \'' . $order["status"] . '\', ' . $order["price"] . ')');
            $id++;
        }
        $id = 1;
        foreach ($itemArray as $item) {
            $this->addSql('INSERT INTO item (id, product_id, order_item_id, quantity) VALUES (' . $id . ', ' . $productSkuById[$item["product"]] . ', ' . $item["order"] . ', ' . $item["quantity"] . ')');
            $id++;
        }
    }
}
