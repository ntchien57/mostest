function loadScriptSync (src) {
    var s = document.createElement('script');
    s.src = src;
    s.type = "text/javascript";
    s.async = false;                                 // <-- this is important
    document.getElementsByTagName('head')[0].appendChild(s);
}