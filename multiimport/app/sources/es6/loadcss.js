var loadCss = function (urlcss) {
    var newCSS = document.createElement("link");
    newCSS.type = "text/css";
    newCSS.rel = "stylesheet";
    newCSS.href = ven_css + encodeURI(urlcss); 
    // console.log(newCSS.href);
    document.getElementsByTagName("head")[0].appendChild(newCSS);
};