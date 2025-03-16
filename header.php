<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isset($page_title) ? $page_title . ' - ICNTE 2025' : 'ICNTE 2025'; ?></title>
  <meta name="description" content="6th Biennial International Conference on Nascent Technologies in Engineering" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/styles.css" />
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body class="font-[Inter] min-h-screen bg-white">
  <!-- Navigation -->
  <nav class="bg-blue-900 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <!-- Hamburger Menu for Mobile -->
        <button id="mobile-menu-button" class="md:hidden p-2 hover:bg-blue-800 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- Desktop Navigation -->
        <ul class="hidden md:flex space-x-4 lg:space-x-8">
          <li>
            <a href="index.php" class="nav-item transition-all duration-300 hover:text-gray-300">Home</a>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Call for Papers
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="tracks_and_sessions.php" class="block px-4 py-2 hover:bg-blue-100">Tracks and Sessions</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Conference Details
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="important_dates.php" class="block px-4 py-2 hover:bg-blue-100">Important Dates</a></li>
              <li><a href="venue.php" class="block px-4 py-2 hover:bg-blue-100">Venue</a></li>
              <li><a href="publications.php" class="block px-4 py-2 hover:bg-blue-100">Publications</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              People
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="advisory_committee.php" class="block px-4 py-2 hover:bg-blue-100">Advisory Committee</a></li>
              <li><a href="organizing_committee.php" class="block px-4 py-2 hover:bg-blue-100">Organizing Committee</a></li>
              <li><a href="reviewers_panel.php" class="block px-4 py-2 hover:bg-blue-100">Reviewer's Panel</a></li>
              <li><a href="keynote_speakers.php" class="block px-4 py-2 hover:bg-blue-100">Keynote Speakers</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Submission
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-100">Paper Submission</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Registration
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-100">Instructions</a></li>
              <li><a href="fees.php" class="block px-4 py-2 hover:bg-blue-100">Registration Fees</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Archives
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="icnte2023.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2023</a></li>
              <li><a href="icnte2021.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2021</a></li>
              <li><a href="icnte2019.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2019</a></li>
              <li><a href="icnte2017.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2017</a></li>
              <li><a href="icnte2015.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2015</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Downloads
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="download/ICNTE_2025.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">ICNTE 2025 Brochure</a></li>
              <li><a href="download/IEEE_Paper_Format.docx" class="block px-4 py-2 hover:bg-blue-100" target="_blank">IEEE Paper Template</a></li>
              <li><a href="https://www.ieee.org/conferences/publishing/templates.html" class="block px-4 py-2 hover:bg-blue-100">IEEE Paper Template (LATEX)</a></li>
              <li><a href="download/IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">IEEE Copyright Form</a></li>
              <li><a href="download/Sample_IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">Sample Filled IEEE Copyright Form</a></li>
              <li><a href="download/ICNTE 2025-Poster-Template-48x36.pptx" class="block px-4 py-2 hover:bg-blue-100" target="_blank">ICNTE Poster Template</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden absolute bg-blue-900 w-full left-0 top-full py-2">
        <ul class="space-y-2 px-4">
          <li>
            <a href="index.php" class="block px-4 py-2 hover:bg-blue-800">Home</a>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Call for Papers
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="tracks_and_sessions.php" class="block px-4 py-2 hover:bg-blue-700">Tracks and Sessions</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Conference Details
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="important_dates.php" class="block px-4 py-2 hover:bg-blue-700">Important Dates</a></li>
                <li><a href="venue.php" class="block px-4 py-2 hover:bg-blue-700">Venue</a></li>
                <li><a href="publications.php" class="block px-4 py-2 hover:bg-blue-700">Publications</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                People
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="advisory_committee.php" class="block px-4 py-2 hover:bg-blue-700">Advisory Committee</a></li>
                <li><a href="organizing_committee.php" class="block px-4 py-2 hover:bg-blue-700">Organizing Committee</a></li>
                <li><a href="reviewers_panel.php" class="block px-4 py-2 hover:bg-blue-700">Reviewer's Panel</a></li>
                <li><a href="keynote_speakers.php" class="block px-4 py-2 hover:bg-blue-700">Keynote Speakers</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
              Submission
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-100">Paper Submission</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Registration
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-100">Instructions</a></li>
              <li><a href="fees.php" class="block px-4 py-2 hover:bg-blue-100">Registration Fees</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Archives
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="icnte2023.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2023</a></li>
              <li><a href="icnte2021.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2021</a></li>
              <li><a href="icnte2019.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2019</a></li>
              <li><a href="icnte2017.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2017</a></li>
              <li><a href="icnte2015.php" class="block px-4 py-2 hover:bg-blue-100">ICNTE 2015</a></li>
            </ul>
          </li>
          <li class="relative group">
            <a href="#" class="nav-item flex items-center gap-1 transition-all duration-300 hover:text-gray-300">
              Downloads
              <svg class="w-4 h-4 transition-transform transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            <ul class="absolute left-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-md opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <li><a href="download/ICNTE_2025.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">ICNTE 2025 Brochure</a></li>
              <li><a href="download/IEEE_Paper_Format.docx" class="block px-4 py-2 hover:bg-blue-100" target="_blank">IEEE Paper Template</a></li>
              <li><a href="https://www.ieee.org/conferences/publishing/templates.html" class="block px-4 py-2 hover:bg-blue-100">IEEE Paper Template (LATEX)</a></li>
              <li><a href="download/IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">IEEE Copyright Form</a></li>
              <li><a href="download/Sample_IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-100" target="_blank">Sample Filled IEEE Copyright Form</a></li>
              <li><a href="download/ICNTE 2025-Poster-Template-48x36.pptx" class="block px-4 py-2 hover:bg-blue-100" target="_blank">ICNTE Poster Template</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden absolute bg-blue-900 w-full left-0 top-full py-2">
        <ul class="space-y-2 px-4">
          <li>
            <a href="index.php" class="block px-4 py-2 hover:bg-blue-800">Home</a>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Call for Papers
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="tracks_and_sessions.php" class="block px-4 py-2 hover:bg-blue-700">Tracks and Sessions</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Conference Details
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="important_dates.php" class="block px-4 py-2 hover:bg-blue-700">Important Dates</a></li>
                <li><a href="venue.php" class="block px-4 py-2 hover:bg-blue-700">Venue</a></li>
                <li><a href="publications.php" class="block px-4 py-2 hover:bg-blue-700">Publications</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                People
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="advisory_committee.php" class="block px-4 py-2 hover:bg-blue-700">Advisory Committee</a></li>
                <li><a href="organizing_committee.php" class="block px-4 py-2 hover:bg-blue-700">Organizing Committee</a></li>
                <li><a href="reviewers_panel.php" class="block px-4 py-2 hover:bg-blue-700">Reviewer's Panel</a></li>
                <li><a href="keynote_speakers.php" class="block px-4 py-2 hover:bg-blue-700">Keynote Speakers</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Submission
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-700">Paper Submission</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Registration
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="instructions.php" class="block px-4 py-2 hover:bg-blue-700">Instructions</a></li>
                <li><a href="fees.php" class="block px-4 py-2 hover:bg-blue-700">Registration Fees</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Archives
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="icnte2023.php" class="block px-4 py-2 hover:bg-blue-700">ICNTE 2023</a></li>
                <li><a href="icnte2021.php" class="block px-4 py-2 hover:bg-blue-700">ICNTE 2021</a></li>
                <li><a href="icnte2019.php" class="block px-4 py-2 hover:bg-blue-700">ICNTE 2019</a></li>
                <li><a href="icnte2017.php" class="block px-4 py-2 hover:bg-blue-700">ICNTE 2017</a></li>
                <li><a href="icnte2015.php" class="block px-4 py-2 hover:bg-blue-700">ICNTE 2015</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details class="group">
              <summary class="flex items-center justify-between px-4 py-2 hover:bg-blue-800 cursor-pointer">
                Downloads
                <svg class="w-4 h-4 transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <ul class="pl-6">
                <li><a href="download/ICNTE_2025.pdf" class="block px-4 py-2 hover:bg-blue-700" target="_blank">ICNTE 2025 Brochure</a></li>
                <li><a href="download/IEEE_Paper_Format.docx" class="block px-4 py-2 hover:bg-blue-700" target="_blank">IEEE Paper Template</a></li>
                <li><a href="https://www.ieee.org/conferences/publishing/templates.html" class="block px-4 py-2 hover:bg-blue-700">IEEE Paper Template (LATEX)</a></li>
                <li><a href="download/IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-700" target="_blank">IEEE Copyright Form</a></li>
                <li><a href="download/Sample_IEEE_Copyright_Form.pdf" class="block px-4 py-2 hover:bg-blue-700" target="_blank">Sample Filled IEEE Copyright Form</a></li>
                <li><a href="download/ICNTE 2025-Poster-Template-48x36.pptx" class="block px-4 py-2 hover:bg-blue-700" target="_blank">ICNTE Poster Template</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header Section -->
  <header class="bg-white py-6 shadow-md">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
      <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
        <img src="images/logo5.png" alt="ICNTE Logo" class="w-16 h-16 md:w-24 md:h-24" />
        <div class="max-w-2xl text-center sm:text-left">
          <p class="text-blue-700 font-semibold text-sm md:text-base">IEEE &amp; IAS Technically Co-Sponsored</p>
          <h1 class="text-xl md:text-2xl font-bold text-gray-900 mt-1">
            6th Biennial International Conference on Nascent Technologies in Engineering
          </h1>
          <p class="text-gray-500 mt-2 text-sm md:text-base">31st January-1st February 2025</p>
        </div>
      </div>
      <img src="images/college_logo1.png" alt="College Logo" class="w-16 h-16 md:w-24 md:h-24 order-first md:order-last" />
    </div>
  </header>

  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
      if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
        mobileMenu.classList.add('hidden');
      }
    });

    // Handle dropdowns in mobile menu
    document.querySelectorAll('#mobile-menu details').forEach(detail => {
      detail.addEventListener('click', (e) => {
        document.querySelectorAll('#mobile-menu details').forEach(otherDetail => {
          if (otherDetail !== detail) otherDetail.removeAttribute('open');
        });
      });
    });
  </script>
</body>
</html>