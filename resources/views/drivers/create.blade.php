<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إضافة سائق</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        <form action="{{ route('drivers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>الاسم</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2" required>
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border p-2" required>
                @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>رقم الرخصة</label>
                <input type="text" name="license_number" value="{{ old('license_number') }}" class="w-full border p-2">
            </div>

            <div>
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">💾 حفظ</button>
        </form>
    </div>
</x-app-layout>
