<?php //include"connection.php";
 
$conn = new PDO ("mysql:host=localhost; dbname=ccm_DB", "ccm_web", "ccmwebsite");
$limit = 10 ;

 
$output="";
 
$page= 1;

//$religion = isset($_POST['religion']) ? $_POST['religion'] : '';


//if( isset($_POST['page']) ? $_POST['religion'] > 1    )

//if($_POST['page'] > 1)
if(isset($_POST['page'])){


$start= (($_POST['page'] - 1)  * $limit);

$page= $_POST['page'];


}else{


$start= 0;

}

$query="SELECT * FROM  `contacts`  ";


//$sql="SELECT * FROM  `contacts`  ";
//$query=mysqli_query($conn, $sql) or die("query unsuccessful");

if($_POST['query'] != ''){


//$query .= 'WHERE name LIKE "%'.str_replace('', '%', $_POST['query']).'%"	';

$query .= 'WHERE name LIKE "%'.str_replace('', '%', $_POST['query']).'%"  ';

}

//$query .='	ORDER BY  `id` DESC	';

//$filter_query1 = $query . 'LIMIT '.$start.', '.$limit.' ';

//$filter_query=mysqli_query($conn, $filter_query1) or die("query unsuccessful");


//$total_data=mysqli_num_rows($query);
//$result=mysqli_num_rows($filter_query);
//$rows=mysqli_fetch_array($result);


$query .='  ORDER BY  `id` DESC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.' ';

$statement= $conn->prepare($query);
$statement->execute();
$total_data= $statement->rowCount();

//up to count and down to fetch

$statement = $conn->prepare($filter_query);
$statement->execute();

$result =$statement->fetchAll();





$output='<label>Total Record -  '.$total_data.'   </label>    ';



$output .= '<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>subject</th>
        <th>message</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>';


    if($total_data  > 0){


$number=1;

foreach ($result as $row) {



$output.=' <tr>
        <td>'.$number.'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['subject'].'</td>
        <td>'.$row['message'].'</td>

        <td>  <button type="button" class="btn btn-info btn-sm" onclick="GetUserDetails('.$row['id'].')" >Edit</button></td>




<td>  <button type="button" class="btn btn-danger btn-sm" onclick="DeleteUser('.$row['id'].')">Delete</button></td>

 </tr>';


$number++;
}

$output.=' </tbody>
  </table>
  ';





    }else{



    	$output.='<tr><td><h3>no record found</h3></tr></td>';

    }




$output.='
 <div style="display: grid;align-items: center;justify-content: center;">
<ul class ="pagination">';

//pagination

//$page_query="SELECT * FROM  `contacts` ORDER BY  id DESC  ";
//$page_result=mysqli_query($conn, $page_query) or die("query unsuccessful");

//$total_records=mysqli_num_rows($page_result);





$total_links= ceil($total_data/$limit);
$previous_link ='';
$next_link ='';
$page_link ='';
$page_array= array();



if($total_links > 4){

if($page < 5 ){

for ($count=1; $count <=5; $count++){

$page_array[] = $count;
}
$page_array[]= '...';
$page_array[]= $total_links;


}else{


$end_limit = $total_links - 5 ;


if($page > $end_limit){


$page_array[]= 1;
$page_array[]= '...';

for ($count= $end_limit; $count <=$total_links; $count++){


$page_array[]= $count;


}



}else{



$page_array[]= 1;
$page_array[]= '...';
for ($count= $page - 1; $count <=$page + 1; $count++){
  


$page_array[]= $count;

}


$page_array[]= '...';

$page_array[]= $total_links;



}


}


}
else{


for ($count=1; $count <= $total_links; $count++){


$page_array[] =$count;

}



}




//pagination link

for ($count=0; $count < count($page_array); $count++){

if ($page == $page_array[$count]){

 $page_link.="<li class=' btn-sm page-item active'><a class='page-link' href='#'>".$page_array[$count]."
 <span  class='sr-only'>current</span></a></li>"; 

 $previous_id = $page_array[$count] - 1;


 if($previous_id > 0 ){

$previous_link="<li class=' btn-sm page-item '>
 <a class='page-link' href='javascript:void(0)' data-page_number=".$previous_id  .">Prev</a></li>"; 

 }else{



$previous_link="<li class=' btn-sm page-item disabled'>
 <a class='page-link' href='#' >Prev</a></li>"; 



 }


 $next_id = $page_array[$count] + 1;


if($next_id >= $total_links){




$next_link="<li class=' btn-sm page-item disabled'>
 <a class='page-link' href='#' >Next</a></li>"; 



}else{




$next_link="<li class=' btn-sm page-item '>
 <a class='page-link' href='javascript:void(0)' data-page_number=".$next_id.">Next</a></li>"; 



}






//}

}else{


if($page_array[$count] == '...'){



$page_link.="<li class=' btn-sm page-item disabled'>
 <a class='page-link' href='#' >...</a></li>"; 



}else{




$page_link.="<li class=' btn-sm page-item '>
 <a class='page-link' href='javascript:void(0)' data-page_number=".$page_array[$count]  .">".$page_array[$count]."</a></li>"; 






}

}

}


//combining 



$output .= $previous_link . $page_link . $next_link;


$output.='</ul></div> ';


echo $output;


