import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {
    // Element references
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const submenuToggles = document.querySelectorAll('.submenu-toggle');

    // Breakpoint for mobile view
    const mobileBreakpoint = 768; // Adjust based on your CSS breakpoint

    // Toggle sidebar visibility
    if (hamburger && sidebar) {
        hamburger.addEventListener('click', function () {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    if (closeSidebar && sidebar) {
        closeSidebar.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
        });
    }

    // Submenu toggle functionality
    if (submenuToggles) {
        submenuToggles.forEach((toggle) => {
            toggle.addEventListener('click', function () {
                const submenu = this.nextElementSibling; // Get the next sibling element (submenu)
                if (submenu) {
                    submenu.classList.toggle('hidden'); // Toggle the "hidden" class
                    const icon = this.querySelector('.submenu-icon'); // Find the submenu icon
                    if (icon) {
                        // Change icon based on submenu visibility
                        icon.textContent = submenu.classList.contains('hidden') ? '▼' : '▲';
                    }
                }
            });
        });
    }

    window.addEventListener('resize', function () {
        if (window.innerWidth >= mobileBreakpoint || window.innerWidth < mobileBreakpoint) {
            sidebar.classList.add('-translate-x-full');
        }
    });
});

window.addEventListener("scroll", function() {
    let header = document.getElementById("header");
    let logo = document.getElementById("logo");
    let title = document.getElementById("header-title");

    if (window.scrollY > 50) {
      header.classList.add("py-2");
      header.classList.remove("py-4");

      logo.classList.add("w-12");
      logo.classList.remove("w-20");

      title.classList.add("text-lg");
      title.classList.remove("text-2xl");
    } else {
      header.classList.add("py-4");
      header.classList.remove("py-2");

      logo.classList.add("w-20");
      logo.classList.remove("w-12");

      title.classList.add("text-2xl");
      title.classList.remove("text-lg");
    }
  });


// JavaScript to handle the automatic slider change every 2 seconds
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-items img');
const totalSlides = slides.length;

const sliderItems = document.querySelector('.slider-items');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

// Function to change the slide
function changeSlide() {
  currentSlide = (currentSlide + 1) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Automatic slide transition every 2 seconds
setInterval(changeSlide, 2000);

// Next and Prev buttons functionality
nextBtn.addEventListener('click', () => {
  currentSlide = (currentSlide + 1) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
});

prevBtn.addEventListener('click', () => {
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
});

const readMoreBtn = document.getElementById('readMoreBtn');
const description = document.querySelector('.text-gray-700');

readMoreBtn.addEventListener('click', () => {
  // Toggle deskripsi untuk menampilkan seluruh teks
  description.classList.toggle('line-clamp-none');
  if (description.classList.contains('line-clamp-none')) {
    readMoreBtn.textContent = 'Baca Lebih Sedikit';
  } else {
    readMoreBtn.textContent = 'Baca Selengkapnya';
  }
});

