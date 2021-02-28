/**
 * Created by adamswang on 2017/10/17.
 */

var tools = (function () {
    var mod = {};

    mod.strToJson = function (str, filter, mark) {
        var arr = str.replace(filter, "").split(mark);
        var json = {};

        var eIndex = -1, key = '';
        for (var i = 0, l = arr.length; i < l; i++) {
            eIndex = arr[i].indexOf('=');

            if (eIndex > 0) {
                key = arr[i].substring(0, eIndex);
                json[arr[i].substring(0, eIndex)] = arr[i].substring(eIndex + 1);
            }
        }
        return json;
    };

    /**
     * 设置cookie
     * @param {string} sName cookie名
     * @param {string} sValue cookie值
     * @param {int} iExpireSec 失效时间（秒）
     * @param {string} sDomain 作用域
     * @param {string} sPath 作用路径
     * @param {bool} bSecure 是否加密
     * @return {void}
     *
     * tools.setCookie("lg_source", "wx_txyxzs", 600, "qq.com", "/");
     */
    mod.setCookie = function (sName, sValue, iExpireSec, sDomain, sPath, bSecure) {
        if (sName == undefined) {
            return;
        }
        if (sValue == undefined) {
            sValue = "";
        }
        var oCookieArray = [sName + "=" + escape(sValue)];
        if (!isNaN(iExpireSec)) {
            var oDate = new Date();
            oDate.setTime(oDate.getTime() + iExpireSec * 1000);
            iExpireSec == 0 ? '' : oCookieArray.push("expires=" + oDate.toGMTString());
        }
        if (sDomain != undefined) {
            oCookieArray.push("domain=" + sDomain);
        }
        if (sPath != undefined) {
            oCookieArray.push("path=" + sPath);
        }
        if (bSecure) {
            oCookieArray.push("secure");
        }
        document.cookie = oCookieArray.join("; ");
    };

    /**
     * 获取cookie
     * @param {string} sName cookie名
     * @param {string} sValue 默认值
     * @return {string} cookie值
     * tools.getCookie('openid');
     */
    mod.getCookie = function (sName, sDefaultValue) {
        var sRE = "(?:; |^)" + sName + "=([^;]*);?";
        var oRE = new RegExp(sRE);

        if (oRE.test(document.cookie)) {
            return unescape(RegExp["$1"]);
        } else {
            return sDefaultValue || null;
        }
    };

    /**
     * 清除cookie
     * @param {string} sName cookie名
     * @param {string} sDomain 作用域
     * @param {sPath} sPath 作用路径
     * @return {void}
     */
    mod.clearCookie = function (sName, sDomain, sPath) {
        var oDate = new Date();
        cookie.set(sName, "", -oDate.getTime() / 1000, sDomain, sPath);
    };

    mod.getHash = function (name, url) {
        var u = arguments[1] || location.hash;
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = u.substr(u.indexOf("#") + 1).match(reg);
        if (r != null) {
            return r[2];
        }
        return "";
    };

    mod.getQuery = function (name, url) {
        var u = arguments[1] || window.location.search,
            reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"),
            r = u.substr(u.indexOf("\?") + 1).match(reg);
        return r != null ? r[2] : "";
    };

    mod.param = function () {
        if (location.search) {
            return $strToJson(location.search, "?", "&");
        }
    };

    mod.hash = function () {
        if (location.hash) {
            return $strToJson(location.hash, "#", "&");
        }
    };

    mod.historyBack = function (callback) {
        var locationOld = window.location.href;
        var locationBackTmp = locationOld.replace('?', '?_urltmp=tmpurl&');

        history.pushState('back', null, locationBackTmp);
        history.pushState('cur', null, locationOld);

        if ("onpopstate" in window) {
            window.addEventListener("popstate", function (event) {
                if (event.state == 'back') {
                    callback();
                }
            }, false);
        }
    };

    //获取服务器时间
    mod.getSeverDateTime = function () {
        var xhr = window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest;
        xhr.open("HEAD.html", window.location.href, false);
        xhr.send();
        var d = new Date(xhr.getResponseHeader("Date"));
        var nowyear = d.getFullYear();
        var locationDate = (new Date).getFullYear();
        if (nowyear < locationDate) {
            d = new Date;
        }
        return d;
    };

    //获取链接中的参数
    mod.request = function (pa) {
        var url = window.location.href.replace(/#+.*$/, ""),
            params = url.substring(url.indexOf("?") + 1, url.length).split("&"), param = {};
        for (var i = 0; i < params.length; i++) {
            var pos = params[i].indexOf("="), key = params[i].substring(0, pos), val = params[i].substring(pos + 1);
            param[key] = val;
        }
        return typeof param[pa] == "undefined" ? "" : param[pa];
    };

    /*loadScript('https://penta-h5.netmarble.com/commonAct/a20170814challenge/adAct.php?op=0', function () {
     console.log(adAct);
     });*/
    mod.loadScript = function (url, callback) {
        var head = document.getElementsByTagName("head")[0];
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = url;
        var timeout = setTimeout(function () {
            head.removeChild(script);
            callback.call(this, false)
        }, 30000);
        mod.onload(script, function (Ins) {
            head.removeChild(script);
            clearTimeout(timeout);
            callback(true);
        });
        head.appendChild(script);
        return true;
    };

    mod.onload = function (node, callback) {
        var isImpOnLoad = "onload" in node ? true : function () {
            node.setAttribute("onload", "");
            return typeof node.onload == "function"
        }();
        if (document.addEventListener) {
            node.addEventListener("load", function () {
                callback.call(this, node)
            }, false)
        } else if (!isImpOnLoad) {
            node.attachEvent("onreadystatechange", function () {
                var rs = node.readyState.toLowerCase();
                if (rs === "loaded" || rs === "complete") {
                    node.detachEvent("onreadystatechange");
                    callback.call(this, node.innerHTML)
                }
            })
        } else {
        }
    };

    mod.ajaxRequest = function (url, data, onSuccess, needLoading) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: data,
            // async: false,

            beforeSend: function (XMLHttpRequest) {
                //console.log('before');
                if (needLoading) {
                    mod.loading.init();
                }
            },
            complete: function (XMLHttpRequest, textStatus) {
                //console.log('complete');
                // loading.remove();
            },
            error: function (XMLHttpRequest, textStatus) {
                //console.log('error');
                if (needLoading) {
                    mod.loading.remove();
                }
                // console.log('textStatus: ' + textStatus);
                // console.log('ajax error');
                // showMsgAlert('systemBusy');
            },
            success: function (data, textStatus) {
                //console.log('success');
                if (needLoading) {
                    mod.loading.remove();
                }
                // console.log('textStatus: ' + textStatus);
                onSuccess(data);
            }
        });
    };

    mod.isIOS = function () {
        return /iphone|ipod|ipad/i.test(window.navigator.userAgent.toLowerCase());
    };

    mod.isAndroid = function () {
        return /android/i.test(window.navigator.userAgent.toLowerCase());
    };

    mod.initLang = function (langCode) {
        //语言初始化
        langCode = langCode ? langCode : defaultLanguageCode;
        langCode = langCode.toUpperCase();
        if (GLanguage.hasOwnProperty(langCode)) {
            data.language = GLanguage[langCode];
            return langCode;
        } else {
            data.language = GLanguage[defaultLanguageCode];
            return defaultLanguageCode;
        }
    };

    // 3.函数去抖处理
    mod.debounce = function (func, delay) {
        var timer = null;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                func.apply(context, args);
            }, delay);
        }
    };

    // vertical screen or horizontal screen
    mod.detectOrient = function (vCallback, hCallback) {
        var storage = localStorage; // 不一定要使用localStorage，其他存储数据的手段都可以
        var data = storage.getItem('J-recordOrientX');
        var cw = document.documentElement.clientWidth;
        var _Width = 0,
            _Height = 0;
        if (!data) {
            sw = window.screen.width;
            sh = window.screen.height;
            // 2.在某些机型（如华为P9）下出现 srceen.width/height 值交换，所以进行大小值比较判断
            _Width = sw < sh ? sw : sh;
            _Height = sw >= sh ? sw : sh;
            storage.setItem('J-recordOrientX', _Width + ',' + _Height);
        } else {
            var str = data.split(',');
            _Width = str[0];
            _Height = str[1];
        }

        alert('cw: ' + cw);
        alert('_Width: ' + _Width + ', _Height: ' + _Height);

        if (cw == _Width) {// 竖屏
            vCallback();
            return;
        }
        if (cw == _Height) {// 横屏
            hCallback();
            return;
        }
    };

    mod.loading = {
        init: function () {
            var loadDom = $('#loadingSvg').length;
            if (loadDom == 0) {
                $('body').append(mod.loading.loadingSvg);
            } else {
                $('#loadingSvg').show();
            }
        },
        remove: function () {
            // $('#loadingSvg').remove();
            $('#loadingSvg').hide();
        },
        loadingSvg: "<div id='loadingSvg' style='width: 100%;height: 100%;" +
        "position: fixed;left: 0;top: 0;background: rgba(0,0,0,.7);z-index: 9999'>" +
        "<div style='width: 150px;height: 150px;position: absolute;left: 50%;top: 50%;" +
        "margin-left: -75px;margin-top: -75px'><svg width='150px' height='150px' " +
        "xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid' " +
        "class='uil-default'><rect x='0' y='0' width='100' height='100' fill='none' class='bk'>" +
        "</rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(0 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0s' repeatCount='indefinite'/></rect><rect  x='46.5' " +
        "y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' transform='rotate(30 50 50) translate(0 -30)'>  " +
        "<animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.08333333333333333s' " +
        "repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' " +
        "fill='#d6d6d6' transform='rotate(60 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.16666666666666666s' repeatCount='indefinite'/></rect>" +
        "<rect x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(90 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.25s' repeatCount='indefinite'/></rect><rect " +
        "x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(120 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.3333333333333333s' repeatCount='indefinite'/></rect>" +
        "<rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(150 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.4166666666666667s' repeatCount='indefinite'/></rect>" +
        "<rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(180 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.5s' repeatCount='indefinite'/></rect><rect " +
        "x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(210 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.5833333333333334s' repeatCount='indefinite'/></rect>" +
        "<rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(240 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.6666666666666666s' repeatCount='indefinite'/></rect>" +
        "<rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(270 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.75s' repeatCount='indefinite'/></rect>" +
        "<rect x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(300 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.8333333333333334s' repeatCount='indefinite'/></rect>" +
        "<rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#d6d6d6' " +
        "transform='rotate(330 50 50) translate(0 -30)'>  <animate attributeName='opacity' " +
        "from='1' to='0' dur='1s' begin='0.9166666666666666s' repeatCount='indefinite'/></rect></svg>" +
        "</div></div>"
    };

    return mod;
})();