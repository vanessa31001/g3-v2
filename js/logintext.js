let member;
let xhr = new XMLHttpRequest();
// 將登入表單上的資料清空，並將燈箱隱藏起來
function cancelLogin(){
    $id('outerDiv').style.display = 'none';
    $id('LoginMemId').value = '';
    $id('LoginMemPsw').value = '';
    $id('RegiMemId').value = '';
    $id('RegiMemPsw').value = '';
    $id('RegiDCMemPsw').value = '';
    $id('RegiMemName').value = '';
    $id('RegiMemNickname').value = '';
}
//燈箱的RWD
function toRegister(){
    if(document.body.clientWidth < 767){
        // document.getElementById('tableLogin').style.display = 'none';
        // document.getElementById('register').style.display = 'block';
    }
}
//燈箱的RWD
function toLogin(){
    if(document.body.clientWidth < 767){
        // document.getElementById('tableLogin').style.display = 'block';
        // document.getElementById('register').style.display = 'none';
    }
}
function $id(id){
	return document.getElementById(id);
}	
//跳燈箱
function showLoginForm(){
	//檢查登入bar面版上 spanLogin 的字是登入或登出
	//如果是登入，就顯示登入用的燈箱(lightBox)
	//如果是登出
	//將登入bar面版上，登入者資料清空 
	//spanLogin的字改成登入
	//將頁面上的使用者資料清掉
	if($id('spanLogin').innerHTML == "登入|註冊"){
		$id('outerDiv').style.display = 'flex';

	}else{
		let xhr = new XMLHttpRequest();
		xhr.onload = function(){
			$id('header_memName').innerHTML = '&nbsp;';
			$id('spanLogin').innerHTML = '登入|註冊';
    	}
		xhr.open("get", "php/common/loginOut.php", true);
		xhr.send(null);
	}
}
//送出登入
function sendForm_Login(){
	//=====使用Ajax 回server端,取回登入者姓名, 放到頁面上
	let memId = $id("LoginMemId").value;
	let memPsw = $id("LoginMemPsw").value;
	xhr.onload = function(){
        member = JSON.parse(xhr.responseText);
		if(member.MEM_ID){
            $id('header_memName').innerHTML = member.MEM_NICKNAME;
			$id("spanLogin").innerHTML = '登出';
			//將登入表單上的資料清空，並隱藏起來
			$id('outerDiv').style.display = 'none';
			$id('LoginMemId').value = '';
			$id('LoginMemPsw').value = '';
		}else{
			// if(!member.errorMsg){
			//   alert("系統錯誤",member.errorMsg);
			// }拿來接收後端傳的
			window.alert("帳密錯誤");
		}
    }
    xhr.open("post", "php/common/loginIn.php", true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    let data_info = `MEM_ID=${memId}&MEM_PSW=${memPsw}`;
    xhr.send(data_info);
}
//送出註冊
function sendForm_Regi(){
    if($id('RegiMemPsw').value === $id('RegiDCMemPsw').value){
        let memid = $id('RegiMemId').value;
        let mempsw = $id('RegiMemPsw').value;
        let memname = $id('RegiMemName').value;
        let memnick = $id('RegiMemNickname').value;
        xhr.onload = function(){
            member = JSON.parse(xhr.responseText);
            if(member.MEM_ID){
              $id("header_memName").innerText = member.MEM_NICKNAME;
              $id('spanLogin').innerHTML = '登出';
              //將登入表單上的資料清空，並隱藏起來
              $id('outerDiv').style.display = 'none';
              $id('RegiMemId').value = '';
              $id('RegiMemPsw').value = '';
              $id('RegiDCMemPsw').value = '';
              $id('RegiMemName').value = '';
              $id('RegiMemNickname').value = '';
            }else{
                window.alert("此帳號已被使用");
            }
          }
    
          xhr.open("Post", "php/common/registered.php", true);
          xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
          let data_info = `MEM_ID=${memid}&MEM_PSW=${mempsw}&MEM_NAME=${memname}&MEM_NICKNAME=${memnick}`;
          xhr.send(data_info); 

    }else{
        alert('密碼需一致，請再確認');
    }
}
//忘記密碼
// function forgetPassword(){
//     // alert();
// }
//抓是否已登入OK
function getMemberInfo(){
    xhr.onload = function(){
        if(xhr.status == 200){ //success
            member = JSON.parse(xhr.responseText);
            if(member.MEM_ID){
                $id("header_memName").innerText = member.MEM_NICKNAME
                $id('spanLogin').innerHTML = '登出';          
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

    //登入btn事件處理程序
    $id('btnLogin').onclick = sendForm_Login;
    //註冊btn事件處理
    $id('btnRegi').onclick = sendForm_Regi;
    $id('spanLogin').onclick = showLoginForm;

    //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
    $id('btnLoginCancel').onclick = cancelLogin;
    $id('btnRegiCancel').onclick = cancelLogin;

    // // 手機大小變更註冊與登入頁面
    $id('to_register_btn').onclick = toRegister;
    $id('to_login_btn').onclick = toLogin;

    // $id('forgetPsw').onclick = forgetPassword;
};

window.addEventListener('load',init,false);