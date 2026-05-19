<?php 
use Framework\Session;
?>

<!-- Nav -->
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">

        <!-- Logo Mark + Wordmark -->
        <h1 class="text-3xl font-semibold">
            <a href="/" class="flex items-center gap-2" style="color:#F8FAFC !important; text-decoration:none;">
                <!-- SVG Logo Mark -->
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <!-- Outer rounded square -->
                    <rect width="34" height="34" rx="9" fill="#6366F1"/>
                    <!-- Briefcase body -->
                    <rect x="8" y="14" width="18" height="12" rx="2" fill="white" fill-opacity="0.95"/>
                    <!-- Briefcase handle -->
                    <path d="M13 14V12C13 11.4477 13.4477 11 14 11H20C20.5523 11 21 11.4477 21 12V14" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                    <!-- Center clasp line -->
                    <line x1="17" y1="14" x2="17" y2="26" stroke="#6366F1" stroke-width="1.6"/>
                    <!-- Horizontal belt line -->
                    <line x1="8" y1="20" x2="26" y2="20" stroke="#6366F1" stroke-width="1.6"/>
                </svg>
                <!-- Wordmark -->
                <span style="font-weight:800; letter-spacing:-0.02em; color:#F8FAFC;">
                    Job<span style="color:#818cf8;">seek</span>
                </span>
            </a>
        </h1>

        <nav class="space-x-4">
            <?php if (Session::has('user')) : ?>
                <div class="flex justify-between items-center gap-4">
                    <div>Welcome <?= Session::get('user')['name'] ?></div>
                    <form method="POST" action="/auth/logout">
                        <button type="submit" 
                        class="text-white inline hover:underline">Logout</button>
                    </form>
                    <a href="/listings/create" 
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"><i class="fa fa-edit"></i> Post a Job</a>
                </div>
            <?php else: ?>

                <a href="/auth/login" class="text-white hover:underline">Login</a>
                <a href="/auth/register" class="text-white hover:underline">Register</a>

            <?php endif; ?>
        </nav>
    </div>
</header>
