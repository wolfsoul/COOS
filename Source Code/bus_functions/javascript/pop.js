function SetCookie() {
	if(arguments.length < 2) { return; }
	var n = arguments[0];
	var v = arguments[1];
	var d = 0;
	if(arguments.length > 2) { d = parseInt(arguments[2]); }
	var exp = '';
	if(d > 0) {
		var now = new Date();
		then = now.getTime() + (d * 24 * 60 * 60 * 1000);
		now.setTime(then);
		exp = '; expires=' + now.toGMTString();
	}
	document.cookie = n + "=" + escape(String(v)) + '; path=/' + exp;
} // function SetCookie()

function ReadCookie(n) {
	var cookiecontent = new String();
	if(document.cookie.length > 0) {
		var cookiename = n+ '=';
		var cookiebegin = document.cookie.indexOf(cookiename);
		var cookieend = 0;
		if(cookiebegin > -1) {
			cookiebegin += cookiename.length;
			cookieend = document.cookie.indexOf(";",cookiebegin);
			if(cookieend < cookiebegin) { cookieend = document.cookie.length; }
			cookiecontent = document.cookie.substring(cookiebegin,cookieend);
		}
	}
return unescape(cookiecontent);
} // function ReadCookie()


function pop()
	{

		if (ReadCookie("cookie").length == 0) 
		{ 
			var notice = '<div class="notice">'
				+ '<div class="notice-body">'
					+ '<img src="img/info.png" alt=\"\" />'
					+ '<h3>Welcome!</h3>'
					+ '<p>Welcome to our site and we wish you good appetite!</p>'
				+ '</div>'
				+ '<div class="notice-bottom">'
				+ '</div>'
			+ '</div>';
			
			SetCookie("cookie", "2");
		}
		else if (ReadCookie("cookie") == 1) 
		{
			var a = ReadCookie("cookie1");
			var b = ReadCookie("cookie2");
			var notice = '<div class="notice">'
				+ '<div class="notice-body">'
					+ '<img src="img/info.png" alt=\"\" />'
					+ '<h3>' +a+ '</h3>'
					+ '<p>' +b+ '</p>'
				+ '</div>'
				+ '<div class="notice-bottom">'
				+ '</div>'
			+ '</div>';
			
			SetCookie("cookie", "2");
		}
		
	$( notice ).purr(
		{
			usingTranparentRNG: true
		}
	);
	

				
	return false;
}