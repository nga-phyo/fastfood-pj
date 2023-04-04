
<?php 


error_reporting(0);

session_start();

include_once '../user/connect.php';
include_once '../user/header.php';
include_once '../user/helper.php';
include_once './navbar.php';



        if(!isset($_SESSION['auth']['admin'])){
            redirect('login.php');
        }

?>

<?php 


   
$user_id = $_SESSION['auth']['id'];
    $perpage = 4;
    $sql = "SELECT * FROM feedback";
    $answer = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($answer);
    $nums = ceil($total_rows/$perpage);
    $page = '';

    if(isset($_GET['page'])){

        $page = $_GET['page'];
        $total = ($page*$perpage)-$perpage;
    }

    if(!isset($_GET['page'])){
        $total = 0;
    }

    
    $sql = " SELECT * FROM users inner join feedback on users.id = feedback.user_id limit $total, $perpage";
    // $sql = "SELECT * FROM users inner join feedback on  users.id = feedback.user_id limit $total,$perpage ";
    $data = mysqli_query($conn, $sql);
   
    $feedbacks = mysqli_fetch_all($data,MYSQLI_ASSOC);

    

    
   
   

?>


<div class="container">
    <div class="row justify-content-center align-itmes-center">
        <div class="col-6 mt-4">

            <?php foreach($feedbacks as $feedback): ?> 
            
                <div class="card">
                    <div class="card-body">
                        <p> <?php echo $feedback['feedback'] ?> </p>
                        date: <?php  echo $feedback['date'] ?><br>
                        user: <?php  echo $feedback['name'] ?><br>
                        user: <?php  echo $feedback['email'] ?>
                       
                    </div>
                </div><br>


            <?php endforeach ?>

            <ul class="pager">
            <?php 
                for($i=1; $i<= $nums; $i++){
                    if($i == $page){

                        echo "<li><a href = 'feedbackpage.php?page={$i}' style = 'background:#09;color:#fff;'>{$i}</a></li>";
                    }
                    else{
                        echo "<li><a href='feedbackpage.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
        </ul>
           
        </div>
    </div>
</div>


