import './main.scss';
import Trianglify from './trianglify.min.js';

//article page Topbar and title banckground
function pattern(width = window.innerWidth) {
  return Trianglify({
    width,
    height: 230,
    variance: 0.56,
    cell_size: 46,
    x_colors: 'random',
    y_colors: 'match_x',
    palette: Trianglify.colorbrewer,
    color_space: 'lab',
    color_function: false,
    stroke_width: 1.2,
    seed: window.location.href
  });
}

const pageFirstChild = document.querySelector('.navbar-header');
if (pageFirstChild) {
  document.body.insertBefore(pattern().canvas(), pageFirstChild);
  deletePatternPlaceholder();
  toggleHeaderNavBar();
}

window.addEventListener('resize', function() {
  const bodyFirstElement = document.body.firstElementChild
  const firstElementTagName = bodyFirstElement.tagName;
  if (firstElementTagName === 'CANVAS') {
    document.body.removeChild(bodyFirstElement);
    document.body.insertBefore(pattern().canvas(), pageFirstChild);
  }
});

function deletePatternPlaceholder() {
  const patternPlaceholder = document.getElementById('pattern-placeholder');
  const parent = patternPlaceholder.parentElement;
  parent.removeChild(patternPlaceholder);
}

function toggleHeaderNavBar() {
  document.addEventListener('scroll', function() {
    const offset = window.pageYOffset;
    if (offset > 128) {
      pageFirstChild.classList.add('fixed-header');
    }
    if (offset <= 128) {
      pageFirstChild.classList.remove('fixed-header');
    }
  });
}

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
