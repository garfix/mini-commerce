function initGrid(gridId, gridUrl)
{
    var gridElement = document.getElementById(gridId);

    var nextElement = gridElement.getElementsByClassName('grid-next')[0];
    nextElement.addEventListener('click', function(){
        updateView();
    });

    function updateView()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                gridElement.outerHTML = this.responseText;
                if (scripts = /<script>(.*?)<\/script>/s.exec(this.responseText)) {
                    eval(scripts[1])
                }
            }
        };
        xhttp.open("GET", gridUrl, true);
        xhttp.send();
    }
}