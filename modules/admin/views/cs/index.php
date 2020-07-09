<?php 

$token = md5('admin') . "@" . $user_id;

$js = <<<JS
	var wsServer = 'ws://192.168.198.101:9501?token=$token';
	var websocket = new WebSocket(wsServer);

	//发送消息到服务器
    function sendMsg(action, msg) {
    	websocket.send(JSON.stringify({
	        action: action,
	        msg: msg,
	        token: "$token"
	    }));
    }

    //浏览器发送通知
    function notice() {
    	if (!("Notification" in window)) {
		    alert("This browser does not support desktop notification");
		} else if (Notification.permission === "granted") {
	    	var notification = new Notification("您有新的消息，请注意查收!");
	    } else if (Notification.permission !== 'denied') {
	    	Notification.requestPermission(function (permission) {
	        	if (permission === "granted") {
	        		var notification = new Notification("您有新的消息，请注意查收!");
	      		}
	    	});
	    }
    }

    $('#subxx').click(function() {
    	var msg = $('.text input').val(); // 获取聊天内容
		msg = msg.replace(/\</g,'&lt;');
		msg = msg.replace(/\>/g,'&gt;');
		msg = msg.replace(/\\n/g,'<br/>');
		msg = msg.replace(/\[em_([0-9]*)\]/g,'<img src="/images/face/$1.gif" alt="" />');
		if(msg!='') {
			sends_message('绿巨人', 1, msg); // sends_message(昵称,头像id,聊天内容);
			// 滚动条滚到最下面
			$('.scrollbar-macosx.scroll-content.scroll-scrolly_visible').animate({
				scrollTop: $('.scrollbar-macosx.scroll-content.scroll-scrolly_visible').prop('scrollHeight')
			}, 500);
			sendMsg('sendMessage', msg);
		}

		$('.text input').val(''); // 清空输入框
		$('.text input').focus(); // 输入框获取焦点
    });

    $('#endSession').click(function() {
		sendMsg('endSession', '断开用户连接');
    });

    websocket.onmessage = function (evt) {
    	var res = JSON.parse(evt.data);
    	if (res.type == 0) {
    		receive_system_message(res.msg);
    		notice();
    	}

    	if (res.type == 1) {
    		receive_message('美国队长', 12, res.msg);
    	}

    	if (res.type == 2) {
    		sends_message('绿巨人', 1, res.msg);
    	}
	};

	websocket.onclose = function (evt) {
	    receive_system_message('系统提示：会话已结束');
	};

	websocket.onerror = function (evt, e) {
	    receive_system_message('系统提示：连接错误');
	};
JS;

$this->registerJs($js);

?>

