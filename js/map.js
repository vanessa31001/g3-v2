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
        // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [20, 30],
        iconAnchor: [10, 35],
        popupAnchor: [1, -34],
        });
    //N1 確幸莊園
    marker = L.marker([ 24.926455,121.526396], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>確幸莊園</a><br>目前開團:2組");
    //N2 森森親子露營
    marker = L.marker([24.8289596,121.2616928], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>森森親子露營</a><br>目前開團:2組");
    //N3 溪口台露營區
    marker = L.marker([24.8028153,121.3420361], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>溪口台露營區</a><br>目前開團:2組");
    //N4 綠果子休憩站
    marker = L.marker([24.881858,121.299778], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>綠果子休憩站</a><br>目前開團:2組");
    //N5 相思園露營區
    marker = L.marker([24.707975,121.223913], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>相思園露營區</a><br>目前開團:2組");
    //N6 紮營趣露營區
    marker = L.marker([24.4093121,120.904157], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>紮營趣露營區</a><br>目前開團:2組");
    //C1 梅林親水岸露營區
    marker = L.marker([24.153056,120.811028], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>梅林親水岸露營區</a><br>目前開團:2組");
    //C2 樹不老露營區
    marker = L.marker([24.0738248,120.9795118], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>樹不老露營區</a><br>目前開團:2組");
    //C3 逸境生態露營區
    marker = L.marker([23.7261695,120.6213536], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>逸境生態露營區</a><br>目前開團:2組");
    //C4 晨光露營區
    marker = L.marker([23.4640832,120.7035768], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>晨光露營區</a><br>目前開團:2組");
    //S1 春園休閒農場
    marker = L.marker([23.119833,120.151722], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>春園休閒農場</a><br>目前開團:2組");
    //S2 荖濃有機農場露營區
    marker = L.marker([23.0719824,120.6711424], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>荖濃有機農場露營區</a><br>目前開團:2組");
    //S3 海豚茉莉灣
    marker = L.marker([22.2446846,120.6605232], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>海豚茉莉灣</a><br>目前開團:2組");
    //E1 松蘿園林露營區
    marker = L.marker([24.6542071,121.5615935], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>松蘿園林露營區</a><br>目前開團:2組");
    //E2  Ocean Chill 海憩露營區 
    marker = L.marker([24.1093449,121.626496], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'> Ocean Chill 海憩露營區 </a><br>目前開團:2組");
    //E3  老麥農場露營區
    marker = L.marker([22.874927,121.0958605], {icon: shansenIcon}).addTo(map).bindPopup("<a href=''><img src='./pic/camping/北1-1.jpg'></a><br> <a href='camping2.html'>老麥農場露營區</a><br>目前開團:2組");

    function onlick(){
        $(marker).openPopup();
    }

