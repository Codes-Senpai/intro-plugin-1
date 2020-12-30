jQuery(document).ready(function($){

    console.log('ajax ready');
    // var t = $('#data-table').DataTable({"scrollX": true});
    // console.log(t);




 $('#submit-envoyer').on('click',function() {
 
  var nom = $('#nom').val(),
  mail = $('#mail').val(),
  password = $('#password').val(),
  tel = $('#tel').val(),
  msg = $('#msg').val(),
 
  id = $('#edit-id').val();
        console.log(id);
 
   
    id = $(this).attr('data-id');
    var settings = {
      "url": refka_ajax_envoyer_params.ajaxurl,
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      "data": {
        "nonce": refka_ajax_envoyer_params.nonce,
        "nom": nom,
        "mail": mail,
        "tel": tel, 
        "password": password,
        "msg": msg,
        
        "id": id,
        "action": "refka"
      }
    }
    $.ajax(settings).done(function (res) {
      var R = JSON.parse(res);
      console.log(R);
    });
    console.log('envoyer');
  });


 })



