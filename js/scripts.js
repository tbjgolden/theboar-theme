window.CategoryColorMap = {
  'rgb(196, 22, 28)': 'rgb(150, 17, 21)',
  'rgb(255, 194, 14)': 'rgb(218, 163, 0)',
  'rgb(242, 101, 34)': 'rgb(213, 77, 13)',
  'rgb(141, 198, 63)': 'rgb(114, 162, 48)',
  'rgb(0, 171, 189)': 'rgb(0, 125, 138)',
  'rgb(237, 28, 36)': 'rgb(198, 16, 23)',
  'rgb(0, 150, 166)': 'rgb(0, 104, 115)',
  'rgb(146, 39, 143)': 'rgb(106, 28, 104)',
  'rgb(121, 0, 32)': 'rgb(70, 0, 19)',
  'rgb(0, 143, 213)': 'rgb(0, 109, 162)',
  'rgb(254, 94, 8)': 'rgb(210, 74, 1)',
  'rgb(255, 0, 255)': 'rgb(204, 0, 204)',
  'rgb(30, 25, 106)': 'rgb(18, 15, 65)',
  'rgb(0, 166, 81)': 'rgb(0, 115, 56)'
};

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

  [].slice.call((document.querySelectorAll('.entry-content [style*="color:"]') || []), 0)
    .forEach(colored => {
      console.log(colored.style.color, window.CategoryColorMap[colored.style.color]);
    });
});
