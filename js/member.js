let member;
let xhr = new XMLHttpRequest();
function $id(id){
	return document.getElementById(id);
}	
//按下登出回首頁
function loginOut(){
	xhr.onload = function(){
		$id('header_memName').innerHTML = '&nbsp;';
		$id('spanLogin').innerHTML = '登入|註冊';
    }
	xhr.open("get", "php/common/loginOut.php", true);
    xhr.send(null);
    alert("已登出");
    location.href = './shansen.html';
}
//抓是否已登入並顯示在頁面
function getMemberInfo(){
    xhr.onload = function(){
        if(xhr.status == 200){ //success
            member = JSON.parse(xhr.responseText);
            if(member.MEM_ID){
                $id("header_memName").innerText = member.MEM_NICKNAME
                $id('spanLogin').innerHTML = '登出';     
            }else{
                alert("尚未登入");
                location.replace("./shansen.html");
            }
        }else{ //error
            alert(xhr.status);
        }
    }
    xhr.open("get", "php/common/getMemberInfo.php", true);
    xhr.send(null);
}
function init(){
    //檢查是否已登入
    getMemberInfo();
    //登出事件
    $id('spanLogin').onclick = loginOut;
};
window.addEventListener('load',init,false);
