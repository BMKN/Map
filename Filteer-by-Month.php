<link href="Drag_and_Drop.css" rel="stylesheet" type="text/css">
<?php
include('dbConnect.php');
$Start_Month = $_POST['Start_Month'];
$End_Month = $_POST['End_Month'];
$County = $_POST['County'];



$sql = "SELECT sum(Property_Registered_Price) as Summed_Price  FROM io_property_registered_details

 WHERE Property_Registered_Date_of_Sale Between '$Start_Month ' and  '$End_Month' and 	Property_Registered_County = '$County'";



$sql2 = "SELECT  sum(Pepper_Sales_Price) as Pepper_Pepper_Sales_Price FROM  io_pepper_sales

 WHERE Pepper_Sales_Date_of_Sale BETWEEN '$Start_Month' and '$End_Month' and 	Pepper_Sales_County = '$County'";







$Average_Sale_Price_Pepper_SQL =  "SELECT  AVG(Pepper_Sales_Price) as Average_Pepper_Sales_Price   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'";







$Average_Sale_Price_Property_Price_SQL =  "SELECT  AVG(Property_Registered_Price) as Average_Sale_Price_Property_Price   FROM io_property_registered_details 


 where Property_Registered_County ='".$County."'";






$Counted_Property_Register_SQL = "SELECT count(Property_Registered_ID) as Counted_Property_Register   FROM io_property_registered_details 


 where Property_Registered_County = '".$County."'";




 $Counted_Property_Pepper_SQL = "SELECT count(Pepper_Sales_ID) as Counted_Property_Pepper   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'" ;







$Counted_Property_Register ="";





@$result3 = $connect->query($Counted_Property_Register_SQL);


if ($result3->num_rows > 0) {
    // output data of each row


    while($row3 = $result3->fetch_assoc()) {
				

				$Counted_Property_Register .= $row3['Counted_Property_Register'];//Sets for a Golobal value 



}

}





$Counted_Property_Pepper ="";





@$result4 = $connect->query($Counted_Property_Pepper_SQL);


if ($result4->num_rows > 0) {
    // output data of each row


    while($row4 = $result4->fetch_assoc()) {
				

				$Counted_Property_Pepper .= $row4['Counted_Property_Pepper'];//Sets for a Golobal value 



}

}
















$Average_Sale_Price_Property_Price ="";





@$result6 = $connect->query($Average_Sale_Price_Property_Price_SQL);


if ($result6->num_rows > 0) {
    // output data of each row


    while($row6 = $result6->fetch_assoc()) {
				

				$Average_Sale_Price_Property_Price .= $row6['Average_Sale_Price_Property_Price'];//Sets for a Golobal value 



}

}








$Pepper_data_Price_Average = "";




 @$result5 = $connect->query($Average_Sale_Price_Pepper_SQL);


if (@$result5->num_rows > 0) {
    // output data of each ro


    while($row5 = $result5->fetch_assoc()) {
				

				$Pepper_data_Price_Average .= $row5['Average_Pepper_Sales_Price'];//Sets for a Golobal value 




}

}









$result = $connect->query($sql);
$Property_Register_by_Month= "";

if ($result->num_rows > 0) {
   

while($row = $result->fetch_assoc()) {
       $Property_Register_by_Month .= $row['Summed_Price'];

       

       }

}






$Pepper_data_by_Month = "";
$percentChange = "";
 
$result2 = $connect->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
       $Pepper_data_by_Month .= $row2['Pepper_Pepper_Sales_Price'];




		if ($Pepper_data_by_Month <	 $Property_Register_by_Month)

		{

				@$percentChange .= (1 - $Pepper_data_by_Month / $Property_Register_by_Month) * 100;


			

		}

		else {
		 
		 	@$percentChange .= (1 - $Pepper_data_by_Month / $Property_Register_by_Month) * 100;
		
		}


    }
    


} else {
    echo "0 results";
}







       echo '

<div class="divTable" style="border: 1px solid #000;" >
<div class="divTableBody"
<div class="divTableRow">
<div class="divTableCell"><strong>Property Register</strong> </div>
<div class="divTableCell"><strong>Pepper Data</strong></div>
</div>
<div class="divTableRow">
<div class="divTableCell"> Total Sales figures for Property Register:  '.$County.  '<br> <strong>  € </strong>  ' . @number_format($Property_Register_by_Month).  ' </div>
<div class="divTableCell"> Total Sales figures for Pepper:  '.$County.  '<br> <strong>  € </strong>  ' . @number_format($Pepper_data_by_Month).  '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Property Register Assets Sold in <br> '.$County.' ' .$Counted_Property_Register .'</div>
<div class="divTableCell">Pepper Assets Sold in  <br>   '.$County.'  ' .$Counted_Property_Pepper.'</div>
</div>
<div class="divTableRow">
<div class="divTableCell"> <p>Average Per Unit Sale Price for Property Register in '.$County.': </p> <strong>€ </strong>' . @number_format($Average_Sale_Price_Property_Price).'</div>
<div class="divTableCell"> Average Per Unit Sale Price Pepper  in   '.$County.' <strong><p></p> € </strong>' . @number_format($Pepper_data_Price_Average).'</div>
</div>
</div>

</div>
</div>
       ';




?>