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


name: news cat-id 1 color rgba(150, 17, 21, 0.5)
name: comment cat-id 2 color rgba(218, 163, 0, 0.5)
name: money cat-id 3 color rgba(213, 77, 13, 0.5)
name: features cat-id 4 color rgba(114, 162, 48, 0.5)
name: science-tech cat-id 5 color rgba(0, 125, 138, 0.5)
name: music cat-id 6 color rgba(198, 16, 23, 0.5)
name: games cat-id 7 color rgba(0, 104, 115, 0.5)
name: tv cat-id 8 color rgba(106, 28, 104, 0.5)
name: film cat-id 9 color rgba(70, 0, 19, 0.5)
name: books cat-id 10 color rgba(0, 109, 162, 0.5)
name: arts cat-id 11 color rgba(210, 74, 1, 0.5)
name: lifestyle cat-id 12 color rgba(204, 0, 204, 0.5)
name: travel cat-id 13 color rgba(18, 15, 65, 0.5)
name: sport cat-id 14 color rgba(0, 115, 56, 0.5)
});
