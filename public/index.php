<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Khissal Pretty Salon - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwind CSS CDN -->
    <script>
        let currentIndex = 0;
        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-slide');
            slides.forEach((slide, i) => {
                slide.style.display = (i === index) ? 'block' : 'none';
            });
        }
        function nextSlide() {
            const slides = document.querySelectorAll('.carousel-slide');
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }
        function prevSlide() {
            const slides = document.querySelectorAll('.carousel-slide');
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }
        window.onload = () => {
            showSlide(currentIndex);
            setInterval(nextSlide, 3000); // Change slide every 3 seconds
        };
    </script>
    <style>
        body {
            background-image: url('https://i.pinimg.com/564x/f6/7e/a5/f67ea5a83ecab337d494d6d908460545.jpg');
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; /* Centers the image */
        }
    </style>
</head>
<body>
<?php
include '../templates/header.php';
?>
    <main class="p-6">
        <section class="relative">
            <div class="carousel">
                <div class="carousel-slide relative">
                    <img src="https://www.shutterstock.com/image-photo/beautiful-girl-hair-coloring-ultra-600nw-1978556438.jpg" alt="Image 1" class="w-full h-120 object-cover rounded-lg opacity-75" />
                    <div class="absolute inset-0 bg-gray-800 opacity-50 flex items-center justify-center">
                        <h2 class="text-gray-300 text-9xl font-serif">Khissal Pretty Salon</h2>
                    </div>
                </div>
                <div class="carousel-slide relative">
                    <img src="https://media.istockphoto.com/id/1322686195/photo/beautiful-looking-young-blonde-woman-with-the-middle-length-hair-wearing-in-a-delicate-makeup.jpg?s=612x612&w=0&k=20&c=uZPx0H1C4ZNpz42-SziHL6vxImoO6Cjaeqt29R8r-9k=" alt="Image 2" class="w-full h-120 object-cover rounded-lg opacity-75" />
                    <div class="absolute inset-0 bg-gray-800 opacity-50 flex items-center justify-center">
                        <h2 class="text-gray-300 text-9xl font-serif">Beauty is power. a smile is its sword.</h2>
                    </div>
                </div>
                <div class="carousel-slide relative">
                    <img src="https://www.shutterstock.com/image-photo/beauty-fashion-model-woman-colorful-600nw-2095721098.jpg" alt="Image 3" class="w-full h-120 object-cover rounded-lg opacity-75" />
                    <div class="absolute inset-0 bg-gray-800 opacity-50 flex items-center justify-center">
                        <h2 class="text-gray-300 text-9xl font-serif">Your hair is your best accessory.</h2>
                    </div>
                </div>
                <button onclick="prevSlide()" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 p-2 rounded-full">❮</button>
                <button onclick="nextSlide()" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 p-2 rounded-full">❯</button>
            </div>
        </section>


        <section class="mt-12 bg-gray-200 rounded-lg shadow-md p-8">
    <h2 class="text-4xl font-serif font-bold text-center mb-8">NOS TARIFS</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h3 class="text-2xl font-serif font-semibold mb-4">COIFFURE</h3>
            <ul class="space-y-2">
                <li class="flex justify-between"><span>BABYLISS & WAVY</span><span>100.00 DH</span></li>
                <li class="flex justify-between"><span>BRUSHING</span><span>60.00 DH</span></li>
                <li class="flex justify-between"><span>COUPE</span><span>140.00 DH</span></li>
                <li class="flex justify-between"><span>LES POINTES</span><span>70.00 DH</span></li>
            </ul>

            <h3 class="text-2xl font-serif font-semibold mt-6 mb-4">COLORATION</h3>
            <ul class="space-y-2">
                <li class="flex justify-between"><span>COLORATION RACINE SANS AMONIAQUE</span><span>300.00 DH</span></li>
                <li class="flex justify-between"><span>COLORATION RACINE STANDARD</span><span>200.00 DH</span></li>
                <li class="flex justify-between"><span>COLORATION CHEVEUX</span><span>130.00 DH</span></li>
                <li class="flex justify-between"><span>RINÇAGE COLORATION</span><span>200.00 DH</span></li>
                <li class="flex justify-between"><span>OMBRÉ & BALAYAGE</span><span>70.00 DH</span></li>
            </ul>

            <h3 class="text-2xl font-serif font-semibold mt-6 mb-4">LISSAGES&SOINS CHVX</h3>
            <ul class="space-y-2">
                <li class="flex justify-between"><span>PROTÉINE BIO</span><span>170.00 DH</span></li>
                <li class="flex justify-between"><span>PROTÉINE STANDARD</span><span>70.00 DH</span></li>
                <li class="flex justify-between"><span>SOINS HYDRATANT</span><span>100.00 DH</span></li>
            </ul>

            <h3 class="text-2xl font-serif font-semibold mt-6 mb-4">CÉRÉMONIES</h3>
            <ul class="space-y-2">
                <li class="flex justify-between"><span>MAKEUP SOIRÉE</span><span>300.00 DH</span></li>
                <li class="flex justify-between"><span>COIFFURE SOIRÉE</span><span>200.00 DH</span></li>
            </ul>
        </div>

        <div>
            <h3 class="text-2xl font-serif font-semibold mb-4">ESTHÉTIQUE & ONGLERIE</h3>
            <ul class="space-y-2">
                <li class="flex justify-between"><span>PEDICURE SPA</span><span>180.00 DH</span></li>
                <li class="flex justify-between"><span>PEDICURE STANDARD</span><span>100.00 DH</span></li>
                <li class="flex justify-between"><span>MANUCURE SPA</span><span>120.00 DH</span></li>
                <li class="flex justify-between"><span>MANUCURE STANDARD</span><span>80.00 DH</span></li>
                <li class="flex justify-between"><span>FAUX ONGLES</span><span>100.00 DH</span></li>
                <li class="flex justify-between"><span>GEL</span><span>300.00 DH</span></li>
                <li class="flex justify-between"><span>REMPLISSAGE GEL</span><span>200.00 DH</span></li>
                <li class="flex justify-between"><span>POSE VERNIS NORMAL</span><span>40.00 DH</span></li>
                <li class="flex justify-between"><span>POSE VERNIS PERMANENT</span><span>120.00 DH</span></li>
                <li class="flex justify-between"><span>POSE VERNIS PERMANENT</span><span>200.00 DH</span></li>
                <li class="flex justify-between"><span>DÉPOSE VERNIS PERMANENT</span><span>60.00 DH</span></li>
                <li class="flex justify-between"><span>EPILATION COMPLÈTE</span><span>250.00 DH</span></li>
                <li class="flex justify-between"><span>SOURCILS</span><span>30.00 DH</span></li>
                <li class="flex justify-between"><span>DUVET</span><span>30.00 DH</span></li>
                <li class="flex justify-between"><span>VISAGE</span><span>80.00 DH</span></li>
                <li class="flex justify-between"><span>AISSELLES</span><span>40.00 DH</span></li>
                <li class="flex justify-between"><span>BRAS</span><span>60.00 DH</span></li>
                <li class="flex justify-between"><span>DEMI-BRAS</span><span>50.00 DH</span></li>
                <li class="flex justify-between"><span>JAMBES</span><span>120.00 DH</span></li>
                <li class="flex justify-between"><span>DEMI-JAMBES</span><span>70.00 DH</span></li>
                <li class="flex justify-between"><span>MAILLOT INTÉGRALE</span><span>80.00 DH</span></li>
                <li class="flex justify-between"><span>BORD MAILLOT</span><span>60.00 DH</span></li>
                <li class="flex justify-between"><span>SOIN VISAGE BASIC</span><span>250.00 DH</span></li>
                <li class="flex justify-between"><span>SOIN HYDRAFACIAL</span><span>400.00 DH</span></li>
            </ul>
        </div>
    </div>
</section>
        <section class="bg-gray-200 rounded-lg shadow-md p-4 mt-6">
            <h2 class="text-3xl font-serif font-bold">Book Your Appointment</h2>
            <p class="mt-2 text-gray-700 text-lg">Schedule your next appointment with us easily!</p>
            <a href="./book.php" class="mt-4 inline-block bg-gray-800 text-gray-300 py-2 px-4 rounded hover:bg-gray-700">Book Now</a>
        </section>
    </main>

</body>
<?php
include '../templates/footer.php';


?>
</html>