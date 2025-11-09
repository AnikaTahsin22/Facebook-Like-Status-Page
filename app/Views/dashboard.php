<?php
$title = 'Dashboard | AuthBoard';
ob_start();
?>

<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Welcome, <?= htmlspecialchars($user['name']) ?>! 👋</h1>
                    <p class="text-gray-600 mt-1">Your email: <?= htmlspecialchars($user['email']) ?></p>
                </div>
                <a 
                    href="/post/create" 
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:scale-105"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Post
                </a>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Recent Posts Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Posts</h2>
            
            <?php if (!empty($posts)): ?>
                <div class="space-y-6">
                    <?php foreach ($posts as $post): ?>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition duration-200">
                            <!-- Post Header -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        <?= strtoupper(substr($post['name'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900"><?= htmlspecialchars($post['name']) ?></h3>
                                        <p class="text-sm text-gray-500">Posted on <?= htmlspecialchars($post['created_at']) ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Post Content -->
                            <div class="mb-4">
                                <p class="text-gray-800 leading-relaxed whitespace-pre-wrap"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                            </div>

                            <!-- Post Image -->
                            <?php if (!empty($post['image'])): ?>
                                <div class="mb-4">
                                    <img 
                                        src="/uploads/<?= htmlspecialchars($post['image']) ?>" 
                                        alt="Post Image" 
                                        class="rounded-xl max-w-full h-auto max-h-96 object-cover border border-gray-200"
                                    >
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No posts yet</h3>
                        <p class="mt-2 text-gray-600">Be the first to share something with the community!</p>
                        <a 
                            href="/post/create" 
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition duration-200"
                        >
                            Create First Post
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>