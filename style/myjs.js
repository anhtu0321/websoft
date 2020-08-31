
/* KHAI BÁO HTTP ĐỂ SỬ DỤNG AJAX*/
	function createObj(){
		if(navigator.appName == "Microsoft Internet Explorer"){
			obj = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			obj = new XMLHttpRequest();
		}
		return obj;
	}
	var http = createObj();
/********************************* XỬ LÝ CÁC CHỨC NĂNG CỬA TOOLTIPS, XỬ LÝ ĐỔI MẬT KHẨU VÀ ĐĂNG KÝ*****************/
	function login(){
		http.open("post","include/login.php",true);
		http.onreadystatechange = xllogin;
		var formData = new FormData();
		var un = document.getElementById("user").value;
		var pw = document.getElementById("pass").value;	
		formData.append("un",un);
		formData.append("pw",pw);
		http.send(formData);
	}
	function xllogin(){
		if(http.readyState == 4 & http.status == 200){
			document.getElementById("show").innerHTML = http.responseText;
			/*history.back();
			 hostory.go(-1);*/
		}
	}