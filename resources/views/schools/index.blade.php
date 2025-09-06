<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">قائمة المدارس</h2>
    </x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('schools.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ إضافة مدرسة</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">الاسم</th>
                    <th class="p-2 border">العنوان</th>
                    <th class="p-2 border">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td class="p-2 border">{{ $school->name }}</td>
                        <td class="p-2
