
var memBerImg = {};
var orderTotalNum = {};
var robotRank = {};
var artWriter = {};
var nextRbtImg = {};
//********************//
// ===== 撈訂單 ===== //
//********************//

//撈商城訂單主要
function getMyOrder() {
	var myOrderTable = document.getElementById('myorder-table');  //外面的大表格

	$.ajax({
		url: 'js/orderData.php',
		async: false,
		type: 'POST',
		dataType: 'json',
		success: function (data) {
			// console.log(data);
			if (data.length != 0) { //有撈到購物資料 = 曾經購物過

				for (var i = 0; i < data.length; i++) {


					//訂單查詢--外面資料//
					var proTrList = document.createElement('tr');
					// proTrList.setAttribute('id','orderNo='+ data[i].orderNo);
					myOrderTable.appendChild(proTrList);
					var orderNoTd = document.createElement('td');
					orderNoTd.className = 'td-ordernum';
					orderNoTd.innerHTML = data[i].orderNo;
					proTrList.appendChild(orderNoTd);

					var orderDateTd = document.createElement('td');
					orderDateTd.className = 'td-orderdate';
					orderDateTd.innerHTML = data[i].orderDate;
					proTrList.appendChild(orderDateTd);


					var orderStateTd = document.createElement('td');
					orderStateTd.className = 'td-orderstate';

					// console.log(data[i].orderState);

					if (data[i].orderState == '1') {
						data[i].orderState = "已出貨";
					} else {
						data[i].orderState = "處理中";
					}
					orderStateTd.innerHTML = data[i].orderState;
					proTrList.appendChild(orderStateTd);

					var orderIDetailTd = document.createElement('td');
					orderIDetailTd.className = 'td-orderdetail';
					orderIDetailTd.innerHTML = '<img src="img/img-memCenter/file (1).png">';
					orderIDetailTd.setAttribute('id', 'orderNoTd=' + data[i].orderNo);

					orderIDetailTd.addEventListener('click', function () {
						document.getElementById('orderlightbox-wrap').style.display = 'block';
					})
					proTrList.appendChild(orderIDetailTd);
					//訂單查詢--外面資料//


				}//for的尾巴

			} else {  //沒撈到 =  引導他去買
				$('#noOrderData').show();
			}//else
		}, //success
		error: function () {
			// alert('沒撈到喔');
		},
	});//ajax的尾巴
}//getMyOrder的尾巴


//撈商城訂單明細