<div class="scrollbar-macosx">
		<div class="header">
			<div class="toptext">
				<label id="endSession" style="cursor: pointer;">
					<span class="glyphicon glyphicon-remove"></span> 结束用户对话
				</label>
			</div>
		</div>
		<div class="main container">
			<div class="col-md-12">
				<ul class="chat_info">
				</ul>
			</div>
		</div>
		<div class="input">
			<div class="center">
				<div class="tools">
					<span class="glyphicon glyphicon-heart face_btn"></span>
					<!-- <span class="glyphicon glyphicon-picture imgFileico"></span>
					<input type="file" class="imgFileBtn hidden" accept="image/*"> -->
					<div class="faces popover fade top in">
						<div class="arrow"></div>
						<h3 class="popover-title">表情包</h3>
						<div class="popover-content scrollbar-macosx">
							<img src="/images/face/1.gif" alt="1">
							<img src="/images/face/2.gif" alt="2">
							<img src="/images/face/3.gif" alt="3">
							<img src="/images/face/4.gif" alt="4">
							<img src="/images/face/5.gif" alt="5">
							<img src="/images/face/6.gif" alt="6">
							<img src="/images/face/7.gif" alt="7">
							<img src="/images/face/8.gif" alt="8">
							<img src="/images/face/9.gif" alt="9">
							<img src="/images/face/10.gif" alt="10">
							<img src="/images/face/11.gif" alt="11">
							<img src="/images/face/12.gif" alt="12">
							<img src="/images/face/13.gif" alt="13">
							<img src="/images/face/14.gif" alt="14">
							<img src="/images/face/15.gif" alt="15">
							<img src="/images/face/16.gif" alt="16">
							<img src="/images/face/17.gif" alt="17">
							<img src="/images/face/18.gif" alt="18">
							<img src="/images/face/19.gif" alt="19">
							<img src="/images/face/20.gif" alt="20">
							<img src="/images/face/21.gif" alt="21">
							<img src="/images/face/22.gif" alt="22">
							<img src="/images/face/23.gif" alt="23">
							<img src="/images/face/24.gif" alt="24">
							<img src="/images/face/25.gif" alt="25">
							<img src="/images/face/26.gif" alt="26">
							<img src="/images/face/27.gif" alt="27">
							<img src="/images/face/28.gif" alt="28">
							<img src="/images/face/29.gif" alt="29">
							<img src="/images/face/30.gif" alt="30">
							<img src="/images/face/31.gif" alt="31">
							<img src="/images/face/32.gif" alt="32">
							<img src="/images/face/33.gif" alt="33">
							<img src="/images/face/34.gif" alt="34">
							<img src="/images/face/35.gif" alt="35">
							<img src="/images/face/36.gif" alt="36">
							<img src="/images/face/37.gif" alt="37">
							<img src="/images/face/38.gif" alt="38">
							<img src="/images/face/39.gif" alt="39">
							<img src="/images/face/40.gif" alt="40">
							<img src="/images/face/41.gif" alt="41">
							<img src="/images/face/42.gif" alt="42">
							<img src="/images/face/43.gif" alt="43">
							<img src="/images/face/44.gif" alt="44">
							<img src="/images/face/45.gif" alt="45">
							<img src="/images/face/46.gif" alt="46">
							<img src="/images/face/47.gif" alt="47">
							<img src="/images/face/48.gif" alt="48">
							<img src="/images/face/49.gif" alt="49">
							<img src="/images/face/50.gif" alt="50">
							<img src="/images/face/51.gif" alt="51">
							<img src="/images/face/52.gif" alt="52">
							<img src="/images/face/53.gif" alt="53">
							<img src="/images/face/54.gif" alt="54">
							<img src="/images/face/55.gif" alt="55">
							<img src="/images/face/56.gif" alt="56">
							<img src="/images/face/57.gif" alt="57">
							<img src="/images/face/58.gif" alt="58">
							<img src="/images/face/59.gif" alt="59">
							<img src="/images/face/60.gif" alt="60">
							<img src="/images/face/61.gif" alt="61">
							<img src="/images/face/62.gif" alt="62">
							<img src="/images/face/63.gif" alt="63">
							<img src="/images/face/64.gif" alt="64">
							<img src="/images/face/65.gif" alt="65">
							<img src="/images/face/66.gif" alt="66">
							<img src="/images/face/67.gif" alt="67">
							<img src="/images/face/68.gif" alt="68">
							<img src="/images/face/69.gif" alt="69">
							<img src="/images/face/70.gif" alt="70">
							<img src="/images/face/71.gif" alt="71">
							<img src="/images/face/72.gif" alt="72">
							<img src="/images/face/73.gif" alt="73">
							<img src="/images/face/74.gif" alt="74">
							<img src="/images/face/75.gif" alt="75">
						</div>
					</div>
				</div>
				<div class="text">
					<div class="col-xs-10 col-sm-11">
						<input type="text" class="form-control" placeholder="输入聊天信息...">
					</div>
					<div class="col-xs-2 col-sm-1">
						<a id="subxx" role="button"><span class="glyphicon glyphicon-share-alt"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>