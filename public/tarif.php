<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Khissal Pretty Salon - Tarifs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwind CSS CDN -->
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
        <h2 class="text-4xl font-serif font-bold text-center mb-8" style="color: white;">NOS TARIFS</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-2xl font-serif font-semibold mb-4" style="color: white;">COIFFURE</h3>
                <ul class="space-y-2">
                    <li class="flex justify-between"><span style="color: white;">BABYLISS & WAVY</span><span style="color: white;">100.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">BRUSHING</span><span style="color: white;">60.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">COUPE</span><span style="color: white;">140.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">LES POINTES</span><span style="color: white;">70.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">COLORATION RACINE SANS AMONIAQUE</span><span style="color: white;">300.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">COLORATION RACINE STANDARD</span><span style="color: white;">200.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">COLORATION CHEVEUX</span><span style="color: white;">70.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">RINÇAGE COLORATION</span><span style="color: white;">200.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">OMBRÉ & BALAYAGE</span><span style="color: white;">70.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">PROTÉINE BIO</span><span style="color: white;">170.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">PROTÉINE STANDARD</span><span style="color: white;">70.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">SOINS HYDRATANT</span><span style="color: white;">100.00 DH</span></li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-serif font-semibold mb-4" style="color: white;">ESTHÉTIQUE & ONGLERIE</h3>
                <ul class="space-y-2">
                    <li class="flex justify-between"><span style="color: white;">PEDICURE SPA</span><span style="color: white;">180.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">PEDICURE STANDARD</span><span style="color: white;">100.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">MANUCURE SPA</span><span style="color: white;">120.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">MANUCURE STANDARD</span><span style="color: white;">80.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">FAUX ONGLES</span><span style="color: white;">100.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">GEL</span><span style="color: white;">300.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">REMPLISSAGE GEL</span><span style="color: white;">200.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">POSE VERNIS NORMAL</span><span style="color: white;">40.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">POSE VERNIS PERMANENT</span><span style="color: white;">120.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">POSE VERNIS PERMANENT</span><span style="color: white;">200.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">DÉPOSE VERNIS PERMANENT</span><span style="color: white;">60.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">EPILATION COMPLÈTE</span><span style="color: white;">250.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">SOURCILS</span><span style="color: white;">30.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">DUVET</span><span style="color: white;">30.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">VISAGE</span><span style="color: white;">80.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">AISSELLES</span><span style="color: white;">40.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">BRAS</span><span style="color: white;">60.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">DEMI-BRAS</span><span style="color: white;">50.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">JAMBES</span><span style="color: white;">120.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">DEMI-JAMBES</span><span style="color: white;">70.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">MAILLOT INTÉGRALE</span><span style="color: white;">80.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">BORD MAILLOT</span><span style="color: white;">60.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">SOIN VISAGE BASIC</span><span style="color: white;">250.00 DH</span></li>
                    <li class="flex justify-between"><span style="color: white;">SOIN HYDRAFACIAL</span><span style="color: white;">400.00 DH</span></li>
                </ul>
            </div>
        </div>
        <section class="bg-gray-200 rounded-lg shadow-md p-4 mt-6">
            <h2 class="text-3xl font-serif font-bold">Book Your Appointment</h2>
            <p class="mt-2 text-gray-700 text-lg">Schedule your next appointment with us easily!</p>
            <div class="flex space-x-4 mt-4">
                <a href="./book.php" class="inline-block bg-gray-800 text-gray-300 py-2 px-4 rounded hover:bg-gray-700">Book Now</a>

            </div>
        </section>
    </main>
</body>
<?php
include '../templates/footer.php';
?>
</html>