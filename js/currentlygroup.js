
    //團
    let groupxhr = new XMLHttpRequest();
    groupxhr.onload = function(){
        if(groupxhr.status == 200){ //success
            showgroups(groupxhr.responseText);
        }else{ //error
            alert(groupxhr.status);
        }
    }
    groupxhr.open("get", "./php/group/groupindex.php", true);
    groupxhr.send(null);
    function showgroups(jason){
        groupDatas = JSON.parse(jason);
        let grouparrleng=0;
        if(groupDatas.length > 4){
            grouparrleng=4;
        }
        else{
            grouparrleng=groupDatas.length;
        }   
        let gMainGroups = document.getElementById(`gMainGroups`);
        console.log(gMainGroups);
        
        for(let i =0; i< grouparrleng ; i++){
            let linkGroup =  document.createElement("a");
            linkGroup.href = `./groupInfo.html?GROUP_NO=${groupDatas[i].GROUP_NO}`;
            gMainGroups.appendChild(linkGroup);
            let gMainGroup =  document.createElement("div");
            gMainGroup.className = "gMainGroup";
            linkGroup.appendChild(gMainGroup);
            let pic =  document.createElement("div");
            pic.className = "img";
            gMainGroup.appendChild(pic);
            let img =  document.createElement("img");
            img.src="./pic/group/"+groupDatas[i].GROUP_PIC1;
            pic.appendChild(img);
            let gMainGroupInfo =  document.createElement("div");
            gMainGroupInfo.className = "gMainGroupInfo";
            gMainGroup.appendChild(gMainGroupInfo);
            let gMainName =  document.createElement("div");
            gMainName.className = "gMainName level2 green1";
            gMainName.innerText = groupDatas[i].GROUP_NAME;
            gMainGroupInfo.appendChild(gMainName);
            let gMaindate =  document.createElement("div");
            gMaindate.className = "level1 orange1";
            gMaindate.innerText = "開團日期:" + groupDatas[i].GROUP_START_DATE;
            gMainGroupInfo.appendChild(gMaindate);

        } 
    }
