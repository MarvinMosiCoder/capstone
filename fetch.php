<?php  
 $connect = mysqli_connect("localhost", "root", "", "bms");  
 if(isset($_POST["search"]))  
 {  
      $output = '';  
      $query = "SELECT FirstName, LastName FROM residences WHERE FirstName LIKE '%".$_POST["query"]."%' ";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["FirstName"]."&nbsp".$row["LastName"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Country Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  
