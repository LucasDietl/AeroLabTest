
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
            document.getElementById(x).style.setProperty('background-color','lightgrey', 'important');
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


/* ---------------------------------------------------
   Carga de puntos y cambio de productos
----------------------------------------------------- */

document.getElementById('a1').addEventListener('click',function(){getPoints(1000)},false);
document.getElementById('a2').addEventListener('click',function(){getPoints(5000)},false);
document.getElementById('a3').addEventListener('click',function(){getPoints(7500)},false);

function getPoints(points){
    console.log("entro a la funcion getpoints "+points);
    var request = new XMLHttpRequest();

    request.open('POST', 'https://aerolab-challenge.now.sh/user/points');

    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('Accept', 'application/json');
    request.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA');

    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log('Status:', this.status);
            console.log('Headers:', this.getAllResponseHeaders());
            console.log('Body:', this.responseText);
            swal({
                title: "Congratulations",
                text: this.responseText,
                icon: "success"
            }).then(() => {
                window.location.href = "index.php";
        });



        }else{
            swal("Error", "Please try again", "error");
        }
    };

    var body = {'amount': points};

    request.send(JSON.stringify(body));
}

function redeem(id){
    var request = new XMLHttpRequest();

    request.open('POST', 'https://aerolab-challenge.now.sh/redeem');

    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('Accept', 'application/json');
    request.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YTU5MDI4ZGU2MTliZTAwODgwMTVkYTQiLCJpYXQiOjE1MTU3ODI3OTd9.BxAHPTgDMvkCGGHDG0n7F5-hEca7J0ujMXYJIt7WTrA');

    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log('Status:', this.status);
            console.log('Headers:', this.getAllResponseHeaders());
            console.log('Body:', this.responseText);
            swal({
                    title: "Congratulations",
                    text: "Product has been redeemed!",
                    icon: "success"
                }).then(() => {
                window.location.href = "history.php";
        });



        }else{
            swal("Error", "Please try again", "error");
        }
    };

    var body = {'productId': id};

    request.send(JSON.stringify(body));
}

/* ---------------------------------------------------
   Orden del historial
----------------------------------------------------- */

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("historyTable");
    switching = true;

    dir = "asc";

    while (switching) {

        switching = false;
        rows = table.getElementsByTagName("TR");

        for (i = 1; i < (rows.length - 1); i++) {

            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch= true;
                    break;
                }
            }
        }
        if (shouldSwitch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function sortData(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("historyTable");
    switching = true;
    dir = "asc";

    while (switching) {

        switching = false;
        rows = table.getElementsByTagName("TR");
        for (i = 1; i < (rows.length - 1); i++) {

            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (dir == "asc") {
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    shouldSwitch= true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
/* ---------------------------------------------------
    Efectos del sidebar
----------------------------------------------------- */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

/* ---------------------------------------------------
    Cambios de hoja por parte del navegador
----------------------------------------------------- */

for (i = document.getElementsByClassName("box").length / 2+1 ; i <= (document.getElementsByClassName("box").length); i++) {
    document.querySelector(".box"+ i ).style.display = "none";
}

document.getElementById('arrowRight').addEventListener('click',function(){next()});

function next() {


    for (i = document.getElementsByClassName("box").length / 2+1 ; i <= (document.getElementsByClassName("box").length); i++) {
        document.querySelector(".box"+ i ).style.display = "block";
    }
        document.getElementById("arrowRight").removeEventListener('click',function(){next()});
        document.getElementById("change").setAttribute("src","assets/icons/arrow-left.svg");
        document.getElementById('arrowRight').addEventListener('click',function(){previous()});
        document.querySelector(".total").style.display = "none";
        document.querySelector(".total2").style.display = "block";

    for (i = 1; i <= (document.getElementsByClassName("box").length / 2); i++) {
        document.querySelector(".box" + i).style.display = "none";
    }
}

function previous(){

    for (i = document.getElementsByClassName("box").length / 2+1 ; i <= (document.getElementsByClassName("box").length); i++) {
        document.querySelector(".box"+ i ).style.display = "none";
    }
    for (i = 1; i <= (document.getElementsByClassName("box").length / 2); i++) {
        document.querySelector(".box" + i).style.display = "block";
    }
    document.getElementById('arrowRight').addEventListener('click',function(){next()});
    document.getElementById("arrowRight").removeEventListener('click',function(){previous()});
    document.getElementById("change").setAttribute("src","assets/icons/arrow-right.svg");
    document.querySelector(".total").style.display = "block";
    document.querySelector(".total2").style.display = "none";

}

/* ---------------------------------------------------
    Color de los filtros
----------------------------------------------------- */
color();
function color(){
    var url_string = window.location.href;
    var url = new URL(url_string);

    if(url.searchParams.get("Desc") == "sort"){
        document.getElementById("highestPrice").className += 'buttonActive';
    }else if(url.searchParams.get("Asc") == "sort"){
        document.getElementById("lowestPrice").className += 'buttonActive';
    }else{
        document.getElementById("mostRecent").className += 'buttonActive';
    }

}