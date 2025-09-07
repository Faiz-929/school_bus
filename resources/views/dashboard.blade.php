<x-app-layout dir="rtl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-right">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- ✅ قسم الإحصائيات -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">👨‍🎓 الطلاب</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Student::count() }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">👨‍👩‍👧‍👦 أولياء الأمور</h3>
                    <p class="text-2xl font-bold text-green-600">{{ \App\Models\Guardian::count() }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">🏫 المدارس</h3>
                    <p class="text-2xl font-bold text-purple-600">{{ \App\Models\School::count() }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">🚌 الباصات</h3>
                    <p class="text-2xl font-bold text-orange-600">{{ \App\Models\Bus::count() }}</p>
                </div>
            </div>

            <!-- ✅ روابط القائمة -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                <h3 class="text-lg font-semibold mb-4">📋 القائمة</h3>
                <ul class="space-y-2">

                    @can('manage students')
                        <li>
                            <a href="{{ route('students.index') }}" 
                               class="text-blue-600 hover:underline">📚 إدارة الطلاب</a>
                        </li>
                    @endcan

                    @can('manage guardians')
                        <li>
                            <a href="{{ route('guardians.index') }}" 
                               class="text-blue-600 hover:underline">👨‍👩‍👧‍👦 إدارة أولياء الأمور</a>
                        </li>
                    @endcan

                    @can('manage schools')
                        <li>
                            <a href="{{ route('schools.index') }}" 
                               class="text-blue-600 hover:underline">🏫 إدارة المدارس</a>
                        </li>
                    @endcan

                    @can('manage buses')
                        <li>
                            <a href="{{ route('buses.index') }}" 
                               class="text-blue-600 hover:underline">🚌 إدارة الباصات</a>
                        </li>
                    @endcan

                    @can('manage bus routes')
                        <li>
                            <a href="{{ route('bus_routes.index') }}" 
                               class="text-blue-600 hover:underline">🗺️ إدارة خطوط السير</a>
                        </li>
                    @endcan

                </ul>
            </div>

            <!-- ✅ محتوى الترحيب -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                <div class="text-gray-900 dark:text-gray-100">
                    أهلاً وسهلاً {{ Auth::user()->name }} 👋
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
