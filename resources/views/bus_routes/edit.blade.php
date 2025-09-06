<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">تعديل خط السير</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('bus_routes.update', $busRoute) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label>اسم خط السير</label>
                <input type="text" name="name" value="{{ old('name', $busRoute->name) }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>نقطة البداية</label>
                <input type="text" name="start_point" value="{{ old('start_point', $busRoute->start_point) }}" class="w-full border p-2">
            </div>

            <div>
                <label>نقطة النهاية</label>
                <input type="text" name="end_point" value="{{ old('end_point', $busRoute->end_point) }}" class="w-full border p-2">
            </div>

            <div>
                <label>المحطات (افصل بين المحطات بفاصلة)</label>
                <textarea name="stops" class="w-full border p-2" rows="3">{{ old('stops', $busRoute->stops) }}</textarea>
            </div>

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</x-app-layout>
