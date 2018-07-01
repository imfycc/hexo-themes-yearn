import './main.scss';


//http to https
var host = "hufangyun.com" || "www.hufangyun.com";
if ((host == window.location.host) && (window.location.protocol != "https:"))
    window.location.protocol = "https";

// Baidu Analytics
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?ae46047b557574a12bba544bea130043";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();

// search
var searchData;
var search = document.getElementById('search');

if(search) {
  search.addEventListener('input', function(e) {
    var key = this.value.trim();
    if (!key) {
      return;
    }

    var regExp = new RegExp(key.replace(/[ ]/g, '|'), 'gmi');

    loadData(function (data) {
      var result = data.filter(function (post) {
        return matcher(post, regExp);
      });

      render(result);

      keyDown();
    });

    e.preventDefault();
  });
}

function loadData(success) {

  if (!searchData) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/content.json', true);

    xhr.onload = function () {
      if (this.status >= 200 && this.status < 300) {
        var res = JSON.parse(this.response);
        searchData = res instanceof Array ? res : res.posts;
        success(searchData);
      } else {
        console.error(this.statusText);
      }
    };

    xhr.onerror = function () {
      console.error(this.statusText);
    };

    xhr.send();

  } else {
    success(searchData);
  }
}

function render(data) {
  var html = '';
  if (data.length) {

    html = data.map(function (post, i) {
        if (i == 0) {
        return '<li><a href='+ window.location.origin + '/'+ post.path +'>' + post.title + '</a><span class="search-enter"> 🚀 </span></li>';
        }
        return '<li><a href='+ window.location.origin + '/' + post.path +'>' + post.title + '</a></li>';
    });

    if (html) {
      document.querySelector('.search-result-box').style.display = 'block';
    }
    var result = document.getElementById('search-result');
    result.innerHTML = html.join('');
  }
}

function keyDown() {
  document.addEventListener('keydown', (event) => {
    var keyCode = event.keyCode;
    var ENTER = 13;
    if (keyCode == ENTER ) {
      var searchResult = document.getElementById('search-result');
      var firstLiTag = searchResult.firstChild;
      var firstATag = firstLiTag && firstLiTag.firstChild;
      var href = firstATag && firstATag.href;
      window.location.href = href;
    }
  });
}

function matcher(post, regExp) {
  return regtest(post.title, regExp);
}

function regtest(raw, regExp) {
  regExp.lastIndex = 0;
  return regExp.test(raw);
}

// chat tool
daovoice('init', {
  app_id: "1ff30348"
});
daovoice('update');

