<?php
$page_title = "Home";
include 'connection.php';
include 'header.php';

// Get latest updates from database
$updates_query = "SELECT * FROM site_updates ORDER BY created_at DESC LIMIT 10";
$updates_result = mysqli_query($db, $updates_query);
$updates = [];

if($updates_result && mysqli_num_rows($updates_result) > 0) {
    while($row = mysqli_fetch_assoc($updates_result)) {
        $updates[] = $row;
    }
} else {
    // Fallback to default updates if database query fails
    $updates = [
        ["text" => "Download ICNTE-2025 Conference Brochure.", "link" => "#"],
        ["text" => "Conference is open for paper submission.", "link" => "#"],
        ["text" => "Winners of IEI BLC-FCRIT excellence awards announced soon.", "link" => "#"],
        ["text" => "Important dates updated.", "link" => "#"],
        ["text" => "Early bird registration deadline approaching!", "link" => "#"],
        ["text" => "New keynote speaker announced for ICNTE-2025.", "link" => "#"]
    ];
}
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="relative w-full h-full">
            <img src="./images/collegepic.jpeg" alt="College Campus" class="w-full h-full object-cover aspect-[16/9]">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-left items-start text-left text-white">
                <div class="container mx-auto px-4 pt-4 flex flex-col md:flex-row gap-8">
                    <!-- Main Content -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-extrabold mb-3 drop-shadow-lg">
                            <br>IEEE & IAS Technically Co-Sponsored
                        </h1>
                        <h1 class="text-4xl font-bold mb-3 drop-shadow-lg">
                            6th Biennial International Conference on <br>
                            Nascent Technologies in Engineering
                        </h1>
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
                                            <div class="carousel-box bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center transition-transform transform hover:scale-105">
                                                <img src="images/Archana_Sharma.png" alt="Speaker 1" class="w-24 h-24 rounded-full mx-auto mb-2">
                                                <h3 class="text-xl font-semibold">Dr. Archana Sharma</h3>
                                                <p class="text-sm opacity-80">OS, Director, Beam Technology Development Group, BARC</p>
                                            </div>
                                        </li>
                                        <li class="splide__slide">
                                            <div class="carousel-box bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center transition-transform transform hover:scale-105">
                                                <img src="images/user.jpg" alt="Speaker 2" class="w-24 h-24 rounded-full mx-auto mb-2">
                                                <h3 class="text-xl font-semibold">Dr. Jane Smith</h3>
                                                <p class="text-sm opacity-80">Researcher, Stanford</p>
                                                <p class="text-sm opacity-80">Topic: Renewable Energy</p>
                                            </div>
                                        </li>
                                        <li class="splide__slide">
                                            <div class="carousel-box bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center transition-transform transform hover:scale-105">
                                                <img src="images/user.jpg" alt="Speaker 3" class="w-24 h-24 rounded-full mx-auto mb-2">
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

                    <!-- Updates Section -->
                    <div class="w-full md:w-96 bg-white rounded-lg shadow-lg p-4">
                        <h2 class="text-lg font-bold border-b pb-2 text-black">Latest Updates</h2>
                        <div class="updates-scroll mt-2" style="height: calc(100% - 60px);">
                            <div class="updates-content">
                                <?php
                                    foreach ($updates as $update) {
                                        echo '<div class="py-2">
                                                <a href="' . htmlspecialchars($update['link']) . '" class="text-blue-600 hover:underline">' . htmlspecialchars($update['text']) . '</a>
                                              </div>';
                                    }
                                ?>
                            </div>
                        </div>
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
                                <a href="' . htmlspecialchars($update['link']) . '" class="text-blue-600 hover:underline">' . htmlspecialchars($update['text']) . '</a>
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
            min-height: 2rem;
            line-height: 1.5rem;
        }
        .updates-content:hover {
            animation-play-state: paused;
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

        .carousel-box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
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
            <div class="button" :data-tooltip="tooltip" @click="register">
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
            methods: {
                register() {
                    window.location.href = 'instructions.php';
                }
            }
        });

        app.mount('#app');
    </script>

    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">About the Institute</h2>
                    <p class="text-gray-600 leading-relaxed about-text" id="institute-text">
                        Agnel charities' Fr. C. Rodrigues Institute of Technology, Vashi, was established in 1994 in the heart of Navi Mumbai, Vashi, as a part of Agnel Technical Education Complex. The aim of the Institute is to provide quality technical education in addition to inculcating moral values in its students.
                        <span class="hidden-content">Though the reputation of the institute rests mainly on the high quality, value-based technical education that it imparts, it has to its credit an invigorating, well-maintained campus, and comprehensive facilities. An Innovation and Product Development Centre is set up in the institute premises with industry grade infrastructure to encourage and support students and faculty members, to make their ideas and innovations a reality.
                        The institute is granted autonomy status by UGC from the academic year 2024-2025 onwards. The institute offers 05 undergraduate engineering programs (i.e. Computer, Mechanical, Electronics & Telecommunication, Electrical, and Information Technology) and 02 postgraduate engineering programs (Mechanical and Electrical). The institute is also a Mumbai University approved Research Centre in 03 engineering disciplines (i.e. Mechanical, Electronics & Telecommunication, and Electrical). The religious minority status has been granted to the institute and the institute is accredited by the National Board of Accreditation (NBA) and National Assessment and Accreditation Council (NAAC).
                        Click here for more details about the institute: www.fcrit.ac.in</span>
                    </p>
                    <button class="show-more-btn mt-2 text-blue-600 hover:text-blue-800" data-target="institute-text">Show More</button>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">About the Conference</h2>
                    <p class="text-gray-600 leading-relaxed about-text" id="conference-text">
                        It is proposed to organize the 6th Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2026)at Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai (INDIA). The previous five conferences, ICNTE 2015, ICNTE 2017, ICNTE 2019, ICNTE 2021 and ICNTE 2023, were technically co-sponsored by IEEE.
                        <span class="hidden-content">ICNTE 2021 and ICNTE 2023 were also sponsored by IAS. The papers presented in the conferences were published in IEEE Xplore which is a Scopus indexed digital library. The deliberations in ICNTE 2025 will emphasize on the thrust areas from the engineering fields of Mechanical, Electronics and Telecommunication, Electrical, Computer, Information Technology and Humanities and Basic Science. Fr. C. Rodrigues Institute of Technology has instituted the Best Paper Award (open to all)in each track of ICNTE 2025 to appreciate the hard work and dedication of the researchers towards carrying out novel research.</span>
                    </p>
                    <button class="show-more-btn mt-2 text-blue-600 hover:text-blue-800" data-target="conference-text">Show More</button>
                </div>
            </div>
        </div>
    </section>

    <style>
        .about-text .hidden-content {
            display: none;
        }
        .about-text.expanded .hidden-content {
            display: inline;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showMoreButtons = document.querySelectorAll('.show-more-btn');
            
            showMoreButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const textElement = document.getElementById(targetId);
                    
                    textElement.classList.toggle('expanded');
                    
                    if (this.textContent === 'Show More') {
                        this.textContent = 'Show Less';
                    } else {
                        this.textContent = 'Show More';
                    }
                });
            });
        });
    </script>
</main>

<?php include 'footer.php'; ?>