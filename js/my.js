
function getRequest(link){
	const Http = new XMLHttpRequest();
	Http.open("GET", "../../saverecords/sql.php?query=" + link);
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			console.log(Http.responseText);
			return Http.responseText;
		}
	}
	return "";
}

 

 

function searchID(){
	var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	document.getElementById("Date").value = date;
	var result;
	const Http = new XMLHttpRequest();
	let url = 	"../../saverecords/sql.php?query=select * from tbl_patientinfo where PatientID = '" + document.getElementById("DC_ID").value + "'";
	Http.open("GET", url);
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			let sqlResult = Http.responseText.substring(1,Http.responseText.length-1);
			if (isValidJSON(sqlResult)){
				result = JSON.parse(sqlResult);
				console.log(result.ID);
				document.getElementById("DC_FName").value = result.Fname;
				document.getElementById("DC_MName").value = result.Mname;
				document.getElementById("DC_LName").value = result.Lname;
				document.getElementById("DC_College").value = result.CollegeUnit;
				document.getElementById("DC_Course").value = result.Course;
			}else{

			}
			// result = JSON.parse(Http.responseText);
		}
	}
}

function isValidJSON(test) {
    try {
        var obj = JSON.parse(test);
        if (obj && typeof obj === "object" && obj !== null) {
            return true;
        }
    } catch (e) {

    }
    return false;
}
function fillUp(ID){
	var result;
	const Http = new XMLHttpRequest();
	let url = 	"../../saverecords/sql.php?query=select * from tbl_patientinfo where PatientID = '" + ID + "'";
	Http.open("GET", url);
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			let sqlResult = Http.responseText.substring(1,Http.responseText.length-1);
			if (isValidJSON(sqlResult)){
				result = JSON.parse(sqlResult);
				console.log(result.Fname);
				document.getElementById("Fname").value = result.Fname;
				document.getElementById("Lname").value = result.Lname;
				document.getElementById("Mname").value = result.Mname;
				document.getElementById("Course").value = result.Course;
				document.getElementById("Cnumber").value = result.ContactNum;
				document.getElementById("Age").value = result.Age;
				document.getElementById("Birthdate").value = result.Birthdate;
				document.getElementById("Gender").value = result.Sex;
				document.getElementById("Id").value = result.PatientID;
				document.getElementById("Dpartment").value = result.CollegeUnit;
				document.getElementById("Region").value = result.Region;
				document.getElementById("Status").value = result.CivilStatus;
				
			}else{

			}
			// result = JSON.parse(Http.responseText);
		}
	}
}

function saveConsult(){
	let query="";
	query += "'"+document.getElementById("DC_ID").value + "',";
	query += "'"+document.getElementById("Diagnosis").value + "',";
	query += "'"+document.getElementById("Treatment").value + "',";
	query += "'"+document.getElementById("Complaints").value + "',";
	query = "INSERT INTO `tbl_diagnosis`(`PatientID`, `Diagnosis`, `Treatment`, `Referral`, `ModifiedBy`, `CreatedBy`) VALUES (" + query + "1,1)"
	getRequest(query);
}

$(document).ready(function() {
	$(window).keydown(function(event){
	  if(event.keyCode == 13) {
		event.preventDefault();
		return false;
	  }
	});
  });
