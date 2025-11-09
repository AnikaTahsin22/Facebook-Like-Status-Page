<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'AuthBoard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <?php if (!empty($_SESSION['user'])): ?>
        <!-- Navigation Bar for Authenticated Users -->
        <nav class="bg-white shadow-lg border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="/dashboard" class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-bold text-indigo-600">AuthBoard</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/dashboard" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-lg font-medium transition duration-200">
                            <i class="fas fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="/logout" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-lg font-medium transition duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-500">
                <p class="flex items-center justify-center space-x-2">
                    <span>AuthBoard - teaching project</span>
                    <span class="text-indigo-500">•</span>
                    <span>Built with <i class="fas fa-heart text-red-500 mx-1"></i> for learning</span>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>