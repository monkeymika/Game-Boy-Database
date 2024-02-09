/******** Nav animation bloc***********/
document.addEventListener("DOMContentLoaded", function () {
	const toggleButton = document.querySelector(".burger");
	const overlay = document.querySelector('.overlay');
	const overlayMenu = document.querySelector('.overlay-menu');
	let isOpen = false

	const timeline = gsap.timeline({
		paused: true,
		onStart: () => {
			// Définir le z-index à 0 quand l'animation commence
			overlay.style.zIndex = '0';
			overlayMenu.style.zIndex = '0';
		},
		onReverseComplete: () => {
			// Remettre le z-index à -1 quand l'animation est inversée et complète
			overlay.style.zIndex = '-1';
			overlayMenu.style.zIndex = '-1';
		}
	});

	timeline.to(".block", {
		duration: 1,
		clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
		stagger: 0.075,
		ease: "power3.inOut",
	});

	timeline.to(
		".menu-title, .menu-item,.search-bar",
		{
			duration: 0.3,
			opacity: 1,
			stagger: 0.05,
		},
		"-=0.5"
	);

	toggleButton.addEventListener("click", function () {
		if (isOpen) {
			timeline.reverse();
		} else {
			timeline.play();
		}
		isOpen = !isOpen
	});

})

/***************************** Toggle Menu *********************************/

function toggleMenu() {
	var menu = document.getElementById('fullset-list');
	if (menu.classList.contains('hidden')) {
		menu.classList.remove('hidden');
		menu.classList.add('shown');
	} else {
		menu.classList.remove('shown');
		menu.classList.add('hidden');
	}
}

// Fermer le menu si on clique en dehors
window.onclick = function (event) {
	if (!event.target.matches('.title-list')) {
		var dropdowns = document.getElementsByClassName("shown");
		for (var i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('shown')) {
				openDropdown.classList.remove('shown');
				openDropdown.classList.add('hidden');
			}
		}
	}
}



/********************* SearchBar animation on click ****************************/

document.addEventListener('DOMContentLoaded', function () {
	var searchInput = document.querySelector('.search-bar input[type="text"]');
	var searchButton = document.querySelector('.search-bar button');

	searchButton.addEventListener('click', function () {
		if (!searchInput.classList.contains('expanded')) {
			searchInput.classList.add('expanded');
			searchButton.classList.add('expanded');
			searchInput.focus(); // Met le focus sur l'input quand il est ouvert
		} else {
			// Ici, tu mettras plus tard le code pour la recherche
		}
	});
});


/*NavBar animation on scroll */
document.addEventListener('DOMContentLoaded', function () {
	var nav = document.querySelector('nav');

	window.addEventListener('scroll', function () {
		if (window.scrollY > 50) { // Ajuste ce nombre en fonction de quand tu veux que le changement se produise
			nav.classList.add('scrolled');
		} else {
			nav.classList.remove('scrolled');
		}
	});
});




/* Initialize Swiper */

var swiper = new Swiper(".last-game-added-section .slide-container", {
	slidesPerView: 4,
	spaceBetween: 20,
	sliderPerGroup: 4,
	loop: true,
	centerSlide: "true",
	fade: "true",
	grabCursor: "true",
	pagination: {
		el: ".swiper-pagination1",
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: ".swiper-button-next1",
		prevEl: ".swiper-button-prev1",
	},

	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		520: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1000: {
			slidesPerView: 4,
		},
	},
});


// Initialize Swiper for Recommended Games
var swiperMostSeen = new Swiper(".most-seen-on-database .slide-container", {
	// ... your configuration ...
	slidesPerView: 4,
	spaceBetween: 20,
	sliderPerGroup: 4,
	loop: true,
	centerSlide: "true",
	fade: "true",
	grabCursor: "true",
	pagination: {
		el: ".swiper-pagination2",
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: ".swiper-button-next2",
		prevEl: ".swiper-button-prev2",
	},

	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		520: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1000: {
			slidesPerView: 4,
		},
	},
});
// Initialize Swiper for Some Videos
var swiperMostSeen = new Swiper(".videos .slide-container", {
	// ... your configuration ...
	slidesPerView: 4,
	spaceBetween: 20,
	sliderPerGroup: 4,
	loop: true,
	centerSlide: "true",
	fade: "true",
	grabCursor: "true",
	pagination: {
		el: ".swiper-pagination3",
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: ".swiper-button-next3",
		prevEl: ".swiper-button-prev3",
	},

	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		520: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1000: {
			slidesPerView: 4,
		},
	},
});
// Initialize Swiper for Game Details
var swiperMostSeen = new Swiper(".game-images-container .slide-container", {
	// ... your configuration ...
	slidesPerView: 4,
	spaceBetween: 20,
	sliderPerGroup: 4,
	loop: true,
	centerSlide: "true",
	fade: "true",
	grabCursor: "true",
	pagination: {
		el: ".swiper-pagination4",
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: ".swiper-button-next4",
		prevEl: ".swiper-button-prev4",
	},

	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		520: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1000: {
			slidesPerView: 4,
		},
	},
});
