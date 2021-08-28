<?php require './sections/header.php'; ?>
<br>
<br>
<br>
<div class="row d-flex justify-content-around align-self-center mt-5">
    <div class="col col-lg-4 col-md-6 col-sm-8 mb-4">
        <!-- Card start -->
        <div class="card text-center">
            <!-- Card header start -->
            <div class="card-header bg-dark p-3 text-light new-header">
             Login
            </div>
            <!-- Card header end -->
            <!-- Card body start -->
            <div class="card-body bg-light">
                <form action="" class="">
                <!-- Email input start-->  
                <div class="form-group p-2 m-2">
                    <input type="email" name="loginEmail" id="loginEmail" class="form-control p-2 new-input" placeholder="Enter Email..." autocomplete="off" required>
                    <small><span class="loginEmail-error error text-danger"></span></small>
                </div>
                <!-- Email input end -->
                <!-- Password input start-->  
                <div class="form-group p-2 m-2">
                    <input type="password" name="loginPassword" id="loginPassword" class="form-control p-2 new-input" placeholder="Enter Password..." autocomplete="off" required>
                    <small><span class="loginPassword-error error text-danger"></span></small>
                </div>
                <!-- Password input end -->
                <!-- Submit button start-->  
                <div class="form-group p-2 m-2">
                <button type="submit" id="login"value="login"  class="btn btn-outline-dark form-control p-2 new-input">Login</button>
                </div>
                <!-- Submit button end -->
                </form> 
            </div>
            <!-- Card body end -->
            <!-- Card footer start -->
            <div class="card-footer bg-dark p-3 text-light d-flex justify-content-around new-footer">
                <a class="text-decoration-none text-light" href="./registar" id="login">Create new accaount?</a>
                <a class="text-decoration-none text-light" href="./forgot_password" id="login">Forgot password?</a>
            </div>
            <!-- Card footer end -->
        </div>
       <!-- Card end --> 
    </div>
</div>
<?php require './sections/footer.php'; ?>