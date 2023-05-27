function validate()
		{
			var uname = document.getElementById("uname");
			var email = document.getElementById("email");
			var pass = document.getElementById("password");
			var dep = document.getElementById("dep");
			var phone = document.getElementById("phone");
			
			if(uname.value=="")
			{
				alert("Enter the user name");
				return false;
			}
			 else if(email.value=="")
			 {
			 	alert("Incorrect email");
				return false;
			 }
			 else if(password.value=="")
			 {
			 	alert("Please enter the password");
				return false;
			 }
			 else if(dep.value=="")
			 {
			 	alert("Enter the department");
			 	return false;
			 }
			 else if(phone.value=="")
			 {
			 	alert("Enter the Phone No.");
			 	return false;
			 }
			
		}