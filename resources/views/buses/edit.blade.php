<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">تعديل بيانات الباص</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('buses.update', $bus) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label>لوحة الباص</label>
                <input type="text" name="plate_number" value="{{ old('plate_number', $bus->plate_number) }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>السعة</label>
                <input type="number" name="capacity" value="{{ old('capacity', $bus->capacity) }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>السائق (اختياري)</label>
                <select name="driver_id" class="w-full border p-2">
                    <option value="">-- لا أحد --</option>
                    @foreach($drivers as $d)
                        <option value="{{ $d->id }}" @selected(old('driver_id', $bus->driver_id) == $d->id)>{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div>
                <label>خط السير (اختياري)</label>
                <select name="bus_route_id" class="w-full border p-2">
                    <option value="">-- لا يوجد --</option>
                    @foreach($routes as $r)
                        <option value="{{ $r->id }}" @selected(old('bus_route_id', $bus->bus_route_id) == $r->id)>{{ $r->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</x-app-layout>
