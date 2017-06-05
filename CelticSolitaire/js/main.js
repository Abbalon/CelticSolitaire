/**
 * Created by montbs on 12/04/17.
 */

/**
 * Tablero del juego
 * @param custom Indica si va a ser el formato por defecto
 * o diseñado por el jugador
 * @constructor
 */
function Game(custom) {
    this.custom = custom;
    this.Latitudes = {
        "row1": new Latitude("row1")
        , "row2": new Latitude("row2")
        , "row3": new Latitude("row3")
        , "row4": new Latitude("row4")
        , "row5": new Latitude("row5")
        , "row6": new Latitude("row6")
        , "row7": new Latitude("row7")
    };
    this.previous = null;
    this.current = null;
    this.timer = -1;
    this.time = true;
    this.score = -1;
}

/**
 * Instanciación del juego
 */
Game.prototype.newGame = function () {

    this.score = 0;
    for (row in this.Latitudes) {

        this.defineTokens(row);
        this.addButtons(row);
    }

    for (i in variants = document.getElementsByName("variant")) {
        if (variants[i].checked) {
            if (variants[i].value == "central") {
                this.Latitudes["row4"].posiciones[3].state = "hueco";
            }
            else if (variants[i].value == "random") {

                var random = this.Latitudes["row1"].posiciones[0];
                while (random.state != "imagen") {
                    var num1 = 0;
                    var num2 = -1;
                    while (num1 < 1 || num1 > 7) {
                        num1 = Math.floor((Math.random() * 10));
                    }

                    while (num2 < 0 || num2 > 6) {
                        num2 = Math.floor((Math.random() * 10));
                    }
                    var random = this.Latitudes["row" + num1].posiciones[num2]
                }
                random.state = "hueco";
            }
        }
    }

    timer();
    this.displayGame();

}

/**
 * Establece el estado de los tokens de cada fila por defecto
 * @param gb Fila en la que se vana  situar los tokens
 */
Game.prototype.defineTokens = function (gb) {
    if (this.custom == false) {
        var state = "imagen";
    }
    else {
        state = "hueco";
    }
    var pos = this.Latitudes[row].posiciones;
    for (var i = 0; i < pos.length; i++) {
        if ((gb == "row3" || gb == "row4" || gb == "row5")
            || (i > 1 && i < 5)) {
            this.Latitudes[gb].addToken(i, state);
        }
        else {
            this.Latitudes[gb].addToken(i, "vacio");
        }

    }
}

/**
 * Crea la estructura interna del tablero.
 * @param row
 */
Game.prototype.addButtons = function (row) {
    var gb = document.createElement("div");
    var pos = this.Latitudes[row].posiciones;
    gb.setAttribute("id", row);
    gb.setAttribute("class", "rows");
    document.querySelector("#playSpace").appendChild(gb);

    for (i = 0; i < pos.length; i++) {
        var button = document.createElement("button");
        button.setAttribute("id", pos[i].id);
        button.setAttribute("class", pos[i].state);
        button.setAttribute("name", pos[i].pos);

        document.querySelector('#' + row).appendChild(button);
    }
}

/**
 * Devuelve el token indicado
 * @param id Id del token a devolver
 * @returns Token
 */
Game.prototype.getToken = function (id) {
    var row = "row" + id.substring(1, 2);
    var column = parseInt(id.substring(2, 3));
    column--;

    try {
        var Token = this.Latitudes[row].posiciones[column];
        return Token;
    }
    catch (e) {
        return null;
    }

}