//1.撈出來
//2.判斷他orderNo
//3.點選明細小圖 出現對應的訂單明細
var orderDetailBag = {};
function getMyOrderDetail() {
	var myOrderDetailTable = document.getElementById('orderdetails-table-top');  //燈箱內表格上(放訂購資料)
	var myOrderItemsTable = document.getElementById('orderdetails-table-bottom');  //燈箱內表格下(放產品)
	var detailExist = null;


	$.ajax({
		url: 'js/orderDataDetail.php',
		type: 'POST',
		dataType: 'json',
		success: function (data) {
			// console.log(data);
			if (data.length != 0) {  //如果data有長度 代表有明細

				$.each(data, function (i, o) {
					orderDetailBag[o.orderNo] = o;
				})//抓資料each的尾巴

				//得到現在是點哪一張訂單?
				$('.td-orderdetail').click(function () {
					nowdetail = {}
					nowdetail.id = $(this).attr('id').split('=')[1];

					if (nowdetail.id == orderDetailBag[nowdetail.id].orderNo) {
						$('#orderDetailOrderNo').html(orderDetailBag[nowdetail.id].orderNo);
						$('#orderDetailOrderDate').html(orderDetailBag[nowdetail.id].orderDate);
						$('#orderDetailOrderReceiver').html(orderDetailBag[nowdetail.id].orderReceiver);
						$('#orderDetailOrderAddr').html(orderDetailBag[nowdetail.id].orderAddr);

					}

					for (var j = 0; j < data.length; j++) {
						if (nowdetail.id == data[j].orderNo) {

							var proitemTr = document.createElement('tr');
							proitemTr.className = 'trExist';
							proitemTr.setAttribute('id', 'exist' + data[j].orderNo);

							document.getElementById('orderdetails-table-bottom').appendChild(proitemTr);

							var prodNameTd = document.createElement('td');
							prodNameTd.innerHTML = data[j].prodName;
							proitemTr.appendChild(prodNameTd);

							var prodImgTd = document.createElement('td');
							prodImgTd.className = 'proItem-pic';
							proitemTr.appendChild(prodImgTd);

							var prodImdFrame = document.createElement('div');
							prodImdFrame.className = 'proItem';
							prodImgTd.appendChild(prodImdFrame);

							var prodImgIn = document.createElement('img');
							prodImgIn.setAttribute('src', 'js/propic/' + data[j].prodImg);
							prodImdFrame.appendChild(prodImgIn);

							var prodQtyTd = document.createElement('td');
							prodQtyTd.innerHTML = data[j].prodQty;
							proitemTr.appendChild(prodQtyTd);

							var prodPriceTd = document.createElement('td');
							prodPriceTd.innerHTML = '$' + data[j].prodPrice;
							proitemTr.appendChild(prodPriceTd);

							var prodSubtotalTd = document.createElement('td');
							prodSubtotalTd.innerHTML = '$' + data[j].prodQty * data[j].prodPrice;
							prodSubtotalTd.className = 'prodSubtotalIn';
							prodSubtotalTd.setAttribute('subtotalnumber', data[j].prodQty * data[j].prodPrice);
							proitemTr.appendChild(prodSubtotalTd);

							//算小計
							var orderTotalNum = document.getElementsByClassName('prodSubtotalIn');
							totalNumber = 0;
							for (let k = 0; k < orderTotalNum.length; k++) {
								subnumber = parseInt(orderTotalNum[k].getAttribute('subtotalnumber'));
								totalNumber += subnumber;
							}
							orderTotalNum.money = totalNumber;
							document.getElementById('orderTotal').innerHTML = '$' + totalNumber + '元';

						}
					}//for的尾巴

					TweenMax.fromTo('#orderlightbox-wrap', .2, {
						opacity: 0,
					}, {
							opacity: 1,
						})


				})//得到現在是點哪一張訂單的尾巴

			} else {  //撈不到代表沒買過
				// $('#noOrderData').show();
			}//else的尾巴
		},//success的尾巴
		error: function () {
			// console.log(data);
			// alert('沒撈到喔');
		},
	});//ajax的尾巴
}//getMyOrderDetail的尾巴

//********************//
// ===== 撈訂單 ===== //
//********************//


//***********************//
// ===== 撈收藏文章 ===== //
//***********************//
function getMySave() {
	var mySaveTable = document.getElementById('mylike-table');
	$.ajax({
		url: 'js/articleSave.php',
		type: 'POST',
		async: false,
		dataType: 'json',
		success: function (data) {
			if (data.length != 0) { //有撈到收藏文章
				// console.log(data);

				for (let i = 0; i < data.length; i++) {
					var artList = document.createElement('tr');
					artList.setAttribute('id', 'artListId|' + data[i].postNo);
					mySaveTable.appendChild(artList);
					var artTilteTd = document.createElement('td');
					artTilteTd.className = 'td-arttitle';
					artList.appendChild(artTilteTd);

					var artTilteTdLink = document.createElement('a');
					artTilteTdLink.innerHTML = data[i].postTitle;
					artTilteTdLink.setAttribute('href', '#');
					artTilteTd.appendChild(artTilteTdLink);

					var artWriterTd = document.createElement('td');
					artWriterTd.setAttribute('id', 'postId|' + data[i].postNo);
					artList.appendChild(artWriterTd);

					var artDaterTd = document.createElement('td');
					artDaterTd.innerHTML = data[i].postTime.split(' ')[0];
					artList.appendChild(artDaterTd);
					var artDelTd = document.createElement('td');
					artDelTd.className = 'td-artdel';
					artDelTd.innerHTML = '<img src="img/img-memCenter/XX.png">';
					artDelTd.setAttribute('id', 'postNoImg' + data[i].postNo);
					artList.appendChild(artDelTd);

				}//for的尾巴
			} else { //還沒有收藏文章
				$('#noLikeData').show();
			}
		},//success的尾巴
		error: function (data) {
			// alert('54');
		},
	});//ajax的尾巴
}//getMySave的尾巴

