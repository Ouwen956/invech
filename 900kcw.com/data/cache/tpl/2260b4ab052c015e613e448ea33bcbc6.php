<?php exit;?>001549380184fb6035d4370da60c728b293e165f0f1ds:3040:"a:2:{s:8:"template";s:2976:"<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" /><meta name="format-detection" content="telephone=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11" />
    <title><?php echo $categoryInfo["name"];?>-<?php echo $sys["site_title"];?></title>
    <meta name="keywords" content="<?php echo $categoryInfo["keywords"];?>" />
    <meta name="distribution" content="<?php echo $categoryInfo["description"];?>" />
    <link rel="stylesheet" href="/themes/168pc/css/style.css" />
    <link rel="stylesheet" href="/themes/168pc/css/headorfood.css" />
    <script src="/themes/168pc/js/lib/bootstrap-3.3.0/js/tests/vendor/jquery.min.js"></script>
    <script src="/themes/168pc/js/lib/bootstrap-3.3.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/themes/168pc/js/lib/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/themes/168pc/js/lib/config.js"></script>
    <script type="text/javascript" src="/themes/168pc/js/lib/GA.js"></script>
  </head>

  <body>
    <div class="bodybox">
<?php $__Template->display("themes/168pc/head"); ?>

     <link rel="stylesheet" href="/themes/168pc/css/news.css" />

<div class="main">

<div class="news-l">
     
   <div class="ninfo">
<?php foreach ($pageList as $vo) { ?>
<div class="nlist">
<div class="aa1"><a  href="<?php echo $vo["aurl"];?>" target="_blank" class="link2"><?php echo $vo["title"];?></a></div>
<div class="aa2"><?php echo date('Y-m-d',$vo["time"]); ?></div>
</div>
<?php } ?>


 <style type="text/css">
.dux-page1 {
    margin:10px 10px 10px 10px;
    float:left;

}
.dux-page {
    padding:0;
    margin:0;
}
.dux-page li {
    float:left;
    list-style:none;
    margin:2px;
    padding:0;
}
.dux-page a {
    margin:0 3px;
    line-height:30px;
    text-align:center;
    text-decoration:none;
    border-radius:3px;
    -moz-border-radius:3px;
    float:left;
    min-height:30px;
    min-width:30px;
    color:#858585;
    border:2px #e3e3e3 solid;
    border-radius:80%;
    font-size:15px;
}
.dux-page a:hover {
    border:2px #858585 solid;
    color:#858585;
}
.dux-page .title {
    color:#555;
    margin:0;
    margin-right:4px;
    font-size:14px;
}
.dux-page .gap {
    color:#999;
    margin:0;
    margin-right:4px;
}
.dux-page .active-page {
    margin:0 3px;
    line-height:30px;
    text-align:center;
    text-decoration:none;
    border-radius:3px;
    -moz-border-radius:3px;
    float:left;
    font-weight:700;
    min-height:30px;
    min-width:30px;
    color:#262626;
    border:2px #119eda solid;
    border-radius:80%;
    font-size:15px;
    color:#119eda;
}
.dux-page .page {
    margin:0;
    padding:0;
}
.dux-page .prev {
}
.dux-page .next {
}

 </style>

<div class="dux-page1" >
  <div class="dux-page">
    <li><?php echo $page;?></li>
  </div>
</div>



 </div>
</div>

<?php $__Template->display("themes/168pc/yb"); ?>

</div>
      

  </body>

</html>
<?php $__Template->display("themes/168pc/foot"); ?>
";s:12:"compile_time";i:1517844184;}";