//menus.js

var isShowing = false;

var dropDownMenu = null;

function show(id){
    hide();
    dropDownMenu = document.getElementById(id);
    if(dropDownMenu != null){
        dropDownMenu.style.visibility = 'visible';
        isShowing = true;
    }
}

function hide(){
    if(isShowing){
        dropDownMenu.style.visibility = 'hidden';
        isShowing = false;
    }
}
