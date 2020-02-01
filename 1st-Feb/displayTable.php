<?php 
    require_once 'connection.php';

    displayTable("SELECT c.customer_id, c.firstName, c.lastName, cadd.city, cadd.company, cinfo.fieldValue FROM 
        customers c 
        LEFT JOIN 
        customer_address cadd   
        ON
        c.customer_id = cadd.customer_id
        LEFT JOIN 
        customer_additional_info cinfo
        ON
        c.customer_id = cinfo.customer_id
        AND
        cinfo.fieldKey = 'describeYourSelf'");

      
?>
