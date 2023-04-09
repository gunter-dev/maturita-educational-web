let tvar = Math.ceil(Math.random()*3);
if (tvar == 1) {
    let a = Math.ceil(Math.random()*20);
    let b = Math.ceil(Math.random()*20);
    let c = Math.ceil(Math.random()*20);
        
    let V = a*b*c;
    let S = 2*(a*b + a*c + b*c);

    document.getElementById("zadani").textContent = "kvádru.";
    document.getElementById("prvni").textContent = "a = " + a + " cm";
    document.getElementById("druhy").textContent = "b = " + b + " cm";
    document.getElementById("treti").textContent = "c = " + c + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let povrch = document.getElementById("S").value;
        let objem = document.getElementById("V").value;    
        if (povrch.length == 0 || objem.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (povrch < (S+0.02) && povrch > (S-0.02) && objem < (V+0.02) && objem > (V-0.02)) {
            var x = 1;
            var y = 1;
            window.location.href = "3D.php?x=" + x + "&y=" + y;

        }
        else {
            var x = 1;
            var y = 0;
            window.location.href = "3D.php?x=" + x + "&y=" + y + "&V=" + V + "&S= " + S;
        }
    });
}

else if (tvar == 2) {
    let r = Math.ceil(Math.random()*20);
    let v = Math.ceil(Math.random()*20);

    let s = Math.sqrt(r*r+v*v)
    let V = ((Math.PI*r*r*v)/3).toFixed(2);
    let S = (Math.PI*r*(r+s)).toFixed(2);

    document.getElementById("zadani").textContent = "rotačního kužele.";
    document.getElementById("prvni").textContent = "r = " + r + " cm";
    document.getElementById("druhy").textContent = "v = " + v + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let povrch = document.getElementById("S").value;
        let objem = document.getElementById("V").value;    
        if (povrch.length == 0 || objem.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (povrch < (S+0.02) && povrch > (S-0.02) && objem < (V+0.02) && objem > (V-0.02)) {
            var x = 1;
            var y = 1;
            window.location.href = "3D.php?x=" + x + "&y=" + y;
        }
        else {
            var x = 1;
            var y = 0;
            window.location.href = "3D.php?x=" + x + "&y=" + y + "&V=" + V + "&S= " + S;
        }
    });
}

else if (tvar == 3) {
    let a = Math.ceil(Math.random()*20);

    let V = a*a*a;
    let S = 6*a*a;

    document.getElementById("zadani").textContent = "krychle.";
    document.getElementById("prvni").textContent = "a = " + a + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let povrch = document.getElementById("S").value;
        let objem = document.getElementById("V").value;    
        if (povrch.length == 0 || objem.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (povrch < (S+0.02) && povrch > (S-0.02) && objem < (V+0.02) && objem > (V-0.02)) {
            var x = 1;
            var y = 1;
            window.location.href = "3D.php?x=" + x + "&y=" + y;
        }
        else {
            var x = 1;
            var y = 0;
            window.location.href = "3D.php?x=" + x + "&y=" + y + "&V=" + V + "&S= " + S;
        }
    });
}