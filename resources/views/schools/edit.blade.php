<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">تعديل بيانات المدرسة</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        @include('partials.alerts')

        <form action="{{ route('schools.update', $school) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label>اسم المدرسة</label>
                <input type="text" name="name" value="{{ old('name', $school->name) }}" class="w-full border p-2" required>
            </div>

            <div>
                <label>العنوان</label>
                <input type="text" name="address" value="{{ old('address', $school->address) }}" class="w-full border p-2">
            </div>

            <div>
                <label>هاتف</label>
                <input type="text" name="phone" value="{{ old('phone', $school->phone) }}" class="w-full border p-2">
            </div>

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</x-app-layout>
