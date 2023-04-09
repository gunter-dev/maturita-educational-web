let tvar = Math.ceil(Math.random()*4);
if (tvar == 1) {
    let a = Math.ceil(Math.random()*20);
    let b = Math.ceil(Math.random()*20);
    let c = Math.ceil(Math.random()*20);
        
    while (a + b <= c || a + c <= b || b + c <= a) {
        let a = Math.ceil(Math.random()*20);
        let b = Math.ceil(Math.random()*20);
        let c = Math.ceil(Math.random()*20);
    }

    let o = a + b + c;
    let s = o/2;
    let S = (Math.sqrt(s*(s-a)*(s-b)*(s-c))).toFixed(2);

    document.getElementById("zadani").textContent = "trojúhelníku.";
    document.getElementById("prvni").textContent = "a = " + a + " cm";
    document.getElementById("druhy").textContent = "b = " + b + " cm";
    document.getElementById("treti").textContent = "c = " + c + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let obvod = document.getElementById("o").value;
        let obsah = document.getElementById("S").value;    
        if (obvod.length == 0 || obsah.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (obvod < (o+0.02) && obvod > (o-0.02) && obsah < (S+0.02) && obsah > (S-0.02)) {
            var a = 1;
            var b = 1;
            window.location.href = "2D.php?a=" + a + "&b=" + b;

        }
        else {
            var a = 1;
            var b = 0;
            window.location.href = "2D.php?a=" + a + "&b=" + b + "&o=" + o + "&S= " + S;
        }
    });
}

else if (tvar == 2) {
    let a = Math.ceil(Math.random()*20);
    let b = Math.ceil(Math.random()*20);
    
    while (a == b) {
        let a = Math.ceil(Math.random()*20);
        let b = Math.ceil(Math.random()*20);
    }

    let o = (2*a)+(2*b);
    let S = a*b;

    document.getElementById("zadani").textContent = "obdélníku.";
    document.getElementById("prvni").textContent = "a = " + a + " cm";
    document.getElementById("druhy").textContent = "b = " + b + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let obvod = document.getElementById("o").value;
        let obsah = document.getElementById("S").value;    
        if (obvod.length == 0 || obsah.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (obvod < (o+0.02) && obvod > (o-0.02) && obsah < (S+0.02) && obsah > (S-0.02)) {
            var a = 1;
            var b = 1;
            window.location.href = "2D.php?a=" + a + "&b=" + b;
        }
        else {
            var a = 1;
            var b = 0;
            window.location.href = "2D.php?a=" + a + "&b=" + b + "&o=" + o + "&S= " + S;
        }
    });
}

else if (tvar == 3) {
    let a = Math.ceil(Math.random()*20);

    let o = 4*a;
    let S = a*a;

    document.getElementById("zadani").textContent = "čtverce.";
    document.getElementById("prvni").textContent = "a = " + a + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let obvod = document.getElementById("o").value;
        let obsah = document.getElementById("S").value;    
        if (obvod.length == 0 || obsah.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (obvod < (o+0.02) && obvod > (o-0.02) && obsah < (S+0.02) && obsah > (S-0.02)) {
            var a = 1;
            var b = 1;
            window.location.href = "2D.php?a=" + a + "&b=" + b;
        }
        else {
            var a = 1;
            var b = 0;
            window.location.href = "2D.php?a=" + a + "&b=" + b + "&o=" + o + "&S= " + S;
        }
    });
}

else if (tvar == 4) {
    let d = Math.ceil(Math.random()*20);

    let o = (Math.PI*d).toFixed(2);
    let S = ((Math.PI*d*d)/4).toFixed(2);

    document.getElementById("zadani").textContent = "kružnice.";
    document.getElementById("prvni").textContent = "d = " + d + " cm";

    document.getElementById("click").addEventListener("click", function() {
        let obvod = document.getElementById("o").value;
        let obsah = document.getElementById("S").value;    
        if (obvod.length == 0 || obsah.length == 0) {
            alert("Vyplň nejdřív obě pole!");
        }
        else if (obvod < (o+0.02) && obvod > (o-0.02) && obsah < (S+0.02) && obsah > (S-0.02)) {
            var a = 1;
            var b = 1;
            window.location.href = "2D.php?a=" + a + "&b=" + b;
        }
        else {
            var a = 1;
            var b = 0;
            window.location.href = "2D.php?a=" + a + "&b=" + b + "&o=" + o + "&S= " + S;
        }
    });
}