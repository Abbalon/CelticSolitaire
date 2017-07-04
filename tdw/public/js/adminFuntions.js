/**
* Con cada carga de vista, se ocultan los paneles con la información precargada
*/
$(document).ready(function () {
    $("#adminRow3").hide();
    $("#adminRow4").hide();
});

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
 * Al clickar la opción validar, si hay algúna petición muestra un menú son los usuarios pendientes
 * y un boton para validarlos
 *
 * Rutas en api.php: UserController@ListValidatePlayer
 */
$('#validate').click(function () {

    $("#adminRow4").hide();

    $.getJSON(
        '/api/admin',
        function (data) {
            $('#adminRow3').show(1000);

            $('#options').prepend(
                '<article>' +
                '<h3 class="font-x2"><i class="fa fa-random"></i> &nbsp; Users unvalidated</h3>'
            );

            $.each(data, function (i, user) {
                $('#options').append('' +
                    '<div class="row">' +
                    '<div id="name" class="col-xs-3">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.name +
                    '</p></div>' +

                    '<div id="email" class="col-xs-3">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.email +
                    '</p></div>' +
                    '<div class="col-xs-1">' +
                    //Boton para validar al usuario
                    '<button onclick="validateUser(' + user.id + ');" type="submit" class="btn btn-primary"> Validate ' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '<hr>');
            });

            $('#options').append(
                '</article>'
            );
        });
});

