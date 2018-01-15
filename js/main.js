
/* ---------------------------------------------------
    Mouse over functions
----------------------------------------------------- */

    abbrs = document.getElementsByClassName('box');
    len = abbrs.length;

function addEvent(one, x){
    one.addEventListener('mouseover', function(event){
        document.getElementById(x).style.display = 'block';
        var y = document.querySelector('.whiteBlue'+x);
        y.setAttribute('src','assets/icons/buy-white.svg');
        if(document.getElementById('notRedeemable'+x).length = 1){
            document.getElementById(x).style.setProperty('background-color','red', 'important');
        }
    });
}
function addEventTwo(two, z){
    two.addEventListener('mouseout', function(event){
        document.getElementById(z).style.display = 'none';
        var y = document.querySelector('.whiteBlue'+z);
        y.setAttribute('src','assets/icons/buy-blue.svg');
    });
}

for(i=0 ; i < len ; i++){
    addEvent(abbrs[i], i+1);
    addEventTwo(abbrs[i], i+1);
}