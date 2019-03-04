window.addEventListener("keyup", function(event) {
  if (event.keyCode === 9) {
    document.body.className.add('has-tabbed');
  }
});

((function () {
  var wordCharRegex = /[A-Za-z0-9]/i

  function $ (s, el) {
    return [].slice.call(((el || document).querySelectorAll(s) || []), 0);
  }

  setTimeout(function () {
    $('.search-form').forEach(function (el) {
      el.style.visibility = 'visible';
      el.addEventListener('submit', function (event) {
        var inputs = $('input', event.target)
        for (var i = inputs.length - 1; i >= 0; i--) {
          if (!inputs[i].value) {
            event.stopPropagation();
            event.preventDefault();
            return false;
          }
        }
      });
    });
  }, 1000);

  $('.scroll-to-content').forEach(function (el) {
    var content = $(el.getAttribute('href'))[0];

    el.addEventListener('click', function (event) {
      event.stopPropagation();
      event.preventDefault();
      if (content) content.scrollIntoView({ block: 'start', behavior: 'smooth' });
      return false;
    });
  });

  document.addEventListener("DOMContentLoaded", function(event) {
    var pageEl = document.querySelector('#page');
    var resizeTimeout;
    var prevPageElWidth;

    fixWidth();

    function fixWidth () {
      if (pageEl) {
        prevPageElWidth = pageEl.style.width;
        pageEl.style.width = pageEl.offsetWidth + 'px';
      }
    }

    function unfixWidth () {
      if (pageEl) {
        pageEl.style.width = prevPageElWidth;
      }
    }

    // remove user dropcaps
    $('.entry-content > *').forEach((curr, i) => {
      while (curr && curr.childNodes && curr.childNodes.length) curr = curr.childNodes[0];
      var text;
      while (text = curr.parentNode.textContent, curr.length === 1 && text.length === 1) {
        var parent = curr.parentNode.parentNode;
        parent.removeChild(parent.firstChild);
        parent.insertBefore(curr, parent.firstChild);
        if (!i && !wordCharRegex.test(text)) parent.classList.add('no-dropcap');
      }
    });

    // automatically darken illegible colors
    $('.entry-content [style*="color:"]').forEach(colored => {
      try {
        var oldColor = colored.style.color;
        var rgb = oldColor.substring(oldColor.indexOf('(') + 1, oldColor.length - 1).split(',').map(s => ~~s);
        var luminance = 0.2126 * rgb[0] + 0.7152 * rgb[1] + 0.0722 * rgb[2];
        var luminanceDelta = luminance - 162;

        if (luminanceDelta > 0) {
          var newColor = 'rgb(' + [
            ~~Math.max(0, rgb[0] - luminanceDelta),
            ~~Math.max(0, rgb[1] - luminanceDelta),
            ~~Math.max(0, rgb[2] - luminanceDelta),
          ].join(',') + ')';
          colored.style.color = newColor;
        }
      } catch (e) {}
    });

    // on window resize
    window.addEventListener("resize", function (event) {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(unfixWidth, 100);
    });
  });
})());
