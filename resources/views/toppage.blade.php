<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- 横並びのコンテナ -->
            <div class="flex flex-col md:flex-row justify-between items-start gap-16">
                <!-- 左側のテキストコンテンツ -->
                <div class="w-full md:w-1/2 space-y-12 flex-shrink-0">
                    <!-- タイトル部分 -->
                    <h1 class="leading-tight tracking-tight text-gray-900">
                        <span class="text-4xl md:text-5xl font-bold block mb-4">多文化社会学部を</span>
                        <span class="text-5xl md:text-7xl font-extrabold text-indigo-600 block mb-4">学生の発想で</span>
                        <span class="text-4xl md:text-5xl font-bold block">盛り上げたい</span>
                    </h1>
                    
                    <!-- 本文部分 -->
                    <div class="space-y-6 text-gray-600">
                        <p class="text-lg leading-relaxed" style="font-feature-settings: 'palt';">
                            学生の本質的な需要や課題への<br>
                            アプローチから<br>
                            楽しみ繋がれる機会まで。
                        </p>
                        <p class="text-lg leading-relaxed" style="font-feature-settings: 'palt';">
                            私たちは多文化社会学部のために全<br>
                            力で行動します。
                        </p>
                    </div>
                    
                    <!-- ビジョンボタン -->
                    <a href="/vision" class="group inline-flex items-center px-6 py-3 text-lg font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                        私たちのビジョン
                        <span class="ml-3 w-8 h-8 flex items-center justify-center rounded-full border-2 border-indigo-600 group-hover:border-indigo-500 group-hover:bg-indigo-50 transition-all duration-200">
                            →
                        </span>
                    </a>
                </div>
                
                <!-- 右側の画像 -->
                <div class="w-full md:w-1/2 flex-shrink-0">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-100 to-blue-100 transform -rotate-3 rounded-2xl"></div>
                        <img
                            src="https://res.cloudinary.com/dzycja3yu/image/upload/v1731508111/IMG_0159_linpp3.jpg"
                            alt="ゼミ相談室の画像"
                            class="relative rounded-2xl shadow-xl w-full h-auto object-cover transform transition-transform duration-500 hover:scale-105"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>