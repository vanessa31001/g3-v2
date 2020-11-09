-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020-11-05 08:08:46
-- 伺服器版本： 8.0.22
-- PHP 版本： 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫： `ed103_g3`
--
CREATE DATABASE IF NOT EXISTS `ed103_g3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ed103_g3`;

-- --------------------------------------------------------

--
-- 資料表結構 `applychange`
--

CREATE TABLE `applychange` (
  `APCH_NO` int NOT NULL,
  `APCH_MEMNO` int NOT NULL,
  `APCH_WANT_EQNO` int NOT NULL,
  `APCH_BR_EQNO` int NOT NULL,
  `APCH_STATUS` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `applychange`
--

INSERT INTO `applychange` (`APCH_NO`, `APCH_MEMNO`, `APCH_WANT_EQNO`, `APCH_BR_EQNO`, `APCH_STATUS`) VALUES
(1, 2, 6, 2, 0),
(2, 3, 1, 10, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `campcolloection`
--

CREATE TABLE `campcolloection` (
  `CAMPCO_NO` int NOT NULL,
  `CAMPCO_MEMNO` int NOT NULL,
  `CAMPCO_CAMNO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `campcolloection`
--

INSERT INTO `campcolloection` (`CAMPCO_NO`, `CAMPCO_MEMNO`, `CAMPCO_CAMNO`) VALUES
(1, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `camping`
--

CREATE TABLE `camping` (
  `CAM_NO` int NOT NULL,
  `CAM_NAME` varchar(20) DEFAULT NULL,
  `CAM_INTRODUCTION` text,
  `CAM_PIC1` varchar(30) DEFAULT NULL,
  `CAM_PIC2` varchar(30) DEFAULT NULL,
  `CAM_PIC3` varchar(30) DEFAULT NULL,
  `CAM_PIC4` varchar(30) DEFAULT NULL,
  `CAM_STATUS` tinyint(1) NOT NULL DEFAULT '1',
  `CAM_AREA` varchar(20) DEFAULT NULL,
  `CAM_COUNTY` varchar(20) DEFAULT NULL,
  `CAM_COORDINATE` varchar(50) NOT NULL,
  `CAM_ALTITUDE` varchar(30) DEFAULT NULL,
  `CAM_BATHROOM` varchar(50) DEFAULT NULL,
  `CAM_PET` tinyint(1) DEFAULT NULL,
  `CAM_FACILITY` varchar(100) DEFAULT NULL,
  `CAM_PRECAUTIONS` text,
  `CAM_ADDRESS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `camping`
--

INSERT INTO `camping` (`CAM_NO`, `CAM_NAME`, `CAM_INTRODUCTION`, `CAM_PIC1`, `CAM_PIC2`, `CAM_PIC3`, `CAM_PIC4`, `CAM_STATUS`, `CAM_AREA`, `CAM_COUNTY`, `CAM_COORDINATE`, `CAM_ALTITUDE`, `CAM_BATHROOM`, `CAM_PET`, `CAM_FACILITY`, `CAM_PRECAUTIONS`, `CAM_ADDRESS`) VALUES
(1, '確幸莊園', '位於新北市新店區的「確幸莊園」，為台北市近郊的露營區，前身為婚紗拍攝地，車程近、營區寬敞、景色優質，非常適合愛拍照又愛戶外露營的露友喔！', 'camping_1_1', 'camping_1_2', 'camping_1_3', 'camping_1_4', 1, '北部', '新北市', '24.926455,121.526396', '300m以下', '集中浴廁', 2, '生態池、冷凍、冷藏、吹風機、鞦韆', '※ 每營位限搭1睡帳、1客廳帳、1停車位，加車費(機車50元/台、汽車過夜200元/台、不過夜100元/台)，若搭小帳人數不得超過4人及使用範圍。\r\n※ 每營位限4人入住，第5人起，酌收人頭費250元/大人、100公分以下100元/小孩(上限6人)。\r\n※ 露營訪客不過夜酌收人頭費150元/大人、100公分以下100元/小孩，為保有露友休息品質，請配合於21:00離場。\r\n※ 遊園訪客酌收人頭費150元/大人、100公分以下100元/小孩，車費(機車50元/台、汽車過夜100元/台)，入園時間：09:00-17:00離場。\r\n※ 生態池禁止釣魚，可自備魚飼料、土司及餅乾享受餵魚的樂趣。', '新北市新店區新潭路二段27號'),
(2, '森森親子露營', '位於桃園溪洲公園四面環山的天然峽谷內，親近自然生態陶醉大自然舒壓。週邊生態豐富，親近可愛小動物 賞螢賞蝶花季繽紛，臨近活魚料理餐廳、泡湯景點，溪洲螢火蟲濕地保護區10分鐘，石門水庫1分鐘、離六福村、小人國、慈湖、拉拉山、小烏來(天空步道) 車程10~30分鐘內。', 'camping_2_1', 'camping_2_2', 'camping_2_3', 'camping_2_4', 1, '北部', '桃園市', '24.8289596,121.2616928', '300m以下', '親子衛浴、集中浴廁、澡盆/水桶/水瓢', 1, '戲水池、玩沙池、生態池、販賣部/販賣機、冷凍、冷藏、飲水機、吹風機、溜滑梯、鞦韆', '※ 每營位限搭1睡帳、1客廳帳、1停車位。\r\n※ 每營位限4人入住，第5人起，酌收人頭費100元/人(入住上限6人，3歲以下免費)。\r\n※ 電源/熱水：24小時供應\r\n※ A區B區在\"A區卸貨\"、C區D區在\"C區卸貨\"有提供手推車。\r\n※ 營區可提供開立收據，可洽營主索取。\r\n※ 平日訂位(星期日-星期四)不提供租賃裝備的服務。\r\n※ 包區如需加帳，需洽營主取得同意哦 ~', '桃園市大溪區福山一路118-1號'),
(3, '溪口台露營區', '位於桃園復興鄉，面有角板山山景 近小烏來天空步道、角板山行館、大溪老茶場、石門水庫，都可在車程約1小時內到達，園內有露天咖啡廳、畫板、氣墊城堡、沙坑、戲水池、泰雅獵人射箭、蚊子電影院、部落導覽~ 讓孩子們一整天玩不完~露營裝備租借~輕露營模式啟動中！', 'camping_3_1', 'camping_3_2', 'camping_3_3', 'camping_3_4', 1, '北部', '桃園市', '24.8028153,121.3420361', '301-500m', '分區浴廁、澡盆/水桶/水瓢、洗澡椅、附廁紙', 1, '戲水池、玩沙池、射箭、販賣部/販賣機、護草墊、冷凍、冷藏、飲水機、吹風機、球類遊具、氣墊遊具、塗鴨板', '※ 每營位限1睡帳、1客廳帳、1停車位\r\n※ 每營位限4人，第5人起酌收人頭費100元/人(上限為6人，6歲含以下免費)。\r\n※ 為維護露友休息品質，23：00後請不要使用吹風機及脫水機，敬請配合。\r\n※ 各區水電配置：約1-2帳共用1個，延長線請備10米以上\r\n※ C區可車停營位旁，可接車露。\r\n※ 30人以上團體可預約”原住民風味餐”，請於二週前洽營主預約喔。\r\n※ 每年的5月中旬起進入”拉拉山水蜜桃季節”，產自營主夫人娘家的水蜜桃園，產季期間每週末於營區內限量販售，新鮮別錯過囉!', '桃園市復興區羅馬路二段268號'),
(4, '綠果子休憩站', '交通便利的近郊園區、小朋友玩耍的天堂，綠油油的草皮區、輕露營首選，沙坑、戲水、溜滑梯等各種溜小孩的設施，應有盡有！', 'camping_4_1', 'camping_4_2', 'camping_4_3', 'camping_4_4', 1, '北部', '桃園市', '24.881858,121.299778', '300m以下', '分區浴廁', 1, '戲水池、玩沙池、生態池、販賣部/販賣機、餐點/咖啡、護草墊、冷凍、冷藏、飲水機、吹風機、溜滑梯、氣墊遊具', '※ 每營位限1睡帳、1客廳帳、1停車位，多一台車加收200元。\r\n※ 露宿車內，營位費用以每帳計算。\r\n※ 每營位限4人入住，第5人起，酌收人頭費200元/人(入住上限6人，幼兒園以下免費)。\r\n※ 訪客費用每人:100元+每車:100元，入場收費(不可抵消費)(訪客須於22:00前離場)。\r\n※ 餐廳供餐時間11:00~19:00(須提前預約)', '桃園市大溪區福山一路118-1號'),
(5, '相思園露營區', '園內步道景觀(櫻花/桃花/梨花/繡球花/野薑花,…)、相思園奇石、尖石山(海拔1124m, 國際航道三角點)、溪谷河流(油羅溪/那羅溪)、百萬雲海、眺望台灣海峽及北台灣風景(台北101,需晴空萬里無雲時)、北台灣夜景、星空月亮美景、5公里螢火蟲(每年5月)、北台灣最美夕陽…', 'camping_5_1', 'camping_5_2', 'camping_5_3', 'camping_5_4', 1, '北部', '新竹縣', '24.707975,121.223913 ', '1001-1500m', '集中浴廁、沐浴髮品、附廁紙', 1, '戲水池、玩沙池、裝備出租、護草墊、冷藏、吹風機、划船/划舟、球類遊具', '※ 每營位限4人, 1睡帳/1客廳/1免費停車位， 第5人起加收一人200元，多一車加收一車200元。\r\n(車位額外提供, 每帳入住上限6人, 客廳的部分不可改為內掛式睡帳私收訪客過夜)。\r\n※ 可接露營車一帳1000元/天 (車不可停在草皮上, 僅限停於停車區)。\r\n※ 附屬設施： 販賣部, 帳篷出租, 護草墊, 家用雙層冰箱, 衛生紙, 沐浴乳, 洗髮乳, 吹風機, 沙坑, 足球, 棒球, 九宮格。\r\n※ 營區有販售飲料，啤酒，礦泉水，泡麵，瓦斯罐，歡迎露友多加利用\r\n※ 水泥平台區，限三帳以上訂位(每帳5Mx7M)，最多可增加到4帳(5Mx5M)，如需增加請洽客服。\r\n※ 水泥地因無法下釘，一旁備有空心磚及欄杆可以綁營繩。', '新竹縣尖石鄉錦屏村2鄰比麟96號'),
(6, '紮營趣露營區', '海拔約500m 生態豐富 交通便利 讓露營成為一種生活樂趣~園內一草一木都是由營主親手打造，只為讓露友們有個舒適的環境。', 'camping_6_1', 'camping_6_2', 'camping_6_3', 'camping_6_4', 1, '北部', '苗栗縣', '24.4093121,120.904157', '301-500m', '親子衛浴、分區浴廁、澡盆/水桶/水瓢、洗澡椅、沐浴髮品、附廁紙', 2, '戲水池、玩沙池、生態池、裝備出租、護草墊、冷凍、冷藏、飲水機、吹風機、溜滑梯、季節賞花、彈跳床', '※ 每營位限1睡帳、1客廳帳、1停車位，加一車位多加200元。\r\n※ 每營位限4人入住，第5人起，酌收人頭費100元/人(入住上限6人，幼兒園以下免費)。\r\n※ 當日如有訪客(暫不需收費)，請事先告知，訪客車子請停放於營區外，並請於晚上10點前離場。\r\n※ 營帳為神殿、熊帳、怪獸帳、變形金剛、大型天幕者請訂2個營位。\r\n※ 此營區可接露營拖車&露營車&車頂帳。(需停共用停車場/無電箱及水槽/費用以每帳計算)可接受請洽露營樂客服或營主。\r\n※ 露宿車內，營位費用以每帳計算。\r\n※ 服務處旁空地設有冰箱供露友冷藏或冷凍食物，營地不負保管責任唷。\r\n※ 營區提供全區WIFI，D區收訊較不穩。\r\n※ 預約親子DIY：熱縮片DIY (如有需要預約，請提前洽營主確認當週是否開放活動)。', '苗栗縣大湖鄉大南村大南勢34-1號'),
(7, '梅林親水岸露營區', '位於台中新社，沐浴梅花林中，體驗豐富生態，溪流旁露營區，還有超豪華戲水SPA池，夏日清涼消暑首推。有住宿、餐廳、多元營位類型，適合三代同堂、親子家庭。', 'camping_7_1', 'camping_7_2', 'camping_7_3', 'camping_7_4', 1, '中部', '台中市', '24.153056,120.811028', '301-500m', '分區浴廁', 1, '戲水池、玩沙池、生態池、餐點/咖啡、冷凍、冷藏、溜滑梯、鞦韆', '※ 每營位限1睡帳1客廳帳1車。\r\n※ 營帳為神殿、熊帳、怪獸帳、變形金剛、5 X 8大天幕者，需提前告知，請訂2個營位。\r\n※ E區草地其中4帳，可接露營拖車&露營車&車頂帳，營位費用以每帳計算(請備註於訂單中)。\r\n※ 每營位限4人入住，第5人起，酌收人頭費100元/人(入住上限6人，3歲以下免費)。\r\n※ 四人房每限4人入住，第5人起，酌收人頭費600元/人(附早餐&床，入住上限6人，3歲以下免費)。\r\n※ 梅園親子日式4人套房&梅園親子彩繪4人套房此兩種房型無法加床。\r\n※ 住宿房間之露友請至SPA水池旁公共炊事空間烹煮，有提供桌椅可使用(其它請自備)(烤肉須事前先告知已利安排空間)。\r\n※ 住宿房間之露友有事先預約烤肉場地每人酌收清潔費50元。', '台中市新社區南華街28-1號'),
(8, '樹不老露營區', '位於南投仁愛鄉，坐擁得天獨厚美景，眼前連綿的山群只要雨勢一大，一道道瀑布就會在山谷間傾瀉而下，寧靜山村日出晨曦太美麗，天鵝戲水向山看雲太惬意。', 'camping_8_1', 'camping_8_2', 'camping_8_3', 'camping_8_4', 1, '中部', '南投縣', '24.0738248,120.9795118', '501-800m', '親子衛浴、集中浴廁、澡盆/水桶/水瓢、洗澡椅、附廁紙、男女浴廁分開', 1, '戲水池、玩沙池、開心農場、冷凍、冷藏、飲水機、吹風機、脫水機、季節賞花、球類遊具', '※ 每營位限搭1睡帳、1客廳帳、1停車位，多一台車加收500元。\r\n※ 露宿車內，營位費用以每帳計算。\r\n※ 每營位限5人入住，第6人起，酌收人頭費300元/人(入住上限6人，幼兒園以下免費)。', '南投縣仁愛鄉新生村山林巷46-2號'),
(9, '逸境生態露營區', '營區位於湖本村，每年夏季八色鳥前來棲息，環境生態豐富。擁有開放式柔軟大草坪，並設有雨棚區，是新露友最佳首選。逸境生態露營區提供遊戲沙坑、釣魚體驗、享受悠閒的好時光。', 'camping_9_1', 'camping_9_2', 'camping_9_3', 'camping_9_4', 1, '中部', '雲林縣', '23.7261695,120.6213536', '300m以下', '分區浴廁、沐浴髮品、附廁紙', 1, '釣魚池、戲水池、玩沙池、販賣部/販賣機、冷凍、冷藏、飲水機、吹風機', '※ 每帳基本入住4人，第5人起，一人加收200元(每帳入住上限6人，3歲以下孩童免收人頭費)\r\n※ 訪客：酌收清潔費$100/人（不可過夜，需要在晚上10點前離開）。\r\n※ 不開放「遊客/一日遊」。\r\n※ 營區內冰箱、飲水機、衛生紙、吹風機、衛浴附有洗髮沐浴乳用品\r\n※ 此營區不接露營拖車&露營車&車頂帳\r\n※ 營區使用山泉水\r\n※ 下訂球型帳&雙人房的無法攜帶寵物)\r\n※ 露營客釣魚(純娛魚是不收費/魚種:台灣鯛)；若釣起的魚要食用-每1尾-100元', '雲林縣林內鄉自強路1巷23號'),
(10, '晨光露營區', '阿里山旅遊基地，15分鐘到奮起湖老街，45分鐘到阿里山風景區。設有六帳南非狩獵帳，提供人來就好的豪華露營新選擇。適合首露族、三代同堂、閨蜜聚會與同學會的最佳選擇。', 'camping_10_1', 'camping_10_2', 'camping_10_3', 'camping_10_4', 1, '中部', '嘉義縣', '23.4640832,120.7035768', '1001-1500m', '集中浴廁、男女浴廁分開', 2, '開心農場、冷凍、冷藏、飲水機、季節賞花', '※提醒需「自備」項目：瓦斯罐、食材、炊煮用具、餐具、盥洗用品、延長線...等等。\r\n※ 每帳含１停車位，限4人入住，第5人起需加收清潔費，每人300元(不附寢具備品)。每帳上限6人(12歲以下計人不計費)。\r\n※ 承上，加人頭請先於網上完成預訂，如無預訂，經現場清點人頭則加收500元。\r\n※ 每帳含1停車位，加車費200元/車(每帳限加一部車) (需另外安排車位)，並備註於訂單中。\r\n', '嘉義縣阿里山鄉樂野村2鄰86號'),
(11, '春園休閒農場', '園區內四季宜人、綠葉茂盛朝氣十足，擁有遼闊景致視野。提供露營區、露營車及烤肉場地，讓露友徜徉在綠油油的草地上，賞景觀星、體驗戶外野營的渡假樂趣。', 'camping_11_1', 'camping_11_2', 'camping_11_3', 'camping_11_4', 1, '南區', '台南市', '23.119833,120.151722', '300m以下', '集中浴廁、澡盆/水桶/水瓢', 1, '戲水池、玩沙池、餐點/咖啡、烤肉區、飲水機、溜滑梯', '※ 每營位限搭1睡帳、1客廳帳、停1台車。\r\n※ 加人頭：每營位限4人入住，第5人起，酌收人頭費200元/人(入住上限6人)。\r\n※ 加服務：營區可接露營拖車&露營車&車頂帳 (每帳須加300元)，請直接線上訂位加購。\r\n※晚上十點園區熄燈\r\n※會館衛浴室提供時間至晚上十二點止\r\n※如需使用控窯或烤肉區，請現場與營主洽詢登記。\r\n', '台南市七股區看坪里46-10號'),
(12, '荖濃有機農場露營區', '四面環山、眼觀山嵐雲霧，呼吸清新空氣，體驗荖濃溪夏日清涼戲水，營區有機農場採蔬果、控土窯，團露大草皮、雨棚營位、兒童遊戲區，適合全家大小一同遊樂。', 'camping_12_1', 'camping_12_2', 'camping_12_3', 'camping_12_4', 1, '南區', '高雄市', '23.0719824,120.6711424', '301-500m', '集中浴廁', 1, '溪邊/水庫釣魚、戲水池、玩沙池、開心農場、冷藏、飲水機、吹風機、脫水機', '※ 人頭費:每一帳以4人為主，每多加一大人多加200元，加一小孩加100元，每帳入帳上限6人/三歲以下幼童免費人頭費。\r\n※ 每帳限搭1帳+1廳+1車，若多1車加收200元。\r\n※ 寵物每隻加收100元清潔費。\r\n※ 若不是露友的訪客入園費為每人250元。若是露友的訪客入園拜訪，每人入園費和清潔費是150元。\r\n※ 園區管理因素，晚上10:00至早上9:00謝絕入園，請露友估計好時間到園時間。\r\n※ 此營區為集中停車/不接露營拖車。\r\n※ 種菜苗活動每人收費50元。\r\n※ 採菜&採果樂費用以時價，秤斤計算。\r\n※ 控土窯:一個窯場地費250元(需先預訂、食物請露友自備)。', '高雄市六龜區荖濃里裕濃路81巷18號'),
(13, '海豚茉莉灣', '位於屏東枋山、海岸公路旁，坐擁海天一線和遠方山景，金黃夕陽、蔚藍海岸、百萬星空夜景，享受南台灣的熱情。露營、烤肉、沙灘海景、露營車專屬園區規劃，渡假露營最有感！', 'camping_13_1', 'camping_13_2', 'camping_13_3', 'camping_13_4', 1, '南區', '屏東縣', '22.2446846,120.6605232', '300m以下', '集中浴廁', 1, '戲水池、裝備出租、冷凍、冷藏、飲水機、吹風機、脫水機', '※ 每營位限1睡帳、1客廳帳、1停車位。\r\n※ 營區可接露營拖車，請訂「車帳營位」，車帳是車子可以停在營位旁邊，還是可以自搭帳棚。\r\n※營區內孩童玩耍，皆需家長自行全程陪同。\r\n※ 山區水源，易遇枯水期，請節約用水。', '屏東縣枋山鄉中山路三段61-1號'),
(14, '松蘿園林露營區', '松蘿園林位於宜蘭縣大同鄉，海拔700公尺，夏天避暑勝地，可俯瞰龜山島，擁有豐富自然生態。保留一大片草皮區，規劃滑草區、沙坑區，讓孩子們盡情敞佯在大自然中。', 'camping_14_1', 'camping_14_2', 'camping_14_3', 'camping_14_4', 1, '東區', '宜蘭縣', '24.6542071,121.5615935', '501-800m', '分區浴廁', 1, '戲水池、玩沙池、滑草區、冷凍、冷藏、吹風機', '※ 每營位限搭1睡帳、1客廳帳、1停車位(加車每台200元，因空間有限，按營主安排)。\r\n※ 每營位限4人，第5人起，加收人頭費200元/人(上限6人，3歲以下免費)。\r\n※ 戲水池開放中 (預計10月份過後，天氣涼則不開放)。\r\n※ 特約露營社團憑車貼折100元 (春節期間無法使用車貼優惠)。\r\n※ 營區全區可接露營車及小台的露營拖車。\r\n', '宜蘭縣大同鄉松羅村泰雅路二段96巷'),
(15, ' Ocean Chill 海憩露營區 ', '營地前後遼闊山景包場海灘，玩水看山親近大自然，5x7M大棧板營位帳篷不受限，提供貼心設備賓至如歸。\r\n在地特色旅遊代訂 溯溪、獨木舟、賞鯨、潛水、衝浪 等等。鄰近知名景點 太魯閣國家公園約7分鐘，新城火車站約5分鐘。', 'camping_15_1', 'camping_15_2', 'camping_15_3', 'camping_15_4', 1, '東區', '花蓮縣', '24.1093449,121.626496', '300m以下', '集中浴廁、沐浴髮品、附廁紙、男女浴廁分開', 1, '玩沙池、射箭、冷凍、冷藏、飲水機、吹風機、脫水機', '※ 每營位限搭1睡帳、1客廳帳、1停車位。\r\n※ 每營位限4人入住，第5人起，酌收人頭費200元/人(三歲以下免費)。\r\n※ 訪客來訪超過1小時需另酌收場地費100元/人。\r\n※ 營本部屋頂的露台可提供給露友曬帳收帳，請踴躍使用。', '花蓮縣新城鄉順安村北三棧 119之6號'),
(16, '老麥農場露營區', '台東絕佳旅遊營地，距離鹿野高台17分鐘、初鹿牧場8分鐘，鹿鳴吊橋景觀遊憩區8分鐘。自在舒壓、漫遊台東，放慢步調享受樂活。', 'camping_16_1', 'camping_16_2', 'camping_16_3', 'camping_16_4', 1, '東區', '台東縣', '22.874927,121.0958605', '300m以下', '集中浴廁', 1, '生態池、烤肉區、冷藏、飲水機', '※每帳限4人入住，第5人起每1人收100元(上限為6人，3 歲以下孩童免費)\r\n※每帳限搭1睡帳、1客廳、1停車位，露宿車內視同搭帳，比照每帳計費。\r\n※可接露營拖車、露營車、車頂帳，費用以每帳做計算。\r\n※營火區(有團體需要，請預先洽營主預約使用場地)\r\n※園內體驗活動：原住民射箭、提供卡拉OK(22:00前使用)，釣魚(需先洽營主)', '台東縣卑南鄉明峰村龍過脈8鄰119-1號');

-- --------------------------------------------------------

--
-- 資料表結構 `campinggroups`
--

CREATE TABLE `campinggroups` (
  `GROUP_NO` int NOT NULL,
  `GROUP_MEMNO` int NOT NULL,
  `GROUP_NAME` varchar(20) DEFAULT NULL,
  `GROUP_INTRO` text,
  `GROUP_CAM_NO` int NOT NULL,
  `GROUP_PEOPLE_LIMIT` tinyint DEFAULT NULL,
  `GROUP_PEOPLE_SIGNUP` tinyint DEFAULT NULL,
  `GROUP_START_DATE` datetime DEFAULT NULL,
  `GROUP_DEADLINE` datetime DEFAULT NULL,
  `GROUP_DEPART_DATE` datetime DEFAULT NULL,
  `GROUP_STATUS` tinyint NOT NULL DEFAULT '0',
  `GROUP_PIC1` varchar(30) DEFAULT NULL,
  `GROUP_PIC2` varchar(30) DEFAULT NULL,
  `GROUP_PIC3` varchar(30) DEFAULT NULL,
  `GROUP_REASON` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `campinggroups`
--

INSERT INTO `campinggroups` (`GROUP_NO`, `GROUP_MEMNO`, `GROUP_NAME`, `GROUP_INTRO`, `GROUP_CAM_NO`, `GROUP_PEOPLE_LIMIT`, `GROUP_PEOPLE_SIGNUP`, `GROUP_START_DATE`, `GROUP_DEADLINE`, `GROUP_DEPART_DATE`, `GROUP_STATUS`, `GROUP_PIC1`, `GROUP_PIC2`, `GROUP_PIC3`, `GROUP_REASON`) VALUES
(1, 2, '宇宙第一露營團', '「因為喜歡露營而經營露營」，這是營主Grace的夢想\r\n\r\n營主兩兄妹從小就非常喜歡露營，想要將自己最喜愛的露營活動分享給更多的露友，而誕生了希望之丘。營主融入英倫風格，創造出獨一無二的營地，處處都能看見營主的用心。\r\n\r\n便利的交通是希望之丘露營區的優勢，從國道五號的羅東交流道下，僅要三十分鐘左右的車程，而且不必跋山涉水，全段道路的品質都相當平坦且良好，即便一般的二驅房車，都可以輕鬆加掛露營拖車前來。\r\n\r\n營區被山包圍著，寧靜而清幽，設施簡約並維持著小而美的極簡質感。\r\n\r\n營區位於平地靠近梅花湖，Grace 認為露營無需冒生命危險，追求著高山狹路而步步驚心。\r\n\r\n也因交通便捷，海拔不高的關係，附近有許多好去處，搭好營帳後可以到附近的景點去逛逛呢!', 1, 10, 1, '2020-10-30 00:00:00', '2020-11-30 00:00:00', '2020-12-31 00:00:00', 0, 'camping_1_1', 'camping_1_2', 'camping_1_3', NULL),
(2, 3, '世界第一露營團', '登上玉山，稍有難度的露營程度，歡迎有登百岳經驗的親朋有一同前來，不僅回味日出的美麗，也讓我們一同分享登山露營的趣事。登上玉山，稍有難度的露營程度，歡迎有登百岳經驗的親朋有一同前來，不僅回味日出的美麗，也讓我們一同分享登山露營的趣事。登上玉山，稍有難度的露營程度，歡迎有登百岳經驗的親朋有一同前來，不僅回味日出的美麗，也讓我們一同分享登山露營的趣事。', 1, 20, 2, '2020-10-22 00:00:00', '2020-11-19 00:00:00', '2020-11-26 00:00:00', 0, 'camping_2_1', 'camping_2_2', 'camping_2_3', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `equcollection`
--

CREATE TABLE `equcollection` (
  `EQUCOL_NO` int NOT NULL,
  `EQUCOL_MEMNO` int NOT NULL,
  `EQUCOL_EQUNO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `equcollection`
--

INSERT INTO `equcollection` (`EQUCOL_NO`, `EQUCOL_MEMNO`, `EQUCOL_EQUNO`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `equipment`
--

CREATE TABLE `equipment` (
  `EQU_NO` int NOT NULL,
  `EQU_MEMNO` int NOT NULL,
  `EQU_NAME` varchar(20) DEFAULT NULL,
  `EQU_DESCR` text,
  `EQU_POSTDATE` datetime DEFAULT NULL,
  `EQU_SWAPATATNO` tinyint NOT NULL DEFAULT '0',
  `EQU_EQUSORT_NO` int NOT NULL,
  `EQU_EQUSORT_NO1` int DEFAULT NULL,
  `EQU_EQUSORT_NO2` int DEFAULT NULL,
  `EQU_EQUSORT_NO3` int DEFAULT NULL,
  `EQU_PIC1` varchar(30) DEFAULT NULL,
  `EQU_PIC2` varchar(30) DEFAULT NULL,
  `EQU_PIC3` varchar(30) DEFAULT NULL,
  `EQU_SWAP_ANO` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `equipment`
--

INSERT INTO `equipment` (`EQU_NO`, `EQU_MEMNO`, `EQU_NAME`, `EQU_DESCR`, `EQU_POSTDATE`, `EQU_SWAPATATNO`, `EQU_EQUSORT_NO`, `EQU_EQUSORT_NO1`, `EQU_EQUSORT_NO2`, `EQU_EQUSORT_NO3`, `EQU_PIC1`, `EQU_PIC2`, `EQU_PIC3`, `EQU_SWAP_ANO`) VALUES
(1, 2, '單人露營帳', '單層帳以單層布料兼顧透氣、排濕及防風防水，由於大部分商品的重量都不會超過1.5kg，在攜帶時幾乎不會造成任何負擔；且搭設的步驟相當少，就算天氣狀況惡劣也能快速地建立營地，大幅節省時間跟精力。\r\n不過此類型的透氣性較差，濕氣容易累積在帳棚內導致返潮；而且沒有前庭等可遮蔽的場所放置雜物。有經驗的登山者大多會在意搭設及撤收營地的效率，且每個人背負的重量也需要仔細計算，所以單層帳在比較專業的登山團隊中還是佔有很大的優勢。', '2020-10-30 14:30:00', 0, 2, 6, 8, 10, NULL, NULL, NULL, NULL),
(2, 3, '風之爐精裝版(小)', '不僅適合居家室內使用，在3000公尺以上高山，零下數十度C的惡劣環境， 依舊保持八成功率；超輕量590g比一瓶礦泉水還要輕體積如一顆蘋果般的大小一手掌握，既不造成旅行負擔，更滿足喜好任何戶外活動的國人。\r\n無刺鼻瓦斯味、煤油味、臭炭味，使用時不用憋氣亦不汙染空氣，烹煮時不讓美食添上異味；免加壓，七秒鐘可完成起火，簡易調整火力。', '2020-10-28 00:00:00', 0, 10, 1, 2, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'NUIT 延伸天幕邊布', '可收闔的兩頁式後門，全黑膠塗層，阻隔刺眼陽光。\r\n大片前延系統，強化遮光擋雨片。\r\n頂級3000mm耐水壓，高防水等級。', '2020-11-04 00:00:00', 0, 3, 5, 6, 9, 'li_tent_01.jpg', NULL, NULL, NULL),
(4, 3, '核心網屋 客廳帳', '270標準大內帳，搭配L號充氣床，小資族也能享受舒適露營。\r\n頂級遮光黑膠材質，遮光率達99.7%。', '2020-11-04 00:00:00', 0, 3, 10, 8, 1, 'li_tent02.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `equseries`
--

CREATE TABLE `equseries` (
  `EQUSERIES_NO` int NOT NULL,
  `EQUSERIES_NAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `equseries`
--

INSERT INTO `equseries` (`EQUSERIES_NO`, `EQUSERIES_NAME`) VALUES
(1, '露營帳篷'),
(2, '睡袋'),
(3, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `equsort`
--

CREATE TABLE `equsort` (
  `EQUSORT_NO` int NOT NULL,
  `EQUSERIES_ID` int NOT NULL,
  `EQUSORT_EQUNAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `equsort`
--

INSERT INTO `equsort` (`EQUSORT_NO`, `EQUSERIES_ID`, `EQUSORT_EQUNAME`) VALUES
(1, 1, '家庭帳'),
(2, 1, '小型帳'),
(3, 1, '客廳帳'),
(4, 1, '更衣帳'),
(5, 1, '炊事帳'),
(6, 2, '成人睡袋'),
(7, 2, '兒童睡袋'),
(8, 2, '雙人睡袋'),
(9, 3, '桌椅'),
(10, 3, '炊具'),
(11, 3, '小物');

-- --------------------------------------------------------

--
-- 資料表結構 `geade`
--

CREATE TABLE `geade` (
  `GRADE_NO` int NOT NULL,
  `GRADE_NAME` varchar(20) DEFAULT NULL,
  `GRADE_IMG` varchar(30) DEFAULT NULL,
  `GRADE_STATUE` tinyint(1) NOT NULL DEFAULT '0',
  `GRADE_UPLIMIT` int DEFAULT NULL,
  `GRADE_LOLIMIT` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `geade`
--

INSERT INTO `geade` (`GRADE_NO`, `GRADE_NAME`, `GRADE_IMG`, `GRADE_STATUE`, `GRADE_UPLIMIT`, `GRADE_LOLIMIT`) VALUES
(1, '鐵牌', 'iron_plate.png', 0, 5999, 1),
(2, '銅牌', 'bronze_medal.png', 0, 11999, 6000),
(3, '銀牌', 'silver_medal.png', 0, 17999, 12000),
(4, '金牌', 'gold_medal.png', 0, 23999, 18000),
(5, '鑽石', 'diamond.png', 0, 30000, 24000);

-- --------------------------------------------------------

--
-- 資料表結構 `group_detail`
--

CREATE TABLE `group_detail` (
  `G_DEATIL_NO` int NOT NULL,
  `G_DEATIL_GROUP_NO` int NOT NULL,
  `G_DETAIL_MEMNO` int NOT NULL,
  `G_DETAIL_APPTOVE_STATUS` tinyint NOT NULL DEFAULT '0',
  `G_DATEIL_PARTNUM` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `group_detail`
--

INSERT INTO `group_detail` (`G_DEATIL_NO`, `G_DEATIL_GROUP_NO`, `G_DETAIL_MEMNO`, `G_DETAIL_APPTOVE_STATUS`, `G_DATEIL_PARTNUM`) VALUES
(1, 1, 2, 0, 2),
(2, 2, 3, 0, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `group_mes`
--

CREATE TABLE `group_mes` (
  `GROUP_MES_NO` int NOT NULL,
  `GROUP_MES_GROUPNO` int NOT NULL,
  `GROUP_MES_MEMNO` int NOT NULL,
  `GROUP_MES_TIME` datetime DEFAULT NULL,
  `GROUP_MES_CONTENT` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `group_mes`
--

INSERT INTO `group_mes` (`GROUP_MES_NO`, `GROUP_MES_GROUPNO`, `GROUP_MES_MEMNO`, `GROUP_MES_TIME`, `GROUP_MES_CONTENT`) VALUES
(1, 1, 3, '2020-10-31 02:06:13', '有飛行倉可以坐嗎'),
(2, 2, 2, '2020-10-31 14:04:06', '有纜車可以坐嗎');

-- --------------------------------------------------------

--
-- 資料表結構 `g_use_equ`
--

CREATE TABLE `g_use_equ` (
  `G_USE_EQU_NO` int NOT NULL,
  `GROUP_NO` int NOT NULL,
  `G_EQU_NO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `g_use_equ`
--

INSERT INTO `g_use_equ` (`G_USE_EQU_NO`, `GROUP_NO`, `G_EQU_NO`) VALUES
(1, 1, 8),
(2, 2, 1),
(3, 1, 5),
(4, 2, 11);

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `MGR_NO` varchar(50) NOT NULL,
  `MGR_USER` varchar(20) NOT NULL,
  `MGR_PSW` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`MGR_NO`, `MGR_USER`, `MGR_PSW`) VALUES
('imDongDong', '董董', 'DongNo1'),
('imSara', '語語', 'SaraNo1');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `MEMNO` int NOT NULL,
  `MEMGRADE_NO` int NOT NULL,
  `MEM_ID` varchar(60) NOT NULL,
  `MEM_PSW` varchar(60) NOT NULL,
  `MEM_NAME` varchar(20) DEFAULT NULL,
  `MEM_NICKNAME` varchar(20) DEFAULT NULL,
  `MEM_POINT` int NOT NULL DEFAULT '1',
  `MEM_IMG` varchar(30) DEFAULT 'defaul_header.png',
  `MEM_STATUS` tinyint(1) NOT NULL DEFAULT '0',
  `MEM_BAN_DATE` datetime DEFAULT NULL,
  `MEM_BAN_FREQUENCY` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`MEMNO`, `MEMGRADE_NO`, `MEM_ID`, `MEM_PSW`, `MEM_NAME`, `MEM_NICKNAME`, `MEM_POINT`, `MEM_IMG`, `MEM_STATUS`, `MEM_BAN_DATE`, `MEM_BAN_FREQUENCY`) VALUES
(2, 1, 'email@google.com', '123456789', '王小衛', '小衛', 1, 'defaul_header.png', 0, NULL, 0),
(3, 3, 'email2@gmail.com', '987654321', '許光漢', '小漢', 13000, 'defaul_header.png', 0, NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `MES_NO` int NOT NULL,
  `MES_TIME` datetime DEFAULT NULL,
  `MES_CONTENT` text,
  `MES_OBJECT_MEMNO` int NOT NULL,
  `MES_SENDER_MEMNO` int NOT NULL,
  `MES_READ` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`MES_NO`, `MES_TIME`, `MES_CONTENT`, `MES_OBJECT_MEMNO`, `MES_SENDER_MEMNO`, `MES_READ`) VALUES
(1, '2020-10-23 21:19:15', '有其他顏色嗎', 2, 3, 0),
(2, '2020-10-28 10:45:18', '可以面交嗎', 3, 2, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `postcard`
--

CREATE TABLE `postcard` (
  `POSTCARD_STYLE_ID` int NOT NULL,
  `POSTCARD_STYLE_NAME` tinyint NOT NULL,
  `POSTCARD_NAME` varchar(20) DEFAULT NULL,
  `POSTCARD_STYLE_PIC` varchar(30) NOT NULL,
  `POSTCARD_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `postcard`
--

INSERT INTO `postcard` (`POSTCARD_STYLE_ID`, `POSTCARD_STYLE_NAME`, `POSTCARD_NAME`, `POSTCARD_STYLE_PIC`, `POSTCARD_STATUS`) VALUES
(1, 1, '自然風', 'natural_wind.png', 0),
(2, 1, '可愛風', 'lovely_wind.png', 0),
(3, 2, '營火', 'campfire.png', 0),
(4, 2, '帳篷', 'tent.png', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `question`
--

CREATE TABLE `question` (
  `QUE_NO` int NOT NULL,
  `QUE_TITLE` varchar(100) DEFAULT NULL,
  `QUE_OPT1` varchar(50) DEFAULT NULL,
  `QUE_OPT2` varchar(50) DEFAULT NULL,
  `QUE_OPT3` varchar(50) DEFAULT NULL,
  `QUE_ANS` tinyint DEFAULT NULL,
  `QUE_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `question`
--

INSERT INTO `question` (`QUE_NO`, `QUE_TITLE`, `QUE_OPT1`, `QUE_OPT2`, `QUE_OPT3`, `QUE_ANS`, `QUE_STATUS`) VALUES
(1, 'Q1:請問露營時遇到熊怎麼辦?', 'A:爬到樹上', 'B:躺在地上裝死', 'C:逃跑', 3, 0),
(2, 'Q2:當露營地附近有蜂窩該怎麼辦？', 'A:拿石頭砸掉', 'B:通知露營地主人處理，並遠離此區域', 'C:不管它，繼續露營', 2, 0),
(3, 'Q3:露營完後的垃圾該如何處理？', 'A:帶回自己住處處理', 'B:丟到附近周遭', 'C:回程路上丟', 1, 0),
(4, 'Q4:如何挑選帳篷？', '內帳800', '內+外帳1800', '外帳2000', 2, 0),
(5, 'Q5:野炊設備怎麼挑?', '鍋碗', '烤架', '卡式瓦斯爐', 3, 0),
(6, 'Q6:哪些是夜間照明工具?', '菜籃', '反光板', '旗子', 2, 0),
(7, 'Q7:哪些是小物件準備？', '睡袋', '安全帽', '爆米花桶', 3, 0),
(8, 'Q8:請問有需要多帶環保餐具嗎?', '需要', '不需要', '都可以', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `replymessage`
--

CREATE TABLE `replymessage` (
  `RE_MES_NO` int NOT NULL,
  `RE_MES_MESNO` int NOT NULL,
  `RE_MES_TIME` datetime DEFAULT NULL,
  `RE_MES_CONTENT` text,
  `RE_MES_SEND` int NOT NULL,
  `RE_MES_READ` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `replymessage`
--

INSERT INTO `replymessage` (`RE_MES_NO`, `RE_MES_MESNO`, `RE_MES_TIME`, `RE_MES_CONTENT`, `RE_MES_SEND`, `RE_MES_READ`) VALUES
(1, 1, '2020-10-31 20:43:25', '沒有喔，不好意思囉', 3, 0),
(2, 2, '2020-11-04 08:18:17', '沒問題，請問在中央大學方便嗎', 2, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `reportgroup`
--

CREATE TABLE `reportgroup` (
  `REGROUP_NO` int NOT NULL,
  `REGROUP_GROUP_NO` int NOT NULL,
  `REGROUP_MEMNO` int NOT NULL,
  `REGROUP_STATUS` tinyint NOT NULL DEFAULT '0',
  `REGROUP_RESON` tinyint NOT NULL,
  `REGROUP_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reportgroup`
--

INSERT INTO `reportgroup` (`REGROUP_NO`, `REGROUP_GROUP_NO`, `REGROUP_MEMNO`, `REGROUP_STATUS`, `REGROUP_RESON`, `REGROUP_DATE`) VALUES
(1, 1, 2, 0, 1, '2020-10-31 04:23:00'),
(2, 1, 3, 0, 2, '2020-10-31 17:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `reportgroup_mes`
--

CREATE TABLE `reportgroup_mes` (
  `REGROUP_MES_NO` int NOT NULL,
  `REGROUP_MES_GROUP_NO` int NOT NULL,
  `REGROUP_MES_MEMNO` int NOT NULL,
  `REGROUP_MES_STATUS` tinyint NOT NULL DEFAULT '0',
  `REGROUP_RESON` tinyint NOT NULL,
  `REGROUP_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reportgroup_mes`
--

INSERT INTO `reportgroup_mes` (`REGROUP_MES_NO`, `REGROUP_MES_GROUP_NO`, `REGROUP_MES_MEMNO`, `REGROUP_MES_STATUS`, `REGROUP_RESON`, `REGROUP_DATE`) VALUES
(1, 1, 3, 0, 1, '2020-10-31 11:40:29'),
(2, 2, 3, 0, 2, '2020-10-31 12:00:28');

-- --------------------------------------------------------

--
-- 資料表結構 `reportoutfit`
--

CREATE TABLE `reportoutfit` (
  `REP_OUT_NO` int NOT NULL,
  `REP_OUT_EQUNO` int NOT NULL,
  `REP_OUT_MEMNO` int NOT NULL,
  `REP_OUT_STATUS` tinyint NOT NULL DEFAULT '0',
  `REPOUP_RESON` tinyint DEFAULT NULL,
  `REPOUT_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reportoutfit`
--

INSERT INTO `reportoutfit` (`REP_OUT_NO`, `REP_OUT_EQUNO`, `REP_OUT_MEMNO`, `REP_OUT_STATUS`, `REPOUP_RESON`, `REPOUT_DATE`) VALUES
(1, 1, 3, 0, 1, '2020-10-31 12:00:19'),
(2, 2, 2, 0, 2, '2020-10-31 05:39:00');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `applychange`
--
ALTER TABLE `applychange`
  ADD PRIMARY KEY (`APCH_NO`),
  ADD KEY `APCH_MEMNO` (`APCH_MEMNO`),
  ADD KEY `APCH_WANT_EQNO` (`APCH_WANT_EQNO`),
  ADD KEY `APCH_BR_EQNO` (`APCH_BR_EQNO`);

--
-- 資料表索引 `campcolloection`
--
ALTER TABLE `campcolloection`
  ADD PRIMARY KEY (`CAMPCO_NO`),
  ADD KEY `CAMPCO_CAMNO` (`CAMPCO_CAMNO`),
  ADD KEY `CAMPCO_MEMNO` (`CAMPCO_MEMNO`);

--
-- 資料表索引 `camping`
--
ALTER TABLE `camping`
  ADD PRIMARY KEY (`CAM_NO`);

--
-- 資料表索引 `campinggroups`
--
ALTER TABLE `campinggroups`
  ADD PRIMARY KEY (`GROUP_NO`),
  ADD KEY `GROUP_MEMNO` (`GROUP_MEMNO`),
  ADD KEY `GROUP_CAM_NO` (`GROUP_CAM_NO`);

--
-- 資料表索引 `equcollection`
--
ALTER TABLE `equcollection`
  ADD PRIMARY KEY (`EQUCOL_NO`),
  ADD KEY `EQUCOL_MEMNO` (`EQUCOL_MEMNO`),
  ADD KEY `EQUCOL_EQUNO` (`EQUCOL_EQUNO`);

--
-- 資料表索引 `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`EQU_NO`),
  ADD KEY `EQU_MEMNO` (`EQU_MEMNO`),
  ADD KEY `EQU_EQUSORT_NO` (`EQU_EQUSORT_NO`),
  ADD KEY `EQU_EQUSORT_NO1` (`EQU_EQUSORT_NO1`),
  ADD KEY `EQU_EQUSORT_NO2` (`EQU_EQUSORT_NO2`),
  ADD KEY `EQU_EQUSORT_NO3` (`EQU_EQUSORT_NO3`),
  ADD KEY `EQU_SWAP_ANO` (`EQU_SWAP_ANO`);

--
-- 資料表索引 `equseries`
--
ALTER TABLE `equseries`
  ADD PRIMARY KEY (`EQUSERIES_NO`);

--
-- 資料表索引 `equsort`
--
ALTER TABLE `equsort`
  ADD PRIMARY KEY (`EQUSORT_NO`),
  ADD KEY `equsort_ibfk_1` (`EQUSERIES_ID`);

--
-- 資料表索引 `geade`
--
ALTER TABLE `geade`
  ADD PRIMARY KEY (`GRADE_NO`);

--
-- 資料表索引 `group_detail`
--
ALTER TABLE `group_detail`
  ADD PRIMARY KEY (`G_DEATIL_NO`),
  ADD KEY `G_DEATIL_GROUP_NO` (`G_DEATIL_GROUP_NO`),
  ADD KEY `G_DETAIL_MEMNO` (`G_DETAIL_MEMNO`);

--
-- 資料表索引 `group_mes`
--
ALTER TABLE `group_mes`
  ADD PRIMARY KEY (`GROUP_MES_NO`),
  ADD KEY `GROUP_MES_GROUPNO` (`GROUP_MES_GROUPNO`),
  ADD KEY `GROUP_MES_MEMNO` (`GROUP_MES_MEMNO`);

--
-- 資料表索引 `g_use_equ`
--
ALTER TABLE `g_use_equ`
  ADD PRIMARY KEY (`G_USE_EQU_NO`),
  ADD KEY `GROUP_NO` (`GROUP_NO`),
  ADD KEY `G_EQU_NO` (`G_EQU_NO`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`MGR_NO`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEMNO`),
  ADD UNIQUE KEY `MEM_ID` (`MEM_ID`),
  ADD KEY `MEMGRADE_NO` (`MEMGRADE_NO`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MES_NO`),
  ADD KEY `MES_OBJECT_MEMNO` (`MES_OBJECT_MEMNO`),
  ADD KEY `MES_SENDER_MEMNO` (`MES_SENDER_MEMNO`);

--
-- 資料表索引 `postcard`
--
ALTER TABLE `postcard`
  ADD PRIMARY KEY (`POSTCARD_STYLE_ID`);

--
-- 資料表索引 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QUE_NO`);

--
-- 資料表索引 `replymessage`
--
ALTER TABLE `replymessage`
  ADD PRIMARY KEY (`RE_MES_NO`),
  ADD KEY `RE_MES_SEND` (`RE_MES_SEND`),
  ADD KEY `replymessage_ibfk_1` (`RE_MES_MESNO`);

--
-- 資料表索引 `reportgroup`
--
ALTER TABLE `reportgroup`
  ADD PRIMARY KEY (`REGROUP_NO`),
  ADD KEY `REGROUP_GROUP_NO` (`REGROUP_GROUP_NO`),
  ADD KEY `REGROUP_MEMNO` (`REGROUP_MEMNO`);

--
-- 資料表索引 `reportgroup_mes`
--
ALTER TABLE `reportgroup_mes`
  ADD PRIMARY KEY (`REGROUP_MES_NO`),
  ADD KEY `REGROUP_MES_GROUP_NO` (`REGROUP_MES_GROUP_NO`),
  ADD KEY `REGROUP_MES_MEMNO` (`REGROUP_MES_MEMNO`);

--
-- 資料表索引 `reportoutfit`
--
ALTER TABLE `reportoutfit`
  ADD PRIMARY KEY (`REP_OUT_NO`),
  ADD KEY `REP_OUT_MEMNO` (`REP_OUT_MEMNO`),
  ADD KEY `REP_OUT_EQUNO` (`REP_OUT_EQUNO`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `applychange`
--
ALTER TABLE `applychange`
  MODIFY `APCH_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `campcolloection`
--
ALTER TABLE `campcolloection`
  MODIFY `CAMPCO_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `camping`
--
ALTER TABLE `camping`
  MODIFY `CAM_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `campinggroups`
--
ALTER TABLE `campinggroups`
  MODIFY `GROUP_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `equcollection`
--
ALTER TABLE `equcollection`
  MODIFY `EQUCOL_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `equipment`
--
ALTER TABLE `equipment`
  MODIFY `EQU_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `equseries`
--
ALTER TABLE `equseries`
  MODIFY `EQUSERIES_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `equsort`
--
ALTER TABLE `equsort`
  MODIFY `EQUSORT_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `geade`
--
ALTER TABLE `geade`
  MODIFY `GRADE_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_detail`
--
ALTER TABLE `group_detail`
  MODIFY `G_DEATIL_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_mes`
--
ALTER TABLE `group_mes`
  MODIFY `GROUP_MES_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `g_use_equ`
--
ALTER TABLE `g_use_equ`
  MODIFY `G_USE_EQU_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `MEMNO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `MES_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `postcard`
--
ALTER TABLE `postcard`
  MODIFY `POSTCARD_STYLE_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `question`
--
ALTER TABLE `question`
  MODIFY `QUE_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `replymessage`
--
ALTER TABLE `replymessage`
  MODIFY `RE_MES_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reportgroup`
--
ALTER TABLE `reportgroup`
  MODIFY `REGROUP_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reportgroup_mes`
--
ALTER TABLE `reportgroup_mes`
  MODIFY `REGROUP_MES_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reportoutfit`
--
ALTER TABLE `reportoutfit`
  MODIFY `REP_OUT_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `applychange`
--
ALTER TABLE `applychange`
  ADD CONSTRAINT `applychange_ibfk_1` FOREIGN KEY (`APCH_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applychange_ibfk_2` FOREIGN KEY (`APCH_WANT_EQNO`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applychange_ibfk_3` FOREIGN KEY (`APCH_BR_EQNO`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `campcolloection`
--
ALTER TABLE `campcolloection`
  ADD CONSTRAINT `campcolloection_ibfk_1` FOREIGN KEY (`CAMPCO_CAMNO`) REFERENCES `camping` (`CAM_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `campcolloection_ibfk_2` FOREIGN KEY (`CAMPCO_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `campinggroups`
--
ALTER TABLE `campinggroups`
  ADD CONSTRAINT `campinggroups_ibfk_1` FOREIGN KEY (`GROUP_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `campinggroups_ibfk_2` FOREIGN KEY (`GROUP_CAM_NO`) REFERENCES `camping` (`CAM_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `equcollection`
--
ALTER TABLE `equcollection`
  ADD CONSTRAINT `equcollection_ibfk_1` FOREIGN KEY (`EQUCOL_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equcollection_ibfk_2` FOREIGN KEY (`EQUCOL_EQUNO`) REFERENCES `equipment` (`EQU_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`EQU_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`EQU_EQUSORT_NO`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_3` FOREIGN KEY (`EQU_EQUSORT_NO1`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_4` FOREIGN KEY (`EQU_EQUSORT_NO2`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_5` FOREIGN KEY (`EQU_EQUSORT_NO3`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_6` FOREIGN KEY (`EQU_SWAP_ANO`) REFERENCES `equipment` (`EQU_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `equsort`
--
ALTER TABLE `equsort`
  ADD CONSTRAINT `equsort_ibfk_1` FOREIGN KEY (`EQUSERIES_ID`) REFERENCES `equseries` (`EQUSERIES_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `group_detail`
--
ALTER TABLE `group_detail`
  ADD CONSTRAINT `group_detail_ibfk_1` FOREIGN KEY (`G_DETAIL_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `group_detail_ibfk_2` FOREIGN KEY (`G_DEATIL_GROUP_NO`) REFERENCES `campinggroups` (`GROUP_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `group_mes`
--
ALTER TABLE `group_mes`
  ADD CONSTRAINT `group_mes_ibfk_1` FOREIGN KEY (`GROUP_MES_GROUPNO`) REFERENCES `campinggroups` (`GROUP_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `group_mes_ibfk_2` FOREIGN KEY (`GROUP_MES_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `g_use_equ`
--
ALTER TABLE `g_use_equ`
  ADD CONSTRAINT `g_use_equ_ibfk_1` FOREIGN KEY (`GROUP_NO`) REFERENCES `campinggroups` (`GROUP_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `g_use_equ_ibfk_2` FOREIGN KEY (`G_EQU_NO`) REFERENCES `equsort` (`EQUSORT_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`MEMGRADE_NO`) REFERENCES `geade` (`GRADE_NO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`MES_OBJECT_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`MES_SENDER_MEMNO`) REFERENCES `member` (`MEMNO`);

--
-- 資料表的限制式 `replymessage`
--
ALTER TABLE `replymessage`
  ADD CONSTRAINT `replymessage_ibfk_1` FOREIGN KEY (`RE_MES_MESNO`) REFERENCES `message` (`MES_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `replymessage_ibfk_2` FOREIGN KEY (`RE_MES_SEND`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `reportgroup`
--
ALTER TABLE `reportgroup`
  ADD CONSTRAINT `reportgroup_ibfk_1` FOREIGN KEY (`REGROUP_GROUP_NO`) REFERENCES `campinggroups` (`GROUP_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportgroup_ibfk_2` FOREIGN KEY (`REGROUP_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `reportgroup_mes`
--
ALTER TABLE `reportgroup_mes`
  ADD CONSTRAINT `reportgroup_mes_ibfk_1` FOREIGN KEY (`REGROUP_MES_GROUP_NO`) REFERENCES `campinggroups` (`GROUP_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportgroup_mes_ibfk_2` FOREIGN KEY (`REGROUP_MES_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `reportoutfit`
--
ALTER TABLE `reportoutfit`
  ADD CONSTRAINT `reportoutfit_ibfk_1` FOREIGN KEY (`REP_OUT_MEMNO`) REFERENCES `member` (`MEMNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportoutfit_ibfk_2` FOREIGN KEY (`REP_OUT_EQUNO`) REFERENCES `equipment` (`EQU_NO`) ON UPDATE CASCADE;
COMMIT;
