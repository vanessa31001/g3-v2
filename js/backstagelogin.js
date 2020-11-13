function $id(id){
    return document.getElementById(id);
}

//送出登入
function sendForm_Login(){
    //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上
    let backxhr = new XMLHttpRequest();
	let adminId = $id("adminId").value;
    let adminPsw = $id("adminPsw").value;
	backxhr.onload = function(){
        console.log(JSON.parse(backxhr.responseText));
        let manager = JSON.parse(backxhr.responseText);
		if(manager.MGR_ID = true){
            window.location.href="./backstage.html";
			// window.alert("OK");
		}else{
			window.alert("帳密錯誤");
		}
    }
    backxhr.open("Post", "php/backstage/backstage_loginIn.php", true);
    backxhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    let data_info = `MGR_ID=${adminId}&MGR_PSW=${adminPsw}`;
    backxhr.send(data_info);
}
function init(){
    //登入btn事件處理程序
    $id('btnBacklogin').onclick = sendForm_Login;
};

window.addEventListener('load',init,false);
