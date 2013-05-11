function search(location, backurl)
{
	var searchTxt = $('#searchBox').val();
	if(searchTxt != "")
	{
		$.ajax({
			type: 'POST',
			url: 'json.php',
			data: {code: 's', type: 'search', query: searchTxt, location: location, backurl: backurl},
			dataType: 'json',
			success: function(json) {displayData(json)},
		});
	}
	else
	{
		$('#searchResultsText').text("Search For Shooters")
		$('#searchResultsText').show();
		$('#searchResults').hide();
	}
}

function displayData(json)
{
	if(json.length>0)
	{
		$('#searchResultsText').hide();
		var string = "";

		$.each(json.shooters, function(index, obj) {
			string += "<li>"+obj.name+"</li>";
		})
		$('#searchResults').html(string);
		$('#searchResults').show();

	}
	else {
		$('#searchResultsText').show();
		$('#searchResults').hide();
		$('#searchResultsText').text("No Results Returned")
	}
}