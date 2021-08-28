/* $(document).ready(() =>{ 

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

    const registarSubmit = $('#registar');

  
}) */

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
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
        }
    );
  
  });
  });
