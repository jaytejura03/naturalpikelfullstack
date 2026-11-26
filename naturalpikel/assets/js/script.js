// /* =========================================================
// NATURAL PICKLE — JAVASCRIPT
// ========================================================= */

// document.addEventListener("DOMContentLoaded", () => {

// /* =======================================================
// NAVBAR SCROLL EFFECT
// ======================================================= */

// const navbar = document.getElementById("navbar");

// const handleNavbarScroll = () => {

// if (window.scrollY > 50) {
//   navbar.classList.add("scrolled");
// } else {
//   navbar.classList.remove("scrolled");
// }

// };

// window.addEventListener("scroll", handleNavbarScroll);

// handleNavbarScroll();

// /* =======================================================
// MOBILE NAVBAR AUTO CLOSE
// ======================================================= */

// const navMenu = document.getElementById("navMenu");

// if (navMenu) {

//     const navLinks = navMenu.querySelectorAll(
//         ".nav-link, .premium-order-btn, .premium-admin-btn"
//     );

//     navLinks.forEach(link => {

//         link.addEventListener("click", () => {

//             if (
//                 window.innerWidth < 992 &&
//                 navMenu.classList.contains("show") &&
//                 typeof bootstrap !== "undefined"
//             ) {

//                 const collapse =
//                     bootstrap.Collapse.getOrCreateInstance(navMenu);

//                 collapse.hide();
//             }

//         });

//     });

// }

// /* =======================================================
// LIVE PRICE LIST SEARCH
// ======================================================= */

// const searchInput = document.getElementById("search");
// const priceTable = document.getElementById("priceTable");

// if (searchInput && priceTable) {

// const rows =
//   priceTable.querySelectorAll("tbody tr");

// searchInput.addEventListener("input", () => {
  
//   const query =
//     searchInput.value.trim().toLowerCase();
  
//   rows.forEach(row => {
    
//     const itemName =
//       row.querySelector("td")?.textContent
//       .toLowerCase() || "";
    
//     if (itemName.includes(query)) {
      
//       row.style.display = "";
      
//     } else {
      
//       row.style.display = "none";
      
//     }
    
//   });
  
// });

// }

// /* =======================================================
// SCROLL REVEAL ANIMATION
// ======================================================= */

// const revealElements = document.querySelectorAll(
// ".product-card, .feature-card, .about-image-wrapper, .section-heading, .contact-box"
// );

// if ("IntersectionObserver" in window) {

// const observer = new IntersectionObserver(
//   (entries, observer) => {
    
//     entries.forEach(entry => {
      
//       if (entry.isIntersecting) {
        
//         entry.target.classList.add("revealed");
        
//         observer.unobserve(entry.target);
        
//       }
      
//     });
    
//   },
//   {
//     threshold: 0.12
//   }
// );

// revealElements.forEach(element => {
  
//   element.classList.add("reveal");
  
//   observer.observe(element);
  
// });

// }

// /* =======================================================
// CURRENT YEAR
// ======================================================= */

// const yearElement = document.getElementById("year");

// if (yearElement) {

// yearElement.textContent =
//   new Date().getFullYear();

// }

// /* =======================================================
// SMOOTH ANCHOR SCROLL
// ======================================================= */

// document.querySelectorAll('a[href^="#"]').forEach(link => {

// link.addEventListener("click", event => {
  
//   const targetId =
//     link.getAttribute("href");
  
//   if (
//     !targetId ||
//     targetId === "#"
//   ) {
//     return;
//   }
  
//   const target =
//     document.querySelector(targetId);
  
//   if (!target) {
//     return;
//   }
  
//   event.preventDefault();
  
//   const navbarHeight =
//     navbar ? navbar.offsetHeight : 0;
  
//   const targetPosition =
//     target.getBoundingClientRect().top +
//     window.scrollY -
//     navbarHeight;
  
//   window.scrollTo({
//     top: targetPosition,
//     behavior: "smooth"
//   });
  
// });

// });

// /* =======================================================
// BUTTON RIPPLE EFFECT
// ======================================================= */

// document.querySelectorAll(".btn").forEach(button => {

// button.addEventListener("click", function(event) {
  
//   const ripple =
//     document.createElement("span");
  
//   const rect =
//     this.getBoundingClientRect();
  
//   const size =
//     Math.max(rect.width, rect.height);
  
//   const x =
//     event.clientX -
//     rect.left -
//     size / 2;
  
//   const y =
//     event.clientY -
//     rect.top -
//     size / 2;
  
