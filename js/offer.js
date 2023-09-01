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
    xhttp.open("GET", "showResults.php?q="+res);
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
    xhttp.open("GET", "category.php?q="+text);
    xhttp.send();

    
  }

  function sub(){
    let category_id = document.getElementById("category").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
      let element = document.getElementById("subcategory").innerHTML=this.responseText;
    }
    xhttp.open("GET", "subcat.php?q="+category_id);
    xhttp.send();
  }

  function prod(){
    let element = document.getElementById("subcategory");
    let text = element.options[element.selectedIndex].text;
    //console.log(subcategory_id);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
      let element = document.getElementById("products").innerHTML=this.responseText;
    }
    xhttp.open("GET", "product.php?q="+text);
    xhttp.send();
  }

  function submit(){
    let element = document.getElementById("category");
    let category = element.options[element.selectedIndex].text;
    element = document.getElementById("subcategory");
    let subcategory = element.options[element.selectedIndex].text;
    element = document.getElementById("product");
    let product = element.options[selectedIndex].text;
  }