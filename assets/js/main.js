// Hale Showcase theme JS

function changeColour(colourNumber,totalColours) {
	let html = document.getElementById("hale-showcase-html");
	// remove all colour classes ready for new one
	if (html.classList.length > 1) {
		for (let i=0;i<=totalColours;i++) {
			html.classList.remove("colour-"+i);
		}
	}
	// If colour == 0, revert to set colour scheme so don't add a class
	if (colourNumber != "0") html.classList.add("colour-"+colourNumber);
}
