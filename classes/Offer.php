<?php
session_start();
require_once 'Database.php';
class Offer extends Database {
    public function showResult($result){
        $this->connect();

        $stmt = $this->prepare("SELECT name FROM product WHERE name LIKE ?");
        $stmt->bind_param("s", $result);
        $stmt->execute();
        $results = $stmt->get_result();
        $i = 1;
        while ($row = $results->fetch_assoc()) {
            echo "<option value=".$i.">".$row['name']."</option>";
            $i++;
        }
    }

    public function autoFill($text)
    {
        $this->connect();

        $stmt = $this->prepare("SELECT category.category_id FROM category INNER JOIN subcategory ON category.category_id=subcategory.category_id INNER JOIN product ON subcategory.sub_id=product.prod_sub_id WHERE product.name = ?");
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo $row['category_id'];
        }
    }

    public function subcategoryFill($category_id){
        $this->connect();

        $stmt = $this->prepare("SELECT subcategory.name FROM subcategory INNER JOIN category ON category.category_id=subcategory.category_id WHERE category.category_id = ?");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "<option value=0".">"."Επιλέξτε Υποκατηγορία"."</option>";
        $val = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<option value=".$val.">".$row['name']."</option>";
            $val++;
        }
    }

    public function productFill($subcategory_id){
        $this->connect();

        $stmt = $this->prepare("SELECT product.name FROM product INNER JOIN subcategory ON product.prod_sub_id=subcategory.sub_id WHERE subcategory.name LIKE ?");
        $stmt->bind_param("s", $subcategory_id);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "<option value=0".">"."Επιλέξτε Προϊόν"."</option>";
        $val = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<option value=".$val.">".$row['name']."</option>";
            $val++;
        }
    }
}

$offer = new Offer();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['function'] === 'showResult') {
        $result = $_GET['result'];
        $offer->showResult($result);
    } elseif ($_GET['function'] === 'autoFill') {
        $text = $_GET['text'];
        $offer->autoFill($text);
    } elseif ($_GET['function'] === 'subcategoryFill') {
        $category_id = $_GET['category_id'];
        $offer->subcategoryFill($category_id);
    } elseif ($_GET['function'] === 'productFill') {
        $subcategory_id = $_GET['subcategory_id'];
        $offer->productFill($subcategory_id);
    }
}