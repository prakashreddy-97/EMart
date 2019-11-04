<?php
$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
?>
	<div class="product-item">
		<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
		<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
		<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
}
function read($from_record_num, $records_per_page){
 
    // select all products query
    $query = "SELECT
                id, name, description, price 
            FROM
                " . $this->table_name . "
            ORDER BY
                created DESC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind limit clause variables
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values
    return $stmt;
}
 
// used for paging products
public function count(){
 
    // query to count all product records
    $query = "SELECT count(*) FROM " . $this->table_name;
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // execute query
    $stmt->execute();
 
    // get row value
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
    // return count
    return $rows[0];
}
public function transfer($from, $to, $amount) {
 
    try {
        $this->pdo->beginTransaction();

        // get available amount of the transferer account
        $sql = 'SELECT amount FROM accounts WHERE id=:from';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":from" => $from));
        $availableAmount = (int) $stmt->fetchColumn();
        $stmt->closeCursor();

        if ($availableAmount < $amount) {
            echo 'Insufficient amount to transfer';
            return false;
        }
        // deduct from the transferred account
        $sql_update_from = 'UPDATE accounts
            SET amount = amount - :amount
            WHERE id = :from';
        $stmt = $this->pdo->prepare($sql_update_from);
        $stmt->execute(array(":from" => $from, ":amount" => $amount));
        $stmt->closeCursor();

        // add to the receiving account
        $sql_update_to = 'UPDATE accounts
                            SET amount = amount + :amount
                            WHERE id = :to';
        $stmt = $this->pdo->prepare($sql_update_to);
        $stmt->execute(array(":to" => $to, ":amount" => $amount));

        // commit the transaction
        $this->pdo->commit();

        echo 'The amount has been transferred successfully';

        return true;
    } catch (PDOException $e) {
        $this->pdo->rollBack();
        die($e->getMessage());
    }
}
?>