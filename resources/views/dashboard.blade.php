<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Send a Message</h2>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold p-2.5 rounded-lg hover:bg-indigo-700 transition">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layout>
