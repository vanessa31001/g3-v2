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
//檢舉(按鈕class,檢舉or刪除,留言或是揪團編號)
function report(reportbtn,btnName,numID){
    var url = location.href;
    let date = formatDate(new Date());
    if(member.MEM_ID){//檢舉揪團
        if(reportbtn==="reportbtngGroup"){
            // alert(`${reportbtn},${btnName},${numID}`);
            overlay = document.querySelector(".report_overlay");
            overlay.className += " -on";
            document.querySelector(".report_reason1 label").innerText="此揪團與露營不相關";
            document.querySelector(".report_reason2 label").innerText="此揪團含有色情內容";
            document.querySelector(".report_reason3 label").innerText="此揪團含違法內容"; 
            $id("reportSend").addEventListener("click",function(){
                let reason = document.getElementsByName("reason0").length;
                var REGROUP_RESON="";
                for(let i=1; i<reason+1; i++){
                    if($id(`report_equ${i}`).checked){
                        REGROUP_RESON= i-1;
                    }
                }
                if(REGROUP_RESON!==""){
                    // alert(REGROUP_RESON);
                    // 送出檢舉
                    let repxhr = new XMLHttpRequest();
                    repxhr.onload = function(){
                        if(repxhr.status == 200){ //success
                            let submit_btn=document.querySelector(".report_overlay");
                            // submit_btn.className = " -opacity-zero";
                            setTimeout(function(){
                                submit_btn.className = "report_overlay";
                            }, 1000);
                            for(let i=1; i<reason+1; i++){
                                $id(`report_equ${i}`).checked = false;
                            }
                        }else{
                            alert(repxhr.responseText);
                        }  
                    }
                    repxhr.open("Post", "./php/group/reportGroup.php", true);
                    repxhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                    let data_info = `REGROUP_GROUP_NO=${numID}&REGROUP_MEMNO=${member.MEMNO}&REGROUP_RESON=${REGROUP_RESON}&REGROUP_DATE=${date}`;
                    repxhr.send(data_info);
                }else{
                    alert("請勾選檢舉原因");
                }
                location.reload(); 
            });
        }else{
            var GROUP_NO = url.split('?')[1].split('=');
            if(btnName==="檢舉"){//檢舉留言
                overlay = document.querySelector(".report_overlay");
                overlay.className += " -on";
                document.querySelector(".report_reason1 label").innerText="此留言與露營不相關";
                document.querySelector(".report_reason2 label").innerText="此留言為不當發言";
                document.querySelector(".report_reason3 label").innerText="此留言含污辱文字"; 
                $id("reportSend").addEventListener("click",function rrr(e){

                    let reason = document.getElementsByName("reason0").length;
                    var REGROUP_RESON="";
                    for(let i=1; i<reason+1; i++){
                        if($id(`report_equ${i}`).checked){
                            REGROUP_RESON= i-1;
                            // console.log()
                        }
                    }
                    if(REGROUP_RESON!==""){
                        let repMsgxhr = new XMLHttpRequest();
                        repMsgxhr.onload = function(){
                            if(repMsgxhr.status == 200){ //success
                                // alert(repMsgxhr.responseText);
                                let submit_btn=document.querySelector(".report_overlay");
                                submit_btn.className = " -opacity-zero";
                                setTimeout(function(){
                                    submit_btn.className = "report_overlay";
                                }, 1000);

                                for(let i=1; i<reason+1; i++){
                                    $id(`report_equ${i}`).checked = false;
                                }
                                // location.reload(); 
                                // readPage(GROUP_NO[1]);
                                var url = location.href;
                                if(url.indexOf('?')!=-1){
                                    var GROUP_NO = url.split('?')[1].split('=');
                                    readPage(GROUP_NO[1]);
                        
                                }
                                
                                $id("reportSend").removeEventListener("click",rrr)
                            }else{
                                alert(repMsgxhr.responseText);
                            }  
                        }
                        repMsgxhr.open("Post", "./php/group/reportGroupMsg.php", true);
                        repMsgxhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                        let data_info = `REGROUP_MES_GROUP_NO=${numID}&REGROUP_MES_MEMNO=${member.MEMNO}&REGROUP_RESON=${REGROUP_RESON}&REGROUP_DATE=${date}`;
                        repMsgxhr.send(data_info);
                    }else{
                        alert("請勾選檢舉原因");
                    }
                });
            }else{//刪除
                let delMsgxhr = new XMLHttpRequest();
                delMsgxhr.onload = function(){
                    if(delMsgxhr.status == 200){ //success 
                        // readPage(GROUP_NO[1]);
                        location.reload(); 
                    }else{
                        alert(delMsgxhr.responseText);
                    }  
                }
                delMsgxhr.open("Post", "./php/group/delectMsg.php", true);
                delMsgxhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                let data_info = `GROUP_MES_NO=${numID}`;
                delMsgxhr.send(data_info);
            }
        }
    }else{
        showLoginForm();
    }
}