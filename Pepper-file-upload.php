<?php
include('dbConnect.php');

//$file = fopen($_FILES['csvUpload']['tmp_name'], "r");


// path where your CSV file is located

// Name of your CSV file
$csv_file = $_FILES['file']['tmp_name'];  
$myfile = fopen("Error Log File upload.txt", "w") or die("Unable to open file!");


//$csv_file  = 'Pepper HPI Data Set.csv';

if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }

$t = preg_replace('/[^0-9]/i', '',$col[4]);
$Currenct_Symbol_removed = (int)$t;
 //echo '<br>'.  $Currenct_Symbol_removed .'<br>';
 $date = date('Y-m-d', strtotime(str_replace('-', '/', $col[0])));



echo '<br> Uploading Pepper file  ';
echo '<br> Date  '.$col[0];
echo '<br> Address  '.$col[1];
echo '<br>  Postal Code  '.$col[2];
echo '<br> County    '.$col[3];
echo '<br>  Price  '.$col[4];
echo '<br>  Not full martket Price '.$col[5];
echo '<br> VAT_Exclusive  '.$col[6];
echo '<br> Size_Description  '.$col[7];
echo '<br>'.$col[8];



 $col1 = $date;
 $col2 = $col[1];
 $col3 = $col[2];
 $col4 = $col[3];
 $col5 = $Currenct_Symbol_removed;
 $col6 = $col[5];
 $col7 = $col[6];
 $col8 = $col[7];
 $col9 = $col[8];



   
// SQL Query to insert data into DataBase
$query2 = "INSERT INTO  io_pepper_sales
(
	
	Pepper_Sales_Date_of_Sale,
	Pepper_Sales_Address,
	Pepper_Sales_Postal_Code,
	Pepper_Sales_County,
	Pepper_Sales_Price,
	Pepper_Sales_Not_Full_Market_Price,
	Pepper_Sales_VAT_Exclusive,
	Pepper_Sales_Description_of_Property,
	Pepper_Sales_Property_Size_Description	
	
) 
	
	VALUES
	(

	'".$col1."',
	'".$col2."',
	'".$col3."',
	'".$col4."',
	'".$col5."',
	'".$col6."',
	'".$col7."',
	'".$col8."',
	'".$col9."'
	

	)

	";






if ($connect->query($query2) === TRUE) {
    echo "<br>New record created successfully<br>";
} else {
    $txt =  "Error:" . $connect->error;
}



 }
    fclose($handle);
}

echo "File data successfully imported to database!!";

fwrite($myfile, $txt);
fclose($myfile);
?>    