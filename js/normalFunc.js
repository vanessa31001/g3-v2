function $create(tag){
    return  document.createElement(tag);
}
function $append(father,child){
    return  father.appendChild(child);
}
function formatDate(date) {  
    var y = date.getFullYear();  
    var m = date.getMonth() + 1;  
    m = m < 10 ? ('0' + m) : m;  
    var d = date.getDate();  
    d = d < 10 ? ('0' + d) : d;  
    var h = date.getHours();  
    var minute = date.getMinutes();  
    minute = minute < 10 ? ('0' + minute) : minute;
    var s =  date.getSeconds();
    return y + '-' + m + '-' + d+' '+h+':'+minute+':'+s;  
}; 
//開團
function startNewGroup(){
    if(member.MEM_ID){
        window.location.href='./groupNewStart.html';
    }else{
        showLoginForm();
    }
}
function report(reportbtn){
    if(member.MEM_ID){
        overlay = document.querySelector(".report_overlay");
        overlay.className += " -on";
        if(reportbtn=="reportbtngGroup"){
            document.querySelector(".report_reason1 label").innerText="此揪團與露營不相關";
            document.querySelector(".report_reason2 label").innerText="此揪團含有色情內容";
            document.querySelector(".report_reason3 label").innerText="此揪團含違法內容"; 
        }else{
            document.querySelector(".report_reason1 label").innerText="此揪團與露營不相關";
            document.querySelector(".report_reason2 label").innerText="此揪團含有色情內容";
            document.querySelector(".report_reason3 label").innerText="此揪團含違法內容"; 
        }
    }else{
        showLoginForm();
    }
}