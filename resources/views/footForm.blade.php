
<style>
    .newfooterform{
        width: 100%;
        background-color: #333333;
        height: 100px;
        position: fixed;
        left: 0;
        bottom: 0;
        z-index: 9999;
        opacity: 0.8;
    }
    .footer_title{
        position: relative;
        width: 100%;
    }
    .footer_logo{
        float: left;
        position: absolute;
        top: -39px;left: -90px;
    }
    .footer_from{
        position: absolute;
        left: 350px;
        top: 8px;
        float: left;
        z-index: 9999;
    }
    .footer_from ul{
        list-style: none;
        width: 400px;
    }
    .footer_from ul li{
        float: left;
        width: 155px;
        height: 35px;
        margin-right: 12px;
        margin-bottom: 12px;
    }
    .footer_from ul li input{
        width: 100%;
        height: 100%;
        outline: none;
        font-size: 16px;
        text-indent: 10px;
    }
    .footer_from ul li select{
        width: 100%;
        height: 100%;
        font-size: 16px;
        text-indent: 7px;
    }
    .newfooterform button{
        position: absolute;
        left: 403px;
        bottom: 0px;
        display: block;
        width: 308px;
        height: 112px;
        line-height: 100px;
        border: 5px solid #ffe453;
        color: black;
        background-color: #ffe453;
        font-size: 34px;
        cursor: pointer;
        font-weight: 600;
    }
</style>

<section class="newfooterform">
    <div class="container">
        <div class="footer_title clearfix">
            <div class="footer_logo">
                <img src="/images/index/newfooterpic.png" alt="" style="width: 476px;">
            </div>
            <div class="footer_from">
                <ul class="clearfix">
                    <li><input type="text" id="topname" name="Orders_Name" placeholder="姓名"></li>
                    <li><input type="text" id="topschoolname" name="Orders_Name" placeholder="所在学校"></li>
                    <li><input type="text" id="topphone" name="Orders_phone" placeholder="电话"></li>
                    <li>
                        <select name="" id="toptxtyears" class="topyears">
                            <option value=""selected="selected">出国年份</option>
                            <option value="1">2018</option>
                            <option value="2">2019</option>
                            <option value="3">2020</option>
                            <option value="4">2021</option>
                            <option value="5">2022</option>
                        </select>
                    </li>


                </ul>
                <button class="topbtn" onclick="Checkone()">免费留学</button>
            </div>
        </div>
    </div>
</section>
<script>

    $(document).ready(function(){
        var min_height = 100;
        $(window).scroll(function(){
            var s =$(window).scrollTop();
            if(s > min_height){
                $(".newfooterform").fadeIn(1000)
            }else{
                $(".newfooterform").fadeOut(1000)
            }
        });
    })
    //发送ajax请求
    function checkMobile(sMobile) {
        if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(sMobile))) {
            return false;
        } else {
            return true;
        }
    }
    function Checkone(){


        Check($("#topname"),$("#topphone"),$("#topschoolname"),$("#toptxtyears"),$(".topbtn"))

    }
    function Check(a,b,e,f,obj){
        if(a.val() == ""){
            msg('请填写姓名');
            return;
        }
        if (b.val() == "" || b.val().indexOf(' ') != -1 || b.val().length != 11 || checkMobile(b.val()) == false) {
            msg('请填写正确的手机号码');
            return;
        }
        if (e.val() == "") {
            msg('请填写所在院校');
            return;
        }
        if (f.val() == "") {
            msg('请填写您的出国时间');
            return;
        }
        obj.prop('onclick',null).off('click');
        obj.attr('disabled', 'disabled');
        var a = a.val();
        var b = b.val();
        var e = e.val();
        var f = f.val();
        // 正在提交
        obj.addClass('.flag');
        obj.html('正在提交...');
        $.ajax({
            headers: {
                'X-CSRF-Token': "{{ csrf_token('site') }}",
            },
            url: "/ajaxindex",
            type: "post",
            dataType: "json",
            data: {
                name: a,
                tel: b,
                yx: e,
                year: f,
                from: location.href,
                goto: 'sem',
            },
            success: function(data) {
                if (data.status == true) {
                    msg('申请成功！请等到老师与您联系');
                    obj.html('提交成功!');
                } else {
                    msg(data.remark);
                }
            }
        });
    }
    function msg(msg) {
        alert(msg);
        return;
    }
</script>
