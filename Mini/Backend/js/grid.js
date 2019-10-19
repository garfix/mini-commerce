function initGrid(gridId)
{
    var grid = {
        id: gridId,
        init: function(id) {
            this.id = id;
            console.log(id)
        }
    };

    grid.init(gridId);
}