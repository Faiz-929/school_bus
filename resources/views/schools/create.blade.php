<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إضافة مدرسة</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('schools.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label>اسم المدرسة</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>العنوان</label>
                <input type="text" name="address" value="{{ old('address') }}" class="w-full border p-2">
            </div>

            <div>
                <label>هاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border p-2">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">حفظ</button>
        </form>
    </div>
</x-app-layout>
