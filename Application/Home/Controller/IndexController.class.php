<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController{

    public function index(){
    		/**
 *   //获取菜单操作:
 *   $menu = $weObj->getMenu();
 *   //设置菜单
 *   $newmenu =  array(
 *          "button"=>
 *              array(
 *                  array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
 *                  array('type'=>'view','name'=>'我要搜索','url'=>'http://www.baidu.com'),
 *                  )
 *          );
 *   $result = $weObj->createMenu($newmenu);
 */
    		$options = array(
    				'token' => C('WX_TOKEN'),
    				'appid' => C('WX_APPID'),
    				'appsecret' => C('WX_APPSECRET'),
    				'redirect_uri' => C('redirect_uri'),

						'DB_HOST'               =>  C('DB_HOST'), // 服务器地址
						'DB_NAME'               =>  C('DB_NAME'),          // 数据库名
						'DB_USER'               =>  C('DB_USER'),      // 用户名
						'DB_PWD'                =>  C('DB_PWD'),          // 密码
						'DB_PORT'               =>  C('DB_PORT'),        // 端口

    		);
    		
    		$weObj = new \Extend\Wechat($options);


 		   	if (!isset($_GET['echostr'])) {


 		   			$redirect_uri = $weObj->getOauthRedirect($options['redirect_uri'], 'STATE');
 		   			// echo $redirect_uri;
 		   			$user_array = $weObj->getOauthAccessToken();
 		   			// print_r($user_array);
 		   			$user_info = $weObj->getOauthUserinfo($user_array['access_token'], $user_array['openid']);
 		   			print_r($user_info);


 		   			$data = array (
	     	      'button' => array (
	     	        0 => array(
	     	        	'name' => '测试',
	     	        	'sub_button' => array (
	     	        		0 => array (
			     	          'type' => 'click',
			     	          'name' => '点击事件',
			     	          'key' => 'test'
		     	        	),
		     	        	1 => array (
			     	          'type' => 'view',
			     	          'name' => '后台',
			     	          'url' => 'http://www.ldxjc.com/admin.php'
		     	        	),
		     	        	2 => array(
		     	        		'type' => 'view',
		     	        		'name' => '用户信息',
		     	        		'url' => 'http://www.ldxjc.com/user.php'
		     	        	),
		     	        	3 => array(
		     	        		'type' => 'view',
		     	        		'name' => '授权拉取用户信息',
		     	        		'url' => $redirect_uri
		     	        	)
	     	        	)
	     	        ),
	     	        1 => array(
	     	        	'name' => '各种',
	     	        	'sub_button' => array (
	     	        		0 => array (
			     	          'type' => 'click',
			     	          'name' => '点击事件2',
			     	          'key' => 'abc'
		     	        	),
		     	        	1 => array (
			     	          'type' => 'location_select',
			     	          'name' => '发送位置',
			     	          'key' => 'send_location'
		     	        	)
	     	        	)
	     	        ),
	     	        2 => array(
	     	        	'name' => '菜单',
	     	        	'sub_button' => array (
	     	        		0 => array (
			     	          'type' => 'location_select',
			     	          'name' => '绑定1',
			     	          'key' => 'rselfmenu_2_0'
		     	        	),
		     	        	1 => array (
			     	          'type' => 'view',
			     	          'name' => '一键导航',
			     	          'url' => 'http://apis.map.qq.com/uri/v1/routeplan?type=drive&from=我的位置&fromcoord=39.980683,116.302&to=中关村&tocoord=39.9836,116.3164&policy=1&referer=myapp'
		     	        	)
	     	        	)
	     	        )
	     	      )
	     	  	);

						// print_r($data);die();

						// $weObj->deleteMenu();
						
						// $darray = $weObj->getMenu();
						// print_r($darray);die();

						// $weObj->createMenu($data);



				    $type = $weObj->getRev()->getRevType();

				    switch($type) {
	 	          case \Extend\Wechat::MSGTYPE_TEXT:
	 	          		$text = $weObj->getRev()->getRevContent();

	 	          		if($text == '二维码'){
	 	          			$t_array = $weObj->getQRCode('722776', 0, '1800');
	 	          			$ticket = $t_array['ticket'];
	 	          			$url = $weObj->getQRUrl($ticket);
	 	          			$flag = $weObj->downFromUrl($url, "C:/test/forfunq/", "test.jpg");

	 	          			$weObj->text("$flag")->reply();
	 	          		}

	 	          		if($text == '图文'){
	 	          			$newdata = array(
	 	          						'0' => array(
	 	          									'Title'=>'这里是标题',
	 	          									'Description'=>'summary text',
	 	          									'PicUrl'=>'http://www.ldxjc.com/qrcode.jpg',
	 	          									'Url'=>'http://www.ldxjc.com/1.html'
	 	          							),
	 	          						'1' => array(
	 	          									'Title'=>'登陆管理后台',
	 	          									'Description'=>'屏幕自适应的管理后台，很强大！',
	 	          									'PicUrl'=>'http://www.ldxjc.com/qrcode.jpg',
	 	          									'Url'=>'http://www.ldxjc.com/admin.php'
	 	          							),
	 	          				);

	 	          			$weObj->news($newdata)->reply();
	 	          		}

	 	              $weObj->text("$text")->reply();
	 	              exit;
	 	              break;
	 	          case \Extend\Wechat::MSGTYPE_IMAGE:
	 	          		$image = $weObj->getRev()->getRevPic();

	 	          		$url = $image["picurl"];
	 	          		$mediaid = $image["mediaid"];
	 	          		
	 	          		//将图片下载到本地
	 	          		// $flag = $weObj->downFromUrl($url, "", $mediaid.".jpg");
 	          			// $weObj->text("$flag")->reply();

 	          			$weObj->image($mediaid)->reply();
	 	          		exit;
	 	          		break;
	 	          case \Extend\Wechat::MSGTYPE_EVENT:
	 	              $event = $weObj->getRev()->getRevEvent();
	 	              if($event['event'] == 'subscribe'){
	 	              		$weObj->text("欢迎关注forfunq！")->reply();
	 	              }
	 	              if($event['event'] == 'CLICK'){
	 	              		if($event['key'] == 'test'){
	 	              				$weObj->text("click key is test")->reply();	
	 	              		}else{
	 	              				$weObj->text("asdkfasdf")->reply();
	 	              		}
	 	              }
	 	              // $text = $event['event']."~".$event['key'];
	 	              // $weObj->text("$text")->reply();
	 	              break;
	 	          case \Extend\Wechat::MSGTYPE_LOCATION:
	 	          		//坐标和地理位置
	 	              $location = $weObj->getRev()->getRevGeo();
	 	              //$weObj->text($location['x']."-".$location['y']."-".$location['scale']."-".$location['label'])->reply();
	 	              
	 	              $locate_url = "http://apis.map.qq.com/uri/v1/routeplan?type=drive&from=我的位置&fromcoord=".$location['x'].",".$location['y']."&to=中关村&tocoord=39.9836,116.3164&policy=1&referer=myapp";
	 	              $newdata = array(
	 	          						'0' => array(
	 	          									'Title'=>'一键导航',
	 	          									'Description'=>'summary text',
	 	          									'PicUrl'=>'http://www.ldxjc.com/qrcode.jpg',
	 	          									'Url'=>$locate_url
	 	          							)
	 	          				);

	 	          		$weObj->news($newdata)->reply();

	 	              break;
	 	          default:
	 	              $weObj->text("~~~~")->reply();
 	   				}
				}else{
				    $weObj->valid();
				}


























    }






















}
