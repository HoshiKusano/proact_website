<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-red-600 mb-4">アクセス権限がありません</h2>
                    <p class="mb-4">このページは学部生のみがアクセスできます。</p>
                    <div class="mt-4">
                        @auth
                            <p class="text-sm text-gray-600">
                                ご不明な点がありましたら、管理者にお問い合わせください。
                            </p>
                        @else
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                                ログインページに戻る
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>