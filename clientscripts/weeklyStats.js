window.onload = function()
{
    var mbar = new RGraph.Bar('mgraph', mdata)
    mbar.Set('background.barcolor1', "white")
    mbar.Set('background.barcolor2', "white")
    mbar.Set('colors', ['#59B'])
    mbar.Set('linewidth', 3)
    mbar.Set('hmargin', 5)
    mbar.Set('labels', mlabels)
    mbar.Draw()

    var fbar = new RGraph.Bar('fgraph', fdata)
    fbar.Set('background.barcolor1', "white")
    fbar.Set('background.barcolor2', "white")
    fbar.Set('colors', ['#B59'])
    fbar.Set('linewidth', 3)
    fbar.Set('hmargin', 5)
    fbar.Set('labels', flabels)
    fbar.Draw();
}