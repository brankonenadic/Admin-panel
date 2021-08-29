/* Registar start */
$(document).ready(() =>{ 

    const fullname = $('#fullname');
    const fullnameMsg = $('.fullname-error');
    const regfullname = /^[A-žÀ-ÿš ]+$/;

    const registarEmail = $('#registarEmail');
    const registarEmailMsg = $('.registarEmail-error');
    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;

    const registarPassword = $('#registarPassword');
    const registarPasswordMsg = $('.registarPasword-error');

    const rePassword = $('#rePassword');
    const rePasswordMsg = $('.rePassword-error');
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

    

    $('#registrationForm').submit((e) => {
      e.preventDefault();

      if ($('input').hasClass('invalid')){
        return false;
      } else {
        const fullnameChecked = fullname.val();
        const registarEmailChacked = registarEmail.val();
        const registarPasswordChacked = registarPassword.val();
        const rePasswordChecked = rePassword.val();
        const registarSubmit = $('#registar').val();

        $.ajax({
          type: 'post',
          url: './include/regidtar.inc.php',
          data: {
            'fullname': fullnameChecked,
            'registarEmail': registarEmailChacked,
            'registarPassvord': registarPasswordChacked,
            'rePassword': rePasswordChecked,
            'submit': registarSubmit
          },
          success: function(response){
            if (response){
              console.log(response);
            } else {
              xonsole.log(tesponse);
            }
          }

        });
      }
    });
/* Check fullname start */
    fullname.focusout(() => {

      if (fullname.val() == '') {
          fullnameMsg.text('Fullname is required !');
          fullname.removeClass('valid');
          fullname.addClass('invalid');
      } else if (!regfullname.test(fullname.val())) {
          fullnameMsg.text('Enter valid fullname !');
          fullname.removeClass('valid');
          fullname.addClass('invalid');        
      } else if (fullname.val().length < 3) {
          fullnameMsg.text('Fullname mast have 3 charters !');
          fullname.removeClass('valid');
          fullname.addClass('invalid');   
      } else {
        checkFullname = fullname.val();
       $.ajax({
         type: 'post',
         url: './includes/registar.inc.php',
         data: {
           'checkedFullname': checkFullname
         },
         success: function(response){
           if (response) {
              console.log(response);
              fullnameMsg.text('');
              fullname.removeClass('invalid');
              fullname.addClass('valid'); 
           } else {
              console.log(response);
              fullnameMsg.text(response);
              fullname.removeClass('valid');
              fullname.addClass('invalid'); 
           }
         }
       })
      
      }


    });
/* Check fullname end */
    registarEmail.focusout(() => {

      console.log('Pozz iz email inputa');
          })

    registarPassword.focusout(() => {

      console.log('Pozz iz passsword inputa');
                })

    rePassword.focusout(() => {

      console.log('Pozz iz rePassword inputa');
                      })

}) 
/* Registar end */
/* 
$(document).ready(function(){
    $("#registarForm").submit(function (e) {   
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
            type: 'POST',
            url: './includes/registar.inc.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              if (response) {
                console.log(response);
                //document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
        }
    );
  
  });
  }); */
/* login start */
$(document).ready(function(){
  $("#loginForm").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/login.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            if (response) {
              console.log(response);
              //document.location.reload(true);
            } else {
             
             console.log(response);
            } 
          }
      }
  );

});
});

/* login end */

/* forgot password start */
$(document).ready(function(){
  $("#forgotPasswordForm").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/forgotPassword.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            if (response) {
              console.log(response);
              //document.location.reload(true);
            } else {
             
             console.log(response);
            } 
          }
      }
  );

});
});

/* forgot passowrd end */