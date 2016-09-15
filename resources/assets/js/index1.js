window.onload = function(){toHTML()};

function toHTML(){
    var converter = new showdown.Converter(),
    text = document.getElementById("contentMD").innerHTML,
    html = converter.makeHtml(text);
    document.getElementById("contentHTML").innerHTML = html;
}
