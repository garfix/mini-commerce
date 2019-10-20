function initGrid(gridId, gridUrl)
{
    var gridElement = document.getElementById(gridId);

    var nextElement = gridElement.getElementsByClassName('grid-next')[0];
    nextElement.addEventListener('click', function(){
        doAction('next-page');
    });

    function doAction()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var result = JSON.parse(this.responseText);
                var values = result['values'];
                var columns = result['columns'];
                var actions = result['actions'];
                var tbody = gridElement.getElementsByTagName('tbody')[0];
                var trs = tbody.getElementsByTagName('tr');
                for (var rowIndex = 0; rowIndex < trs.length; rowIndex++) {
                    var tr = trs[rowIndex];
                    var rowValues = values[rowIndex];
                    var rowActions = actions[rowIndex];
                    var tds = tr.getElementsByTagName('td');
                    for (var colNameIndex = 0; colNameIndex < columns.length; colNameIndex++) {
                        var colName = columns[colNameIndex];
                        var td = tds[colNameIndex];
                        var rowValue = rowValues[colName] ? rowValues[colName] : '';
                        var value = '';
                        if (colName === 'actions') {
                            for (var actionIndex = 0; actionIndex < rowActions.length; actionIndex++) {
                                var action = rowActions[actionIndex];
                                value += '<a href="' + action['url'] + '">' + action['label'] + '</a>';
                            }
                        } else {
                            if (rowActions) {
                                var firstAction = rowActions[0];
                                value = '<a href="' + firstAction['url'] + '">' + rowValue + '</a>';
                            } else {
                                value = rowValue;
                            }
                        }
                        td.innerHTML = value;
                    }
                }
            }
        };
        xhttp.open("GET", gridUrl, true);
        xhttp.send();
    }
}