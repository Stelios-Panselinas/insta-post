
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eshop";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $q = $_GET['q'];
        $stmt = $conn->prepare("SELECT name FROM product WHERE name LIKE ?");
        $stmt->bind_param("s", $q);
        $stmt->execute();
        $result = $stmt->get_result();
        //echo "<select multiple class=" . "form-select" . "id=" . "results" . "onclick=" . "autoFill(this.value)" . ">";
        $val = 1;
        while ($row = $result->fetch_assoc()) {
                echo "<option value=".$val.">".$row['name']."</option>";
                $val++;
        }
        $conn->close();
        ?>
    
