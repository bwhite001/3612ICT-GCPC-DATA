$(document).ready(function() {
	$('.formText.table').keydown(function(event) {
		var currentId = $(this).attr("id").substr(9);
		var dir = 0;
		event.preventDefault();

		if(event.keyCode >= 96 && event.keyCode <= 105)
		{
			$(this).val(event.keyCode-96);
			dir = 1;
		}
		else if(event.keyCode >= 48 && event.keyCode <= 57){
			$(this).val(event.keyCode-48);
			dir = 1;
		}
		else if(event.keyCode == 107 || event.keyCode == 109 || event.keyCode == 187 || event.keyCode == 189)
		{
			$(this).val(10);
			dir = 1;
		}
		if (event.keyCode == 8)
		{
			$(this).val(0);
		}


		if(event.keyCode == 38)
		{
			dir = -5;
		}
		else if(event.keyCode == 40)
		{
			dir = 5;
		}

		if(event.keyCode == 37)
		{
			dir = -1;
		}
		else if(event.keyCode == 39)
		{
			dir = +1;
		}

		if (event.keyCode == 9)
		{
			dir = +1;
		}
		var next = dir+parseInt(currentId);
		
		if(next < 0)
		{
			next = 0;
		}
		else if(next > shots)
		{
			next = shots-1;
		}

		if(next == shots)
		{
			$(this).blur();
		}
		else
		{
			$("#tableText"+next).focus();
		}
		addScore();
	});
});

function addScore()
{
	for(var i = 1; i <= shots/5; i++)
	{
		var rowTotal = 0;
		$(".formText.table.row"+i).each(function(){rowTotal += parseInt($(this).val())});
		$("#rowTotal"+i).text(rowTotal);
	}
	for(var i = 1; i <= shots/5; i+=2)
	{
		var dTotal = 0;
		dTotal += parseInt($("#rowTotal"+i).text());
		dTotal += parseInt($("#rowTotal"+(i+1)).text());

		$("#doubleTotal"+i).text(dTotal);
	}
	var allTotal = 0;

	$(".inputInside.dTotal").each(function(){allTotal += parseInt($(this).text())});
	$("#overTotalDisplay").text(allTotal);

	$("#overallTotal").val(allTotal);
}

function checkScores()
{
	if($("#handicaptxt").val() == "")
	{
		alert("Handicap Cannot Be Empty!");
		return false;
	}

	return true;
}

