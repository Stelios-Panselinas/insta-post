function showResult(str) {
    let str2 = "%";
    if (str == "") {
        document.getElementById("results").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("results").innerHTML = this.responseText;
    }
    var res = str.concat(str2);
    xhttp.open("GET", "../classes/Offer.php?function=showResult&result="+res);
    xhttp.send();
}

function autoFill(str){
    let e = document.getElementById("results");
    let value = e.value;
    var text = e.options[e.selectedIndex].text;
    document.getElementById("searchBar").value=text;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        let category_id = this.responseText;
        var selectElement = document.getElementById("category");
        selectElement.selectedIndex = category_id;
    }
    xhttp.open("GET", "../classes/Offer.php?function=autoFill&text="+text);
    xhttp.send();
}

function sub(){
    let category_id = document.getElementById("category").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        let element = document.getElementById("subcategory").innerHTML=this.responseText;
    }
    xhttp.open("GET", "../classes/Offer.php?function=subcategoryFill&category_id="+category_id);
    xhttp.send();
}

function prod(){
    let element = document.getElementById("subcategory");
    let subcategory_id = element.options[element.selectedIndex].text;
    //console.log(subcategory_id);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        let element = document.getElementById("products").innerHTML=this.responseText;
    }
    xhttp.open("GET", "../classes/Offer.php?function=productFill&subcategory_id="+subcategory_id);
    xhttp.send();
}

function submit(){
    let element = document.getElementById("category");
    let category_id = element.value;
    element = document.getElementById("subcategory");
    let subcategory_id = element.value;
    element = document.getElementById("products");
    let product = element.options[element.selectedIndex].text;
}
