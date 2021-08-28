<?php require './sections/header.php'; ?>
<br>
<br>
<br>
<div class="row d-flex justify-content-around align-self-center mt-5">
    
    <div class="col col-lg-4 col-md-6 col-sm-8 mb-4">
        <div class="card text-center">
            <div class="card-header bg-dark p-3 text-light new-header">
                Login
            </div>
            <div class="card-body bg-light">
            <form action="" class="">
            
            <!-- Email input start-->  
            <div class="form-group p-2 m-2">
                <input type="email" name="loginEmail" id="loginEmail" class="form-control p-2 new-input" placeholder="Enter Email..." autocomplete="off" required>
                <span class="loginEmail-error error text-danger"></span>
			</div>
            <!-- Email input end -->
            <!-- Password input start-->  
            <div class="form-group p-2 m-2">
            <input type="password" name="loginPassword" id="loginPassword" class="form-control p-2 new-input" placeholder="Enter Password..." autocomplete="off" required>
            <span class="loginPassword-error error text-danger"></span>
			</div>
            <!-- Password input end -->
            <!-- Submit button start-->  
            <div class="form-group p-2 m-2">
              <button type="submit" id="login"value="login"  class="btn btn-outline-dark form-control p-2 new-input">Login</button>
			</div>
            <!-- Submit button end -->
            </form> 
            </div>
            
            <div class="card-footer bg-dark p-3 text-light d-flex justify-content-around new-footer">
                <a class="text-decoration-none text-light" href="./registar" id="login">Create new accaount?</a>
                <a class="text-decoration-none text-light" href="./forgot_password" id="login">Forgot password?</a>
            </div>
        </div>
    </div>
</div>
<?php require './sections/footer.php'; ?>