//   ripple.style.width = `${size}px`;
//   ripple.style.height = `${size}px`;
//   ripple.style.left = `${x}px`;
//   ripple.style.top = `${y}px`;
  
//   ripple.classList.add("ripple");
  
//   this.appendChild(ripple);
  
//   setTimeout(() => {
//     ripple.remove();
//   }, 600);
  
// });

// });

// /* =======================================================
// IMAGE LOAD EFFECT
// ======================================================= */

// const images =
// document.querySelectorAll("img");

// images.forEach(image => {

// image.addEventListener("load", () => {
  
//   image.classList.add("image-loaded");
  
// });

// });

// /* =======================================================
// CONSOLE MESSAGE
// ======================================================= */

// console.log(
// "%c Natural Pickle 🌿 ",
// "background:#0b6b3a;color:#f2d477;font-size:18px;font-weight:bold;padding:8px;"
// );

// console.log(
// "Homemade Taste of Gujarat ❤️"
// );

// });


// // // =========================================================
// // // MOBILE NAVBAR - CLOSE MENU AFTER CLICK
// // // =========================================================

// // document.addEventListener("DOMContentLoaded", function () {

// //     const navMenu = document.getElementById("navMenu");

// //     if (!navMenu) return;

// //     const navLinks = navMenu.querySelectorAll(".nav-link, .premium-order-btn, .premium-admin-btn");

// //     navLinks.forEach(function (link) {

// //         link.addEventListener("click", function () {

// //             if (window.innerWidth < 992) {

// //                 const collapse =
// //                     bootstrap.Collapse.getOrCreateInstance(navMenu);

// //                 collapse.hide();

// //             }

// //         });

// //     });

// // });

/* =========================================================
NATURAL PICKLE — MAIN JAVASCRIPT
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    /* --- NAVBAR SCROLL EFFECT --- */
    const navbar = document.getElementById("navbar");

    const handleNavbarScroll = () => {
        if (!navbar) return;
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    };

    window.addEventListener("scroll", handleNavbarScroll);
    handleNavbarScroll();

    /* --- MOBILE NAVBAR AUTO CLOSE ON LINK CLICK --- */
    const navMenu = document.getElementById("navMenu");

    if (navMenu) {
        const navLinks = navMenu.querySelectorAll(
            ".nav-link, .premium-order-btn, .premium-admin-btn"
        );

        navLinks.forEach(link => {
            link.addEventListener("click", () => {
                if (
                    window.innerWidth < 992 &&
                    navMenu.classList.contains("show") &&
                    typeof bootstrap !== "undefined"
                ) {
                    const collapse = bootstrap.Collapse.getOrCreateInstance(navMenu);
                    collapse.hide();
                }
            });
        });
    }

    /* --- LIVE PRICE LIST SEARCH --- */
    const searchInput = document.getElementById("search");
    const priceTable = document.getElementById("priceTable");

    if (searchInput && priceTable) {
        const rows = priceTable.querySelectorAll("tbody tr");

        searchInput.addEventListener("input", () => {
            const query = searchInput.value.trim().toLowerCase();

            rows.forEach(row => {
                const itemName = row.querySelector("td")?.textContent.toLowerCase() || "";
                if (itemName.includes(query)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    }

    /* --- SCROLL REVEAL ANIMATION --- */
    const revealElements = document.querySelectorAll(
        ".product-card, .feature-card, .about-image-wrapper, .section-heading, .contact-box"
    );

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("revealed");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12 }
        );

        revealElements.forEach(element => {
            element.classList.add("reveal");
            observer.observe(element);
        });
    }

    /* --- AUTOMATIC CURRENT YEAR UPDATE --- */
    const yearElement = document.getElementById("year");
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

    /* --- SMOOTH ANCHOR SCROLL --- */
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", event => {
            const targetId = link.getAttribute("href");

            if (!targetId || targetId === "#") return;

            const target = document.querySelector(targetId);
            if (!target) return;

            event.preventDefault();
            const navbarHeight = navbar ? navbar.offsetHeight : 0;
            const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });
        });
    });

    /* --- BUTTON RIPPLE EFFECT --- */
    document.querySelectorAll(".btn").forEach(button => {
        button.addEventListener("click", function(event) {
            const ripple = document.createElement("span");
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;

            ripple.style.width = `${size}px`;
            ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.classList.add("ripple");

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    /* --- CONSOLE LOG BRANDING --- */
    console.log(
        "%c Natural Pickle 🌿 ",
        "background:#0b6b3a;color:#f2d477;font-size:18px;font-weight:bold;padding:8px;"
    );
    console.log("Homemade Taste of Gujarat ❤️");
});