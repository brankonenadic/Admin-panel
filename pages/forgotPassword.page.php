<?php require './sections/header.php'; ?>
<br>
<br>
<br>
<br>
<div class="row d-flex justify-content-around align-self-center mt-5">
    <div class="col col-lg-4 col-md-6 col-sm-8 mb-4">
        <!-- Card start -->
        <div class="card text-center">
            <!-- Card header start -->
            <div class="card-header bg-dark p-3 text-light new-header">
             Forgot password
            </div>
            <!-- Card header end -->
            <!-- Card body start -->
            <div class="card-body bg-light">
                <form action="" class="">
                <!-- Email input start-->  
                <div class="form-group p-3">
                    <input type="email" name="forgotPasswordEmail" id="forgotPasswordEmail" class="form-control p-2 new-input" placeholder="Enter Email..." autocomplete="off" required>
                    <small><span class="forgotPasswordEmail-error error text-danger"></span></small>
                </div>
                <!-- Email input end -->
                <!-- Submit button start-->  
                <div class="form-group p-3">
                <button type="submit" id="login"value="login"  class="btn btn-outline-dark form-control p-2 new-input">Forgot password</button>
                </div>
                <!-- Submit button end -->
                </form> 
            </div>
            <!-- Card body end -->
            <!-- Card footer start -->
            <div class="card-footer bg-dark p-3 text-light d-flex justify-content-around new-footer">
                <a class="text-decoration-none text-light" href="./registar">Create new accaount?</a>
                <a class="text-decoration-none text-light" href="./login">Already have an account?</a>
            </div>
            <!-- Card footer end -->
        </div>
       <!-- Card end --> 
    </div>
</div>
<?php require './sections/footer.php'; ?>