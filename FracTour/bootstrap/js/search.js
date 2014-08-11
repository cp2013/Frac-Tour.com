function goSearch()
{
	var searchVal = document.getElementById("region").value;	
	if(searchVal == ""){
		window.location = "index.html";
	}
	else if(searchVal == "america"){
		window.location = "search_america.html";
	}
	else if(searchVal == "asia"){
		window.location = "search_asia.html";
	}
	else if(searchVal == "australia"){
		window.location = "search_australia.html";
	}
	else if(searchVal == "europe"){
		window.location = "search_europe.html";
	}
}