function atload() {updateAll(true);}
window.onload=atload;

function updateAll(atload)
{
	updateSpec(atload);
	updateRace(atload);
}

function updateSpec(atload)
{
	player_class = document.getElementById("player_class").value;
	all_specs = getElementsByClass("role");
	if(!atload){document.getElementById("spec").value = '';}
	for(k=0;k<all_specs.length;k++)
	{
		current_class = all_specs[k].className;
		all_specs[k].style.display = 'none';
		if(current_class.search(player_class) != 0)
		{
			player_specs = getElementsByClass(player_class);
			for(m=0;m<player_specs.length;m++)
			{
				player_specs[m].style.display = '';
			}
		}
		
	}
	if(player_class == '') {
		document.getElementById("specrow").style.display = 'none';
	} else {
		document.getElementById("specrow").style.display = '';
	}
}

function updateRace(atload)
{
	player_class = document.getElementById("player_class").value;
	all_races = getElementsByClass("races");
	if(!atload){document.getElementById("race").value = '';}
	for(k=0;k<all_races.length;k++)
	{
		current_class = all_races[k].className;
		all_races[k].style.display = 'none';
		if(current_class.search(player_class) != 0)
		{
			player_races = getElementsByClass(player_class);
			for(m=0;m<player_races.length;m++)
			{	
				player_races[m].style.display = '';
			}
		}
	}
	if(player_class == '') {
		document.getElementById("racerow").style.display = 'none';
	} else {
		document.getElementById("racerow").style.display = '';
	}
}

function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}