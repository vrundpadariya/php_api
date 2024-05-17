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
        $fetch = $this->fetchsinglecardetail($serialnumber);
        $result = mysqli_fetch_assoc($fetch);

        if ($result) {
            $query = "DELETE FROM $this->car_detail WHERE serialnumber=$serialnumber";

            $res = mysqli_query($this->connect, $query); 

            return $res;
        } else {
            return false;
        }
    }

    public function fetchcardetail()
    {
        $this->connect();

        $query = "SELECT * FROM $this->car_detail;";

        $res = mysqli_query($this->connect, $query); 

        return $res;
    }

    public function fetchsinglecardetail($serialnumber)
    {
        $this->connect();

        $query = "SELECT * FROM $this->car_detail WHERE serialnumber=$serialnumber;";

        $res = mysqli_query($this->connect, $query);

        return $res;
    }


    public function updatecardetail($model,$price,$year,$serialnumber)
    {
        $this->connect();

        $fetch = $this->fetchsinglecardetail($serialnumber);
        $result = mysqli_fetch_assoc($fetch);

        if ($result) {
            $query = "UPDATE $this->car_detail SET model='$model',price=$price,year = '$year' WHERE serialnumber=$serialnumber;";

            $res = mysqli_query($this->connect, $query);

            return $res;
        } else {
            return false;
        }
    }

    
public function deletcustomerdetail($Id)
{
    $this->connect();
    $fetch = $this->fetchsinglecardetail($Id);
    $result = mysqli_fetch_assoc($fetch);

    if ($result) {
        $query = "DELETE FROM $this->customer WHERE Id=$Id";

        $res = mysqli_query($this->connect, $query); 

        return $res;
    } else {
        return false;
    }
}

public function fetchcustomer()
{
    $this->connect();

    $query = "SELECT * FROM $this->customer;";

    $res = mysqli_query($this->connect, $query); 

    return $res;
}

public function fetchsinglecustomerdetail($Id)
{
    $this->connect();

    $query = "SELECT * FROM $this->customer WHERE Id=$Id;";

    $res = mysqli_query($this->connect, $query);

    return $res;
}


public function updatecustomer($first_name,$last_name,$phone_number,$Id)
{
    $this->connect();

    $fetch = $this->fetchsinglecardetail($Id);
    $result = mysqli_fetch_assoc($fetch);

    if ($result) {
        $query = "UPDATE $this->car_detail SET first_name='$first_name',last_name=$last_name,phone_number = '$phone_number' WHERE Id=$Id;";

        $res = mysqli_query($this->connect, $query);

        return $res;
    } else {
        return false;
    }
}

public function deletinvoice($id)
    {
        $this->connect();
        $fetch = $this->fetchsingleinvoice($id);
        $result = mysqli_fetch_assoc($fetch);

        if ($result) {
            $query = "DELETE FROM $this->car_detail WHERE id=$id";

            $res = mysqli_query($this->connect, $query); 

            return $res;
        } else {
            return false;
        }
    }


public function fetchinvoice()
{
    $this->connect();

    $query = "SELECT * FROM $this->invoice;";

    $res = mysqli_query($this->connect, $query); 

    return $res;
}

public function fetchsingleinvoice($id)
{
    $this->connect();

    $query = "SELECT * FROM $this->invoice WHERE id=$id;";

    $res = mysqli_query($this->connect, $query);

    return $res;
}


public function updateinvoice($invdate,$tax,$netprice,$carserialnumber,$customerid,$id)
{
    $this->connect();

    $fetch = $this->fetchsingleinvoice($id);
    $result = mysqli_fetch_assoc($fetch);

    if ($result) {
        $query = "UPDATE $this->invoice SET invdate='$invdate',tax=$tax,netprice = '$netprice',carserialnumber=$carserialnumber,customerid = '$customerid' WHERE id=$id;";

        $res = mysqli_query($this->connect, $query);

        return $res;
    } else {
        return false;
    }
}



}
?>