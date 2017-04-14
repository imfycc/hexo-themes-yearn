import './main.css';


//http 转 https
var host = "hufangyun.com" || "www.hufangyun.com";
if ((host == window.location.host) && (window.location.protocol != "https:"))
    window.location.protocol = "https";

//百度统计
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?ae46047b557574a12bba544bea130043";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
