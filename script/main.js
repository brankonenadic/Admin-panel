'use strict';
/* Registar start */
$(document).ready(() =>{ 

    const fullname = $('#fullname');
    const fullnameMsg = $('.fullname-error');
    const regfullname = /^[A-žÀ-ÿš ]+$/;

    const registarEmail = $('#registarEmail');
    const registarEmailMsg = $('.registarEmail-error');
    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;

    const registarPassword = $('#registarPassword');
    const registarPasswordMsg = $('.registarPassword-error');

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
          url: './includes/registar.inc.php',
          data: {
            'fullname': fullnameChecked,
            'registarEmail': registarEmailChacked,
            'registarPassword': registarPasswordChacked,
            'rePassword': rePasswordChecked,
            'registar': registarSubmit
          },
          success: function(response){
            if (response){
              console.log(response);
            } else {
              xonsole.log(response);
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
        let checkFullname = fullname.val();
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
       });
      
      }


    });
/* Check fullname end */
    registarEmail.focusout(() => {

      if (registarEmail.val() == '') {
        registarEmailMsg.text('Email is required !');
        registarEmail.removeClass('valid');
        registarEmail.addClass('invalid');
      } else if (!regEmail.test(registarEmail.val())) {
        registarEmailMsg.text('Enter valid email address !');
        registarEmail.removeClass('valid');
        registarEmail.addClass('invalid');
      } else {
        let checkEmail = registarEmail.val();

        $.ajax({

          type: 'post',
          url: './includes/registar.inc.php',
          data: {
            'checkEmail': checkEmail
          },
          success: function(response){
            if (response){
              console.log(response);
              registarEmailMsg.text('');
              registarEmail.removeClass('invalid');
              registarEmail.addClass('valid');
            } else {
              console.log(response);
              registarEmailMsg.text(response);
              registarEmail.removeClass('valid');
              registarEmail.addClass('invalid');
            }
          }
        });
      }
    });

    registarPassword.focusout(() => {
        if (registarPassword.val() == '') {
          registarPasswordMsg.text('Password is required !');
          registarPassword.removeClass('valid');
          registarPassword.addClass('invalid');
        } else if (!regPassword.test(registarPassword.val())) {
          registarPasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
          registarPassword.removeClass('valid');
          registarPassword.addClass('invalid');
        } else {
          let checkPassword = registarPassword.val();

          $.ajax({
            type: 'post',
            url: './includes/registar.inc.php',
            data: {
              'checkPassord': checkPassword
            },
            success: function(response) {
              if (response) {
                console.log(response);
                registarPasswordMsg.text('');
                registarPassword.removeClass('invalid');
                registarPassword.addClass('valid');
              } else {
                console.log(response);
                registarPasswordMsg.text(response);
                registarPassword.removeClass('valid');
                registarPassword.addClass('invalid');
              }
            }
          });
        }  
    });

    rePassword.focusout(() => {

      if (rePassword.val() == '') {
        rePasswordMsg.text('Ree passowrd is required !');
        rePassword.removeClass('valid');
        rePassword.addClass('invalid');
      } else if (rePassword.val() !== registarPassword.val()) {
        rePasswordMsg.text('Password and ree password should be same !');
        rePassword.removeClass('valid');
        rePassword.addClass('invalid');
      } else {
        rePasswordMsg.text('');
        rePassword.removeClass('invalid');
        rePassword.addClass('valid');
      }
    });

}) 
/* Registar end */
/* 
$(document).ready(function(){
    $("#registarForm").submit(function (e) {   
    e.preventDefault();
    let formData = new FormData(this);
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
  let formData = new FormData(this);
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
  let formData = new FormData(this);
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