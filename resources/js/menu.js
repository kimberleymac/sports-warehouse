// Get the menu toggle and menu (from the DOM)
const menuToggle = document.querySelector("#main-menu .menu__toggle");
const menu = document.querySelector("#main-menu .menu");

// Check that the elements exist (menu and menu toggle)
if (menuToggle && menu) {
  
  // Add click/tap event listener to toggle the menu open/closed
  menuToggle.addEventListener("click", () => {
    
    // Check if menu is currently open/expanded
    const isCurrentlyOpen = menu.classList.contains("active");
    
    // Add/remove the "active" class from the menu
    menu.classList.toggle("active");
    
    // Update the aria-expanded attribute state (to reflect if the menu will now be open/closed)
    menuToggle.setAttribute("aria-expanded", (isCurrentlyOpen ? "false" : "true"));
    
    // Set new menu icon + label for the menu toggle
    const toggleIconHtml = isCurrentlyOpen
      ? `<i class="fas fa-bars" aria-label="Open menu"></i>`
      : `<i class="fas fa-times" aria-label="Close menu"></i>`;
    
    // Update menu icon + label
    menuToggle.querySelector("a").innerHTML = toggleIconHtml;
    
  }, false);
  
}