<?php
$page_title = "Home";
include 'header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="relative w-full h-full">
            <img src="./images/collegepic.jpeg" alt="College Campus" class="w-full h-full object-cover aspect-[31/9]">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-left items-start text-left text-white">
                <div class="container mx-auto px-4 pt-4">
                    <h1 class="text-4xl font-extrabold mb-3 drop-shadow-lg">
                        <br>ICNTE 2025
                    </h1>
                    <h1 class="text-3xl font-bold mb-3 drop-shadow-lg">
                        6th Biennial International Conference on <br>
                        Nascent Technologies in Engineering
                    </h1>
                    <p class="text-base opacity-90 drop-shadow-lg">
                        Sector 9A, Vashi, Navi Mumbai, Maharashtra 400703
                    </p>
                    <div id="app" class="flex flex-wrap gap-3 mt-4">
                        <register-button tooltip="Submit papers"></register-button>
                        <download-button tooltip="Size: 20Mb"></download-button>
                    </div>

                    <!-- Keynote Speakers Carousel -->
                    <div class="mt-8 w-full max-w-3xl">
                        <h2 class="text-2xl font-bold mb-4 drop-shadow-lg">Keynote Speakers</h2>
                        <div class="splide" id="speakers-carousel">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                            <img src="images/speaker1.jpg" alt="Speaker 1" class="w-24 h-24 rounded-full mx-auto mb-2">
                                            <h3 class="text-xl font-semibold">Dr. John Doe</h3>
                                            <p class="text-sm opacity-80">Professor, MIT</p>
                                            <p class="text-sm opacity-80">Topic: AI in Engineering</p>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                            <img src="images/speaker2.jpg" alt="Speaker 2" class="w-24 h-24 rounded-full mx-auto mb-2">
                                            <h3 class="text-xl font-semibold">Dr. Jane Smith</h3>
                                            <p class="text-sm opacity-80">Researcher, Stanford</p>
                                            <p class="text-sm opacity-80">Topic: Renewable Energy</p>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                            <img src="images/speaker3.jpg" alt="Speaker 3" class="w-24 h-24 rounded-full mx-auto mb-2">
                                            <h3 class="text-xl font-semibold">Dr. Alan Turing</h3>
                                            <p class="text-sm opacity-80">Scientist, Cambridge</p>
                                            <p class="text-sm opacity-80">Topic: Quantum Computing</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Updates Section -->
            <div class="absolute top-4 right-4 h-[calc(100%-2rem)] w-96 bg-white rounded-lg shadow-lg p-4 z-50 md:block hidden">
                <h2 class="text-lg font-bold border-b pb-2">Latest Updates</h2>
                <div class="updates-scroll mt-2" style="height: calc(100% - 60px);">
                    <div class="updates-content">
                        <?php
                            $updates = [
                                ["text" => "Download ICNTE-2025 Conference Brochure.", "link" => "#"],
                                ["text" => "Conference is open for paper submission.", "link" => "#"],
                                ["text" => "Winners of IEI BLC-FCRIT excellence awards announced soon.", "link" => "#"],
                                ["text" => "Important dates updated.", "link" => "#"],
                                ["text" => "Early bird registration deadline approaching!", "link" => "#"],
                                ["text" => "New keynote speaker announced for ICNTE-2025.", "link" => "#"]
                            ];

                            foreach ($updates as $update) {
                                echo '<div class="py-2">
                                        <a href="' . $update['link'] . '" class="text-blue-600 hover:underline">' . $update['text'] . '</a>
                                      </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Updates Section for Mobile -->
    <div class="bg-white rounded-lg shadow-lg p-4 mx-4 mt-8 md:hidden">
        <h2 class="text-lg font-bold border-b pb-2">Latest Updates</h2>
        <div class="updates-scroll mt-2" style="height: 150px;">
            <div class="updates-content">
                <?php
                    foreach ($updates as $update) {
                        echo '<div class="py-2">
                                <a href="' . $update['link'] . '" class="text-blue-600 hover:underline">' . $update['text'] . '</a>
                              </div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Splide Carousel CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <style>
        .button {
            --width: 170px; /* Adjusted width */
            --height: 45px; /* Adjusted height */
            --tooltip-height: 35px;
            --tooltip-width: 120px;
            --gap-between-tooltip-to-button: 10px;
            --button-color: rgb(30, 55, 101); /* Your theme color */
            --tooltip-color: #fff;
            width: var(--width);
            height: var(--height);
            background: var(--button-color);
            position: relative;
            text-align: center;
            border-radius: 0.45em;
            font-family: "Arial", sans-serif;
            transition: background 0.3s;
            cursor: pointer;
        }

        .button::before {
            position: absolute;
            content: attr(data-tooltip);
            width: var(--tooltip-width);
            height: var(--tooltip-height);
            background-color: var(--tooltip-color);
            font-size: 0.9rem;
            color: #111;
            border-radius: .25em;
            line-height: var(--tooltip-height);
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
            left: calc(50% - var(--tooltip-width) / 2);
        }

        .button::after {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-top-color: var(--tooltip-color);
            left: calc(50% - 10px);
            bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
        }

        .button::after,
        .button::before {
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s;
        }

        .text {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button-wrapper,
        .text,
        .icon {
            overflow: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            color: #fff;
        }

        .text {
            top: 0;
        }

        .text,
        .icon {
            transition: top 0.5s;
        }

        .icon {
            color: #fff;
            top: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon svg {
            width: 24px;
            height: 24px;
        }

        .button:hover {
            background: rgb(95, 116, 220); /* Hover color */
        }

        .button:hover .text {
            top: -100%;
        }

        .button:hover .icon {
            top: 0;
        }

        .button:hover:before,
        .button:hover:after {
            opacity: 1;
            visibility: visible;
        }

        .button:hover:after {
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
        }

        .button:hover:before {
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
        }

        /* Updates Section */
        .updates-scroll {
            overflow: hidden;
            position: relative;
        }

        .updates-content {
            animation: scroll 20s linear infinite;
        }

        @keyframes scroll {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }

        /* Splide Carousel Custom Styles */
        .splide__slide {
            padding: 0 10px;
        }

        .splide__pagination {
            bottom: -20px;
        }

        .splide__pagination__page.is-active {
            background: #1e3765;
        }

        .splide__arrow {
            background: rgba(255, 255, 255, 0.8);
        }

        .splide__arrow:hover {
            background: rgba(255, 255, 255, 1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem; /* Smaller font size for mobile */
            }

            .hero-section h2 {
                font-size: 1.5rem; /* Smaller font size for mobile */
            }

            .hero-section p {
                font-size: 0.875rem; /* Smaller font size for mobile */
            }

            .updates-section {
                margin-top: 1rem; /* Add space between hero content and updates on mobile */
            }
        }
    </style>

    <!-- Splide Carousel JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#speakers-carousel', {
                type: 'loop',
                perPage: 3, // Display 3 speakers
                perMove: 1,
                gap: '1rem',
                autoplay: true,
                interval: 3000,
                pauseOnHover: true,
                breakpoints: {
                    768: {
                        perPage: 1, // Display 1 speaker on mobile
                    }
                }
            }).mount();
        });

        const app = Vue.createApp({});

        app.component('download-button', {
            props: ['tooltip'],
            template: `
            <div class="button" :data-tooltip="tooltip">
                <div class="button-wrapper">
                    <div class="text">Download brochure</div>
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17"></path>
                        </svg>
                    </span>
                </div>
            </div>
            `,
        });

        app.component('register-button', {
            props: ['tooltip'],
            template: `
            <div class="button" :data-tooltip="tooltip">
                <div class="button-wrapper">
                    <div class="text">Register now</div>
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            `,
        });

        app.mount('#app');
    </script>

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