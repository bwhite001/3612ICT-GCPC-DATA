function search(location, backurl, date, seriesid)
{
	var searchTxt = $('#searchBox').val();
	if(searchTxt != "")
	{
		$.ajax({
			type: 'POST',
			url: 'json.php',
			data: {code: 's', type: 'search', date:date, seriesid:seriesid, query: searchTxt, location: location, backurl: backurl},
			dataType: 'json',
			success: function(json) {displayData(json)},
		});
	}
	else
	{
		$('#searchResultsText').text("Search For Shooters")
		$('#searchResultsText').show();
		$('#searchResults').hide();
		$("#topSeachBox").removeAttr('style');
		$("#searchBox").removeAttr('style');
		$("#magGlass").removeAttr('style');
	}
}

function displayData(json)
{
	if(json.length>0)
	{
		$('#searchResultsText').hide();
		var string = "";

		$.each(json.shooters, function(index, obj) {
			if(obj.male == 1)
			{
				string += "<li><a href='dash.php?t="+json.location+"&id="+obj.id+"&backurl="+json.backUrl+"&date="+json.date+"&seriesid="+json.seriesid+"'>"+obj.name+"<span class='side right male'>Male</span></a></li>";
			}
			else
			{
				string += "<li><a href='dash.php?t="+json.location+"&id="+obj.id+"&backurl="+json.backUrl+"&date="+json.date+"&seriesid="+json.seriesid+"'>"+obj.name+"<span class='side right female'>Female</span></a></li>";
			}
		})

		var height = json.shooters.length * 62 + (json.shooters.length+1) * 5;

		$("#topSeachBox").css('height', height+'px')
		$("#searchBox").css('margin', (height/2-18)+'px 12px')
		$("#magGlass").css('margin', (height/2-30)+'px 0px')
		$('#searchResults').html(string);
		$('#searchResults').show();

	}
	else {
		$('#searchResultsText').show();
		$('#searchResults').hide();
		$('#searchResultsText').html("No Results Returned <a class='button newshooter' href='dash.php?t=sa&backurl="+json.backUrl+"'>Create Shooter</a>");
		$("#topSeachBox").removeAttr('style');
		$("#searchBox").removeAttr('style');
		$("#magGlass").removeAttr('style');
	}
}