<?php
//////////////////////////////
// Coding : utf-8
// Auther : Misnaki
// Email  : outdie@qq.com
// Datta  : 2020/11/19
// Prama  : Wirte txt php.
//简单粗暴 举止优雅 (狗头保命)

//////////////////////////////
  /*干掉 傻逼 偷窥 页面*/
$host = $_SERVER['HTTP_REFERER'];
if($host == '') exit("Opps，该页面禁止访问!");
/////////////////////////////

/////////////////////////////
        /*变量组*/
$name = @$_REQUEST['name'];
$text = @$_REQUEST['text'];
$call = @$_REQUEST['call'];
$conn = @$_REQUEST['call'];
$filename = "form/".$name.".txt";
////////////////////////////
     /*判断是否存在*/
if(is_file($filename)){
    //True
    $arr = [
        "code"=>201,
        "msg"=>"提交失败，阁下已经存在一个待审核的申请啦OxO，请耐心等待哦O_<"
    ];
    exit(json_encode($arr));
}else{
    //False
    $content = <<<EOF
    申请姓名 ：
    {$name}
    兴趣爱好 ：
    {$text}
    电话号码 ：
    {$call}
    联系方式 ：
    {$conn}
EOF;
    file_put_contents($filename,$content);
    $arr = [
        "code"=>200,
        "msg"=>"提交成功，请耐心等待审核，审核结果将以短信形式发送到您的手机上:)",
    ];
    exit(json_encode($arr));
}
    ////////////////////////////
    //        直接            //
    //        结束            //
    ///////////////////////////
?>