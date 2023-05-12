
<?php 

include_once './file.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user_id = $_SESSION['auth']['id'];
        $quality = $_POST['quality'];
        $feedback = $_POST['feedback'];
        $sexual = $_POST['sexual'];


        $sql = "INSERT INTO feedback(`user_id`,`quality`,`feedback`,`sexual`) Values('$user_id','$quality','$feedback','$sexual')";
        $answer = mysqli_query($conn, $sql);

        if($answer){
            echo "<script>window.alert('success')</script>";
        }
    }

?>



<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-8">
            
            <div class="form_box shadow">
                <form action="" method="POST" class="mx-5 py-4">
                  
                       <div class="header" style="background-color:brown;width:100%;color:whitesmoke;height:60px;text-align:center;padding: 13px;">
                         <h4>FeedBack From PHP</h4>
                       </div>

                       <p style="margin-top:40px;margin-bottom:10px">What do you think about the quality of our blog?</p>

                       
                        <div class="pic text-start float-start ">
                                <img src="../emoji/heart.jpeg" alt="" width="50" height="50">
                                <input type="radio" name="quality" value="99%">Heart
                        </div>

                        <div class="pic text-start float-start mx-4 ">
                                <img src="../emoji/like.png" alt="" width="50" height="50">
                                <input type="radio" name="quality" value="60%">Like
                        </div>

                        <div class="pic text-start mx-4 ">
                                <img src="../emoji/bad.jpeg" alt="" width="50" height="50">
                                <input type="radio" name="quality" value="20%">Unlike
                        </div>
                       

                       <p>Do you have any suggession for us?</p>
                       <textarea name="feedback" class="form-control" rows="10"></textarea><br>
                       <button class="btn btn-success" type="submit">Submit</button>

                      <div class="end float-end">
                      <i class="fa-solid fa-user"></i> Male <input type="radio" name="sexual" value="male"> (or) 
                      <i class="fa-sharp fa-solid fa-user"></i> Female <input type="radio" name="sexual" value="female">
                      </div>
                 
                </form>
            </div>

        </div>
    </div>
</div>
