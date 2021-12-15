
//// Wrap every letter in a span
var textWrapper = document.querySelector('.ml11 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

anime.timeline({loop: false})
        .add({
          targets: '.ml11 .line',
          scaleY: [0, 1],
          opacity: [0.5, 1],
          easing: "easeOutExpo",
          duration: 700
        })
        .add({
          targets: '.ml11 .line',
          translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
          easing: "easeOutExpo",
          duration: 700,
          delay: 100
        }).add({
  targets: '.ml11 .letter',
  opacity: [0, 1],
  easing: "easeOutExpo",
  duration: 600,
  offset: '-=775',
  delay: (el, i) => 34 * (i + 1)
}).add({
  targets: '.ml11',
  opacity: 0,
  duration: 1000,
  easing: "easeOutExpo",
  delay: 1000
});


//anime.timeline({loop: false})
//        .add({
//          targets: '.ml3 .letter',
//          opacity: [0, 1],
//          easing: "easeInOutQuad",
//          duration: 2250,
//          delay: (el, i) => 150 * (i + 1)
//        }).add({
//  targets: '.ml3',
//  opacity: 0,
//  duration: 1000,
//  easing: "easeOutExpo",
//  delay: 1000
//});

jQuery(document).ready(function () {
  jQuery('.menu-toggle').click(function () {
    jQuery('.site-nav').toggleClass('site-nav--open', 500);
    jQuery(this).toggleClass('open');
  });
  jQuery('#testimonial-slider').owlCarousel({
    loop: true,
    items: 1,
    margin: 5,
    nav: false,
    dots: false,
    autoplay: 400000000000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      },
    }
  });


//reviews-slider

  jQuery('.menu-toggle').click(function ($) {
    jQuery('.site-nav').toggleClass('site-nav--open', 500);
    jQuery(this).toggleClass('open');
  });
  jQuery('#reviews-slider').owlCarousel({
    stagePadding: 400,
    loop: true,
    items: 1,
    margin: 10,
    nav: false,
    dots: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 60
      },
      600: {
        items: 1,
        stagePadding: 120
      },
      700: {
        items: 1,
        stagePadding: 120
      },
      900: {
        items: 1,
        stagePadding: 150
      },
      1000: {
        items: 1,
        stagePadding: 160
      },
      1100: {
        items: 1,
        stagePadding: 160
      },
      1200: {
        items: 1,
        stagePadding: 200
      },
      1300: {
        items: 1,
        stagePadding: 250
      },
      1400: {
        items: 1,
        stagePadding: 300
      },
    }
  });

});

//mobile menu
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}






//tttttttttttttttttttttttttt
//section 6 //
	jQuery(function () {
		S = new ScrollMagic.Controller;
		var controller = new ScrollMagic.Controller();
		var Z = new TimelineMax({
			delay: 0
			
		})
		
		

		Z.to("#complete path#fill-stroke", 30, {
				onStart: t,
				onStartParams: ["path#fill-stroke"],
				strokeDashoffset: 0,
				strokeDasharray: 8,
				ease: Linear.easeNone
			});
			scenetracking = new ScrollMagic.Scene({
			triggerElement: ".tracking",
			triggerHook: "onLeave",
			duration: "50%"
		}) .setTween(Z).addTo(S);
		
		
		
		//  cycle image //
		S = new ScrollMagic.Controller;
		var controller = new ScrollMagic.Controller();
		var B = new TimelineMax({
			repeat: -1, repeatDelay: 1
			
		})
		B.to("#bird01 path#bird1fly01", 4, {
			y: "-=7px",
			yoyo:true,
			repeat:-1,
			rotation:5,
			transformOrigin:"100% 100%",
			ease: Power1.easeInOut
			}); 
			
			
		
		
		var C = new TimelineMax({
			repeat: -1, repeatDelay: 1
			
		})
		C.to("#bird01 path#second-hair", 4, {
			y: "-=16px",
			yoyo:true,
			repeat:-1,
			rotation:5,
			transformOrigin:"100% 100%",
			ease: Power2.easeInOut
			}); 
			
			
		var D = new TimelineMax({
			repeat: -1, repeatDelay: 1
			
		})	
		D.to("#bird01 path#third-hair", 4, {
			y: "-=5px",
			yoyo:true,
			repeat:-1,
			rotation:5,
			transformOrigin:"100% 100%",
			ease: Power2.easeInOut
			}); 
		
		
		 
			
			scenelessdebtsec = new ScrollMagic.Scene({
			triggerElement: ".lessdebtsec",
			triggerHook: "onLeave",
			duration: "0%"
		})
		
		
		// end //
	
	});
	
//  test
  
	class HoverButton {
  constructor(el) {
    this.el = el;
    this.hover = false;
    this.calculatePosition();
    this.attachEventsListener();
  }
  
  attachEventsListener() {
    window.addEventListener('mousemove', e => this.onMouseMove(e));
    window.addEventListener('resize', e => this.calculatePosition(e));
  }
  
  calculatePosition() {
    TweenMax.set(this.el, {
      x: 0,
      y: 0,
      scale: 1
    });
    const box = this.el.getBoundingClientRect();
    this.x = box.left + (box.width * 0.5);
    this.y = box.top + (box.height * 0.5);
    this.width = box.width;
    this.height = box.height;
  }
  
  onMouseMove(e) {
    let hover = false;
    let hoverArea = (this.hover ? 0.7 : 0.5);
    let x = e.clientX - this.x;
    let y = e.clientY - this.y;
    let distance = Math.sqrt( x*x + y*y );
    if (distance < (this.width * hoverArea)) {
       hover = true;
        if (!this.hover) {
          this.hover = true;
        }
        this.onHover(e.clientX, e.clientY);
    }
    
    if(!hover && this.hover) {
      this.onLeave();
      this.hover = false;
    }
  }
  
  onHover(x, y) {
    TweenMax.to(this.el, 0.4, {
      x: (x - this.x) * 0.4,
      y: (y - this.y) * 0.4,
      scale: 1.15,
      ease: Power2.easeOut
    });
    this.el.style.zIndex = 10;
  }
  onLeave() {
    TweenMax.to(this.el, 0.7, {
      x: 0,
      y: 0,
      scale: 1,
      ease: Elastic.easeOut.config(1.2, 0.4)
    });
    this.el.style.zIndex = 1;
  }
}

const btn1 = document.querySelector('li:nth-child(1) button');
new HoverButton(btn1);

const btn2 = document.querySelector('li:nth-child(2) button');
new HoverButton(btn2);

const btn3 = document.querySelector('li:nth-child(3) button');
new HoverButton(btn3);