/**
* Actualiza el estado del usuario a validado
*
* Rutas en api.php: UserController@ValidatePlayer
*
* @param id
*/
function validateUser(id) {
    $.ajax({
        url: '/api/admin/validate/' + id,
        type: 'PUT',

        success: function () {
            alert('Done');
            $("#adminRow3").hide();
        },
        error: function () {
            alert('Está mal');
        }
    });
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Muestra una pantalla para capturar las fechas limite para seleccionar las 10 mejores partidas en ese
* intervalo
*/
$('#top10').click(function () {

    $("#adminRow4").hide();

    $('#options').empty();

    $('#adminRow3').show(1000);

    //TODO Posible mejora, mostrar calendario gráfico
    /*$(function() {
     $("#fechaFin").datepicker();
     });
     */

    $('#options').prepend(
        '<form name="formTop" class="form-horizontal" role="form" method="POST" ' +
          'action="javascript:SelectBetween(document.formTop);">' +
        '<div class="one_third first">' +
        '<article>' +
        '<h3 class="font-x1"><i class="fa fa-random"></i> &nbsp; Seleccione fecha de início</h3>' +
        '<input type="text" name="fecha" id="firstDate" size="12" />' +
        '</article>' +
        '</div>' +
        '<div class="one_third">' +
        '<article>' +
        '<h3 class="font-x1"><i class="fa fa-random"></i> &nbsp; Seleccione fecha de fin</h3>' +
        '<input type="text" name="fecha" id="lastDate" size="12" />' +
        '</article>' +
        '</div>' +
        '<div class="one_third left">' +
        //Boton para buscar
        '<button type="submit" class="btn btn-primary">' +
        'Search' +
        '</button>' +
        '</div>' +
        '</div>' +
        '</form>'
    );
});

/**
* Muetra las 10 mejores partidas entre las dos fechas pasadas por parámetro
*
* Rutas en api.php: GameController@SelectBetween
*
* @param request
*/
function SelectBetween(request) {
    $('#extend').empty();

    $('#adminRow4').show(1000);

    $.getJSON(
        '/api/game/dates' +
        '?firstDate=' + request.firstDate.value +
        '&lastDate=' + request.lastDate.value,
        function (data) {

            $('#extend').prepend(
                '<div class="wrapper row4">' +
                '<div class="spacer">' +
                '<div class="container clear"> ' +
                '<article id="gamesResult">' +
                '<h3 class="font-x2">' +
                '<i class="fa fa-database"></i>' +
                ' &nbsp; Matchs between ' + request.firstDate.value + ' & ' + request.lastDate.value +
                '</h3>' +
                '<div class="row">' +
                '<div id="idUser" class="col-xs-3 font-x1 one_quarter first">' +
                '<p class="nospace"> Id User ' +
                '</p></div>' +

                '<div id="score" class="col-xs-3 font-x1 one_half">' +
                '<p class="nospace"> Score' +
                '</p></div>' +
                '</div>' +
                '<hr>'
            );

            $.each(data, function (i, current) {
                $('#gamesResult').append(
                    '<div class="row">' +
                    '<div id="name" class="col-xs-3 one_quarter first">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + current.idUser +
                    '</p></div>' +

                    '<div id="email" class="col-xs-3 one_half">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + current.score +
                    '</p></div>' +
                    '<div class="col-xs-1 one_quarter">' +
                    '<div class="one_half first">' +
                    '<button onclick="seeUser(' + current.idUser.value + ');" type="submit"' +
                      ' class="btn btn-info">Show' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<hr>');
            });

            $('#extend').append(
                '</article>' +
                '</div>' +
                '</div>' +
                '</div>'
            );

        }
    )
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Muetra todas las partidas en el sistema
*
* Rutas en api.php: GameController@SelectAll
*/
$('#crudGame').click(function () {

    $("#adminRow4").hide();

    $("#adminRow4").hide();

    $.getJSON(
        '/api/admin/game',
        function (data) {

            $('#options').empty();

            $('#adminRow3').show(1000);

            $('#options').prepend(
                '<article>' +
                '<h3 class="font-x2"><i class="fa fa-database"></i> &nbsp; Matchs played</h3>' +
                '<div class="row">' +
                '<div id="idMatch" class="col-xs-3 font-x1 one_quarter first">' +
                '<p class="nospace"> Id match ' +
                '</p></div>' +

                '<div id="idUser" class="col-xs-3 font-x1 one_quarter">' +
                '<p class="nospace"> Id user' +
                '</p></div>' +

                '<div id="matchScore" class="col-xs-3 font-x1 one_quarter">' +
                '<p class="nospace"> Score' +
                '</p></div>' +

                '</div>' +
                '<hr>'
            );

            $.each(data, function (i, game) {
                $('#options').append('' +
                    '<div class="row">' +
                    '<div id="name" class="col-xs-3 one_quarter first">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + game.id +
                    '</p></div>' +

                    '<div id="email" class="col-xs-3 one_quarter">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + game.idUser +
                    '</p></div>' +

                    '<div id="email" class="col-xs-3 one_quarter">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + game.score +
                    '</p></div>' +

                    '<div class="col-xs-1 one_quarter">' +
                    '<div class="one_half first">' +
                    '<button onclick="deleteMatch(' + game.id + ');" type="submit" class="btn btn-danger">Drop' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<hr>');
            });

            $('#options').append(
                '</article>'
            );
        });
});

/**
* Borra la partida selecionada
*
* Rutas en api.php: GameController@DeleteMatch
*
* @param id
*/
function deleteMatch(id) {
    if (confirm('Are you sure?')) {
        $.ajax({
            url: '/api/game/' + id,
            type: 'DELETE',

            success: function () {
                $('#feetDiv').append(
                    ''
                );
            },
            error: function () {
                alert('Está mal');
            }
        });
        window.location.href = "/admin";
    }
    ;
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Muetra todos los jugadores del sistema y las opciones para hacer CRUD
*
* Rutas en api.php: UserController@SelectAll
*/
$('#crudUser').click(function () {

    $("#adminRow4").hide();

    $.getJSON(
        '/api/users',
        function (data) {

            $('#options').empty();

            $('#adminRow3').show(1000);

            $('#options').prepend(
                '<article>' +
                '<h3 class="font-x2"><i class="fa fa-database"></i> &nbsp; Users hosted</h3>' +
                '<div class="row">' +
                '<div id="name" class="col-xs-3 font-x1 one_quarter first">' +
                '<p class="nospace"> NAME ' +
                '</p></div>' +

                '<div id="email" class="col-xs-3 font-x1 one_half">' +
                '<p class="nospace"> EMAIL' +
                '</p>' +
                '</div>' +
                '</div>' +
                '<hr>'
            );

            $.each(data, function (i, user) {
                $('#options').append('' +
                    '<div class="row">' +
                    '<div id="name" class="col-xs-3 one_quarter first">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.name +
                    '</p></div>' +

                    '<div id="email" class="col-xs-3 one_half">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.email +
                    '</p></div>' +
                    '<div class="col-xs-1 one_quarter">' +
                    '<div class="one_half first">' +
                    '<button onclick="seeUser(' + user.id + ');" type="submit" class="btn btn-info">Show' +
                    '</button>' +
                    '<button onclick="deleteUser(' + user.id + ');" type="submit" class="btn btn-danger">Drop' +
                    '</button>' +
                    '</div>' +
                    '<div class="one_half ">' +
                    '<button onclick="updateUserBtn(' + user.id + ');" type="submit" class="btn btn-link">Update' +
                    '</button>' +
                    '<button onclick="hardUser(' + user.id + ');" type="submit" class="btn btn-danger">Delete' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<hr>');
            });

            $('#options').append(
                '</article>'
            );
        });
});
<!-- ################################################################################################ -->

/**
* Funcionalidad para ver la información de un usuario
*
* Rutas en api.php: UserController@SelectById
*
* @param id
*/
function seeUser(id) {
    $.getJSON(
        '/api/admin/' + id,
        function (data) {

            $('#options').empty();

            $('#adminRow3').show(1000);

            $.each(data, function (i, user) {
                $('#options').prepend(
                    '<article>' +
                    '<h3 class="font-x2"><i class="fa fa-file-archive-o"></i> &nbsp; Data from ' + user.name + '</h3>' +

                    '<div class="one_third first">' +
                    '<h3 class="font-x1">EMAIL&nbsp;</h3>' +
                    '</div>' +
                    '<div class="two_third">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.email +
                    '</div>' +

                    '<div class="one_third first">' +
                    '<h3 class="font-x1">Nick&nbsp;</h3>' +
                    '</div>' +
                    '<div class="two_third">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.nick +
                    '</div>' +

                    '<div class="one_third first">' +
                    '<h3 class="font-x1">Phone &nbsp;</h3>' +
                    '</div>' +
                    '<div class="two_third">' +
                    '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.telf +
                    '</div>' +

                    '</article>'
                );
            });


        });
}
<!-- ################################################################################################ -->

/**
* Redirecciona a la vista de actualizar datos de ususario
*
* @param id
*/
function updateUserBtn(id) {
    window.location.href = "/update?id=" + id;
};

/**
* Translada al servidor la información del ausuario que hay que actualizar
*
* Rutas en api.php: UserController@UpdateUser
*
* @param id
*/
function updateUser(request) {
    id = window.location.search.substr(4);
    $.ajax({
        url: '/api/admin/' + id +
        '?name=' + request.name.value +
        '&nick=' + request.nick.value +
        '&email=' + request.email.value +
        '&telf=' + request.telf.value +
        '&pass=' + request.password.value,
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

/**
* Igual funcinamiento que en userFunctions, deshabilita el logeo del jugador
*
* Rutas en api.php: UserController@DropUser
*
* @param id
*/
function deleteUser(id) {
    if (confirm('Are you sure?')) {
        $.ajax({
            url: '/api/admin?id=' + id,
            type: 'DELETE',

            success: function () {
                $('#feetDiv').append(
                    ''
                );
            },
            error: function () {
                alert('Está mal');
            }
        });
        window.location.href = "/admin";
    }
    ;
};
<!-- ################################################################################################ -->

/**
* Borra al ususario del sistema
*
* Rutas en api.php: UserController@DeleteUser
*
* @param id
*/
function hardUser(id) {
    if (confirm('Are you sure?')) {
        $.ajax({
            url: '/api/admin/' + id,
            type: 'DELETE',

            success: function () {
                $('#feetDiv').append(
                    ''
                );
            },
            error: function () {
                alert('Está mal');
            }
        });
        window.location.href = "/admin";
    }
    ;
};
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Muestra la puntuación media de los juegadores en el sistema
*
* Rutas en api.php: UserController@ListAverage
*/
$('#showAverage').click(
    function () {

        $("#adminRow4").hide();

        $.getJSON(
            '/api/admin/average',
            function (data) {

                $('#options').empty();

                $('#adminRow3').show(1000);

                $('#options').prepend(
                    '<article>' +
                    '<h3 class="font-x2"><i class="fa fa-database"></i> &nbsp; Average score</h3>' +
                    '<div class="row">' +
                    '<div id="idUser" class="col-xs-3 font-x1 one_quarter first">' +
                    '<p class="nospace"> Id User ' +
                    '</p></div>' +

                    '<div id="score" class="col-xs-3 font-x1 one_half">' +
                    '<p class="nospace"> Score' +
                    '</p>' +
                    '</div>' +
                    '</div>' +
                    '<hr>'
                );

                $.each(data, function (i, user) {
                    $('#options').append('' +
                        '<div class="row">' +
                        '<div id="name" class="col-xs-3 one_quarter first">' +
                        '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.idUser +
                        '</p></div>' +

                        '<div id="email" class="col-xs-3 one_half">' +
                        '<p class="nospace"> <i class="fa fa-arrow-right"></i> &nbsp;' + user.avg_score +
                        '</p></div>' +
                        '<div class="col-xs-1 one_quarter">' +
                        '<button onclick="seeUser(' + user.idUser + ');" type="submit" class="btn btn-primary">See profile' +
                        '</button>' +
                        '</div>' +
                        '</div>' +
                        '<hr>');
                });

                $('#options').append(
                    '</article>'
                );
            });
    });
