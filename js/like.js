function addLike(){
    let forum_post_no = this.reflection[0].forum_post_no;
    let addlikexhr = new XMLHttpRequest();

    addlikexhr.onload = function() {
        member = JSON.parse(addlikexhr.responseText);
        if (member.mem_id) {
            //已經登入了，可以開始做事了
            var xhr = new XMLHttpRequest();
            xhr.onload = function(e) {
                if (xhr.status == 200) { //連線成功
                    console.log(xhr.responseText);
                } else {
                    swal(xhr.status);
                }
            }
            var url = "php/common/addlike.php";
            xhr.open("post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
            let data = `forum_post_no=${forum_post_no}`;
            xhr.send(data);

            if ($(".heart").attr('src') === "./images/icons/icon_heart.svg") {
                $(".heart").attr("src", "./images/icons/icon_heart_h&c.svg");
            } else {
                $(".heart").attr("src", "./images/icons/icon_heart.svg");
            }
        } else {
            //沒有登入，請先登入
            alret("請先登入")
        }
    }
    addlikexhr.open("get", "php/common/getMemberInfo.php", true);
    addlikexhr.send(null);
}