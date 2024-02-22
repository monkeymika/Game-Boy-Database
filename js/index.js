/******** Nav animation bloc***********/
document.addEventListener("DOMContentLoaded", function () {
	const toggleButton = document.querySelector(".burger");
	const overlay = document.querySelector('.overlay');
	const overlayMenu = document.querySelector('.overlay-menu');
	let isOpen = false

	const timeline = gsap.timeline({
		paused: true,
		onStart: () => {
			// Définir le z-index à 1000 quand l'animation commence pour s'assurer que l'overlay est visible
			overlay.style.zIndex = '1000';
			overlayMenu.style.zIndex = '1000';
		},
		onReverseComplete: () => {
			// Remettre le z-index à une valeur neutre quand l'animation est inversée et complète
			// Ici, on peut mettre un z-index qui assure que l'overlay ne couvre pas inutilement d'autres éléments
			// mais reste au-dessus de contenu de base si nécessaire. 0 est une valeur commune pour cela.
			overlay.style.zIndex = '0';
			overlayMenu.style.zIndex = '0';
		}
	});

	timeline.to(".block", {
		duration: 1,
		clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
		stagger: 0.075,
		ease: "power3.inOut",
	});

	timeline.to(
		".menu-title, .menu-item, .search-bar",
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

});


/***************************** Toggle Menu *********************************/

// function toggleMenu() {
// 	var menu = document.getElementById('fullset-list');
// 	if (menu.classList.contains('hidden')) {
// 		menu.classList.remove('hidden');
// 		menu.classList.add('shown');
// 	} else {
// 		menu.classList.remove('shown');
// 		menu.classList.add('hidden');
// 	}
// }

// // Fermer le menu si on clique en dehors
// window.onclick = function (event) {
// 	if (!event.target.matches('.title-list')) {
// 		var dropdowns = document.getElementsByClassName("shown");
// 		for (var i = 0; i < dropdowns.length; i++) {
// 			var openDropdown = dropdowns[i];
// 			if (openDropdown.classList.contains('shown')) {
// 				openDropdown.classList.remove('shown');
// 				openDropdown.classList.add('hidden');
// 			}
// 		}
// 	}
// }

document.addEventListener('DOMContentLoaded', function () {
	var toggleTitles = document.querySelectorAll('.toggle-title');

	toggleTitles.forEach(function (title) {
		title.addEventListener('click', function () {
			// Fermez tous les contenus ouverts
			document.querySelectorAll('.toggle-content').forEach(function (content) {
				if (content !== title.nextElementSibling) {
					content.classList.add('hidden');
				}
			});

			// Basculez l'état visible/caché du contenu lié au titre cliqué
			var contentToShow = title.nextElementSibling;
			contentToShow.classList.toggle('hidden');
		});
	});
});






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

initializeSwiper(".other-versions-container .slide-container", "8");


// Modal au clic sur l'image

document.addEventListener('DOMContentLoaded', function () {
	var modal = document.getElementById("modal");
	var modalImg = document.getElementById("modalImg");
	var isZoomed = false;
	var startX, startY, moveX = 0, moveY = 0;

	document.querySelectorAll('.details-img-container').forEach(item => {
		item.addEventListener('click', function () {
			var img = this.getElementsByTagName("img")[0];
			modal.style.display = "flex";
			modalImg.src = img.src;
			document.getElementById("caption").innerHTML = img.alt;
			// Réinitialise les transformations et les variables de déplacement
			isZoomed = false;
			modalImg.style.transform = "scale(1)";
			modalImg.style.cursor = 'zoom-in';
			moveX = 0;
			moveY = 0;
		});
	});

	var closeModal = document.getElementById("closeModal");
	closeModal.addEventListener('click', function () {
		modal.style.display = "none";
	});

	modalImg.addEventListener('click', function (e) {
		if (isZoomed) {
			this.style.transform = "scale(1)";
			this.style.cursor = 'zoom-in';
			isZoomed = false;
		} else {
			this.style.transform = "scale(2)";
			this.style.cursor = 'move';
			isZoomed = true;
			// Préparer pour le déplacement
			startX = e.clientX;
			startY = e.clientY;
		}
	});

	modalImg.addEventListener('mousemove', function (e) {
		if (isZoomed) {
			var diffX = e.clientX - startX;
			var diffY = e.clientY - startY;
			// Applique le déplacement avec une certaine limite pour éviter de sortir de l'image
			moveX += diffX;
			moveY += diffY;
			this.style.transform = `scale(2) translate(${moveX}px, ${moveY}px)`;
			// Réinitialise les points de départ pour le prochain mouvement
			startX = e.clientX;
			startY = e.clientY;
		}
	});


});



