window.onload = function() {
    for (var a = document.getElementsByClassName("heart"), b = document.getElementsByClassName("tabitem"), c = document.getElementsByClassName("box"), d = function(a) {
            a.preventDefault();
            for (var d = this.getElementsByTagName("a")[0], e = this.getElementsByTagName("span")[0], f = d.getAttribute("href").replace("#", ""), g = 0; g < c.length; g++) c[g].className = c[g].className.replace(/(?:^|\s)show(?!\S)/g, "");
            document.getElementById(f).className += " show";
            for (var g = 0; g < b.length; g++) b[g].className = b[g].className.replace(/(?:^|\s)active(?!\S)/g, "");
            this.className += " active", e.className += "active";
            var h = d.getBoundingClientRect().left,
                i = d.getBoundingClientRect().top,
                j = a.clientX - h,
                k = a.clientY - i;
            e.style.top = k + "px", e.style.left = j + "px", e.className = "clicked", e.addEventListener("webkitAnimationEnd", function() {
                this.className = ""
            }, !1)
        }, e = 0; e < b.length; e++) b[e].addEventListener("click", d, !1);
    for (var e = 0; e < a.length; e++) a[e].addEventListener("click", function() {
        var b = this.className,
            c = b.indexOf("active"); - 1 == c ? b += " active" : b = b.substr(0, c) + b.substr(c + "active".length), this.className = b
    }, !1)
};