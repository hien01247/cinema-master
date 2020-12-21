<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
    var globalt = 0;
    var cacsl = document.getElementsByClassName("cacsl");
    var num = cacsl.length;
    var soluong = [];
    for (i = 1; i <= num; i++) {
        soluong.push('#soluong_' + i);
    }
    var getTotal = function () {
    var tong = [];
    document.getElementById("tong").value = 0;
    for (i = 1; i <= num; i++) {
    
        var soluong = document.getElementById("soluong_" + i).value;
    
        var dongia = document.getElementById("gia_" + i).value;
        tong.push(soluong * dongia);
        var thanhtien = document.getElementById("tong_" + i).value = soluong * dongia + " VNĐ";
    }
    const reducer = (accumulator, currentValue) => accumulator + currentValue;
    globalt = tong.reduce(reducer) ;
    document.getElementById("tong").value = tong.reduce(reducer) + " VNĐ";
    }
        
    var lp = document.querySelector('#chonlp');
    function giveSelection(chonlp) {
        var x = document.getElementById('gia_'+ lp.value).value;
            
        document.getElementById("displayGiaphong").value = x + " VNĐ";
        document.getElementById("giaghe").value = parseInt( x);
        document.getElementById("giadv").value = parseInt( globalt);
        document.getElementById("loaiphong").value = lp.value;
        document.getElementById("db_btn").disabled = false;
    }
    
    var calculate = function () {
        var temp, i = 1;
        do {
            temp = document.getElementById("soluong_" + i).onchange = getTotal;
            i++;
        } while (temp);
        calculate();
    };
    window.onload = calculate;

    