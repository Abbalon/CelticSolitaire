/**
 * Created by montbs on 12/04/17.
 */
var game = new Game(false);
game.newGame();

/**
 * Comienza el tempotizador
 */
function startTimer() {
    game.updateTimer();
    if (game.timer > 0) {
        window.setTimeout("startTimer()", 1000);
    }
    else if (game.timer == 0) {
        game.time = false;
        game.displayGame();
    }
}

/**
 * Asigna un temporizador al juego
 */
function timer() {
    if (game.timer == -1) {//timer esta inicializado a -1
        game.setTimer();
        startTimer();
    }
}

/**
 * Gestión de los posibles movimientos de los token
 * @param ev Captura cuando se ha seleccionado n token
 */
function move(ev) {

    var evento = ev || window.event;

    var id = evento.target.id;

    game.current = game.getToken(id);

    if (!game.custom) {
        if (game.previous != null && game.current.state == "hueco") {
            game.move();
            game.previous = null;
        }
        else if (game.current.state == "imagen") {
            game.previous = game.current;
        }
    }

    else {
        game.place();
    }

}


document.querySelector("#playSpace").onclick = move;
