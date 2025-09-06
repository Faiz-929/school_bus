<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إضافة خط سير</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('bus_routes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>اسم خط السير</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>نقطة البداية</label>
                <input type="text" name="start_point" value="{{ old('start_point') }}" class="w-full border p-2">
            </div>

            <div>
                <label>نقطة النهاية</label>
                <input type="text" name="end_point" value="{{ old('end_point') }}" class="w-full border p-2">
            </div>

            <div>
                <label>المحطات (افصل بين المحطات بفاصلة)</label>
                <textarea name="stops" class="w-full border p-2" rows="3">{{ old('stops') }}</textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">حفظ</button>
        </form>
    </div>
</x-app-layout>
