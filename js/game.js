var count = 0;
    function init() {
    askQuestion();
  }
 
  function askQuestion() {
    main();
  }
  
  window.addEventListener("load", function(){
   
    let xhr = new XMLHttpRequest();
    //---------------
    // QUE_TITLE
    // QUE_OPT1
    // QUE_OPT2
    // QUE_OPT3
    // QUE_ANS
    // QUE_STATUS
    //---------------
    xhr.onload = function(){
      questions = JSON.parse(xhr.responseText);
      console.log("//--------------");
      console.log(questions);
      console.log("//--------------");
      init();
    }
    xhr.open("get", "php/game/getQuestion.php",false);
    xhr.send(null);
  })


  ////////////////////變數設定開始////////////////////
  //背景圖片
  var background = ["", "", ""];
  //問題
  var questions;
  //答案
  var ans = ["", "", "", "", ""];
  var img = [
    ["", "", ""], //ans=1
    ["", "", ""], //ans=2
    ["", "", ""], //ans=3
    ["", "", ""], //ans=4
    ["", "", ""], //ans=5
  ];

  ////////////////////電腦動畫開始////////////////////
  function main() { //執行函式

    $('#question').text(questions[count][0]); //換qa的題目
    $('#ans1 img').attr("src", `./images/${img[count][0]}`); 
    $('#ans2 img').attr("src", `./images/${img[count][1]}`); 
    $('#ans3 img').attr("src", `./images/${img[count][2]}`); 
  
    $('#ans1 button').text(questions[count][1]); //換ans1的文字
    $('#ans2 button').text(questions[count][2]); //換ans2的文字
    $('#ans3 button').text(questions[count][3]); //換ans3的文字
  
  
    smallgameIn(); //進場動畫
  }
  //判斷正確及錯誤
  $('.choice').click(function (e) {
      e.preventDefault();
      if($(this).hasClass("-disabled")){
        }else{
          $('#game_button_answer01').addClass("-disabled");
          $('#game_button_answer02').addClass("-disabled");
          $('#game_button_answer03').addClass("-disabled");
    let ansIndex = questions[count][4];
      if ($(this).text() == questions[count][ansIndex]) {
          // console.log("test1")
          rightOut(); //正確動畫
        } else {
          // console.log("test2");
          wrongOut(); //錯誤動畫
        }
      }
      
  });

  //此處判斷答題次數，小於5次重複答題，大於5次接結算畫面
  function pcEnd() {
     count++;
     console.log(count)
    if (count < 5) {
      $('#game_button_answer01').removeClass("-disabled");
      $('#game_button_answer02').removeClass("-disabled");
      $('#game_button_answer03').removeClass("-disabled");
      main()
    } else {
      score(); //呼叫結算畫面
      $('.scoreWindow').css("pointerEvents", "auto");
    }
   
  }
  //結算畫面
  function score() {
    var score = new TimelineMax({});
    score.to('.scoreWindow', .5, {
      css: {
        opacity: 1
      }
    })
  }
  
  function smallgame() {
    TweenMax.to('.bw', 1, {
      repeat: -1,
      rotation: 360,
      ease: Power0.easeNone,
    });
    TweenMax.to('.fw', 1, {
      repeat: -1,
      rotation: 360,
      ease: Power0.easeNone,
    });
    TweenMax.to('.smallgame', .25, {
      x: (screen.width) - 420,
      ease: Power0.easeNone,
    });
  }
  
  ///動畫js///
  function smallgameIn() {
    smallgame();
    var pcMmoveIn = new TimelineMax({});
    pcMmoveIn.to('.qa', .1, {
      css: {
        opacity: 1
      }
    }).to('.ans1', .25, {
      delay: 0,
      css: {
        opacity: 1,
      }
    }).to('.ans2', .25, {
      delay: 0,
      css: {
        opacity: 1,
      }
    }).to('.ans3', .25, {
      delay: 0,
      css: {
        opacity: 1,
      }
    }).to('.bw', .1, {
      rotation: 0
    }).to('.fw', .1, {
      rotation: 0,
    })
  }
  
  //答對畫面顯示
  function rightBoxShow() {
    var rightBoxIn = new TimelineMax({});
  
    rightBoxIn.to('.rightBox', 2, {
      css: {
        opacity: 1,
        delay: .2
      },
    }).to('.rightBox', 1, {
      css: {
        delay: .2,
        opacity: 0,
      }
    })
  }






  //答題正確,顯示答對畫面
  function rightOut() {
    var rightToOut = new TimelineMax({});
    rightToOut.to('.rightBox', 0.25, {
      css: {
        onComplete: rightBoxShow,
        opacity: 0
      }
    }).to('.qa', .3, {
      css: {
        opacity: 0,
      }
    }).to('.fw', .5, {
      delay: 1,
      rotation: 360,
      repeat: -1,
      ease: Power0.easeNone,
    }).to('.bw', .5, {
      repeat: -1,
      rotation: 360,
      ease: Power0.easeNone,
    }).to('.ans1', .3, {
      css: {
        opacity: 0,
      }
    }).to('.ans2', .2, {
      css: {
        opacity: 0,
      }
    }).to('.ans3', .1, {
      css: {
        opacity: 0,
      }
    }).to('.smallgame', .5, {
      x: 2500,
      y: 0,
      opacity: 0,
    }).to('.smallgame', .5, {
      opacity: 1,
      startAt: {
        x: 300
      },
      onComplete: pcEnd
    })
  }
  
  //答錯畫面顯示
  function wrongBoxShow() {
    var wrongBoxIn = new TimelineMax({});
    wrongBoxIn.to('.wrongBox', 2, {
      css: {
        opacity: 1,
        delay: .2
      },
    }).to('.wrongBox', 1, {
      css: {
        delay: .2,
        opacity: 0,
      }
    })
  }
  //答題錯誤,顯示答錯畫面
  function wrongOut() {
    var wrongToOut = new TimelineMax({});
    wrongToOut.to('.wrongBox', 1, {  //答錯畫面顯示框框
      css: {
        onComplete: wrongBoxShow,
        opacity: 0
      }
    }).to('.qa', .3, {
      css: {
        opacity: 0,
      }
    }).to('.ans1', .3, {
      css: {
        opacity: 0,
      }
    }).to('.ans2', .3, {
      css: {
        opacity: 0,
      }
    }).to('.ans3', .3, {
      css: {
        opacity: 0,
      }
    }).to('.fw', .2, {
      delay: .2,
      rotation: 360,
      ease: Power0.easeNone,
      repeat: -1,
    }).to('.bw', .2, {
      repeat: -1,
      rotation: 360,
      ease: Power0.easeNone,
    }).to('.smallgame', .5, { //換題時間
      x: 2500,
      y: 0,
      opacity: 0,
    }).to('ㄈ', .5, { //換題時間
      opacity: 1,
      startAt: {
        x: 300
      },
      onComplete: pcEnd
      //onComplete: function(){
        //console.log("here");
      //}
    })
  }
  
