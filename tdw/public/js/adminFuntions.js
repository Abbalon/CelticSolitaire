function selectValidablesUser() {
    $.getJSON(
        '/api/admin',
        function(data) {
            return data;
        }
    );
}

 $('#validate').click(function(){

   $.getJSON(
       '/api/admin',
       function(data) {
           
       }
   );

     $.each(users, function (i, user) {
             $('#validated').append('' +
                 '<div class="row">' +
                     '<div id="name" class="col-xs-3">' +
                        '<p class="nospace">><i class="fa fa-arrow-left"></i> &nbsp;'+ user.name +
                      '</p></div>' +

                      '<div id="email" class="col-xs-3">' +
                         '<p class="nospace">><i class="fa fa-arrow-left"></i> &nbsp;'+ user.email +
                       '</p></div>' +
                     '<div class="col-xs-1"><button id="ok" class="btn btn-success">' + 'Accept' + '</button></div>' +
                     '<div class="col-xs-1"><button id="ko" class="btn btn-danger">' + 'Cancel' + '</button></div>' +
                 '</div>' +
                 '<hr>');

       });
 });
