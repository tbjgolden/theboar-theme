((function () {
  var wordCharRegex = /[A-Za-z0-9]/i

  function $ (s) {
    return [].slice.call((document.querySelectorAll(s) || []), 0);
  }

  document.addEventListener("DOMContentLoaded", function(event) {
    var pageEl = document.querySelector('#page');
    var resizeTimeout = null;
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
        [].slice.call((document.querySelectorAll('img') || []), 0)
          .forEach((img, i) => {
            img.style.visibility = img.oldVisibility;
          });
        resizeTimeout = null;
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
      if (!resizeTimeout) {
        [].slice.call((document.querySelectorAll('img') || []), 0)
          .forEach((img, i) => {
            img.oldVisibility = img.style.visibility;
            img.style.visibility = 'hidden';
          });
      } else {
        clearTimeout(resizeTimeout);
      }
      resizeTimeout = setTimeout(unfixWidth, 100);
    });
  });
})());
