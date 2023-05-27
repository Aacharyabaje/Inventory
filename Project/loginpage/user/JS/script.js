function validate()
		{
			var dep = document.getElementById("dep");
			var cate = document.getElementById("cate");
			var name = document.getElementById("name");
			var num = document.getElementById("num");
			var odate = document.getElementById("odate");
			var rdate = document.getElementById("rdate");
			var reason = document.getElementById("reason");
			
			if(dep.value=="")
			{
				alert("Enter Department");
				return false;
			}
			 else if(cate.value=="")
			 {
			 	alert("Category Missing");
				return false;
			 }
			 else if(name.value=="")
			 {
			 	alert("Enter the Item");
				return false;
			 }
			 else if(num.value=="")
			 {
			 	alert("Enter the Item Number");
			 	return false;
			 }
			 else if(odate.value=="")
			 {
			 	alert("Enter the Order Date");
			 	return false;
			 }
			 else if(rdate.value=="")
			 {
			 	alert("Enter the Return Date");
			 	return false;
			 }
			 else if(reason.value=="")
			 {
			 	alert("Enter the Reason");
			 	return false;
			 }
			
		}