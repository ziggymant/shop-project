var suggestResult = document.getElementById('search-suggest'); // div where we store search results
var search = document.getElementById('search'); // form input where we type search keywords

function compileResult(entries){
  var list = "";
// console.log("compile");
  // for(i = 0; i< entries.length; i++){
    // list += "<li>";
    // list += "<a class=\"list-group-item\" href=\"#\">";
    // list += entries['title'];
    // list += "</a>";
    // list += "</li>";
  // }

  for(var key in entries){
    list += "<li>";
    list += "<a class=\"list-group-item\" href=\"/post/"+key+"\">";
    list += entries[key];
    list += "</a>";
    list += "</li>";
  }
  return list;
}

function displaySuggestions(entries){
  // console.log("displaySuggestions");
  var list = compileResult(entries);
  suggestResult.innerHTML = list;
  suggestResult.style.display = "block";

}

function getSearchResults() {
  var q = search.value;
  var url = "http://project.dev/search/";

  if(q.length < 3){
    suggestResult.style.display = "none";
  }

  var xhr = new XMLHttpRequest();
  // console.log("event listener works");
  xhr.open("GET", url+q , true);
  xhr.setRequestHeader("X-requested-with", "XMLHttpRequest");
  xhr.onreadystatechange = function(){
    // console.log(xhr.readyState);
    if(xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
      var json = JSON.parse(result);
      displaySuggestions(json);
    }
  }
  xhr.send();
}


search.addEventListener("input", getSearchResults);
