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


// Fonction générique pour initialiser Swiper
function initializeSwiper(containerSelector, paginationSuffix) {
	return new Swiper(containerSelector, {
		slidesPerView: 4,
		spaceBetween: 20,
		sliderPerGroup: 4,
		loop: true,
		centerSlide: "true",
		fade: "true",
		grabCursor: "true",
		pagination: {
			el: ".swiper-pagination" + paginationSuffix,
			clickable: true,
			dynamicBullets: true,
		},
		navigation: {
			nextEl: ".swiper-button-next" + paginationSuffix,
			prevEl: ".swiper-button-prev" + paginationSuffix,
		},
		breakpoints: {
			0: { slidesPerView: 1 },
			520: { slidesPerView: 2 },
			768: { slidesPerView: 3 },
			1000: { slidesPerView: 4 },
		},
	});
}

// Appels de la fonction pour chaque Swiper avec les sélecteurs et suffixes appropriés

initializeSwiper(".last-game-added-section .slide-container", "1");

initializeSwiper(".most-seen-on-database .slide-container", "2");

initializeSwiper(".videos .slide-container", "3");

initializeSwiper(".game-images-container .slide-container", "4");

initializeSwiper(".game-ohter-img-container .slide-container", "5");

initializeSwiper(".container__screenshots .slide-container", "6");

initializeSwiper(".container-magazine-test .slide-container", "7");


// Modal au clic sur l'image

document.addEventListener('DOMContentLoaded', function () {
	var modal = document.getElementById("modal");
	var modalImg = document.getElementById("modalImg");

	document.querySelectorAll('.details-img-container').forEach(item => {
		item.addEventListener('click', function () {
			var img = this.getElementsByTagName("img")[0];
			modal.style.display = "flex";
			modalImg.src = img.src;
			document.getElementById("caption").innerHTML = img.alt;
		});
	});

	var closeModal = document.getElementById("closeModal");
	closeModal.addEventListener('click', function () {
		modal.style.display = "none";
	});

	// Logique de zoom
	modalImg.addEventListener('click', function () {
		if (this.classList.contains('zoomed')) {
			this.classList.remove('zoomed');
			this.style.transform = "scale(1)";
			this.style.cursor = 'zoom-in';
		} else {
			this.classList.add('zoomed');
			this.style.transform = "scale(2)"; // Ajustez la valeur de scale selon le niveau de zoom désiré
			this.style.cursor = 'zoom-out';
		}
	});
});


