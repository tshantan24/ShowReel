//document.getElementById("signup").addEventListener('submit', formValidation);
//document.getElementById("login").addEventListener('submit', submitForm);

function formValidation(event){

	var uname = document.getElementById("uname").value;
	var email = document.getElementById("email").value;
	var pass = document.getElementById("pass").value;
	var cpass = document.getElementById("cpass").value;
	var pnum = document.getElementById("pnum").value;
    var dataString;
    if (validUName(uname,"* Use alphabets and numbers between 6 & 30 characters *")) {
    	if (emailValidation(email, "* Please enter a valid email address *")) {
    		if(validPass(pass, "* Password should contain atleast 1 LC letter, 1 UC letter, 1 number and 1 special character *")) {
				if(validCPass(cpass, pass, "* Passwors do not match *")) {
					if (validPNum(pnum, "* Please enter a valid phone number (10 digits) *")) {
						event.preventDefault();
						dataString = 'uname=' + uname + '&email=' + email + '&pass=' + pass + '&pnum=' + Number(pnum);
						sendData(dataString);
						window.location.replace("citysel.php");
						document.getElementById("result").innerHTML = "Thank you for registering!";
						return true;
					} else {
								event.preventDefault();
								return false;
					}
				} else {
							event.preventDefault();
							return false;
				}
			} else {
						event.preventDefault();
						return false;
			}
		} else {
					event.preventDefault();
					return false;
		}
	} 
	else{

			event.preventDefault();
			return false;
	 }

	function validUName(inputtext, alertMsg) {
		var nameExp = /^[0-9a-zA-Z]{6,30}$/;
		if (nameExp.test(inputtext)) {
			console.log("True");
			document.getElementById('p1').innerText = "";
			return true;
		} else if(!nameExp.test(inputtext)){
			document.getElementById('p1').innerText = alertMsg; 
			document.getElementById('uname').focus();
			return false;
		}
	}

	function emailValidation(inputtext, alertMsg) {		
		var emailExp = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
		if (emailExp.test(inputtext)) {
			document.getElementById('p2').innerText = "";
			return true;
		} else if (!emailExp.test(inputtext)){
			document.getElementById('p2').innerText = alertMsg; 
			document.getElementById('email').focus();
			return false;
		}
	}

	function validPass(inputpass, alertMsg) {
		var passExp = /^(?=.*\d)(?=.*[!#$%@&? "])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!#$%@&? "]{6,20}$/;
		if(passExp.test(inputpass)) {
			document.getElementById('p3').innerText = "";
			alert("its true");
			return true;
		} else if(!passExp.test(inputpass)){
			document.getElementById('p3').innerText = alertMsg;
			document.getElementById('pass').focus();
			alert("its not true");
			return false;
		}
	}

	function validCPass(inputcpass, inputpass, alertMsg) {
		var passExp = /^(?=.*\d)(?=.*[!#$%@&? "])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!#$%@&? "]{6,20}$/;
		if((passExp.test(inputcpass)) && (inputcpass == inputpass)){
			document.getElementById('p4').innerText = "";
			return true;
		} else if(!((passExp.test(inputcpass)) || (inputcpass === inputpass))) {
			document.getElementById('p4').innerText = alertMsg;
			document.getElementById('cpass').focus();
			return false;
		}
	}

	function validPNum(inputnum, alertMsg) {
		var numExp = /\+?\d[\d -]{8,12}\d/;
		if(numExp.test(inputnum)) {
			document.getElementById('p5').innerText = "";
			return true;
		}
		else if(!numExp.test(inputnum)){
			document.getElementById('p5').innerText = alertMsg; 
			document.getElementById('pnum').focus();
			return false;
		}
	}
	/*function clearInput(){

			$("#signup:input").each( function(){
				$(this).val('')
			});
	
	}*/

	function sendData(str) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				hide();
				document.getElementById("result").style.display = "inline-block";
				document.getElementById("close1").style.display = "inline-block";
			} else {
				alert("Couldn't create account. Please try again.");
			}
		}
		xhttp.open("POST", "connection.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(str);
	}
	function hide(){
		document.getElementById("cform").style.display = "none";
	}
}
   
function submitForm(event){

	event.preventDefault();
	var uname = document.getElementById('username').value;
	var pass = document.getElementById('password').value;

	var str = "username=" + uname + "&password=" + pass;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			hide1();
			alert("success");
			document.getElementById("result").style.display = "inline-block";
		} else {
			alert("Failure");
			//alert("Couldn't login. Please try again.");
		}
	}
	xhttp.open("POST", "validate.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
	function hide1(){
		document.getElementById("lform").style.display = "none";
	}

        /*var strAjax = $('.loginForm').serialize(); // get the input values
            $.ajax({
                type: 'POST',
                url: 'validate.php',
                data: strAjax,
                cache: false,
                success: function(data) {
        		    setInterval(function(){alert(strAjax);}, 5000);
                    if(data == true) {
                	    window.location.href = "index1.php"; // if response is true, then user can go home page
                    }
                    else {
              			alert("false"); // this is just for control purpose
                    }
                }
            });
    return false;*/
}