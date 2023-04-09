let plusMinus1 = Math.random();
let PM1 = 0;
if (plusMinus1 < 0.5) {
    PM1 = -1;
}
else {
    PM1 = 1;
}
let plusMinus2 = Math.random();
let PM2 = 0;
if (plusMinus2 < 0.5) {
    PM2 = -1;
}
else {
    PM2 = 1;
}
let plusMinus3 = Math.random();
let PM3 = 0;
if (plusMinus3 < 0.5) {
    PM3 = -1;
}
else {
    PM3 = 1;
}
let a = Math.ceil(Math.random()*10)*PM1;
let b = Math.ceil(Math.random()*10)*PM2;
let c = Math.ceil(Math.random()*10)*PM3;

let d = b*b-4*a*c;
while(d < 0 || !Number.isInteger(Math.sqrt(d))){
    a = Math.ceil(Math.random()*10)*PM1;
    b = Math.ceil(Math.random()*10)*PM2;
    c = Math.ceil(Math.random()*10)*PM3;
    d = b*b-4*a*c;
                
    if(!Number.isInteger(Math.sqrt(d))) {
        d=-1;
    }
}

document.getElementById("a").textContent = a;
if (b < 0) {
    document.getElementById("b").textContent = b;
}
else {
    document.getElementById("plus1").textContent = "+";
    document.getElementById("b").textContent = b;
}
if (c < 0) {
    document.getElementById("c").textContent = c;
}
else {
    document.getElementById("plus2").textContent = "+";
    document.getElementById("c").textContent = c;
}
let x1 = ((-b+Math.sqrt(d))/(2*a)).toFixed(2);
let x2 = ((-b-Math.sqrt(d))/(2*a)).toFixed(2);

document.getElementById("click").addEventListener("click", function() {
    let x10 = document.getElementById("x1").value;
    let x20 = document.getElementById("x2").value;    
    if (x10.length == 0 || x20.length == 0) {
        alert("Vyplň nejdřív obě pole!");
    }
    else if (x10 < (x1+0.02) && x10 > (x1-0.02) && x20 < (x2+0.02) && x20 > (x2-0.02) 
    || x10 < (x2+0.02) && x10 > (x2-0.02) && x20 < (x1+0.02) && x20 > (x1-0.02)) {
        var x = 1;
        var y = 1;
        window.location.href = "kvadrov.php?x=" + x + "&y=" + y;
    }
    else {
        var x = 1;
        var y = 0;
        window.location.href = "kvadrov.php?x=" + x + "&y=" + y + "&x1=" + x1 + "&x2=" + x2;
    }
});