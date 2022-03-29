// scoping the code to avoid creation of global variables
(function() {
  // I hope this over-commenting helps. Let's do this!
  // Let's use the 'active' variable to let us know when we're using it
  let active = false;

  // saving wrapper & scroller to avoid multiple DOM searches
  const wrapper = document.querySelector('.image-switcher__wrapper');
  // no need to do anything if the element isn't on the page
  if(wrapper === null) return;
  const scroller = wrapper.querySelector('.image-switcher__scroller');
  // First we'll have to set up our event listeners
  // We want to watch for clicks on our scroller
  scroller.addEventListener('mousedown',function(){
    active = true;
    // Add our scrolling class so the scroller has full opacity while active
    scroller.classList.add('scrolling');
  });
  // We also want to watch the body for changes to the state,
  // like moving around and releasing the click
  // so let's set up our event listeners
  document.body.addEventListener('mouseup',function(){
    active = false;
    scroller.classList.remove('scrolling');
  });
  document.body.addEventListener('mouseleave',function(){
    active = false;
    scroller.classList.remove('scrolling');
  });

  // Let's figure out where their mouse is at
  document.body.addEventListener('mousemove',function(e){
    if (!active) return;
    // Their mouse is here...
    let x = e.pageX;
    // but we want it relative to our wrapper
    x -= wrapper.getBoundingClientRect().left;
    // Okay let's change our state
    scrollIt(x);
  });

  // Let's use this function
  function scrollIt(x){
    let transform = Math.max(0,(Math.min(x,wrapper.offsetWidth)));
    wrapper.querySelector('.image-switcher__after').style.width = transform+"px";
    scroller.style.left = transform-25+"px";
  }

  // Let's set our opening state based off the width,
  // we want to show a bit of both images so the user can see what's going on
  scrollIt(150);

  // And finally let's repeat the process for touch events
  // first our middle scroller...
  scroller.addEventListener('touchstart',function(){
    active = true;
    scroller.classList.add('scrolling');
  });
  document.body.addEventListener('touchend',function(){
    active = false;
    scroller.classList.remove('scrolling');
  });
  document.body.addEventListener('touchcancel',function(){
    active = false;
    scroller.classList.remove('scrolling');
  });
})();
