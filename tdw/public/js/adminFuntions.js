
$(document).ready(function(){
    $("#adminRow3").hide();
});

<!-- ################################################################################################ -->
$('#validate').click(function(){

  $.getJSON(
      '/api/admin',
      function(data) {

        $('#options').empty();

         $('#adminRow3').show(1000);

        $('#options').prepend(
          '<article>'+
            '<h3 class="font-x2"><i class="fa fa-random"></i> &nbsp; Users unvalidated</h3>'
        );

          $.each(data, function (i, user) {
            $('#options').append('' +
                '<div class="row">' +
                    '<div id="name" class="col-xs-3">' +
                       '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.name +
                     '</p></div>' +

                     '<div id="email" class="col-xs-3">' +
                        '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.email +
                      '</p></div>' +
                    '<div class="col-xs-1">'+
                      '<button onclick="validateUser('+ user.id +');" type="submit" class="btn btn-primary">Se'+
                      '</button>'+
                    '</div>' +
                '</div>' +
                '<hr>');
            });

            $('#options').append(
              '</article>'
                );
      });
 });

 function validateUser(id){
   $.ajax({
       url: '/api/admin/validate/' + id,
       type: 'PUT',

       success: function () {
           $('#feetDiv').append(
             ''
           );
       },
       error: function () {
           alert('Está mal');
       }
     });
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
$('#top10').click(function(){

  $('#options').empty();

  $('#adminRow3').show(1000);

  $('#options').prepend(
    '<div class="one_half first">'+
      '<article>'+
        '<h3 class="font-x1"><i class="fa fa-random"></i> &nbsp; Seleccione fecha de início</h3>' +
        '<input type="text" name="fecha" id="fechaIni" readonly="readonly" size="12" />' +
      '</article>'+
    '</div>'+
    '<div class="one_half">'+
      '<article>'+
        '<h3 class="font-x1"><i class="fa fa-random"></i> &nbsp; Seleccione fecha de fin</h3>' +
        '<input type="text" name="fecha" id="fechaFin" readonly="readonly" size="12" />'+
      '</article>'+
    '</div>'
  );
 });
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
$('#userSelect').click(function(){

  $.getJSON(
      '/api/users',
      function(data) {

        $('#options').empty();

         $('#adminRow3').show(1000);

        $('#options').prepend(
          '<article>'+
            '<h3 class="font-x2"><i class="fa fa-database"></i> &nbsp; Users hosted</h3>'+
            '<div class="row">' +
                '<div id="name" class="col-xs-3 font-x1 one_quarter first">' +
                   '<p class="nospace"> NAME ' +
                 '</p></div>' +

                 '<div id="email" class="col-xs-3 font-x1 one_half">' +
                    '<p class="nospace"> EMAIL' +
                    '</p>'+
                  '</div>' +
            '</div>' +
            '<hr>'
        );

          $.each(data, function (i, user) {
            $('#options').append('' +
                '<div class="row">' +
                    '<div id="name" class="col-xs-3 one_quarter first">' +
                       '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.name +
                     '</p></div>' +

                     '<div id="email" class="col-xs-3 one_half">' +
                        '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.email +
                      '</p></div>' +
                    '<div class="col-xs-1 one_quarter">'+
                      '<button onclick="seeUser('+ user.id +');" type="submit" class="btn btn-primary">See'+
                      '</button>'+
                    '</div>' +
                '</div>' +
                '<hr>');
            });

            $('#options').append(
              '</article>'
                );
      });
 });

 function seeUser(id){
   $.getJSON(
       '/api/admin/' + id,
       function(data) {

         $('#options').empty();

          $('#adminRow3').show(1000);

          $.each(data, function (i, user) {
         $('#options').prepend(
           '<article>'+
             '<h3 class="font-x2"><i class="fa fa-file-archive-o"></i> &nbsp; Data from '+ user.name +'</h3>' +

             '<div class="one_third first">'+
              '<h3 class="font-x1">EMAIL&nbsp;</h3>' +
             '</div>'+
             '<div class="two_third">'+
              '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.email +
             '</div>'+

             '<div class="one_third first">'+
              '<h3 class="font-x1">Nick&nbsp;</h3>' +
             '</div>'+
             '<div class="two_third">'+
              '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ user.nick +
             '</div>'+

             '<div class="one_third first">'+
              '<h3 class="font-x1">Phone &nbsp;</h3>' +
             '</div>'+
             '<div class="two_third">'+
              '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;'+ 12221221 +
             '</div>'+

           '</article>'
             );
       });


  });
}
<!-- ################################################################################################ -->
