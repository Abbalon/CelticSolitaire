$(document).ready(function() {
  //$("#userRow3").hide();
  localStorage.setItem('idUser', window.location.search.substr(4));
  var idUser = localStorage.getItem('idUser');
  getScore(idUser);
});

<!-- ################################################################################################ -->
function getScore(id) { //GameController.
  //var id = window.location.search.substr(4);

  if (id != "") {
    $.getJSON(
      '/api/game?id=' + id,
      function(data) {
        $('#ultimaPuntuacion').append(
          '<div class="one_half first">' +
          '<p class="font-x1">' +
          'Score' +
          '</p>' +
          '</div>' +

          '<div class="one_half ">' +
          '<p class="font-x1">' +
          'Date' +
          '</p>' +
          '</div>'
        )
        if (data.StatusQuery == 'Correct') {
          $('#ultimaPuntuacion').append('<p>No se han encontrado partidas</p>')
        } else {
          $.each(data, function(i, score) {
            $('#ultimaPuntuacion').append(
              '<div class="one_half first">' +
              '<p>' +
              score.score +
              '</p>' +
              '</div>' +

              '<div class="one_half ">' +
              '<p >' +
              score.created_at +
              '</p>' +
              '</div>'
            )
          });
        }

      }
    )

    $.getJSON(
      '/api/game/' + id,
      function(data) {
        $('#cincoPuntuaciones').append(
          '<div class="one_half first">' +
          '<p class="font-x1">' +
          'Score' +
          '</p>' +
          '</div>' +
          '<div class="one_half ">' +
          '<p class="font-x1">' +
          'Date' +
          '</p>' +
          '</div>'
        )
        if (data.StatusQuery == 'Correct') {
          $('#cincoPuntuaciones').append('<p>No se han encontrado partidas</p>')
        } else {
          $.each(data, function(i, score) {
            if (score.StatusQuery == 'Correct') {
              '<p>' +
              score.ServerMessage +
                '</p>'
            }
            $('#cincoPuntuaciones').append(
              '<div class="one_half first">' +
              '<p>' +
              score.score +
              '</p>' +
              '</div>' +

              '<div class="one_half ">' +
              '<p >' +
              score.created_at +
              '</p>' +
              '</div>'
            )
          });
        }
      }
    )
  }
}

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
function updateUser(request) {
  //id=window.location.search.substr(4);
  $.ajax({
    url: '/api/admin/' + idUser +
      '?name=' + request.name.value +
      '&nick=' + request.nick.value +
      '&email=' + request.email.value +
      '&telf=' + request.telf.value +
      '&pass=' + request.password.value,
    type: 'PUT',

    success: function() {
      $('#feetDiv').append(
        ''
      );
    },
    error: function() {
      alert('Está mal');
    }
  });
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
function dropUser(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: '/api/admin?id=' + id,
      type: 'DELETE',

      success: function() {
        $('#feetDiv').append(
          ''
        );
      },
      error: function() {
        alert('Está mal');
      }
    });
    window.location.href = "/";
  };
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
function newGame(id) {
  //create a new game
  /*$.ajax({
    url: '/game'+
    '?idUser=' + id,
    type: 'POST',

    success: function() {
      $('#feetDiv').append(
        ''
      );
    },
    error: function() {
      alert('Está mal');
    }
  })*/

  $.getJSON(
    '/api/game?id=' + id,
    function(data) {
      alert('test');
    }
  )
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
function saveGame(id) {
  var saveGame = JSON.stringify(game);
  alert(saveGame);
}
