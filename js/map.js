//map

    var map;

    map =L.map('map', {
            center: [24.707975,121.223913], // 中心點座標
            zoom: 9, // 0 - 18
            attributionControl: true, // 是否秀出「leaflet」的貢獻標記
            zoomControl: false , // 是否秀出 - + 按鈕
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);


    //建立地標
    let shansenIcon = new L.Icon({
        iconUrl: 'pic/camping/mapmarker.svg',
        iconSize: [20, 30],
        iconAnchor: [10, 35],
        popupAnchor: [1, -34],
        });
    //N1 確幸莊園
    marker = L.marker([ 24.926455,121.526396], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='1'><img data='1' src='./pic/camping/camping_spot_img/camping_1_1.jpg'>確幸莊園</div>");
    //N2 森森親子露營
    marker = L.marker([24.8289596,121.2616928], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='2'><img data='2' src='./pic/camping/camping_spot_img/camping_2_1.jpg'>森森親子露營</div>");
    //N3 溪口台露營區
    marker = L.marker([24.8028153,121.3420361], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='3'><img data='3' src='./pic/camping/camping_spot_img/camping_3_1.jpg'>溪口台露營區</div>");
    //N4 綠果子休憩站
    marker = L.marker([24.881858,121.299778], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='4'><img data='4' src='./pic/camping/camping_spot_img/camping_4_1.jpg'>綠果子休憩站</div>");
    //N5 相思園露營區
    marker = L.marker([24.707975,121.223913], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='5'><img data='5' src='./pic/camping/camping_spot_img/camping_5_1.jpg'>相思園露營區</div>");
    //N6 紮營趣露營區
    marker = L.marker([24.4093121,120.904157], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='6'><img data='6' src='./pic/camping/camping_spot_img/camping_6_1.jpg'>紮營趣露營區</div>");
    //C1 梅林親水岸露營區
    marker = L.marker([24.153056,120.811028], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='7'><img data='7' src='./pic/camping/camping_spot_img/camping_7_1.jpg'>梅林親水岸露營區</div>");
    //C2 樹不老露營區
    marker = L.marker([24.0738248,120.9795118], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='8'><img data='8' src='./pic/camping/camping_spot_img/camping_8_1.jpg'>樹不老露營區</div>");
    //C3 逸境生態露營區
    marker = L.marker([23.7261695,120.6213536], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='9'><img data='9' src='./pic/camping/camping_spot_img/camping_9_1.jpg'>逸境生態露營區</div>");
    //C4 晨光露營區
    marker = L.marker([23.4640832,120.7035768], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='10'><img data='10' src='./pic/camping/camping_spot_img/camping_10_1.jpg'>晨光露營區</div>");
    //S1 春園休閒農場
    marker = L.marker([23.119833,120.151722], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='11'><img data='11' src='./pic/camping/camping_spot_img/camping_11_1.jpg'>春園休閒農場</div>");
    //S2 荖濃有機農場露營區
    marker = L.marker([23.0719824,120.6711424], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='12'><img data='12' src='./pic/camping/camping_spot_img/camping_12_1.jpg'>荖濃有機農場露營區</div>");
    //S3 海豚茉莉灣
    marker = L.marker([22.2446846,120.6605232], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='13'><img data='13' src='./pic/camping/camping_spot_img/camping_13_1.jpg'>海豚茉莉灣</div>");
    //E1 松蘿園林露營區
    marker = L.marker([24.6542071,121.5615935], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='14'><img data='14' src='./pic/camping/camping_spot_img/camping_14_1.jpg'>松蘿園林露營區</div>");
    //E2  Ocean Chill 海憩露營區 
    marker = L.marker([24.1093449,121.626496], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='15'><img data='15' src='./pic/camping/camping_spot_img/camping_15_1.jpg'> Ocean Chill 海憩露營區 </div>");
    //E3  老麥農場露營區
    marker = L.marker([22.874927,121.0958605], {icon: shansenIcon}).addTo(map).bindPopup("<div class='spot' data='16'><img data='16' src='./pic/camping/camping_spot_img/camping_16_1.jpg'>老麥農場露營區</div>");


    function onlick(){
        $(marker).openPopup(); 

    }
    map.on("popupopen", function(e1){
        document.querySelectorAll('.spot').forEach(element=>element.addEventListener('click',function(e2){
            let where = e2.target.getAttribute('data');
            location.href=`http://localhost/g3-v2/camping2.html?${where}`;
        }))
    });
    



    // let stoplist = document.querySelectorAll('.spot');
    // for (let i = 0 ;i< stoplist.length;i++){
    //     stoplist[i].addEventListener('click',function(e){
    //         let where = e.target.getAttribute('data');
    //         location.href=`http://localhost/g3-v2/camping2.html?${where}`;
    //     })
    // }

