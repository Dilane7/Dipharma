

const navlinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu-outline' ? 'close' : 'menu-outline'
            navlinks.classList.toggle('top-[12%]')
        }

        const slides = document.querySelector('.carousel-slides');
        const prevButton = document.querySelector('.carousel-prev');
        const nextButton = document.querySelector('.carousel-next');

        let counter = 0;
        let intervalId;

        function slide() {
            slides.style.transform = `translateX(-${counter * 100}%)`;
        }

        function nextSlide() {
            counter = (counter + 1) % slides.children.length;
            slide();
        }

        function startCarousel() {
            intervalId = setInterval(nextSlide, 3000); // Changez 3000 pour modifier la vitesse (en millisecondes)
        }

        function stopCarousel() {
            clearInterval(intervalId);
        }

        prevButton.addEventListener('click', () => {
            stopCarousel();
            if (counter <= 0) {
                counter = slides.children.length - 1;
            } else {
                counter--;
            }
            slide();
            startCarousel();
        });

        nextButton.addEventListener('click', () => {
            stopCarousel();
            nextSlide();
            startCarousel();
        });

        startCarousel();



        function creerCompteur(elementId, valeurArret, intervalleMs) {
      const compteurElement = document.getElementById(elementId);
      let compteur = 1000;
      let intervalId;

      function mettreAJourCompteur() {
        compteurElement.textContent = compteur;
      }

      function incrementerCompteur() {
        compteur++;
        mettreAJourCompteur();

        if (compteur >= valeurArret) {
          clearInterval(intervalId);
          console.log(`Compteur ${elementId} arrêté à : ${valeurArret}`);
        }
      }

      mettreAJourCompteur(); // Affichage initial
      intervalId = setInterval(incrementerCompteur, intervalleMs);
    }

    // Initialisation des trois compteurs avec leurs propres paramètres
    creerCompteur('compteur1', 1244, 10); // Compteur 1 s'arrête à 5, incrémente chaque seconde
    creerCompteur('compteur2', 1750, 10); // Compteur 2 s'arrête à 15, incrémente toutes les demi-secondes
    creerCompteur('compteur3', 1323, 10); // Compteur 3 s'arrête à 10, incrémente toutes les deux secondes


    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const togglerButton = document.querySelector('.menu-toggler');
        const isOpen = menu.classList.toggle('menu-open'); // Ajoute/supprime la classe et retourne true si ajoutée

        // Change la translation pour afficher/cacher
        if (isOpen) {
            menu.style.transform = 'translateY(0)';
            togglerButton.setAttribute('aria-expanded', 'true');
             // Optionnel: changer l'icône en 'close'
             // togglerButton.querySelector('ion-icon[name="menu-outline"]').style.display = 'none';
             // togglerButton.querySelector('ion-icon[name="close-outline"]').style.display = 'block';
        } else {
            menu.style.transform = 'translateY(-120%)'; // Remettre la valeur initiale de masquage
            togglerButton.setAttribute('aria-expanded', 'false');
             // Optionnel: remettre l'icône 'menu'
            // togglerButton.querySelector('ion-icon[name="menu-outline"]').style.display = 'block';
             // togglerButton.querySelector('ion-icon[name="close-outline"]').style.display = 'none';
        }
    }

    // Optionnel: Fermer le menu si on clique en dehors sur mobile
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobile-menu');
        const togglerButton = document.querySelector('.menu-toggler');

        // Vérifie si le menu est ouvert et si le clic n'est ni sur le menu, ni sur le bouton burger
        if (menu.classList.contains('menu-open') && !menu.contains(event.target) && !togglerButton.contains(event.target)) {
            toggleMobileMenu(); // Appelle la fonction pour fermer
        }
    });

     // Assurez-vous que le menu est caché si la fenêtre est redimensionnée vers une taille desktop
     window.addEventListener('resize', () => {
        const menu = document.getElementById('mobile-menu');
        if (window.innerWidth >= 768 && menu.classList.contains('menu-open')) { // 768px = md breakpoint par défaut de Tailwind
            toggleMobileMenu(); // Ferme le menu
        }
    });
