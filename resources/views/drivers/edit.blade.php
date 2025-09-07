<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">تعديل بيانات السائق</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        <form action="{{ route('drivers.update', $driver) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>الاسم</label>
                <input type="text" name="name" value="{{ old('name', $driver->name) }}" class="w-full border p-2" required>
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone', $driver->phone) }}" class="w-full border p-2" required>
                @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>رقم الرخصة</label>
                <input type="text" name="license_number" value="{{ old('license_number', $driver->license_number) }}" class="w-full border p-2">
            </div>

            <div>
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $driver->email) }}" class="w-full border p-2">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">💾 تحديث</button>
        </form>
    </div>
</x-app-layout>
