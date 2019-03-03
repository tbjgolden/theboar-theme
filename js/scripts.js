((function () {
  var wordCharRegex = /[A-Za-z0-9]/i

  document.addEventListener("DOMContentLoaded", function(event) {
    var gridEl = document.querySelector('.cells');
    var prevGridElWidth;

    fixGridWidth();

    function fixGridWidth () {
      if (gridEl) {
        prevGridElWidth = gridEl.style.width;
        gridEl.style.width = gridEl.offsetWidth + 'px';
      }
    }

    function unfixGridWidth () {
      if (gridEl) {
        gridEl.style.width = prevGridElWidth;
      }
    }

    // remove user dropcaps
    [].slice.call((document.querySelectorAll('.entry-content > *') || []), 0)
      .forEach((curr, i) => {
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
    [].slice.call((document.querySelectorAll('.entry-content [style*="color:"]') || []), 0)
      .forEach(colored => {
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
      [].slice.call((document.querySelectorAll('img') || []), 0)
        .forEach((img, i) => {
          img.style.visibility = 'hidden';
        });
      console.log(event);
    });
  });
})());
