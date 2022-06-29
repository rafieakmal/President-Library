<?php
    function GetCustomerID($conn) {
        $query = "SELECT max(customer_id) as maxID FROM customer";
        $myresult = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($myresult);
        $code = $data['maxID'];
        $num = (int) substr($code, 5);
        $num++;
        $char = "CUST-";
        return $char . sprintf("%03s", $num);
    }

    function GetLoanID($conn) {
        $query = "SELECT max(loan_id) as maxID FROM loan";
        $myresult = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($myresult);
        $code = $data['maxID'];
        $num = (int) substr($code, 5);
        $num++;
        $char = "LOAN-";
        return $char . sprintf("%03s", $num);
    }

    function GetAdminID($conn) {
        $query = "SELECT max(admin_id) as maxID FROM librarian";
        $myresult = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($myresult);
        $code = $data['maxID'];
        $num = (int) substr($code, 4);
        $num++;
        $char = "ADM-";
        return $char . sprintf("%03s", $num);
    }
?>