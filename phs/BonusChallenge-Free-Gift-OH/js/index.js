(function (adUtil, $, window, document) {
    var url = '../../../external.html?link=https://mrms.igamecj.com/commonAct/a20190107point/index.php';
    var imgURLPrefix = "../../../external.html?link=https://overseas-img.qq.com/images/pubgmobile/act/a20190107point/";

    var params = ['sTicket', 'totalScore', 'unstableScore', 'game_area',
        'nickName', 'language', 'openid', 'uid', 'ipRegion', 'version', 'sign'];//totalScore -  unstableScore 才是可用的积分
    var commonParams = {};
    var packageLimit = {
        '1': {
            'total': 0, 'left': 0
        },
        '2': {
            'total': 0, 'left': 0
        },
        '3': {
            'total': 0, 'left': 0
        },
        '4': {
            'total': 0, 'left': 0
        },
        '5': {
            'total': 0, 'left': 0
        },
        '6': {
            'total': 0, 'left': 0
        },
        '7': {
            'total': 0, 'left': 0
        },
        '8': {
            'total': 0, 'left': 0
        },
    };

    for (var i = 0; i < params.length; i++) {
        commonParams[params[i]] = adUtil.getQuery(params[i]).trim();
    }

    // 绑定兑换动作
    function bindExchange() {
        $('.redeem').unbind().bind('click', function () {
            var name = $(this).attr('data-item-name');
            var point = $(this).attr('data-item-point');
            var imgSrc = $(this).attr('data-item-icon');
            var itemId = $(this).attr('data-item-id');
            var itemLeft = $(this).attr('data-item-left');

            if (itemLeft > 0) {
                $('#dia1 .item').text(name);
                $('#dia1 img').attr('src', imgSrc);
                $('#dia1 #bccost').text(point);
                $('#dia1 .dia-ok').attr('data-item-id', itemId);
                showDia('dia1');

                // 绑定兑换动作
                $('#dia1 .dia-ok').unbind().bind('click', function () {
                    var iItemId = $(this).attr('data-item-id');
                    if (parseInt(packageLimit[iItemId].left) > 0) {
                        var userPoint = commonParams['totalScore'] - commonParams['unstableScore'];
                        var cookiePoint = parseInt(adUtil.getCookie('userPoint', 0));
                        if (!isNaN(cookiePoint)) {
                            userPoint = (userPoint > adUtil.getCookie('userPoint', 0)) ?
                                adUtil.getCookie('userPoint', 0) : userPoint;
                        }

                        var actionData = {
                            'action': 'doExchange',
                            'iItemId': iItemId,
                            'iCurUserPoint': userPoint
                        };

                        actionData = $.extend(actionData, commonParams);
                        adUtil.ajaxRequest(url, actionData, function (result) {
                            if (result.code == -102) {
                                showDia('dia2');
                                return;
                            } else if (result.code != 0) {
                                alert(result.msg);
                                return;
                            }

                            var oriLeft = packageLimit[result.data.iItemId].left;
                            packageLimit[result.data.iItemId].left = parseInt(oriLeft) - 1;

                            if (!(parseInt(oriLeft) - 1 > 0)) {// 剩余限量为0,置灰,解除动作绑定
                                $($('.ul_shop li')[iItemId - 1]).find('a').addClass('gray')
                                    .attr('data-item-left', 0);
                                $('#dia1 .dia-ok').unbind();
                            }
                            renderPackageLimit();

                            $('.font-yb').text(result.data.curScore);
                            adUtil.setCookie('userPoint', result.data.curScore, 300, "pubgmobile.com", "../../../external.html?link=https://www.pubgmobile.com/");

                            // 兑换成功
                            showDialog.hide();
                            showDia('dia4');
                        }, true);
                    }
                });
            }
        });
    }

    // 查询道具列表
    function getItemList() {
        var actionData = {
            'action': 'getItemList'
        };

        actionData = $.extend(actionData, commonParams);
        adUtil.ajaxRequest(url, actionData, function (result) {
            if (result.code != 0) {
                alert(result.msg);
                return;
            }

            var itemList = result.data.itemList;
            for (var i = 0; i < Object.keys(itemList).length; i++) {
                var item = itemList[i + 1];
                var tmpEle = $($('.ul_shop li')[i]);
                tmpEle.find('.font-yr').text(item.name);
                var imgSrc = imgURLPrefix + item.period + "/" + "item" + (i + 1) + '.png';
                tmpEle.find('img').attr('src', imgSrc);
                tmpEle.find('a').attr('data-item-name', item.name)
                    .attr('data-item-point', item.point)
                    .attr('data-item-icon', imgSrc)
                    .attr('data-item-id', i + 1)
                    .attr('data-item-left', item.left);

                packageLimit[i + 1].total = item.total;
                packageLimit[i + 1].left = item.left;

                if (!(parseInt(item.left) > 0)) {
                    tmpEle.find('a').addClass('gray');
                }
            }

            renderPackageLimit();
        }, true);
    }

    function renderPackageLimit() {
        for (var i = 0; i < 8; i++) {
            var limit = "REDEMPTIONS AVAILABLE " + packageLimit[i + 1].left
                + "/" + packageLimit[i + 1].total;
            var tmpEle = $($('.ul_shop li')[i]);
            tmpEle.find('.message').text(limit);
        }
    }

    // 查询战绩
    function checkBattleResult() {
        var BattleResult = adUtil.getCookie('BattleResult');
        if (!BattleResult || typeof(BattleResult) == "undefined") {//缓存无效
            var actionData = {
                'action': 'checkBattleResult'
            };

            actionData = $.extend(actionData, commonParams);
            adUtil.ajaxRequest(url, actionData, function (result) {
                if (result.code != 0) {
                    alert(result.msg);
                    return;
                }

                renderBattleResult(result.data.BattleResult);
                adUtil.setCookie('BattleResult', JSON.stringify(result.data.BattleResult), 300, "pubgmobile.com", "../../../external.html?link=https://www.pubgmobile.com/");//战绩列表cookie缓存5分钟
            }, false);
        } else {
            BattleResult = $.parseJSON(decodeURIComponent(BattleResult));
            renderBattleResult(BattleResult);
        }
    }

    function renderBattleResult(BattleResult) {
        for (var i = 0; i < Object.keys(BattleResult).length; i++) {
            var rank = BattleResult[i].r;
            var kill = BattleResult[i].k;
            var score = BattleResult[i].s;
            var time = BattleResult[i].t;

            var brStr = "<td>" + rank + "</td>" + "<td>" + kill + "</td>"
                + "<td>" + score + "</td>" + "<td style='font-size: 0.23rem;'>" + time + "</td>";
            $($('.table tr')[i + 1]).html(brStr);
        }
    }

    function screenTransfer() {
        if (adUtil.isAndroid()) {//提示转屏
            if (document.documentElement.clientWidth > document.documentElement.clientHeight) {
                $('#horizon').css('display', 'block');
            } else {
                $('#horizon').css('display', 'none');
            }
        } else {
            $('#horizon').css('display', 'none');
        }
    }

    $(document).ready(function () {
        var userPoint = commonParams['totalScore'] - commonParams['unstableScore'];
        var cookiePoint = parseInt(adUtil.getCookie('userPoint', 0));
        if (!isNaN(cookiePoint)) {
            userPoint = (userPoint > adUtil.getCookie('userPoint', 0)) ?
                adUtil.getCookie('userPoint', 0) : userPoint;
        }

        //rem
        //var clientWidth;
        var px;
        //if (!window.addEventListener) return;
        //var resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize';

        function setFont() {
            var html = document.documentElement;
            var k = 750;
            html.style.fontSize = html.clientWidth / k * 100 + "px";
            px = html.clientWidth / k * 100;
        }

        setFont();
        setTimeout(function () {
            setFont();
        }, 300);
        document.addEventListener('DOMContentLoaded', setFont, false);
        //window.addEventListener('resize', setFont, false);
        window.addEventListener('load', setFont, false);
        //window.addEventListener(resizeEvt, screenTransfer, false);

        $(window).resize(function () {
            setFont();
            screenTransfer();
        });
        screenTransfer();

        $('.font-yb').text(userPoint);
        getItemList();
        bindExchange();

        checkBattleResult();
    });

})(tools, $, window, document);
