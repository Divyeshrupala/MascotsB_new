const toggleBtn = document.getElementById("mobileMenuToggle");
  const mobileMenu = document.getElementById("mobileMenu");

  toggleBtn.addEventListener("click", () => {
    mobileMenu.style.display = mobileMenu.style.display === "none" || mobileMenu.style.display === "" ? "block" : "none";
  });


window.addEventListener('resize', function () {
  if (window.innerWidth >= 992 && mobileMenu) {
    mobileMenu.style.display = 'none';
  }
});
