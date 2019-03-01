document.addEventListener("DOMContentLoaded", function(event) {
  // remove user dropcaps
  [].slice.call((document.querySelectorAll('.entry-content > *') || []), 0)
    .forEach(curr => {
      while (curr && curr.childNodes && curr.childNodes.length) curr = curr.childNodes[0];
      while (curr.length === 1 && curr.parentNode.textContent.length === 1) {
        var parent = curr.parentNode.parentNode;
        parent.removeChild(parent.firstChild);
        parent.insertBefore(curr, parent.firstChild);
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
});
