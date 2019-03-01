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
      console.log(colored.style.color);
    });
});