//撈出作者
function getArtWriter() {

	$.ajax({
		url: 'js/getArtWriter.php',
		type: 'POST',
		async: false,
		dataType: 'json',
		success: function (data) {
			// console.log(data);
			$.each(data, function (i, o) {
				artWriter[o.postNo] = data[i].memName;
				for (let w = 0; w < data.length; w++) {
					// console.log(artWriter[3]);
					// console.log(o.postNo);
					// console.log(data[1].postNo);
					// console.log(document.getElementById('postId|'+data[1].postNo));
					if (data[w].postNo == o.postNo) {
						document.getElementById('postId|' + data[w].postNo).innerHTML = artWriter[o.postNo];
					}
				}
			})//each的尾巴
		},
		error: function () {

		},
	})//ajax的尾巴
}//getArtWriter的尾巴


//按移除收藏
function deleteMySave() {
	$('.td-artdel').click(function () {
		var delPostNo = $(this).parent().attr('id').split('|')[1];
		// console.log(delPostNo);
		$(this).parent().remove();
		$.ajax({
			url: 'js/delMySave.php',
			type: 'POST',
			async: false,
			data: {
				'postNo': delPostNo,
			},
			dataType: 'text',
			success: function (data) {
				// console.log(data);
				if (data.indexOf('error') == -1) {
					$('#loginstate-wrap').show();
					$('#state-pic-V').show();
					$('#state-pic-X').hide();
					$('#state-con-inner').html('已經幫您移除收藏囉');
				} else {

				}
			},
			error: function () {
			},
		})//ajax的尾巴
	})//XX被按的尾巴
}//deleteMySave的尾巴

//***********************//
// ===== 撈收藏文章 ===== //
//***********************//


//***********************//
//  ===== 上傳頭像 =====  //
//***********************//
//1.show頭像在框框裡
//2.送php傳回server 並改變檔名
//3.送回去DB內 並顯示異動成功

//1.show頭像在框框裡//
function showYourImg() {
	document.getElementById("upFile").onchange = function (e) {
		var file = e.target.files[0];
		var reader = new FileReader();
		reader.onload = function () {
			document.getElementById("showimg-in").src = reader.result;
		}
		reader.readAsDataURL(file);
	};
}
//2.送php傳回server 並存到session內
function sendImgtoServer() {

	var xhr = new XMLHttpRequest();
	xhr.onload = function () {
		if (xhr.status == 200) {
			if (xhr.responseText.indexOf('error') > -1) {
				// console.log('session new img = ' + xhr.responseText);
				memBerImg.img = xhr.responseText;
				$('#loginstate-wrap').show();
				$('#state-pic-X').show();
				$('#state-pic-V').hide();
				$('#state-con-inner').html('檔案太大了耶～<br>再試試別張吧');
			} else {
				sendImgToDb();
				$('#loginstate-wrap').show();
				$('#state-pic-X').hide();
				$('#state-pic-V').show();
				$('#state-con-inner').html('大頭貼更新成功');
			}
		} else {
			// alert('沒撈到喔');
		}
	}
	var myImgForm = document.getElementById("myImgForm");
	var formData = new FormData(myImgForm);  //Formdata 是一個類別 (內建的)~~~~~
	xhr.open("post", "js/fileUpload.php", false);
	xhr.send(formData);

}
//3.送回去DB內 並顯示異動成功
function sendImgToDb() {
	$.ajax({
		url: 'js/sendImgToDb.php',
		type: 'POST',
		dataType: 'text',
		success: function (data) {
			// console.log(data);
			if (data.indexOf('error') > -1) {
				// alert('寫入失敗');
			} else {
				// alert('寫入成功');
			}
		},//success 的尾巴
		error: function () {
			alert();
		},
	});
}

