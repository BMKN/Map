<?php
include('dbConnect.php');

$County = $_POST['County'];




if (@$_POST['Start_Month'] == '') {


$sql = "SELECT sum(Property_Registered_Price) as Summed_amount    FROM io_property_registered_details 

 where Property_Registered_County = '".$County."'";



$Compare_Prices = "SELECT  sum(Pepper_Sales_Price) as Compare_Pepper_Sales_Price   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'";




$Average_Sale_Price_Pepper =  "SELECT  AVG(Pepper_Sales_Price) as Average_Pepper_Sales_Price   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'";







$Average_Sale_Price_Property_Price_SQL =  "SELECT  AVG(Property_Registered_Price) as Average_Sale_Price_Property_Price   FROM io_property_registered_details 


 where Property_Registered_County = '".$County."'";








$sql2 = "SELECT count(Property_Registered_ID) as Counted_Property_Register   FROM io_property_registered_details 


 where Property_Registered_County = '".$County."'";




 $sql3 = "SELECT count(Pepper_Sales_ID) as Counted_Property_Pepper   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'" ;




$Average_Sale_Price_Property_Price = "";



 $result6 = $connect->query($Average_Sale_Price_Property_Price_SQL);


if ($result6->num_rows > 0) {
    // output data of each row


    while($row6 = $result6->fetch_assoc()) {
				

				$Average_Sale_Price_Property_Price .= $row6['Average_Sale_Price_Property_Price'];//Sets for a Golobal value 



}

}





















$Pepper_data_Price_Average = "";




 @$result5 = $connect->query($Average_Sale_Price_Pepper);


if (@$result5->num_rows > 0) {
    // output data of each row


    while($row5 = $result5->fetch_assoc()) {
				

				$Pepper_data_Price_Average .= $row5['Average_Pepper_Sales_Price'];//Sets for a Golobal value 




}

}
























$Pepper_data_Price_Data  = "";


//This is comparing for the prices needs to be separate queries 


 @$result4 = $connect->query($Compare_Prices);


if (@$result4->num_rows > 0) {
    // output data of each row


    while($row4 = $result4->fetch_assoc()) {
				

				$Pepper_data_Price_Data .= $row4['Compare_Pepper_Sales_Price'];//Sets for a Golobal value 




}

}













$Counted_Property_Pepper = "";




@$result3 = $connect->query($sql3);//@ symbol is important hides errors from front

if (@$result3->num_rows > 0) {
    // output data of each row


    while($row3 = $result3->fetch_assoc()) {

    	

    	$Counted_Property_Pepper .= $row3['Counted_Property_Pepper'];

		


		}


}







$Counted_Property_Register = "";

 @$result2 = $connect->query($sql2);


if (@$result2->num_rows > 0) {
    // output data of each row

    while($row2 = $result2->fetch_assoc()) {
    	$Counted_Property_Register .= $row2['Counted_Property_Register'];

				



}

}



//Aove is used for filtering out how many properties are sold by Pepper or on the property register 

@$result = $connect->query($sql);//@ symbol is important hides errors from front

if (@$result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

    	$Proper_Register = $row['Summed_amount'];

		if ($Pepper_data_Price_Data < $Proper_Register)

		{

				@$percentChange = (1 - $Pepper_data_Price_Data / $Proper_Register) * 100;

			//	echo'<div class = "Mytable"> <i style = "color:red" >  ' .$County .'    <img style = "height:20px"src = "Images/Down.PNG"/>  '.$percentChange .'%'.'</i> </div> ';




			

		}else {
		 
		 	@$percentChange = (1 - $Pepper_data_Price_Data / $Proper_Register) * 100;
		//	echo'<div class = "Mytable"> <i style = "color:green" > Percentage difference sales ' .' <img style = "height:20px"src = "Images/Up.PNG"/> + '.$percentChange .'%'.'</i> </div> ';
		
		}





       echo '

<div class="divTable" style="border: 1px solid #000;" >
<div class="divTableBody"
<div class="divTableRow">
<div class="divTableCell"><strong>Property Register</strong> </div>
<div class="divTableCell"><strong>Pepper Data</strong></div>
</div>
<div class="divTableRow">
<div class="divTableCell"> Total Sales for Property Register:  '.$County.  '<br><strong> € </strong>  ' . @number_format($Proper_Register).  '</div>
<div class="divTableCell"> Total Sales for Pepper:  '.$County.  '<br> <strong> € </strong>  ' . @number_format($Pepper_data_Price_Data).  '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Property Register Assets Sold in <br> '.$County.' ' .$Counted_Property_Register .'</div>
<div class="divTableCell">Pepper Assets Sold in  <br>   '.$County.'  ' .$Counted_Property_Pepper.'</div>
</div>
<div class="divTableRow">
<div class="divTableCell"> <p>Average Per Unit Sale Price for Property Register in '.$County.': </p> <strong>€ </strong>' . @number_format($Average_Sale_Price_Property_Price).'</div>
<div class="divTableCell"> Average Per Unit Sale Price Pepper  in   '.$County.' <strong><p></p> € </strong>' . @number_format($Pepper_data_Price_Average).'</div>
</div>
<div class="divTableRow">
<div class="divTableCell">&nbsp;</div>
<div class="divTableCell">&nbsp;</div>
</div>
</div>
</div>
       ';




    
    }

} else {
    echo "0 results";
}
@$connect->close();



}

else{

include('Filteer-by-Month.php');


}





?>


                                                 
                              
                              
                             
                             