Game.prototype.displayGame = function () {


    for (row in this.Latitudes) {

        var pos = this.Latitudes[row].posiciones;
        for (i = 0; i < pos.length; i++) {
            var button = document.createElement("button");
            button.setAttribute("id", pos[i].id);
            button.setAttribute("class", pos[i].state);
            button.setAttribute("name", pos[i].pos);

            document.querySelector('#' + row)
                .replaceChild(button, document.querySelector('#' + row)
                    .childNodes.item(i));
        }
    }

    if (!this.movesRemaining() && this.custom == false) {

        if (this.clic() != 1) {

            try {
                var del = document.querySelector("#end")
                del.parentNode.removeChild(del);
            }
            catch (e) {
                var end = document.createElement("div");
                end.setAttribute("id", "end");
                var endLabel = document.createElement("h1");
                endLabel.setAttribute("id", "endLabel");
                document.querySelector("#playSpace").appendChild(end);
                document.querySelector("#end").appendChild(endLabel);
                document.querySelector("#endLabel").innerHTML = "Game Over! No more moves.";

            }

            this.score = this.score - (parseInt(this.clic()) * 50);

        }
        else {

            try {
                var del = document.querySelector("#end")
                del.parentNode.removeChild(del);
            }
            catch (e) {
                var end = document.createElement("div");
                end.setAttribute("id", "end");
                var endLabel = document.createElement("h1");
                endLabel.setAttribute("id", "endLabel");
                document.querySelector("#playSpace").appendChild(end);
                document.querySelector("#end").appendChild(endLabel);
                document.querySelector("#endLabel").innerHTML = "Congratulations! You have won.";
            }

            if (this.Latitudes["row4"].posiciones[3].state = "imagen") {
                this.score += 150;
            }


        }
    }

    if (!this.time) {
        try {
            var del = document.querySelector("#end")
            del.parentNode.removeChild(del);
        }
        catch (e) {
            var end = document.createElement("div");
            end.setAttribute("id", "end");
            var endLabel = document.createElement("h1");
            endLabel.setAttribute("id", "endLabel");
            document.querySelector("#playSpace").appendChild(end);
            document.querySelector("#end").appendChild(endLabel);
            document.querySelector("#endLabel").innerHTML = "Game Over! No more time.";
        }

        this.score = this.score - (parseInt(this.clic()) * 50);

    }

    if (this.score >= 0) {
        document.querySelector("#score").setAttribute("class", "scoregreen");
    }
    else {
        document.querySelector("#score").setAttribute("class", "scorered");
    }
    document.querySelector("#score").innerHTML = "Score: " + this.score;

}

/**
 * Establece las posiciones a las que se puede desplazar un token
 * @param id Identificador del token a evaluar
 * @returns {{top: number, left: number, right: number, down: number}}
 */
Game.prototype.getMoves = function (id) {
    var location = parseInt(id.substring(1));

    var moves = {
        "top": location - 20,
        "left": location - 2,
        "right": location + 2,
        "down": location + 20
    };

    for (i in moves) {

        if (this.getToken("b" + moves[i]) == null || this.getToken("b" + moves[i]).state == "vacio") {
            moves[i] = null;
        }

    }

    return moves;
}


/**
 * Identifica los posibles objetivos para saltar
 * @returns {boolean}
 */
Game.prototype.movesRemaining = function () {

    var movesRemaining = false;
    for (row in gb = this.Latitudes) {
        for (i in pos = gb[row].posiciones) {
            var tokenEv = pos[i];
            if (tokenEv.state == "imagen") {
                var moves = this.getMoves(tokenEv.id);
                for (destiny in moves) {
                    if (moves[destiny] != null) {
                        var tokenAf = this.getToken("b" + moves[destiny]);
                        if (tokenAf.state == "hueco") {
                            var target = this.getToken("b" + this.selectTarget(tokenEv, tokenAf));
                            if (target.state == "imagen") {
                                movesRemaining = true;
                            }
                        }
                    }
                }
            }
        }
    }

    return movesRemaining;
}

/**
 * Devuelve la posición del token entre dos tokens
 * @param origin posición inicial del movimiento
 * @param destiny posicion final del movimiento
 * @returns {*}
 */
Game.prototype.selectTarget = function (origin, destiny) {

    if (destiny.state == "hueco" && origin.state == "imagen") {
        var movimientos = this.getMoves(origin.id);
        var currentPos = parseInt(destiny.id.substring(1));
        var middlePos = null;
        for (var m in movimientos) {
            if (movimientos[m] == currentPos) {

                switch (m) {
                    case "top":
                        middlePos = currentPos + 10;
                        break;
                    case "right":
                        middlePos = currentPos - 1;
                        break;
                    case "down":
                        middlePos = currentPos - 10;
                        break;
                    case "left":
                        middlePos = currentPos + 1;
                        break;
                    default :
                        break;
                }
            }
        }
    }

    return middlePos;
}