function showYourmemImg() {
	$('#showimg-in').attr('src', memberData.ourMemImg);
}
//***********************//
//  ===== 上傳頭像 =====  //
//***********************//

//***********************//
//  ===== 修改資訊 =====  //
//***********************//
function editYourData() {
	//1.把會員在session的資料綁進value內
	//2.資料驗證
	//3.用ajax送去資料庫
	//4.改掉目前input內的名字
	var memName = document.getElementById('memName');
	var memEmail = document.getElementById('memEmail');
	memName.value = memberData.ourMemName;
	memEmail.value = memberData.ourMemEmail;

	memName.addEventListener('input', editYourDetail);
	memEmail.addEventListener('input', editYourDetail);

	function editYourDetail() {
		var newName = memName.value;
		var newEmail = memEmail.value;
		// console.log(newEmail);



		document.getElementById('editNormalData').addEventListener('click', sendNormalDataToDb);

		function sendNormalDataToDb() {
			if (newName.length > 5) {
				$('#loginstate-wrap').show();
				$('#state-pic-X').show();
				$('#state-pic-V').hide();
				$('#state-con-inner').html('名字最多五個字唷');
			} else {
				var xhr = new XMLHttpRequest();
				xhr.onload = function () {
					if (xhr.status == 200) {
						if (xhr.responseText.indexOf('error') == -1) {

							$('#loginstate-wrap').show();
							$('#state-pic-X').hide();
							$('#state-pic-V').show();
							$('#state-con-inner').html('已經更新個人資料囉');
							memCenterLink.innerHTML = newName + ',您好';
						} else {
							$('#loginstate-wrap').show();
							$('#state-pic-X').show();
							$('#state-pic-V').hide();
							$('#state-con-inner').html('系統錯誤<br>請聯絡TEL : +886-2-2222-2222');
						}
					} else {
						alert();
					}//系統錯誤
				};//xhr.onload的尾巴
				var url = "js/editYourData.php";
				xhr.open("post", url, false);
				xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
				var memberNew = {};
				memberNew.memNewName = newName;
				memberNew.memNewEmail = newEmail;
				var data_info = "jsonStr=" + JSON.stringify(memberNew);
				xhr.send(data_info);

			}

		}//sendNormalDataToDb的尾巴
	}//editYourDetail的尾巴
}//editYourData的尾巴

//***********************//
//  ===== 修改資訊 =====  //
//***********************//



//***********************//
//  ===== 修改密碼 =====  //
//***********************//
function editYourPsw() {
	//1.驗證兩個密碼是否一樣
	//2.用ajax送去資料庫
	//3.提示成功
}
//***********************//
//  ===== 修改密碼 =====  //
//***********************//


//***************************//
//  ===== 撈我的機器人 =====  //
//***************************//
var robotData = {};

