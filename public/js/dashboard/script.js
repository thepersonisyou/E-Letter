const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed")
});

const themeToggle = document.querySelector("#theme-toggle");

// Cek status tema di localStorage
if (isLight()) {
    themeToggle.checked = false; // Light Mode
    toggleRootClass();
} else {
    themeToggle.checked = true; // Dark Mode
}

// Event listener untuk switch
themeToggle.addEventListener("change", () => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);
}

function toggleLocalStorage() {
    if (isLight()) {
        localStorage.removeItem("light");
    } else {
        localStorage.setItem("light", "set");
    }
}

function isLight() {
    return localStorage.getItem("light");
}
