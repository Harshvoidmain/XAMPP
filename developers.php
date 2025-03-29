<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Developers</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include("header.php"); ?>

    <!-- Breadcrumb Navigation -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <nav aria-label="Breadcrumb" class="text-sm">
                <ol class="list-reset flex text-gray-600 text-xl">
                    <li>
                        <a href="index.php" class="text-blue-600 hover:underline">Home</a>
                    </li>
                    <li>
                        <span class="mx-2">/</span>
                    </li>
                    <li class="font-bold text-gray-800">Developers</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Title -->
    <div class="container mx-auto px-4 my-8">
        <h2 class="text-center text-5xl font-bold">Developers</h2>
        <hr class="my-4 border-t-2 border-gray-300">
    </div>

    <!-- Developers Section -->
    <div class="container mx-auto px-4 mb-8">
        <div class="max-w-3xl mx-auto bg-white p-10 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-3xl font-semibold mb-6 text-center">Meet Our Developers</h3>
            
            <div class="space-y-6 text-2xl">
                <div class="flex justify-between border-b pb-4">
                    <div>
                        <p class="font-semibold">Anjali More</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600 text-lg"><a href="mailto:1023207@comp.fcrit.ac.in">1023207@comp.fcrit.ac.in</a></p>
                    </div>
                </div>

                <div class="flex justify-between border-b pb-4">
                    <div>
                        <p class="font-semibold">Bhumi Padwal</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600 text-lg"><a href="mailto:1023215@comp.fcrit.ac.in">1023215@comp.fcrit.ac.in</a></p>
                    </div>
                </div>

                <div class="flex justify-between border-b pb-4">
                    <div>
                        <p class="font-semibold">Harsh Patil</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600 text-lg"><a href="mailto:1023218@comp.fcrit.ac.in">1023218@comp.fcrit.ac.in</a></p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="font-semibold">Sandra Kappani</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600 text-lg"><a href="mailto:1023238@comp.fcrit.ac.in">1023238@comp.fcrit.ac.in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>