function getMyRobot() {
	$.ajax({
		url: 'js/myRobot.php',
		async: false,
		type: 'POST',
		dataType: 'json',
		success: function (data) {
			// console.log(data);
			if (data.length != 0) { //代表有撈到
				//1.動態產生機器人小圖
				//2.得到小圖的id
				//3.顯示我點到的小圖他的資訊
				//4.訂單查詢出現明細


				$.each(data, function (i, o) {
					robotData[o.rbtNo] = o;
				})


				//1.動態產生小圖
				for (var k = 0; k < data.length; k++) {
					var otherrobotItem = document.createElement('div');
					otherrobotItem.className = 'otherrobot-item';
					otherrobotItem.setAttribute('rbtNo', data[k].rbtNo);
					otherrobotItem.setAttribute('id', 'rbtNo|' + data[k].rbtNo);
					document.getElementById('myrobot-item-section').appendChild(otherrobotItem);
					var otherrobotPic = document.createElement('div');
					otherrobotPic.className = 'otherrobot-pic';
					otherrobotItem.appendChild(otherrobotPic);
					var otherRobotImg = document.createElement('img');
					otherRobotImg.setAttribute('src', data[k].rbtImg);
					otherrobotPic.appendChild(otherRobotImg);
					var otherrobotName = document.createElement('div');
					otherrobotName.className = 'otherrobot-name';
					otherrobotName.innerHTML = data[k].rbtName;
					otherrobotItem.appendChild(otherrobotName);



					//進來後預設是第一個被點擊
					$(function () {
						$('.otherrobot-item')[0].click();
					})

					//客製化訂單查詢產生
					var custTr = document.createElement('tr');
					document.getElementById('mycustorder-table').appendChild(custTr);
					var custrbtNo = document.createElement('td');
					custrbtNo.innerHTML = data[k].rbtNo;
					custTr.appendChild(custrbtNo);

					var custrbtDate = document.createElement('td');
					custrbtDate.innerHTML = data[k].rbtOdTime;
					custTr.appendChild(custrbtDate);

					var custrbtName = document.createElement('td');
					custrbtName.innerHTML = data[k].rbtName;
					custTr.appendChild(custrbtName);


					if (data[k].rbtOdState == '1') {
						data[k].rbtOdState = '已出貨';
					} else {
						data[k].rbtOdState = '處理中';
					}
					var custrbtState = document.createElement('td');
					custrbtState.innerHTML = data[k].rbtOdState;
					custTr.appendChild(custrbtState);
				}//for的尾巴




				//2.得到小圖的id   //3.顯示我點到的小圖他的資訊  //4.bar的數值隨實際數值跑
				$('.otherrobot-item').click(function () {

					rbtId = $(this).attr('id').split('|')[1];
					// console.log('機器人id是 : ' + rbtId);



					//判斷你的能力總值
					//如果長度是1 前面補兩個0
					//如果長度是2 前面補一個0
					//如果長度是3 照舊

					if (robotData[rbtId].rbtAbility.length == 3) {
						robotData[rbtId].rbtAbility = robotData[rbtId].rbtAbility;
					} else if (robotData[rbtId].rbtAbility.length == 2) {
						robotData[rbtId].rbtAbility = '0' + String(robotData[rbtId].rbtAbility);
					} else {
						robotData[rbtId].rbtAbility = '00' + String(robotData[rbtId].rbtAbility)
					}

					//資料放入
					$('#myrobotname-now').html(robotData[rbtId].rbtName);
					$('#myrobotName').html(robotData[rbtId].rbtName);
					$('#myrobotBirth').html(robotData[rbtId].rbtBirth);
					$('#abilityNum').html(robotData[rbtId].rbtAbility);
					$('#myrobotBirth').html(robotData[rbtId].rbtOdTime);

					$('#num-INT').html(robotData[rbtId].rbtINT);
					$('#num-VIT').html(robotData[rbtId].rbtVIT);
					$('#num-AGI').html(robotData[rbtId].rbtAGI);

					//排名放入
					// console.log(rbtId);
					$('#nowRank').html('  ' + robotRank[rbtId] + '  ');

					//照片放入
					$('#myrobot-img').children().attr('src', robotData[rbtId].rbtImg);
					// hoverRbt = 你下一個摸的機器人
					// nextRbtImg.nextRbt = robotData[hoverRbt].rbtImg;


					//bar隨數值變動
					// $('#bar-INT').css({
					// 	'height': (robotData[rbtId].rbtINT / 100) * 15 + 'vw',
					// })
					// $('#bar-VIT').css({
					// 	'height': (robotData[rbtId].rbtVIT / 100) * 15 + 'vw',
					// })
					// $('#bar-AGI').css({
					// 	'height': (robotData[rbtId].rbtAGI / 100) * 15 + 'vw',
					// })

					$('#bar-INT').animate({
						'height': (robotData[rbtId].rbtINT / 100) * 15 + 'vw'
					}, 800
					)
					$('#bar-VIT').animate({
						'height': (robotData[rbtId].rbtVIT / 100) * 15 + 'vw'
					}, 800
					)
					$('#bar-AGI').animate({
						'height': (robotData[rbtId].rbtAGI / 100) * 15 + 'vw'
					}, 800
					)


					//計數版變數字
					var abilityNum1 = robotData[rbtId].rbtAbility.split('')[0];
					var abilityNum2 = robotData[rbtId].rbtAbility.split('')[1];
					var abilityNum3 = robotData[rbtId].rbtAbility.split('')[2];

					var number1 = $('.g-number')[0];
					var number2 = $('.g-number')[1];
					var number3 = $('.g-number')[2];

					setTimeout(function () {
						number1.setAttribute('data-digit', abilityNum1);
					}, 100);
					//控制第二個數字
					setTimeout(function () {
						number2.setAttribute('data-digit', abilityNum2);
					}, 100);
					//控制第三個數字
					setTimeout(function () {
						number3.setAttribute('data-digit', abilityNum3);
					}, 100);


				})//點小圖的尾巴

			} else { //代表沒撈到 = 沒客製過
				//1.客製化訂單查詢要引導他去客製化  2.一進來我的機器人 為空 引導他去客製化

				//1.客製化訂單查詢要引導他去客製化
				$('#nocustRobot').show();
				$('.myrobot-data').hide();
				$('.myrobot-chart').hide();
				$('.myrobot-btn').hide();

				$('#myrobot-img').children().attr('src', 'img/img-memCenter/norobot-d4-01-01.png');
				$('#myrobot-img').children().attr('id', 'norobotd4-pic');
				$('#myrobotname-now').html('快來客製化唷');

				$('#noCustOrderData').show();
			}

		},//success 的尾巴
		error: function () {
		},
	});//ajax的尾巴
}//getMyRobot的尾巴


