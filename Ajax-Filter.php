<?php
include('dbConnect.php');

$County = $_POST['County'];







$sql = "SELECT sum(Property_Registered_Price) as Summed_amoutn , sum(Pepper_Sales_Price) as Compare_Pepper_Sales_Price   FROM io_property_registered_details 
left join io_pepper_sales on Pepper_Sales_County = Property_Registered_County

 where Property_Registered_County = '".$County."'";


$sql2 = "SELECT count(Property_Registered_ID) as Counted_Property_Register   FROM io_property_registered_details 


 where Property_Registered_County = '".$County."'";




 $sql3 = "SELECT count(Pepper_Sales_ID) as Counted_Property_Pepper   FROM io_pepper_sales 


 where Pepper_Sales_County = '".$County."'" ;





@$result3 = $connect->query($sql3);//@ symbol is important hides errors from front

if (@$result3->num_rows > 0) {
    // output data of each row


    while($row3 = $result3->fetch_assoc()) {

    	$count = 0; 
    	$Number_of_property = 	$count++; 

    	$Pepper_data = $row3['Counted_Property_Pepper'];

    		echo '<br> Number of properties sold Property Pepper  in   '.$County.'  ' .$row3['Counted_Property_Pepper'] ; 
		


		}


}









 @$result2 = $connect->query($sql2);


if (@$result2->num_rows > 0) {
    // output data of each row


    while($row2 = $result2->fetch_assoc()) {
				echo '<br> Number of properties sold Property Register in '.$County.' ' .$row2['Counted_Property_Register'] ; 
				



}

}



//Aove is used for filtering out how many properties are sold by Pepper or on the property register 

@$result = $connect->query($sql);//@ symbol is important hides errors from front

if (@$result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

    	$count = 0; 
    	$Number_of_property = 	$count++; 

    	$Proper_Register = $row['Summed_amoutn'];
		$Pepper_data = $row['Compare_Pepper_Sales_Price'];

		if ($Pepper_data < $Proper_Register)

		{

				$percentChange = (1 - $Pepper_data / $Proper_Register) * 100;

				echo'<br> <i style = "color:red" > Percentage difference of sales  ' .$County .'    <img style = "height:20px"src = "Images/Down.PNG"/>  '.round($percentChange) .'%'.'</i><br> ';




			

		}else {
		 
		 	@$percentChange = (1 - $Pepper_data / $Proper_Register) * 100;
			echo'<br> <i style = "color:green" > Percentage difference sales ' .' <img style = "height:20px"src = "Images/Up.PNG"/> + '.round($percentChange) .'%'.'</i><br> ';
		
		}



		 echo "<strong> Total Sales for Property Register:  ".$County.  "<br> € </strong>  " . number_format($row['Summed_amoutn']).  "<br>"; 
       echo "<strong> Total Sales for Pepper:  ".$County.  "<br> € </strong>  " . number_format($row['Compare_Pepper_Sales_Price']).  "<br>"; 

    
    }

} else {
    echo "0 results";
}
@$connect->close();



}

else{

include('Filteer-by-Year.php');


}



if (@$_POST['Start_Month'] != '') {
	include('Filteer-by-Month.php');
}


?>


                                                 
                              
                              
                             
                             


