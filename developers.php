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
                <ol class="list-reset flex text-gray-600">
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
        <h2 class="text-center text-3xl font-bold">Developers</h2>
        <hr class="my-4 border-t-2 border-gray-300">
    </div>

    <!-- Developers Section -->
    <div class="container mx-auto px-4 mb-8">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold mb-4 text-center">Meet Our Developers</h3>
            
            <div class="space-y-4">
                <div class="flex justify-between border-b pb-2">
                    <div>
                        <p class="font-semibold">ABC</p>
                        <p class="text-gray-600">(Lead Developer)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600"><a href="mailto:abc@example.com">abc@example.com</a></p>
                        <p class="text-blue-900"><a href="tel:+9198765XXXXX">+91 98765 XXXXX</a></p>
                    </div>
                </div>

                <div class="flex justify-between border-b pb-2">
                    <div>
                        <p class="font-semibold">DEF</p>
                        <p class="text-gray-600">(Frontend Developer)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600"><a href="mailto:def@example.com">def@example.com</a></p>
                        <p class="text-blue-900"><a href="tel:+9198765XXXXX">+91 98765 XXXXX</a></p>
                    </div>
                </div>

                <div class="flex justify-between border-b pb-2">
                    <div>
                        <p class="font-semibold">GHI</p>
                        <p class="text-gray-600">(Backend Developer)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600"><a href="mailto:ghi@example.com">ghi@example.com</a></p>
                        <p class="text-blue-900"><a href="tel:+9198765XXXXX">+91 98765 XXXXX</a></p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="font-semibold">JKL</p>
                        <p class="text-gray-600">(Database Administrator)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-600"><a href="mailto:jkl@example.com">jkl@example.com</a></p>
                        <p class="text-blue-900"><a href="tel:+919876XXXXX">+91 98765 XXXXX</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>