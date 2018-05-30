$(document).ready(function(e){

  var pass = $('#pass');
  var confPass = $('#confPass');
  var submit = $('#submit');

  $('form span').hide();

  function checkPassword(){
    if(pass.val().length > 8){
      pass.prev().prev().hide();
      pass.prev().show();
    } else{
      pass.prev().prev().show();
      pass.prev().hide();
    }
  }

  function confirmPassword(){
    if (confPass.val() === pass.val()) {
      confPass.prev().prev().hide();
      confPass.prev().show();
      if (pass.val() == "") {
        confPass.prev().prev().show();
        confPass.prev().hide();
      }
    } else{
      confPass.prev().prev().show();
      confPass.prev().hide();
    }
  }

  function enableSubmit(){
    if(pass.val().length > 8 && confPass.val() === pass.val()
      && $('#email').val() != "" ) {
      submit.removeProp('disabled');
    }else{
      submit.prop('disabled', 'disabled');
    }
  }

  function checkEmail(){
    var email = $('#email').val();
    if (email != "") {
      $.post('checkemail.php', {'email': email}, function date(data){
        if (data == "true") {
          $('#email').prev().prev().show();
          $('#email').prev().hide();
        }else{
          $('#email').prev().prev().hide();
          $('#email').prev().show();
        }
      });
    }else{
      $('#email').prev().prev().hide();
      $('#email').prev().hide();
    }
  }

  pass.focus(function(){
    checkPassword();
    enableSubmit();
  }).keyup(function(){
    checkPassword();
    confirmPassword();
    enableSubmit();
  });

  confPass.focus(function(){
    confirmPassword();
    enableSubmit();
  }).keyup(function(){
    confirmPassword();
    enableSubmit();
  });

  enableSubmit();

  $('#email').blur(function(){
    checkEmail();
    enableSubmit();
  }).keyup(function(){
    checkEmail();
    enableSubmit();
  });
});
