<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isset($page_title) ? $page_title . ' - ICNTE 2025' : 'ICNTE 2025'; ?></title>
  <meta name="description" content="6th Biennial International Conference on Nascent Technologies in Engineering" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-[Inter] min-h-screen bg-white">
  <!-- Header Section -->
  <header class="bg-white py-6 shadow-md">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
      <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
        <img src="images/logo5.png" alt="ICNTE Logo" class="w-16 h-16 md:w-24 md:h-24" />
        <div class="max-w-2xl text-center sm:text-left">
          <h3 class="font-bold text-gray-900 mt-6">
          Agnel Charities<br>
          Fr. C. Rodrigues Institute of Technology
          </h3>
          <p class="text-blue-700 font-semibold text-sm sm:text-base">
          Sector 9A, Vashi, Navi Mumbai, Maharashtra 400703            
                          </p>
          <h2 class="text-gray-500 mt-1 text-xs md:text-sm">31st January-1st February 2025</h2>
        </div>
      </div>
      <img src="images/college_logo1.png" alt="College Logo" class="w-16 h-16 md:w-24 md:h-24 order-first md:order-last" />
    </div>
  </header>
  <!-- Navigation -->
  <nav class="nav-gradient text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-2">
        <!-- Hamburger Menu for Mobile -->
        <button id="mobile-menu-button" class="md:hidden p-1.5 hover:bg-blue-800 rounded-lg transition-all duration-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-2 lg:space-x-4 flex-1">
          <a href="index.php" class="nav-item px-2 py-1.5 block transition-all duration-300 hover:text-blue-200">Home</a>
          
          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              Call for Papers
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="tracks_and_sessions.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Tracks and Sessions</a></li>
            </ul>
          </div>

          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              Conference Details
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="important_dates.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Important Dates</a></li>
              <li><a href="venue.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Venue</a></li>
              <li><a href="publications.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Publications</a></li>
            </ul>
          </div>

          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              People
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="advisory_committee.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Advisory Committee</a></li>
              <li><a href="organizing_committee.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Organizing Committee</a></li>
              <li><a href="reviewers_panel.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Reviewer's Panel</a></li>
            </ul>
          </div>

          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              Registration
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Instructions</a></li>
              <li><a href="fees.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Registration Fees</a></li>
            </ul>
          </div>

          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              Archives
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="icnte2023.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">ICNTE 2023</a></li>
              <li><a href="icnte2021.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">ICNTE 2021</a></li>
              <li><a href="icnte2019.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">ICNTE 2019</a></li>
              <li><a href="icnte2017.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">ICNTE 2017</a></li>
              <li><a href="icnte2015.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">ICNTE 2015</a></li>
            </ul>
          </div>

          <div class="dropdown relative group">
            <a href="#" class="dropdown-toggle flex items-center gap-1 px-2 py-1.5 group-hover:text-blue-200 transition-all duration-300">
              Downloads
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="dropdown-menu absolute left-0 mt-0 w-52 text-white rounded-b-lg nav-dropdown-gradient shadow-lg">
              <li><a href="ieee_paper_template.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">IEEE Paper Template</a></li>
              <li><a href="https://www.ieee.org/conferences/publishing/templates.html" target="_blank" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">IEEE Paper Template (LATEX)</a></li>
              <li><a href="ieee_copyright_form.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">IEEE Copyright Form</a></li>
              <li><a href="sample_ieee_copyright_form.php" class="block px-4 py-2 hover:bg-blue-700 hover:pl-6 transition-all duration-300 border-l-4 border-transparent hover:border-white">Sample Filled IEEE Copyright Form</a></li>
            </ul>
          </div>
        </div>

        <!-- Login Button -->
        <a href="admin_login.php" target="_blank" class="hidden md:flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-lg transition-all duration-300 ml-4">
          <i class="fas fa-sign-in-alt mr-2"></i>
          Admin Login
        </a>
      </div>
    </div>
  </nav>
  
  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="fixed inset-0 z-50 hidden md:hidden">
    <!-- Backdrop -->
    <div id="mobile-menu-backdrop" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity duration-300 opacity-0"></div>
    
    <!-- Menu Content -->
    <div id="mobile-menu-content" class="fixed left-0 top-0 h-full w-64 bg-blue-900 transform -translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
      <!-- Menu Header -->
      <div class="p-4 border-b border-blue-800 flex justify-between items-center">
        <h3 class="text-white font-semibold">Menu</h3>
        <button id="close-mobile-menu" class="text-white p-2 hover:bg-blue-800 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      
      <!-- Menu Items -->
      <div class="py-4">
        <ul class="space-y-2">
          <li>
            <a href="index.php" class="block px-4 py-2 text-white hover:bg-blue-800">Home</a>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>Call for Papers</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="tracks_and_sessions.php" class="block px-4 py-2 text-white hover:bg-blue-800">Tracks and Sessions</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>Conference Details</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="important_dates.php" class="block px-4 py-2 text-white hover:bg-blue-800">Important Dates</a></li>
                <li><a href="venue.php" class="block px-4 py-2 text-white hover:bg-blue-800">Venue</a></li>
                <li><a href="publications.php" class="block px-4 py-2 text-white hover:bg-blue-800">Publications</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>People</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="advisory_committee.php" class="block px-4 py-2 text-white hover:bg-blue-800">Advisory Committee</a></li>
                <li><a href="organizing_committee.php" class="block px-4 py-2 text-white hover:bg-blue-800">Organizing Committee</a></li>
                <li><a href="reviewers_panel.php" class="block px-4 py-2 text-white hover:bg-blue-800">Reviewer's Panel</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>Registration</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="instructions.php" class="block px-4 py-2 text-white hover:bg-blue-800">Instructions</a></li>
                <li><a href="fees.php" class="block px-4 py-2 text-white hover:bg-blue-800">Registration Fees</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>Archives</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="icnte2023.php" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2023</a></li>
                <li><a href="icnte2021.php" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2021</a></li>
                <li><a href="icnte2019.php" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2019</a></li>
                <li><a href="icnte2017.php" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2017</a></li>
                <li><a href="icnte2015.php" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2015</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 text-white hover:bg-blue-800 cursor-pointer">
                <span>Downloads</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6 mt-2 space-y-1">
                <li><a href="download/ICNTE_2025.pdf" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE 2025 Brochure</a></li>
                <li><a href="download/IEEE_Paper_Format.docx" class="block px-4 py-2 text-white hover:bg-blue-800">IEEE Paper Template</a></li>
                <li><a href="https://www.ieee.org/conferences/publishing/templates.html" target="_blank" class="block px-4 py-2 text-white hover:bg-blue-800">IEEE Paper Template (LATEX)</a></li>
                <li><a href="download/IEEE_Copyright_Form.pdf" class="block px-4 py-2 text-white hover:bg-blue-800">IEEE Copyright Form</a></li>
                <li><a href="download/Sample_IEEE_Copyright_Form.pdf" class="block px-4 py-2 text-white hover:bg-blue-800">Sample Filled IEEE Copyright Form</a></li>
                <li><a href="download/ICNTE 2025-Poster-Template-48x36.pptx" class="block px-4 py-2 text-white hover:bg-blue-800">ICNTE Poster Template</a></li>
              </ul>
            </details>
          </li>
          <li class="px-4 pt-4">
            <a href="admin_login.php" target="_blank" class="block w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 text-center">
              <i class="fas fa-sign-in-alt mr-2"></i>
              Admin Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <style>
    /* Enhanced dropdown styles */
    .dropdown-menu {
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      min-width: 12rem;
      top: 100%;
      opacity: 0;
      transform: translateY(-10px);
    }
    
    .group:hover .dropdown-menu {
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
      opacity: 1;
      transform: translateY(0);
    }
    
    .nav-gradient {
      background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #1e3a8a 100%);
    }
    
    .nav-dropdown-gradient {
      background: linear-gradient(180deg, #1e3a8a 0%, #1e4baf 100%);
    }
    
    .mobile-nav-gradient {
      background: linear-gradient(180deg, #1e3a8a 0%, #172554 100%);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    #mobile-menu.show {
      opacity: 1;
      transform: scaleY(1);
    }
    
    /* Add a subtle bounce to nav items on hover */
    .nav-item:hover {
      transform: translateY(-2px);
    }
    
    /* Subtle pulse animation for active page */
    .nav-active {
      position: relative;
      text-shadow: 0 0 10px rgba(255,255,255,0.5);
    }
    
    .nav-active::before {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: #93c5fd; /* blue-300 */
      animation: pulseAnimation 2s infinite;
    }
    
    @keyframes pulseAnimation {
      0% { opacity: 0.6; }
      50% { opacity: 1; }
      100% { opacity: 0.6; }
    }
      /* Contact Button Styles */
  .fixed {
    position: fixed;
  }

  .bottom-8 {
    bottom: 2rem;
  }

  .right-8 {
    right: 2rem;
  }

  .z-50 {
    z-index: 50;
  }

  #contact-us {
    position: relative;
    padding: 12px 35px;
    background: #4c83fa;
    font-size: 17px;
    font-weight: 1000;
    color: #ffffff;
    border: 3px solid #4c83fa;
    border-radius: 8px;
    box-shadow: 0 0 0 #ffffff;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
  }

  .star-1,
  .star-2,
  .star-3,
  .star-4,
  .star-5,
  .star-6 {
    position: absolute;
    filter: drop-shadow(0 0 0 #4c83fa);
    z-index: -5;
    transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
  }

  .star-1 {
    top: 20%;
    left: 20%;
    width: 25px;
  }

  .star-2 {
    top: 45%;
    left: 45%;
    width: 15px;
  }

  .star-3 {
    top: 40%;
    left: 40%;
    width: 5px;
  }

  .star-4 {
    top: 20%;
    left: 40%;
    width: 8px;
  }

  .star-5 {
    top: 25%;
    left: 45%;
    width: 15px;
  }

  .star-6 {
    top: 5%;
    left: 50%;
    width: 5px;
  }

  #contact-us:hover {
    background: transparent;
    color: #4c83fa;
    box-shadow: 0 0 0px #4c83fa;
  }

  #contact-us:hover .star-1 {
    top: -80%;
    left: -30%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  #contact-us:hover .star-2 {
    top: -0%;
    left: 10%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  #contact-us:hover .star-3 {
    top: 55%;
    left: 25%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  #contact-us:hover .star-4 {
    top: 30%;
    left: 80%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  #contact-us:hover .star-5 {
    top: 25%;
    left: 115%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  #contact-us:hover .star-6 {
    top: 5%;
    left: 60%;
    filter: drop-shadow(0 0 0px #4c83fa);
    z-index: 2;
  }

  .fil0 {
    fill: #4c83fa;
  }

    /* Mobile Menu Styles */
    #mobile-menu {
      visibility: hidden;
      transition: visibility 0.3s ease-in-out;
    }

    #mobile-menu.show {
      visibility: visible;
    }

    #mobile-menu-backdrop {
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
    }

    #mobile-menu.show #mobile-menu-backdrop {
      opacity: 1;
    }

    #mobile-menu-content {
      transform: translateX(-100%);
      transition: transform 0.3s ease-in-out;
    }

    #mobile-menu.show #mobile-menu-content {
      transform: translateX(0);
    }

    /* Prevent body scroll when menu is open */
    body.menu-open {
      overflow: hidden;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const mobileMenuContent = document.getElementById('mobile-menu-content');
      const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');
      const closeMobileMenu = document.getElementById('close-mobile-menu');

      function openMobileMenu() {
        document.body.classList.add('menu-open');
        mobileMenu.classList.remove('hidden');
        requestAnimationFrame(() => {
          mobileMenu.classList.add('show');
        });
      }

      function closeMobileMenuFn() {
        document.body.classList.remove('menu-open');
        mobileMenu.classList.remove('show');
        setTimeout(() => {
          mobileMenu.classList.add('hidden');
        }, 300);
      }

      // Mobile menu button click
      mobileMenuButton.addEventListener('click', (e) => {
        e.stopPropagation();
        openMobileMenu();
      });

      // Close button click
      closeMobileMenu.addEventListener('click', (e) => {
        e.stopPropagation();
        closeMobileMenuFn();
      });

      // Backdrop click
      mobileMenuBackdrop.addEventListener('click', (e) => {
        e.stopPropagation();
        closeMobileMenuFn();
      });

      // Prevent menu content clicks from closing the menu
      mobileMenuContent.addEventListener('click', (e) => {
        e.stopPropagation();
      });

      // Close menu on window resize (if desktop size)
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) { // md breakpoint
          closeMobileMenuFn();
        }
      });

      // Handle mobile menu details elements
      const detailsElements = mobileMenuContent.querySelectorAll('details');
      detailsElements.forEach(details => {
        details.addEventListener('toggle', (e) => {
          e.stopPropagation();
        });
      });
    });
  </script>
<!-- Floating Button -->
<div class="fixed bottom-8 right-8 z-50">
  <a href="contact.php">
    <button id="contact-us" class="relative px-8 py-3 bg-blue-600 text-white font-bold rounded-lg border-2 border-blue-600 hover:bg-transparent hover:text-blue-600 transition-all duration-300 ease-in-out">
      Contact Us
      <div class="star-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-6 h-6">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
      <div class="star-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-4 h-4">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
      <div class="star-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-2 h-2">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
      <div class="star-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-3 h-3">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
      <div class="star-5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-4 h-4">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
      <div class="star-6">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="w-2 h-2">
          <path class="fil0" d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"/>
        </svg>
      </div>
    </button>
  </a>
</div>
</body>
</html>
