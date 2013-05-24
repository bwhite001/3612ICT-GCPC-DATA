window.onload = function()
{
    var line = new RGraph.Line('graph', data)
    line.Set('background.barcolor1', "white")
    line.Set('background.barcolor2', "white")
    line.Set('colors', ['#F96', '#F60'])
    line.Set('linewidth', 3)
    line.Set('hmargin', 5)
    line.Set('labels', labels)
    line.Set('key', ["Pistol Shooters","Rifle Shooters"])
    line.Set('chart.tickmarks', "filledcircle")
    line.Set('tooltips', tooltips[0], tooltips[1])
    line.Set('chart.tooltips.css.class', 'graphTooltips');
    RGraph.Effects.Line.jQuery.Trace(line);
}