function findNext() {
	var nextRbtImgNo = '';
	var hoverRbt = $('.otherrobot-item').hover(function () {
		// console.log($(this).attr('rbtno'));
		nextRbtImgNo = $(this).attr('rbtno');
		console.log('nextRbtImgNo是:' + nextRbtImgNo);
	})
	if (nextRbtImgNo == '') {
		console.log('還沒摸摸');
	} else {
		robotData.nextRbtImgNo = nextRbtImgNo;
	}
}




//點按機器人小圖 更換資訊
function chooseMyRobot() {
	$('.otherrobot-item').click(function () {
		$('.otherrobot-item').removeClass('otherrobot-nowrobot');
		$(this).addClass('otherrobot-nowrobot');
		// console.log($(this).attr('class'));


		//點換動畫
		TweenMax.fromTo('#rightHand', .4, {
			x: -5,
		}, {
				x: 30,
				repeat: 6,
				yoyo: true,
			})
		TweenMax.set('#rightHand', {
			x: 0,
			delay: 2.4
		})
		TweenMax.fromTo('#leftHand', .4, {
			x: 5,
		}, {
				x: -30,
				repeat: 6,
				yoyo: true,
			})
		TweenMax.set('#leftHand', {
			x: 0,
			delay: 2.4
		})

		TweenMax.fromTo('#myrobotname-now', .8, {
			opacity: 0,
			scale: 0,
			rotation: 0,
		}, {
				// delay: .2,
				scale: 1,
				rotation: 360,
				opacity: 1,
			})

		TweenMax.fromTo('#myrobot-img', .8, {
			scale: 0,
			y: 100,
			opacity: 0,
		}, {
				// delay: .2,
				scale: 1,
				opacity: 1,
				y: 0,
			})

	})
}

//機器人排名
function getMyRobotRank() {
	$.ajax({
		url: 'js/getMyRobotRank.php',
		async: false,
		type: 'POST',
		dataType: 'json',
		success: function (data) {
			$.each(data, function (i, o) {
				robotRank[o.rbtNo] = i + 1;
			})
		},//success 的尾巴
		error: function (xhr, ajaxOptions, thrownError) {
			$("body").append(xhr.status);
			$("body").append(xhr.responseText);
			alert(thrownError);
		},//error的尾巴
	});//ajax的尾巴
}//getMyRobot的尾巴

