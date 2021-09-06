'use strict';
/* Registar start */
$(document).ready(() => { 

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
    
    const registarForm = $('#registarForm');

    registarForm.submit((e) => {   
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
          success: (response) => {
            console.log(response);
          let errorArr = JSON.parse(response);
          if (errorArr.valid == true){
            console.log(errorArr.msg);
          } else {
            console.log(errorArr.msg);
          }
         }

        });
      }
    });
/* Check fullname start */
    fullname.focusout(() => {

      if (fullname.val() == '') {
          fullnameMsg.text('*Fullname is required !');
          fullname.removeClass('valid');
          fullname.addClass('invalid');
      } else if (!regfullname.test(fullname.val())) {
          fullnameMsg.text('*Enter valid fullname !');
          fullname.removeClass('valid');
          fullname.addClass('invalid');        
      } else if (fullname.val().length < 3) {
          fullnameMsg.text('*Fullname mast have 3 charters !');
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
         success: (response) => {
          let errorArr = JSON.parse(response);
           
          if (errorArr.valid == true){
            console.log(errorArr.msg);
              fullnameMsg.text('');
              fullname.removeClass('invalid');
              fullname.addClass('valid'); 
           } else {
              console.log(errorArr.msg);
              fullnameMsg.text(errorArr.msg);
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
        registarEmailMsg.text('*Email is required !');
        registarEmail.removeClass('valid');
        registarEmail.addClass('invalid');
      } else if (!regEmail.test(registarEmail.val())) {
        registarEmailMsg.text('*Enter valid email address !');
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
          success: (response) => {
          
            let errorArr = JSON.parse(response);
           
            if (errorArr.valid == true){
              console.log(errorArr.msg);
              registarEmailMsg.text('');
              registarEmail.removeClass('invalid');
              registarEmail.addClass('valid');
            } else {
              console.log(errorArr.msg);
              registarEmailMsg.text(errorArr.msg);
              registarEmail.removeClass('valid');
              registarEmail.addClass('invalid');
            } 
          }
        });
      }
    });

    registarPassword.focusout(() => {
        if (registarPassword.val() == '') {
          registarPasswordMsg.text('*Password is required !');
          registarPassword.removeClass('valid');
          registarPassword.addClass('invalid');
        } else if (!regPassword.test(registarPassword.val())) {
          registarPasswordMsg.text('*Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
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
            success: (response) => {
              let errorArr = JSON.parse(response);
           
              if (errorArr.valid == true){
                console.log(errorArr.msg);
                registarPasswordMsg.text('');
                registarPassword.removeClass('invalid');
                registarPassword.addClass('valid');
              } else {
                console.log(errorArr.msg);
                registarPasswordMsg.text(errorArr.msg);
                registarPassword.removeClass('valid');
                registarPassword.addClass('invalid');
              }
            }
          });
        }  
    });

    rePassword.focusout(() => {

      if (rePassword.val() == '') {
        rePasswordMsg.text('*Ree passowrd is required !');
        rePassword.removeClass('valid');
        rePassword.addClass('invalid');
      } else if (rePassword.val() !== registarPassword.val()) {
        rePasswordMsg.text('*Password and ree password should be same !');
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

/* login start */

$(document).ready(() => { 

  const loginEmail = $('#loginEmail');
  const loginEmailMsg = $('.loginEmail-error');
  const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;

  const loginPassword = $('#loginPassword');
  const loginPasswordMsg = $('.loginPassword-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  
  const loginForm = $('#loginForm');

  loginForm.submit((e) => {
    e.preventDefault();

    if ($('input').hasClass('invalid')) {
      return false;
    } else {

      const loginEmailChecked = loginEmail.val();
      const loginPasswordChecked = loginPassword.val();
      const loginSubmit = $('#login').val();

      $.ajax({
        type: 'post',
        url: './includes/login.inc.php',
        data: {
          'loginEmail': loginEmailChecked,
          'loginPassword': loginPasswordChecked,
          'login': loginSubmit
        },
        success: (response) => {
          console.log(response);
          let errorArr = JSON.parse(response);
       
          if (errorArr.valid == true){
            console.log(errorArr.msg);

          } else {
            console.log(errorArr.msg);

          }
        }
      });
    }

  });

  loginEmail.focusout(() => {
    if (loginEmail.val() == '') {
      loginEmailMsg.text('*Email is required !');
      loginEmail.removeClass('valid');
      loginEmail.addClass('invalid');
    } else if (!regEmail.test(loginEmail.val())) {
      loginEmailMsg.text('*Enter valid email !');
      loginEmail.removeClass('valid');
      loginEmail.addClass('invalid');
    } else {
      let checkLoginEmail = loginEmail.val();
      $.ajax({
        type: 'post',
        url: './includes/login.inc.php',
        data: {
          'checkLoginEmail': checkLoginEmail
        },
        success: (response) => {
          console.log(response);
          let errorArr = JSON.parse(response);
           
          if (errorArr.valid == true){
            console.log(errorArr.msg);
            loginEmailMsg.text('');
            loginEmail.removeClass('invalid');
            loginEmail.addClass('valid');
          } else {
            console.log(errorArr.msg);
            loginEmailMsg.text(errorArr.msg);
            loginEmail.removeClass('valid');
            loginEmail.addClass('invalid');
          }
        }
      });
    }
  });

  loginPassword.focusout(() => {
    if (loginPassword.val() == '') {
      loginPasswordMsg.text('Password is required !');
      loginPassword.removeClass('valid');
      loginPassword.addClass('invalid');
    } else if (!regPassword.test(loginPassword.val())) {
      loginPasswordMsg.text('Enter valid password !');
      loginPassword.removeClass('valid');
      loginPassword.addClass('invalid');
    } else {
      let checheckLoginPassword = loginPassword.val();

      $.ajax({
        type: 'post',
        url: './includes/login.inc.php',
        data: {
          'checkLoginPassword': checheckLoginPassword
        },
        success: (response) => {
       
          let errorArr = JSON.parse(response);
       
          if (errorArr.valid == true){
            console.log(errorArr.msg);
            loginPasswordMsg.text('');
            loginPassword.removeClass('invalid');
            loginPassword.addClass('valid');
          } else {
            console.log(errorArr.msg);
            loginPasswordMsg.text(errorArr.msg);
            loginPassword.removeClass('valid');
            loginPassword.addClass('invalid');
          }
        }
      });
    }
  });
})

/* login end */

/* forgot password start */

$(document).ready(() => {
  const forgotPasswordEmail = $('#forgotPasswordEmail');
  const forgotPasswordEmailMsg = $('.forgotPasswordEmail-error');
  const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;

  const forgotPasswordForm = $('#forgotPasswordForm');

  forgotPasswordForm.submit((e) => {
    e.preventDefault();

    if ($('input').hasClass('invalid')) {
      return false;
    } else {
      const forgotPasswordEmailChacked = forgotPasswordEmail.val();
      const forgotPasswordSubmit = $('#forgotPassword').val();
      $.ajax({
        type: 'post',
        url: './includes/forgotPassword.inc.php',
        data: {
          'forgotPasswordEmail': forgotPasswordEmailChacked,
          'forgotPassword': forgotPasswordSubmit
        },
        success: (response) => {
          if (response) {
            console.log(response);
          } else {
            console.log(response);
          }
        }
      });
    }
  });
  forgotPasswordEmail.focusout(() => {
    if (forgotPasswordEmail.val() == '') {
      forgotPasswordEmailMsg.text('Email is requered !');
      forgotPasswordEmail.removeClass('valid');
      forgotPasswordEmail.addClass('invalid');
    } else if (!regEmail.test(forgotPasswordEmail.val())) {
      forgotPasswordEmailMsg.text('Enter valid email !');
      forgotPasswordEmail.removeClass('valid');
      forgotPasswordEmail.addClass('invalid');
    } else {
    let checkForgotPasswordEmail = forgotPasswordEmail.val();
    $.ajax({
      type: 'post',
      url: './includes/forgotPassword.inc.php',
      data: {
        'checkForgotPasswordEmail': checkForgotPasswordEmail
      },
      success: (response) => {
        if (response) {
          console.log(response);
          forgotPasswordEmailMsg.text('');
          forgotPasswordEmail.removeClass('invalid');
          forgotPasswordEmail.addClass('valid');
        } else {
          console.log(response);
          forgotPasswordEmailMsg.text(response);
          forgotPasswordEmail.removeClass('valid');
          forgotPasswordEmail.addClass('invalid');
        }
      }
    });
    }
  });
})

/* forgot passowrd end */