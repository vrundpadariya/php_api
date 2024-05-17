<?php
class config{
    
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "car";

    private $car_detail = "car_detail";
    private $customer = "customer";
    PRIVATE $invoice = "invoice";

    public $connect;


public function connect(){

    $this->connect = new mysqli($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
}

public function insertcardetail($model,$price,$year){

    $this->connect();
    $query = "INSERT INTO $this->car_detail(model,price,year) values('$model', $price, '$year');";

    $res = mysqli_query($this->connect, $query);

    return $res;
}

public function insertcustomer($first_name,$last_name,$phone_number){

    $this->connect();
    $query = "INSERT INTO $this->customer(first_name,last_name,phone_number) values('$first_name', '$last_name', '$phone_number');";

    $res = mysqli_query($this->connect, $query);

    return $res;
}

public function insertinvoicedetail($invdate,$tax,$netprice,$carserialnumber,$customerid){

    $this->connect();
    $query = "INSERT INTO $this->invoice(invdate,tax,netprice,carserialnumber,customerid) values('$invdate', '$tax', '$netprice','$carserialnumber','$customerid');";

    $res = mysqli_query($this->connect, $query);

    return $res;
}

public function deletecardetail($serialnumber)
    {
        $this->connect();
        $fetch = $this->fetchSingleStudentData($serialnumber);
        $result = mysqli_fetch_assoc($fetch);

        if ($result) {
            $query = "DELETE FROM $this->car_detail WHERE serialnumber=$serialnumber";

            $res = mysqli_query($this->conn, $query); 

            return $res;
        } else {
            return false;
        }
    }

    public function fetchsinglecardetail($serialnumber)
    {
        $this->connect();

        $query = "SELECT * FROM $this->car_detail WHERE serialnumber=$serialnumber;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }


public function updatecardetail($model,$price,$year){

    $this->connect();
    $query = "INSERT INTO $this->car_detail(model,price,year) values('$model', $price, '$year');";

    $res = mysqli_query($this->connect, $query);

    return $res;
}

}
?>