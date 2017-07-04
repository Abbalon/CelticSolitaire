var idUser = 0;

/**
 * Cada vez que se carga una vista de usuario: comprobamos si este ha cambiado, capturando su id de la URL;
 * cargamos el campo de partidas guardadas
 */
$(document).ready(function () {
    listenUsers(window.location.search.substr(4));
    getScore(localStorage.getItem('idUser'));
});
<!-- ################################################################################################ -->

/**
 * Comprueba si ha cambiado el usuario
 */
function listenUsers(id) {
    if (id != "") {
        if (!localStorage.getItem('idUser')) {
            localStorage.setItem('idUser', id);
        }
        if (localStorage.getItem('idUser') != id) {
            localStorage.setItem('idUser', id);
            idUser = localStorage.getItem('idUser');
            getIdGame();
        }
    }
}

/**
 * Guarda la id de la última partida
 */
function getIdGame() {
    //Recuperamos la id de la partida creada
    $.getJSON(
        '/api/game?id=' + localStorage.getItem('idUser'),//id
        function (data) {
            $.each(data, function (i, current) {
                localStorage.setItem('idGame', current.id);
            });
        }
    )
}

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
 * Para el usuario pasado por parámetro, obtenememos la puntución y fecha de su última partida y de las 5 mejores.
 * Rutas en api.php: GameController@SelectLast, GameControler@SelectScores
 *
 * @param id
 */
function getScore(id) {
    if (id != "") {
        $.getJSON(
            '/api/game?id=' + id,
            function (data) {
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
                    $.each(data, function (i, score) {
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
            function (data) {
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
                    $.each(data, function (i, score) {
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

/**
* Actualiza los datos pasados por parámetro del usuario.
* Rutas en api.php: UserController@UpdateUser
*
* @param request
*/
function updateUser(request) {
    $.ajax({
        url: '/api/admin/' + idUser +
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
<!-- ################################################################################################ -->

/**
* Inhabilita al usuario actualizando su campo de control
* Rutas en api.php: UserController@DropUser
*
* @param id
*/
function dropUser(id) {
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
        window.location.href = "/";
    }
    ;
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Carga de la vista "game". Separada para mitigar la asincronia de AJAX
*/
function loadView() {
    window.location.assign("/game");
}

/**
* Si no esta caragada la vista, la refresca, en otro caso, crea una partida nueva
* Rutas en api.php: GameController@NewGame
*
* @param id
*/
function newGame(id) {
    loadView();
    preCharge = localStorage.getItem('idGame');
    if (window.location.pathname != "/game") {
        //create a new game
        $.ajax({
            url: '/api/newGame' +
            '?idUser=' + id,
            type: 'POST',

            success: function () {
                console.log('ok');
            },
            error: function () {
                alert('Algo fue mal');
            }
        });
    }
    //Bucle de espera activa para actualizar la id de la partida creada
    while (localStorage.getItem('idGame') != preCharge)
        getIdGame();
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Si hay una partida cargada la guarda, si no, crea una partida nueva
* Rutas en api.php: UserController@Save
*/
function saveGame() {
    getIdGame();
    //evalua que se haya creado un juego para guardar
    if (window.location.pathname == "/game") {
        var saveGame = JSON.stringify(game);
        $.ajax({
            url: '/api/game/' + localStorage.getItem('idGame') +
            '?score=' + JSON.parse(saveGame).score +
            '&gameBoard=' + saveGame,
            type: 'PUT',

            success: function () {
                alert('Saved');
            },
            error: function () {
                alert('Está mal');
            }
        });
    } else {
        if (confirm('              Nothing to save.\n' +
                'Do you want create a new game?')) {
            newGame(localStorage.getItem('idUser'));
        };
    };
}
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

/**
* Si hay una partida empezada la reemplaza, si no, crea una partida nueva
* Rutas en api.php: UserController@Restore
*/
function restoreGame() {
    //evalua que se haya creado un juego para restablecer
    if (window.location.pathname == "/game") {
        $.getJSON(
            '/api/restore?idUser=' + idUser,
            function (data) {
                let restoredGame = JSON.parse(data[0].gameBoard);
                game.custom = restoredGame.custom;
                game.Latitudes = restoredGame.Latitudes;
                game.previous = restoredGame.previous;
                game.current = restoredGame.current;
                game.timer = restoredGame.timer;
                game.time = restoredGame.time;
                game.score = restoredGame.score;

                game.displayGame();
            }
        );
    } else {
        if (confirm('              Nothing to restore.\n' +
                'Do you want create a new game?')) {
            newGame(localStorage.getItem('idUser'));
        };
    };
}
