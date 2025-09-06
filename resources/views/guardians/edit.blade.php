<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">تعديل ولي أمر</h2>
    </x-slot>

    <div class="p-6 max-w-md">
        <form action="{{ route('guardians.update', $guardian) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label>الاسم:</label>
                <input type="text" name="name" value="{{ $guardian->name }}" class="border p-2 w-full" required>
            </div>
            <div>
                <label>الهاتف:</label>
                <input type="text" name="phone" value="{{ $guardian->phone }}" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</x-app-layout>
