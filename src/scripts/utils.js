function nextAnimationFrame() {
  return new Promise(function(resolve, reject) {
    window.requestAnimationFrame(function() {
      window.requestAnimationFrame(resolve);
    });
  });
}

function isMobileWidth(width = 768) { return window.innerWidth <= width;  }
