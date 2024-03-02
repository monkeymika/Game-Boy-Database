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
document.addEventListener('DOMContentLoaded', function () {
	let toggleTitles = document.querySelectorAll('.toggle-title');

	toggleTitles.forEach(function (title) {
		title.addEventListener('click', function () {
			// Fermez tous les contenus ouverts et réinitialisez les icônes
			document.querySelectorAll('.toggle-content').forEach(function (content) {
				if (content !== title.nextElementSibling) {
					content.classList.add('hidden');
					let otherIcon = content.previousElementSibling.querySelector('.fa-sort-down');
					if (otherIcon) {
						otherIcon.classList.remove('rotate');
					}
				}
			});

			// Cible le contenu déroulant directement lié et l'icône de flèche
			let contentToShow = title.nextElementSibling;
			let icon = title.querySelector('.fa-sort-down');

			// Bascule la classe 'hidden' pour montrer/cacher le contenu
			contentToShow.classList.toggle('hidden');

			// Ajoute/enlève la classe 'rotate' à l'icône pour la faire pivoter
			icon.classList.toggle('rotate');
		});
	});
});

/********************* SearchBar animation on click ****************************/

document.addEventListener('DOMContentLoaded', function () {
	let searchInput = document.querySelector('.search-bar input[type="text"]');
	let searchButton = document.querySelector('.search-bar .search-button');

	searchButton.addEventListener('click', function () {
		if (!searchInput.classList.contains('expanded')) {
			searchInput.classList.add('expanded');
			searchInput.focus();
			searchButton.innerHTML = '<i class="fa-solid fa-arrow-right"></i>';
			searchButton.type = 'submit'; // Change le type pour soumettre le formulaire
			searchButton.style.borderRadius = '0 15px 15px 0'; // Modifie le style du bouton lors de la transformation
		}
	});
});


/*NavBar animation on scroll */
document.addEventListener('DOMContentLoaded', function () {
	let nav = document.querySelector('nav');

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
	let modal = document.getElementById("modal");
	let modalImg = document.getElementById("modalImg");
	let isZoomed = false;
	let startX, startY, moveX = 0, moveY = 0;

	document.querySelectorAll('.details-img-container').forEach(item => {
		item.addEventListener('click', function () {
			let img = this.getElementsByTagName("img")[0];
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

	let closeModal = document.getElementById("closeModal");
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



//User modal
document.addEventListener('DOMContentLoaded', function () {
	var modal = document.getElementById("userModal");
	var btn = document.querySelector(".container-user");
	var span = document.getElementsByClassName("userClose")[0];

	// Lorsque l'utilisateur clique sur container-user, ouvre la modale
	btn.onclick = function () {
		modal.style.display = "flex";
	}

	// Lorsque l'utilisateur clique sur <span> (x), ferme la modale
	span.onclick = function () {
		modal.style.display = "none";
	}

	// Lorsque l'utilisateur clique n'importe où en dehors de la modale, ferme-la
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
});



document.addEventListener('DOMContentLoaded', function () {
	var modal = document.getElementById("userModal");
	var modalContent = document.querySelector(".userModal-content");
	// Stocker le contenu original de la modal
	var originalContent = modalContent.innerHTML;

	function closeModal() {
		modal.style.display = "none";
	}

	function openModal() {
		modal.style.display = "flex";
	}

	function addCloseEvent() {
		var span = document.querySelector(".userClose");
		span.onclick = closeModal;
		window.onclick = function (event) {
			if (event.target == modal) {
				closeModal();
			}
		};
	}

	// Fonction pour restaurer le contenu original de la modal
	function restoreOriginalContent() {
		modalContent.innerHTML = originalContent;
		addCloseEvent(); // Réajouter les écouteurs d'événement après avoir restauré le contenu original
		// Réassocier les événements aux boutons Login et Register
		document.getElementById("loginBtn").onclick = showLoginForm;
		document.getElementById("registerBtn").onclick = showRegisterForm;
	}

	function setModalContent(content) {
		modalContent.innerHTML = content;
		addCloseEvent(); // Réajoute l'écouteur sur la croix à chaque changement de contenu
		// Ajouter la flèche de retour avec l'événement pour restaurer le contenu original
		document.querySelector(".back-arrow").onclick = restoreOriginalContent;
	}

	function showLoginForm() {
		setModalContent(`
			<span class="userClose">&times;</span>
			<div class="back-arrow"><i class="fa-solid fa-arrow-left"></i></div>
			<img class="modal-img" src="./images/rockmanLogin_GB-database.png" alt="">
			<form class="modal-form">
				<input type="text" placeholder="User Name" name="user-name">
				<input type="password" placeholder="Password" name="password">
				<button type="submit">Login</button>
			</form>
			<p class="modal-links">
				<a href="#" id="linkToRegister">Not member yet? Register here!</a>
			</p>
			<p class="modal-links">
				<a href="#" onclick="alert('Functionality to be implemented'); return false;">Forgotten password?</a>
			</p>
		`);

		// Ajout de l'écouteur d'événements pour le lien d'inscription
		document.getElementById("linkToRegister").addEventListener('click', function (event) {
			event.preventDefault(); // Empêche le comportement par défaut du lien
			showRegisterForm(); // Affiche le formulaire d'inscription
		});
	}



	function showRegisterForm() {
		setModalContent(`
            <span class="userClose">&times;</span>
            <div class="back-arrow"><i class="fa-solid fa-arrow-left"></i></div>
			<img class="modal-img" src="./images/rockmanLogin_GB-database.png" alt="">
            <form class="modal-form">
                <input type="text" placeholder="User Name" name="user-name">
                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Confirm Password" name="confirm-password">
                <input type="email" placeholder="Email" name="email">
                <select name="country">
				<option value="">Select Country</option>
				<option value="Australia">Australia</option>
				<option value="Belgium">Belgium</option>
				<option value="Brazil">Brazil</option>
				<option value="Canada">Canada</option>
				<option value="China">China</option>
				<option value="France">France</option>
				<option value="Germany">Germany</option>
				<option value="Italy">Italy</option>
				<option value="Japan">Japan</option>
				<option value="Netherlands">Netherlands</option>
				<option value="Spain">Spain</option>
				<option value="Sweden">Sweden</option>
				<option value="Switzerland">Switzerland</option>
				<option value="UK">UK</option>
				<option value="USA">USA</option>
				<option value="Other">Other country</option>
                </select>
                <button type="submit">Register</button>
            </form>
        `);
	}

	// Réassocier les événements initiaux aux boutons
	document.getElementById("loginBtn").onclick = showLoginForm;
	document.getElementById("registerBtn").onclick = showRegisterForm;
});




