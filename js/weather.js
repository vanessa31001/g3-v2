//氣象API

    //新北市新店區
    let N1data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-071?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&format=JSON&locationName=%E6%96%B0%E5%BA%97%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (N1){
                    RenderWeather(N1);
                    N1data = N1
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //桃園市大溪區
    let N2N4data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-007?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&format=JSON&locationName=%E5%A4%A7%E6%BA%AA%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (N2N4){
                    RenderWeather(N2N4);
                    N2N4data = N2N4
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //桃園市復興區
    let N3data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-007?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%BE%A9%E8%88%88%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (N3){
                    RenderWeather(N3);
                    N3data = N3
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //新竹縣尖石鄉
    let N5data;
    $(function(){
        $.ajax({  
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-011?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%B0%96%E7%9F%B3%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (N5){
                    RenderWeather(N5);
                    N5data = N5
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //苗栗縣大湖鄉
    let N6data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-015?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%A4%A7%E6%B9%96%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (N6){
                    RenderWeather(N6);
                    N6data = N6
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //台中市新社區
    let C1data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-075?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E6%96%B0%E7%A4%BE%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (C1){
                    RenderWeather(C1);
                    C1data = C1
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //南投縣仁愛鄉
    let C2data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-023?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E4%BB%81%E6%84%9B%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (C2){
                    RenderWeather(C2);
                    C2data = C2
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //雲林縣林內鄉
    let C3data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-027?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E6%9E%97%E5%85%A7%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (C3){
                    RenderWeather(C3);
                    C3data = C3
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //嘉義縣阿里山鄉
    let C4data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-031?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E9%98%BF%E9%87%8C%E5%B1%B1%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (C4){
                    RenderWeather(C4);
                    C4data = C4
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //台南市七股區
    let S1data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-079?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E4%B8%83%E8%82%A1%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (S1){
                    RenderWeather(S1);
                    S1data = S1
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //高雄市六龜區
    let S2data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-067?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%85%AD%E9%BE%9C%E5%8D%80&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (S2){
                    RenderWeather(S2);
                    S2data = S2
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //屏東縣枋山鄉
    let S3data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-035?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E6%9E%8B%E5%B1%B1%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (S3){
                    RenderWeather(S3);
                    S3data = S3
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //宜蘭縣大同鄉
    let E1data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-003?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%A4%A7%E5%90%8C%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (E1){
                    RenderWeather(E1);
                    E1data = E1
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //花蓮縣新城鄉
    let E2data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-043?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E6%96%B0%E5%9F%8E%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (E2){
                    RenderWeather(E2);
                    E2data = E2
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    //台東縣卑南鄉
    let E3data;
    $(function(){
        $.ajax({
            url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-039?Authorization=CWB-FA772AA0-8D0C-4FEF-B569-7DE1EEF2453D&locationName=%E5%8D%91%E5%8D%97%E9%84%89&elementName=MinT,MaxT,Wind,Td,PoP12h,T,RH,Wx,WeatherDescription',
            type: 'GET',
            dataType: 'json',
            success: function (E3){
                    RenderWeather(E3);
                    E3data = E3
                },
                error: function (){
                    // alert('NO~');
                },
        });
    });

    
    let AreaDataArray = ["N1data", "N2N4data", "N3data", "N5data", "N6data", "C1data", "C2data", "C3data", "C4data", "S1data", "S2data", "S3data", "E1data", "E2data", "E3data"];
    function RenderWeather(AreaData){
        // console.log(AreaData)


        //現在時間
        let today = new Date();
        var  seperator1 =  "-" ;
        var  seperator2 =  "　" ;
        var  seperator3 =  ":" ;
        var  year = today.getFullYear();
        var  month = today.getMonth() + 1;
        var  strDate = today.getDate();
        var  hours = today.getHours();
        var  minutes = today.getMinutes();
        var  seconds = today.getSeconds();
        if  (month >= 1 && month <= 9) {
            month =  "0"  + month;
        }
        if  (strDate >= 0 && strDate <= 9) {
            strDate =  "0"  + strDate;
        }
        if  (hours >= 0 && hours <= 9) {
            hours =  "0"  + hours;
        }
        if  (minutes >= 0 && minutes <= 9) {
            minutes =  "0"  + minutes;
        }
        if  (seconds >= 0 && seconds <= 9) {
            seconds =  "0"  + seconds;
        }

        var  currentdate = year + seperator1 + month + seperator1 + strDate + seperator2 + hours + seperator3 +minutes + seperator3 + seconds;

        $('#nowTime').text(currentdate);

        //天氣敘述
        $('#temperature').text(AreaData.records.locations[0].location[0].weatherElement[1].time[0].elementValue[0].value+ '°C');
        $('#lowtemp').text(AreaData.records.locations[0].location[0].weatherElement[4].time[0].elementValue[0].value+ '°C');
        $('#hightemp').text(AreaData.records.locations[0].location[0].weatherElement[6].time[0].elementValue[0].value+ '°C');
        $('#rain').text(AreaData.records.locations[0].location[0].weatherElement[0].time[0].elementValue[0].value+ '%');
        $('#humidity').text(AreaData.records.locations[0].location[0].weatherElement[2].time[0].elementValue[0].value+ '%');
        $('#explanation').text(AreaData.records.locations[0].location[0].weatherElement[5].time[0].elementValue[0].value);

        //日期
        $('#day1').text(AreaData.records.locations[0].location[0].weatherElement[0].time[0].startTime.slice(8,10));
        $('#day2').text(AreaData.records.locations[0].location[0].weatherElement[0].time[2].startTime.slice(8,10));
        $('#day3').text(AreaData.records.locations[0].location[0].weatherElement[0].time[4].startTime.slice(8,10));
        $('#day4').text(AreaData.records.locations[0].location[0].weatherElement[0].time[6].startTime.slice(8,10));
        $('#day5').text(AreaData.records.locations[0].location[0].weatherElement[0].time[8].startTime.slice(8,10));
        $('#day6').text(AreaData.records.locations[0].location[0].weatherElement[0].time[10].startTime.slice(8,10));
        $('#day7').text(AreaData.records.locations[0].location[0].weatherElement[0].time[12].startTime.slice(8,10));

        //最高溫
        $('#htday1').text(AreaData.records.locations[0].location[0].weatherElement[6].time[1].elementValue[0].value+ '°C');
        $('#htday2').text(AreaData.records.locations[0].location[0].weatherElement[6].time[3].elementValue[0].value+ '°C');
        $('#htday3').text(AreaData.records.locations[0].location[0].weatherElement[6].time[5].elementValue[0].value+ '°C');
        $('#htday4').text(AreaData.records.locations[0].location[0].weatherElement[6].time[7].elementValue[0].value+ '°C');
        $('#htday5').text(AreaData.records.locations[0].location[0].weatherElement[6].time[9].elementValue[0].value+ '°C');
        $('#htday6').text(AreaData.records.locations[0].location[0].weatherElement[6].time[11].elementValue[0].value+ '°C');
        $('#htday7').text(AreaData.records.locations[0].location[0].weatherElement[6].time[13].elementValue[0].value+ '°C');

        //最低溫
        $('#ltday1').text(AreaData.records.locations[0].location[0].weatherElement[4].time[0].elementValue[0].value+ '°C');
        $('#ltday2').text(AreaData.records.locations[0].location[0].weatherElement[4].time[2].elementValue[0].value+ '°C');
        $('#ltday3').text(AreaData.records.locations[0].location[0].weatherElement[4].time[4].elementValue[0].value+ '°C');
        $('#ltday4').text(AreaData.records.locations[0].location[0].weatherElement[4].time[6].elementValue[0].value+ '°C');
        $('#ltday5').text(AreaData.records.locations[0].location[0].weatherElement[4].time[8].elementValue[0].value+ '°C');
        $('#ltday6').text(AreaData.records.locations[0].location[0].weatherElement[4].time[10].elementValue[0].value+ '°C');
        $('#ltday7').text(AreaData.records.locations[0].location[0].weatherElement[4].time[12].elementValue[0].value+ '°C');

    }


//下拉式選單 & switch

    function doFirst(){
    ('onload',loadMaster( document.getElementById('area'),document.getElementById('campSpot') ));
    }
    
        var area = new Array();          
        area[0] = '北部';
        area[1] = '中部';
        area[2] = '南部';
        area[3] = '東部';
    
        var campSpot = new Array();
        campSpot[0] = new Array();    
        campSpot[0][0] = '確幸莊園';       //N1
        campSpot[0][1] = '森森親子露營';   //N2
        campSpot[0][2] = '溪口台露營區';   //N3
        campSpot[0][3] = '綠果子休憩站';   //N4
        campSpot[0][4] = '相思園露營區';   //N5
        campSpot[0][5] = '紮營趣露營區';   //N6
    
        campSpot[1] = new Array();    
        campSpot[1][0] = '梅林親水岸露營區';  //C1
        campSpot[1][1] = '樹不老露營區';      //C2
        campSpot[1][2] = '逸境生態露營區';    //C3
        campSpot[1][3] = '倉伯露營區';        //C4
        
        campSpot[2] = new Array();    
        campSpot[2][0] = '春園休閒農場';          //S1
        campSpot[2][1] = '荖濃有機農場露營區';     //S2
        campSpot[2][2] = '海豚茉莉灣';            //S3
        
        campSpot[3] = new Array(); 
        campSpot[3][0] = '松蘿園林露營區';          //E1
        campSpot[3][1] = 'Ocean Chill 海憩露營區'; //E2
        campSpot[3][2] = '老麥農場露營區';          //E3
    
        // 載入 master 選單，同時初始化 detail 選單內容
        function loadMaster( master, detail ) {
    
        master.options.length = area.length;
        for( i = 0; i < area.length; i++ ) {
        master.options[ i ] = new Option( area[i], area[i] );  // Option( text , value );
        }
        master.selectedIndex = 0;
        doNewMaster( master, detail );
    }
    
        // 當 master 選單異動時，變更 detail 選單內容
        function doNewMaster( master, detail ) {
        
        detail.options.length = campSpot[ master.selectedIndex ].length;
        for( i = 0; i < campSpot[ master.selectedIndex ].length; i++ ) {
        detail.options[ i ] = new Option( campSpot[ master.selectedIndex ][ i ],
        campSpot[ master.selectedIndex ][ i ] );
        }
    }


    
        $("#area").change(function(){
            //alert($("#campSpot").val()); //抓到option的值(中文)
            switch($("#campSpot").val()){
            case '確幸莊園':
                RenderWeather(N1data);
            break;
            case '森森親子露營':
                RenderWeather(N2N4data);
            break;
            case '溪口台露營區':
                RenderWeather(N3data);
            break;
            case '綠果子休憩站':
                RenderWeather(N2N4data);
            break;
            case '相思園露營區':
                RenderWeather(N5data);
            break;
            case '紮營趣露營區':
                RenderWeather(N6data);
            break;
            case '梅林親水岸露營區':
                RenderWeather(C1data);
            break;
            case '樹不老露營區':
                RenderWeather(C2data);
            break;
            case '逸境生態露營區':
                RenderWeather(C3data);
            break;
            case '倉伯露營區':
                RenderWeather(C4data);
            break;
            case '春園休閒農場':
                RenderWeather(S1data);
            break;
            case '荖濃有機農場露營區':
                RenderWeather(S2data);
            break;
            case '海豚茉莉灣':
                RenderWeather(S3data);
            break;
            case '松蘿園林露營區':
                RenderWeather(E1data);
            break;
            case 'Ocean Chill 海憩露營區':
                RenderWeather(E2data);
            break;
            case '老麥農場露營區':
                RenderWeather(E3data);
            break;
            
        };
        });
        $("#campSpot").change(function(){
            //alert($("#campSpot").val()); //抓到option的值(中文)
            switch($("#campSpot").val()){
            case '確幸莊園':
                RenderWeather(N1data);
            break;
            case '森森親子露營':
                RenderWeather(N2N4data);
            break;
            case '溪口台露營區':
                RenderWeather(N3data);
            break;
            case '綠果子休憩站':
                RenderWeather(N2N4data);
            break;
            case '相思園露營區':
                RenderWeather(N5data);
            break;
            case '紮營趣露營區':
                RenderWeather(N6data);
            break;
            case '梅林親水岸露營區':
                RenderWeather(C1data);
            break;
            case '樹不老露營區':
                RenderWeather(C2data);
            break;
            case '逸境生態露營區':
                RenderWeather(C3data);
            break;
            case '倉伯露營區':
                RenderWeather(C4data);
            break;
            case '春園休閒農場':
                RenderWeather(S1data);
            break;
            case '荖濃有機農場露營區':
                RenderWeather(S2data);
            break;
            case '海豚茉莉灣':
                RenderWeather(S3data);
            break;
            case '松蘿園林露營區':
                RenderWeather(E1data);
            break;
            case 'Ocean Chill 海憩露營區':
                RenderWeather(E2data);
            break;
            case '老麥農場露營區':
                RenderWeather(E3data);
            break;
            
        };
        });
    
    

    window.addEventListener('load',doFirst);
