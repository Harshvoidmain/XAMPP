<?php
$page_title = "Home";
include 'header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="relative w-full h-full">
            <img src="images/collegepic.jpeg" alt="College Campus" class="w-full h-full object-cover aspect-[30/9]">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-start text-left text-white">
                <!-- Wrap all text inside ONE container -->
                <div class="container mx-auto px-4">
                    <h1 class="text-6xl font-extrabold mb-4 drop-shadow-lg">
                        Fr. Conceicao Rodrigues Institute of Technology
                    </h1>
                    <p class="text-2xl opacity-90 drop-shadow-lg">
                        Sector 9A, Vashi, Navi Mumbai, Maharashtra 400703
                    </p>
                    <a href="contact.php" class="mt-8 bg-white text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 inline-flex items-center w-fit shadow-md">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>


    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">About the Institute</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Agnel charities' Fr. C. Rodrigues Institute of Technology, Vashi, was established in 1994 in the heart of Navi Mumbai, Vashi, as a part of Agnel Technical Education Complex. The aim of the Institute is to provide quality technical education in addition to inculcating moral values in its students.
                    </p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">About the Conference</h2>
                    <p class="text-gray-600 leading-relaxed">
                        It is proposed to organize the 6th IEEE & IAS Technically Co-Sponsored Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2025) at Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai (INDIA). The previous conferences were technically co-sponsored by IEEE.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
