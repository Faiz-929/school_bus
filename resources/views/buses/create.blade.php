<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إضافة باص</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('buses.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>لوحة الباص</label>
                <input type="text" name="plate_number" value="{{ old('plate_number') }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>السعة (عدد المقاعد)</label>
                <input type="number" name="capacity" value="{{ old('capacity', 20) }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>السائق (اختياري)</label>
                <select name="driver_id" class="w-full border p-2">
                    <option value="">-- لا أحد --</option>
                    @foreach($drivers as $d)
                        <option value="{{ $d->id }}" @selected(old('driver_id') == $d->id)>{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>خط السير (اختياري)</label>
                <select name="bus_route_id" class="w-full border p-2">
                    <option value="">-- لا يوجد --</option>
                    @foreach($routes as $r)
                        <option value="{{ $r->id }}" @selected(old('bus_route_id') == $r->id)>{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">حفظ</button>
        </form>
    </div>
</x-app-layout>
