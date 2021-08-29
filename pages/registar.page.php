<?php require './sections/header.php'; ?>
<br>
<div class="row d-flex justify-content-around align-self-center mt-5">
    <div class="col col-lg-4 col-md-6 col-sm-8 mb-4">
        <!-- Card start -->
        <div class="card text-center">
            <!-- Card header start -->
            <div class="card-header bg-dark p-3 text-light new-header">
             Registar
            </div>
            <!-- Card header end -->
            <!-- Card body start -->
            <div class="card-body bg-light">
                <form id="registarForm" method="POST">
                <!-- Fullname input start-->  
                <div class="form-group p-3">
                    <input type="text" name="fullname" id="fullname" class="form-control p-2 new-input" placeholder="Enter your fullname..." autocomplete="off" required>
                    <small><span class="fullname-error error text-danger"></span></small>
                </div>
                <!-- Fullname input end --> 
                <!-- Email input start-->  
                <div class="form-group p-3">
                    <input type="email" name="registarEmail" id="registarEmail" class="form-control p-2 new-input" placeholder="Enter Email..." autocomplete="off" required>
                    <small><span class="registarEmail-error error text-danger"></span></small>
               </div>
               <!-- Email input end --> 
               <!-- Password input start-->  
               <div class="form-group p-3">
                    <input type="password" name="registarPassword" id="registarPassword" class="form-control p-2 new-input" placeholder="Enter Password..." autocomplete="off" required>
                    <small><span class="registarPassword-error error text-danger"></span></small>
                </div>
                <!-- Password input end -->
                <!-- RePassword input start-->  
                <div class="form-group p-3">
                    <input type="password" name="rePassword" id="rePassword" class="form-control p-2 new-input" placeholder="Ree Password..." autocomplete="off" required>
                    <small><span class="rePassword-error error text-danger"></span></small>
                </div>
                <!-- RePassword input end -->
                <!-- Submit button start-->  
                <div class="form-group p-3">
                <button type="submit" name="registar" id="registar"value="registar"  class="btn btn-outline-dark form-control p-2 new-input">Registar</button>
                </div>
                <!-- Submit button end -->
                </form> 
            </div>
            <!-- Card body end -->
            <!-- Card footer start -->
            <div class="card-footer bg-dark p-3 text-light d-flex justify-content-around new-footer">
                <a class="text-decoration-none text-light" href="./login">Already have an account ?</a>
                <a class="text-decoration-none text-light" href="./forgotPassword">Forgot password ?</a>
            </div>
            <!-- Card footer end -->
        </div>
       <!-- Card end --> 
    </div>
</div>
<?php require './sections/footer.php'; ?>