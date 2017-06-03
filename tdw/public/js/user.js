/**
 * Created by montbs on 09/04/17.
 */
/**
 * Change the user's name
 */

var changeUser = document.querySelector('#changeUser');
userName = document.querySelector('#userName');

function setUserName() {
    var myName = prompt('Please enter your name.');
    localStorage.setItem('name', myName);
    var newTitle = document.querySelector('title');
    newTitle.textContent = 'Celtic Solitaire of ' + myName;
    userName.textContent = 'Username: ' + myName;
}

/**
 * Verify if is the 1º load and then set the user name or not
 */
if (!localStorage.getItem('name')) {
    setUserName();
} else {
    var storedName = localStorage.getItem('name');
}

changeUser.onclick = function () {
    setUserName();
}
