<?php exit;?>0015505686218fba588f0b8eb67ffb043f7eed088b75s:25773:"a:2:{s:8:"template";s:25708:"<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun="" class="has-js">

	<head>
		<meta charset="utf-8" /><meta name="format-detection" content="telephone=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11" />
		<title>【<?php echo $parentCategoryInfo["name"];?><?php echo $categoryInfo["name"];?>】<?php echo $parentCategoryInfo["name"];?>号码 开奖结果查询 - <?php echo $sys["site_title"];?></title>
		<meta name="keywords" content="<?php echo $categoryInfo["keywords"];?>" />
		<meta name="distribution" content="<?php echo $categoryInfo["description"];?>" />
		<link rel="stylesheet" href="/themes/168pc/css/headorfood.css" />
		<link rel="stylesheet" href="/themes/168pc/css/pk10kai.css" />
		<link rel="stylesheet" href="/themes/168pc/css/calendar.css" />
		<link rel="shortcut icon" href="/themes/168pc/img/icon/168favicon.ico/v=2017981058.html">
		<link rel="stylesheet" href="/themes/168pc/css/user_adv.css" />
		
	</head>

	<body>
		<div class="bodybox pk10lzzhfxymbox daxiaodsbox zsbox">
					<?php $__Template->display("themes/168pc/head"); ?>
			<div class="haomabox">
				<div class="waring" id="waringbox">
					<div class="flash"><i></i></div>
					温馨提示：因网络问题，开奖结果会有延迟，所以您需要去喝杯咖啡等一会儿！
				</div>
			<div class="haomaqu" id="pk10">
					<div class="haomaqubox">
						<div class="haomaqul">
							<div class="haomaline">
								<div class="haomaimg">
									<a href="<?php echo $parentCategoryInfo["urlname"];?>.html"><img src="<?php echo $parentCategoryInfo["image"];?>" /></a>
								</div>
								<div class="numberqu">
									<div class="nuberqutit">
										<div class="divl">
											<a href="<?php echo $parentCategoryInfo["urlname"];?>.html"><span class="pk10tit">北京PK拾</span></a>第<span class="redfont preDrawIssue"></span>期&nbsp;开奖
										</div>
										<div class="divr">
											全天<span class="totalCount">...</span>期，当前<span class="drawCount">...</span>期,剩<span class="sdrawCount">...</span>期
										</div>
									</div>
									<div class="kajianhao">
										<ul id="jnumber" class="numberbox">
											<li class="nub02 "></li>
											<li class="nub01 "></li>
											<li class="nub10 "></li>
											<li class="nub04 "></li>
											<li class="nub03 "></li>
											<li class="nub06 "></li>
											<li class="nub07 "></li>
											<li class="nub08 "></li>
											<li class="nub05 "></li>
											<li class="nub09 li_after"></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="haomaqur">
							<div class="line linetime" id="timebox">
								<div class="opening opentyle">开奖中...</div>
								<div class="clock cuttime">
									距&nbsp;&nbsp;<span class="nextIssue"></span>&nbsp;&nbsp;期开奖仅有
									<span class="bgtime hour">0</span>
									<span class="hourtxt">时</span>
									<span class="bgtime minute">0</span>
									<span>分</span>
									<span class="bgtime second">0</span>
									<span>秒</span>
								</div>
							</div>
						</div>
					</div>
					<div class="hreflist">
						<ul>
							<li>
								<a href="/<?php echo $parentCategoryInfo["urlname"];?>.html">即时开奖</a>
							</li>
							<?php $listList = service("duxcms","Label","categoryList",array( "app"=>"DuxCms", "label"=>"categoryList", "parent_id"=>4, "limit"=>100));  if(is_array($listList)) foreach($listList as $list){ ?>
  <?php if ($list['class_id']==$categoryInfo['class_id']){ ?>
    <li class="checked"><a href="<?php echo $list["curl"];?>" title="<?php echo $list["name"];?>">
					<span class="n"><?php echo $list["name"];?></span></a></li>
  <?php }else{ ?>
  
    <li><a href="<?php echo $list["curl"];?>" title="<?php echo $list["name"];?>"><i class="icon_global icon_<?php echo $list["i"];?>"></i>
					<span class="n"><?php echo $list["name"];?></span></a></li>
  <?php } ?>
<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="zhlzbox margt20">
				<div class="listhead">
					<div class="listheadl">
						<span class="lmms"><i>3</i>位置走势</span>
					</div>
					<div class="listheadr">
						<!--<div class="listheadrr">
							<div class="rightime">
								<div id="dateframe">
									<input type="text" class="date" placeholder="">
									<div id="datebox"></div>
									<i class="dropicond"></i>
								</div>
							</div>
							<div>选择日期&nbsp;</div>
						</div>-->
						<div class="listheadrl">
							<span id="today">今天</span>
							<span id="yesterday">昨天</span>
							<span id="qianday">前天</span>
							<span id="thirty" class="checked">最近30期</span>
							<span id="sixty">最近60期</span>
							<span id="ninety">最近90期</span>
						</div>
					</div>
				</div>
				<div class="listbox">
					<div class="checkbox">
						<div id="biaozxz" class="checkbtnzh checkbtnmc">
							<ul class="xuanzhemc">
								<li class="mctitle">选择名次：</li>
								<li class="sinli selected"><span>1</span>
									<a href="javascript:void(0)">冠军</a>
								</li>
								<li class="sinli"><span>2</span>
									<a href="javascript:void(0)">亚军</a>
								</li>
								<li class="sinli"><span>3</span>
									<a href="javascript:void(0)">第三名</a>
								</li>
								<li class="sinli"><span>4</span>
									<a href="javascript:void(0)">第四名</a>
								</li>
								<li class="sinli"><span>5</span>
									<a href="javascript:void(0)">第五名</a>
								</li>
								<li class="sinli"><span>6</span>
									<a href="javascript:void(0)">第六名</a>
								</li>
								<li class="sinli"><span>7</span>
									<a href="javascript:void(0)">第七名</a>
								</li>
								<li class="sinli"><span>8</span>
									<a href="javascript:void(0)">第八名</a>
								</li>
								<li class="sinli"><span>9</span>
									<a href="javascript:void(0)">第九名</a>
								</li>
								<li class="sinli"><span>10</span>
									<a href="javascript:void(0)">第十名</a>
								</li>
							</ul>
							<ul>
								<li class="title">标注选择：</li>
								<li class="sinli checked"><i>1</i>
									<a href="javascript:void(0)">遗漏</a>
								</li>
								<li class="sinli checked"><i>2</i>
									<a href="javascript:void(0)">拆线</a>
								</li>
								<li class="sinli"><i>3</i>
									<a href="javascript:void(0)">遗漏分层</a>
								</li>
								<li class="sinli"><i>4</i>
									<a href="javascript:void(0)">分隔线</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="listcontent">
						<div class="box">
							<div id="waitBox" class="bastren w1200">
								<div id="chartLinediv" style="position:relative;*position:static;">
									<table id="table_weizhi1" width="100%" border="0" cellpadding="0" cellspacing="0" style="display: table;">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">冠军分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi2" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">亚军分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi3" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第三名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi4" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第四名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi5" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第五名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi6" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第六名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi7" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第七名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi8" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第八名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi9" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第九名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<table id="table_weizhi10" width="100%" border="0" cellpadding="0" cellspacing="0">
										<thead>
											<tr class="first_th">
												<th rowspan="2" width="85" height="38" class="left_border left_b left_strong_down">期号</th>
												<th rowspan="2" width="215">开奖号码</th>
												<th colspan="10" width="40">第十名分布</th>
												<th colspan="6" width="40">形态特征</th>
												<th colspan="3" width="40">012路</th>
												<th colspan="3" width="40">升平降</th>
											</tr>
											<tr class="second_th">
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">3</th>
												<th width="40">4</th>
												<th width="40">5</th>
												<th width="40">6</th>
												<th width="40">7</th>
												<th width="40">8</th>
												<th width="40">9</th>
												<th width="40">10</th>
												<th width="40">奇</th>
												<th width="40">偶</th>
												<th width="40">大</th>
												<th width="40">小</th>
												<th width="40">质</th>
												<th width="40">合</th>
												<th width="40">0</th>
												<th width="40">1</th>
												<th width="40">2</th>
												<th width="40">升</th>
												<th width="40">平</th>
												<th width="40">降</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>

								</div>
								<div id="chartbottom" style="display: none;">
									<table>
										<tr class="first_th">
											<th rowspan="2" colspan="2" width="85" height="38" class="left_border left_b left_strong_down">数据统计</th>
											<th colspan="10" width="40">冠军分布</th>
											<th colspan="6" width="40">形态特征</th>
											<th colspan="3" width="40">012路</th>
											<th colspan="3" width="40">升平降</th>
										</tr>
										<tr class="second_th">
											<th width="40">1</th>
											<th width="40">2</th>
											<th width="40">3</th>
											<th width="40">4</th>
											<th width="40">5</th>
											<th width="40">6</th>
											<th width="40">7</th>
											<th width="40">8</th>
											<th width="40">9</th>
											<th width="40">10</th>
											<th width="40">奇</th>
											<th width="40">偶</th>
											<th width="40">大</th>
											<th width="40">小</th>
											<th width="40">质</th>
											<th width="40">合</th>
											<th width="40">0</th>
											<th width="40">1</th>
											<th width="40">2</th>
											<th width="40">升</th>
											<th width="40">平</th>
											<th width="40">降</th>
										</tr>
									</table>
								</div>
							</div>

						</div>
						<div class="infortxt">
							<p>奇偶：除2余数为1的为奇数，含1、3、5、7、9，除2余0的为偶数，含2、4、6、8、10。</p>
							<p>大小：6、7、8、9、10为大数，1、2、3、4、5为小数。</p>
							<p>质合：1、2、3、5、7为质数，4、6、8、9、10为合数。</p>
							<p>012路：除3余数为0的为0路号码，包含3、6、9,；除3余数为1的为1路号码，包含1、4、7、10；除3余数为2的为2路号码，包含2、5、8。</p>
							<p>升平降：比上期奖号数值大的，表示本期奖号特征为升；与上期相同的，表示本期奖号特征为平；比上期奖号数值小的，表示本期奖号特征为降。</p>
							<p>分隔线：每五期使用分隔线，使横向导航更加清晰。</p>
							<p>出现总次数：统计期数内实际出现的次数。</p>
							<p>遗漏：自上期开出到本期间隔的期数。</p>
							<p>平均遗漏：统计期数内遗漏的平均值。（计算公式：平均遗漏＝统计期数/(出现次数+1)。）</p>
							<p>最大遗漏：统计期数内遗漏的最大值。</p>
							<p>当前遗漏：自上期开出到当前期所间隔的期数。</p>
							<p>最大连出值：统计期数内连续开出的最大值。</p>
						</div>

					</div>
				</div>
			</div>
								<?php $__Template->display("themes/168pc/foot"); ?>

			
	</body>
	<script src="/themes/168pc/js/lib/bootstrap-3.3.0/js/tests/vendor/jquery.min.js"></script>
	<script src="/themes/168pc/js/lib/bootstrap-3.3.0/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/lib/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/lib/calendar.js"></script>
	<script type="text/javascript" charset="utf-8" src="/themes/168pc/js/lib/drawLines.js"></script>
	<script type="text/javascript" charset="utf-8" src="/themes/168pc/js/lib/jquery.async.js"></script>
	<script type="text/javascript" charset="utf-8" src="/themes/168pc/js/lib/pk10BaseTrend.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/lib/config.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/loacal/animate/animate.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/lib/GA.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/loacal/pk10/pk10_weizhizs.js"></script>
	<script type="text/javascript" src="/themes/168pc/js/loacal/pk10/pk10_kai.js"></script>

</html>";s:12:"compile_time";i:1519032621;}";