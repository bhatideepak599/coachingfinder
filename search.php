<?php
include 'connection.php';
if(isset($_POST["data"])){
    $output='';
    $query="SELECT * FROM tbl_coaching_name WHERE coaching_name LIKE '%".$_POST["data"]."%'";
    $result=mysqli_query($conn,$query);
    $output='<ul class="list-unstyled">';
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $output.='<li>'.$row["coaching_name"].'</li>';
        }
    }else{
        $output.='<li>Coaching Not Found</li>';
    }
    $output.='</ul>';
    echo $output;


}
?>