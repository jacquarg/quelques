function initializeMenu() {
  document.getElementById("menu-btn").addEventListener("click" ,
    ev => {
      document.getElementById("menu").style.display = "block"
    })
  document.getElementById("close-menu").addEventListener("click" ,
    ev => {
      document.getElementById("menu").style.display = "none"
    })
}
