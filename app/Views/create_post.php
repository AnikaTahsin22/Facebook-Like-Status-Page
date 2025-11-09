<?php
$title = 'Create Post | AuthBoard';
ob_start();
?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back to Dashboard -->
        <div class="mb-6">
            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 transition duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Create Post Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-edit text-white text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Create New Post</h2>
                        <p class="text-indigo-100">Share your thoughts with the community</p>
                    </div>
                </div>
            </div>

            <!-- Post Form -->
            <form method="POST" action="/post/create" class="p-6 space-y-6" enctype="multipart/form-data">
                <!-- Content Textarea -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-pencil-alt mr-2 text-indigo-500"></i>
                        What's on your mind?
                    </label>
                    <textarea 
                        id="content" 
                        name="content" 
                        required 
                        rows="6"
                        class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 resize-none shadow-sm"
                        placeholder="Share your thoughts, ideas, or experiences..."
                        oninput="updateCharCount(this)"
                    ></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs text-gray-500">Express yourself freely</span>
                        <span id="charCount" class="text-xs text-gray-500">0 characters</span>
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-image mr-2 text-indigo-500"></i>
                        Add an image (optional)
                    </label>
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="hidden mb-4">
                        <div class="relative inline-block">
                            <img id="preview" class="h-48 rounded-xl shadow-md border border-gray-200">
                            <button 
                                type="button" 
                                onclick="removeImage()"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition duration-200"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Upload Area -->
                    <div 
                        id="uploadArea" 
                        class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-400 transition duration-200 cursor-pointer bg-gray-50 hover:bg-gray-100"
                        onclick="document.getElementById('image').click()"
                    >
                        <div class="space-y-2 text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                            <div class="flex flex-col text-sm text-gray-600">
                                <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Click to upload
                                </span>
                                <p class="text-xs text-gray-500 mt-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                    <input 
                        id="image" 
                        name="image" 
                        type="file" 
                        class="hidden" 
                        accept="image/*"
                        onchange="previewImage(this)"
                    >
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-4 border-t border-gray-200">
                    <a 
                        href="/dashboard" 
                        class="flex-1 py-4 px-6 border border-gray-300 text-gray-700 rounded-xl text-center font-semibold hover:bg-gray-50 transition duration-200 flex items-center justify-center"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="flex-1 py-4 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:scale-[1.02] flex items-center justify-center"
                    >
                        <i class="fas fa-paper-plane mr-2"></i>
                        Publish Post
                    </button>
                </div>
            </form>
        </div>

        <!-- Tips Section -->
        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                Posting Tips
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                <div class="flex items-start space-x-2">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <span>Be respectful and kind to others</span>
                </div>
                <div class="flex items-start space-x-2">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <span>Share meaningful content</span>
                </div>
                <div class="flex items-start space-x-2">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <span>Use images to enhance your post</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateCharCount(textarea) {
    const charCount = document.getElementById('charCount');
    charCount.textContent = textarea.value.length + ' characters';
    
    // Change color based on length
    if (textarea.value.length > 500) {
        charCount.classList.add('text-red-500');
        charCount.classList.remove('text-gray-500');
    } else {
        charCount.classList.remove('text-red-500');
        charCount.classList.add('text-gray-500');
    }
}

function previewImage(input) {
    const preview = document.getElementById('preview');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            uploadArea.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    
    imageInput.value = '';
    imagePreview.classList.add('hidden');
    uploadArea.classList.remove('hidden');
}

// Drag and drop functionality
const uploadArea = document.getElementById('uploadArea');

uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('image').files = files;
        previewImage(document.getElementById('image'));
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>