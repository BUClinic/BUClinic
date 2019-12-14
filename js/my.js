
function searchID(){
	document.getElementById("DC_FName").value = document.getElementById("DC_ID").value + String.fromCharCode(event.keyCode);
	document.getElementById("DC_LName").value = document.getElementById("DC_ID").value + String.fromCharCode(event.keyCode);
	document.getElementById("DC_MName").value = document.getElementById("DC_ID").value + String.fromCharCode(event.keyCode);

}