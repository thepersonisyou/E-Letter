const nextButton = document.querySelector('.next-btn');
const video = document.querySelector('.hero-video');

const movieList = ['img/company/video/hero1.mp4','img/company/video/hero2.mp4','img/company/video/hero3.mp4',];

let index = 0;
nextButton.addEventListener('click', function(){

    index += 1
    video.src = movieList[index];

    if (index === 2){
        index = -1;
    }
})

document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider");
    const cards = document.querySelectorAll(".team-card");
    const totalCards = cards.length;
    let visibleCards = window.innerWidth <= 650 ? 1 : 3;
    let cardWidth = cards[0].offsetWidth + 20; // Lebar kartu + jarak antar kartu
    let index = visibleCards; // Mulai dari indeks tengah setelah cloning

    // **1️⃣ Clone kartu pertama & terakhir**
    for (let i = 0; i < visibleCards; i++) {
        let cloneFirst = cards[i].cloneNode(true);
        slider.appendChild(cloneFirst); // Tambah di akhir

        let cloneLast = cards[totalCards - 1 - i].cloneNode(true);
        slider.insertBefore(cloneLast, slider.firstChild); // Tambah di awal
    }

    // **2️⃣ Atur posisi awal slider (Geser ke tengah)**
    slider.style.transition = "none";
    slider.style.transform = `translateX(-${index * cardWidth}px)`;

    function moveSlide(direction) {
        index += direction;
        slider.style.transition = "transform 0.4s ease-in-out";
        slider.style.transform = `translateX(-${index * cardWidth}px)`;

        setTimeout(() => {
            // **Jika di akhir kloningan, reset ke awal**
            if (index >= totalCards + visibleCards) {
                slider.style.transition = "none";
                index = visibleCards;
                slider.style.transform = `translateX(-${index * cardWidth}px)`;
            }

            // **Jika di awal kloningan, reset ke akhir**
            if (index < visibleCards) {
                slider.style.transition = "none";
                index = totalCards + visibleCards - 1;
                slider.style.transform = `translateX(-${index * cardWidth}px)`;
            }
        }, 400);
    }

    // Tombol Prev
    document.querySelector(".prev").addEventListener("click", function () {
        moveSlide(-1);
    });

    // Tombol Next
    document.querySelector(".next").addEventListener("click", function () {
        moveSlide(1);
    });

    // Update ukuran saat resize
    window.addEventListener("resize", () => {
        visibleCards = window.innerWidth <= 650 ? 1 : 3;
        cardWidth = cards[0].offsetWidth + 20;
        slider.style.transition = "none";
        slider.style.transform = `translateX(-${index * cardWidth}px)`;
    });
});



let items = document.querySelectorAll('.slider .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    
    let active = 3;
    function loadShow(){
        let stt = 0;
        items[active].style.transform = `none`;
        items[active].style.zIndex = 1;
        items[active].style.filter = 'none';
        items[active].style.opacity = 1;
        for(var i = active + 1; i < items.length; i++){
            stt++;
            items[i].style.transform = `translateX(${120*stt}px) scale(${1 - 0.2*stt}) perspective(16px) rotateY(-1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }
        stt = 0;
        for(var i = active - 1; i >= 0; i--){
            stt++;
            items[i].style.transform = `translateX(${-120*stt}px) scale(${1 - 0.2*stt}) perspective(16px) rotateY(1deg)`;
            items[i].style.zIndex = -stt;
            items[i].style.filter = 'blur(5px)';
            items[i].style.opacity = stt > 2 ? 0 : 0.6;
        }
    }
    loadShow();
    next.onclick = function(){
        active = active + 1 < items.length ? active + 1 : active;
        loadShow();
    }
    prev.onclick = function(){
        active = active - 1 >= 0 ? active - 1 : active;
        loadShow();
    }