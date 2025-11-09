<?php
$title = 'Login | AuthBoard';
ob_start();
?>
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-xl p-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">AuthBoard</h1>
            <h2 class="text-2xl font-semibold text-gray-800">Welcome Back</h2>
            <p class="text-gray-600 mt-2">Sign in to your account</p>
        </div>
        
        <form method="POST" action="/login" class="mt-8 space-y-6">
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        class="relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                        placeholder="Enter your email"
                    >
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                        placeholder="Enter your password"
                    >
                </div>
            </div>

            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:scale-[1.02]"
                >
                    Sign In
                </button>
            </div>

            <div class="text-center">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-200">
                        Register now
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>