/**
 * Actualiza el estado del tablero
 */
Game.prototype.move = function () {

    if (this.time && this.movesRemaining()) {

        var target = this.getToken("b"
            + this.selectTarget(this.previous, this.current));
        if (target.state == "imagen") {
            this.current.state = "imagen";
            this.previous.state = "hueco";
            target.state = "hueco";
            this.score += 15;

        }

        this.displayGame();
    }

}


/**
 * Permite al usuario pintar el tablero
 */
Game.prototype.customGame = function () {
    this.custom = true
    for (row in this.Latitudes) {
        this.defineTokens(row);
    }
    this.score = 0;
    this.current = null;
    this.previous = null;
    this.time = true;
    this.timer = -1;
    try {
        var end = document.querySelector("#end")
        end.parentNode.removeChild(end);
    }
    finally {
        this.displayGame();
    }
}

/**
 * Pinta el tablero con todos los tokens menos el central
 */
Game.prototype.unsetCustom = function () {
    if (this.custom) {
        this.custom = false;
        try {
            var end = document.querySelector("#end")
            end.parentNode.removeChild(end);
        }
        finally {
            timer();
            this.displayGame();
        }
    }
    else {
        var restart = confirm("You'll be lost your score.\nAre you sure to do that?");
        if (restart == true) {
            this.restart();
        }
    }
}


/**
 * Resetea el tablero de juego
 */
Game.prototype.restart = function () {
    for (row in gb = this.Latitudes) {
        gb[row].posiciones = Array(7);
        var child = document.querySelector('#' + row);
        document.querySelector("#playSpace").removeChild(child);
    }
    this.previous = null;
    this.current = null;
    this.timer = -1;
    this.time = true;
    this.score = -1;

    try {
        var end = document.querySelector("#end")
        end.parentNode.removeChild(end);
    }
    finally {
        this.newGame(false);
    }
}

/**
 * Cambia el estado del token
 */
Game.prototype.place = function () {

    if (this.current.state == "hueco") {
        this.current.state = "imagen"
    }
    else {
        this.current.state = "hueco";
    }
    game.displayGame();
}


/**
 * Establece la cuenta atras
 */
Game.prototype.setTimer = function () {
    var h = document.querySelector("#hours").value;
    var m = document.querySelector("#minutes").value;
    var s = document.querySelector("#seconds").value;

    var hours = 0;
    var minutes = 0;
    var seconds = 0;
    if (h != "") {
        hours = parseInt(h);
    }
    if (m != "") {
        minutes = parseInt(m);
    }
    if (s != "") {
        seconds = parseInt(s);
    }
    this.timer = (hours * 3600) + (minutes * 60) + (seconds);

}

/**
 * Actualiza la cuenta atras
 */
Game.prototype.updateTimer = function () {

    this.timer--;
    var Seconds = this.timer;

    var Hours = Math.floor(Seconds / 3600);
    Seconds -= Hours * (3600);

    var Minutes = Math.floor(Seconds / 60);
    Seconds -= Minutes * (60);

    var TimeStr = seeTime(Hours) + ":" + seeTime(Minutes) + ":" + seeTime(Seconds);

    if (TimeStr != "0-1:59:59") {
        document.querySelector("#ctdown").innerHTML = TimeStr;
    }
    else {
        document.querySelector("#ctdown").innerHTML = "00:00:00";
    }


}

/**
 * Mira el tiempo transcurrido
 * @param t
 * @returns {string}
 */
function seeTime(t) {
    return (t < 10) ? "0" + t : t;
}

Game.prototype.clic = function () {

    var clics = 0;
    for (row in gb = this.Latitudes) {
        for (i in pos = gb[row].posiciones) {
            if (pos[i].state == "imagen") {
                clics++;
            }
        }
    }
    return clics;
}
