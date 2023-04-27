function initArr(startSize, incRef, num) {
    var sSize = startSize;
    var list = "";
    for (let i = 0 ; i < num ; i++ ){

        list += "<div id=square" + i + " class='square_black' type='button' style='width: " + sSize + "px; height: " + sSize + "px; margin-right: 100px; margin-bottom: 30px; font-size: 36px; text-align: center; color: black;'> </div>";
        sSize += incRef;
    };
    document.getElementById("layout3_main").innerHTML = list;

    document.getElementById("side_square").onclick = function() {
        addSquare(startSize, incRef, num);
    };
    
};

function addSquare(startSize, incRef, num) {
    num += 3;
    var sSize = startSize;
    var addlist = "";
    var text = ["A", "B", "C", "D", "A", "B", "C", "D"];
    for(let i = 0 ; i < num ; i++) {
        let = index = Math.floor(Math.random()*text.length);
        let letter = text[index];
        text.splice(index,1);
        addlist += "<div id=square" + i + " class='square_black' type='button' style='width: " + sSize + "px; height: " + sSize + "px; margin-right: 100px; margin-bottom: 30px; font-size: 36px; text-align: center; color: black;'> "+ letter + " </div>";
        sSize += incRef;
    }
    document.getElementById("layout3_main").innerHTML = addlist;

    flip(num);
};

function flip(num) {
    for (let i = 0 ; i < num ; i++ ){
        document.getElementById("square" + i).onclick = function() {
            $(this).css("color", "white");
        }
    }
};