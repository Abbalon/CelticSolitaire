/**
 * Created by montbs on 12/04/17.
 */

/**
 * Elementos o fichas con las que se va a jugar
 * @param id Identifica la posicion (x,y) del token
 * @param pos Identifica en que fila se encuentra el token
 * @param state Refleja el estado del token
 * @constructor
 */
function Token(id, pos, state) {
    this.id = id;
    this.pos = pos;
    this.state = state;
}

/**
 * Fila del tablero de juego
 * @param id Identifica a que fila pertenece
 * @constructor
 */
function Latitude(id) {

    this.idGb = id;
    this.posiciones = new Array(7);
}

/**
 * Añade una ficha a una columna del tablero
 * @param pos Columna a la que se le va a añadir una ficha
 * @param state Estado de la ficha añadida
 */
Latitude.prototype.addToken = function (pos, state) {

    var i = pos + 1;
    var clasesPos = ["uno", "dos", "tres", "cuatro", "cinco", "seis", "siete"];
    var idToken = "b" + this.idGb.substring(3) + i;
    this.posiciones[pos] = new Token(idToken, clasesPos[pos], state);

}
