<?php session_start() ?>

<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Form</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
	<div class="min-h-full">
		<nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="index.php" aria-current="page" class="rounded-md text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium">Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <p class="text-gray-300"><?= "Hello {$_SESSION['username']}!" ?></p>
                                <a href="includes/logout.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Log Out</a>
                            <?php else: ?>
                                <a href="signup.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Register</a>
                                <a href="login.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Log In</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		
            <el-disclosure id="mobile-menu" hidden class="block md:hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="index.php" aria-current="page" class="rounded-md text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium">Dashboard</a>
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
						<?php if (isset($_SESSION['user_id'])): ?>
                            <p class="text-gray-300"><?= "Hello {$_SESSION['username']}!" ?></p>
                            <a href="includes/logout.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Log Out</a>
						<?php else: ?>
                            <a href="signup.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Register</a>
                            <a href="login.php" aria-current="page" class="rounded text-gray-300 hover:bg-gray-700 hover:text-white mx-2 px-3 py-2 text-sm font-medium">Log In</a>
						<?php endif; ?>
                    </div>
                </div>
            </el-disclosure>
	</nav>
	
