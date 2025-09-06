<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">إضافة ولي أمر</h2>
    </x-slot>

    <div class="p-6 max-w-md">
        <form action="{{ route('guardians.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label>الاسم:</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>
            <div>
                <label>الهاتف:</label>
                <input type="text" name="phone" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">حفظ</button>
        </form>
    </div>
</x-app-layout>