//***************************//
//  ===== 撈我的機器人 =====  //
//***************************//






function init() {
	//網頁load進來
	//1.撈機器人資料
	//2.撈訂單資料(資訊+明細)
	//3.撈收藏文章
	//4.撈資料修改(你的大頭貼 你的姓名 你的email)



	getMyOrder(); //撈訂單資訊
	getMyOrderDetail(); //撈訂單明細
	getMySave(); //撈收藏文章
	getArtWriter();//撈文章作者

	deleteMySave();//按了可以刪除收藏文章
	getMyRobotRank();//機器人排名
	getMyRobot(); //機器人資料
	chooseMyRobot();//選機器人
	showYourImg(); //將你選的照片show在框裡
	document.getElementById('edit-img-btn').addEventListener('click', sendImgtoServer);

	setTimeout(editYourData, 100);//秀你的資料
	setTimeout(showYourmemImg, 100)//撈你的照片







	// 點明細燈箱XX 燈箱消失 裡面的列清除
	$(function () {
		$('#orderdetails-cancel-btn').click(function () {
			$('#orderlightbox-wrap').hide();
			$('.trExist').remove();
		})
	})



	// 主要頁籤
	$(function () {
		$('.tag-item').click(function () {

			$('.tag-item').children().removeClass('clickTagShadow');
			$('.tag-item').removeClass('clickTagShadow');
			$('.tag-item').children().removeClass('clickTagIcon');
			$('.tag-item').children().removeClass('clickTag');
			$(this).children().addClass('clickTagShadow');
			$(this).addClass('clickTagShadow');
			$(this).children().addClass('clickTag');
			$(this).last().children().addClass('clickTagIcon');



			var tagId = $(this).attr('id').split('-');
			var tadIdAll = $(this).attr('id');
			var tagInner = document.getElementById(tadIdAll).innerText.split(' ');
			var titleIcon = document.getElementById('sub-title-icon').childNodes[1].getAttribute('src').split('+');
			var titleIconSrc = titleIcon[0] + '+' + tagId[0] + '.png';

			$('.content-item').hide();
			var contentId = "#content" + "-" + tagId[0];
			$(contentId).show();
			$('#sub-title-word').text(tagInner[0]);
			$('#sub-title-icon').children('img').attr('src', titleIconSrc);
			TweenMax.fromTo('.content-area', .5, {
				y: -1000,
				opacity: 0,
			}, {
					y: 0,
					opacity: 1
				})

		})

		//預設是我的機器人被按
		$('#myrobot-tag').click();
	})//主要頁籤

	//訂單頁籤
	$(function () {
		$('#custorder-tag').click(function () {

			$('#mycustorder-table').show();
			$('#myorder-table').hide();
			$('.order-tag-in').removeClass('order-tag-click');
			$(this).addClass('order-tag-click');
			TweenMax.fromTo('#mycustorder-table', .4, {
				x: -800,
			}, {
					delay: .1,
					x: 0,
				})
		})
		$('#shoporder-tag').click(function () {
			$('#mycustorder-table').hide();
			$('#myorder-table').show();
			$('.order-tag-in').removeClass('order-tag-click');
			$(this).addClass('order-tag-click');
			TweenMax.fromTo('#myorder-table', .4, {
				x: 800,
			}, {
					delay: .1,
					x: 0,
				})
		})

		//預設是客製化訂單被按
		$('#custorder-tag').click();

	})//訂單頁籤

	//在會員中心按登出的話 
	$('#logout-title').click(function () {
		window.location.replace('home.php');
	})

	//點來去訓練 轉道館
	$('#gotoGym-btn').click(function () {
		window.location.replace('gym.php');
	})

	$(function(){
		TweenMax.fromTo('#myrobot-pic-area', 1, {
			y: 15,
			x:0,
		}, {
				delay:.5,
				y: 0,
				x:0,
				yoyo:true,
				repeat:-1,
			})
	})



}//init的尾巴
window.addEventListener("load", init);