<x-layouts>
    <form action="{{ route('company.store') }}" method="POST" class="p-6 max-w-lg mx-auto bg-gray-800 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf

        <!-- Form Title -->
        <h1 class="text-2xl text-gray-300 font-bold mb-6">Add Company</h1>

        <!-- Company Name -->
        <div class="mb-4">
            <label for="company_name" class="block text-gray-300 text-sm font-bold mb-2">Company Name</label>
            <input type="text" id="company_name" name="company_name" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('company_name') border-red-500 @enderror" 
                   value="{{ old('company_name') }}">
            @error('company_name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('email') border-red-500 @enderror" 
                   value="{{ old('email') }}">
            @error('email')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Logo -->
        <div class="mb-4">
            <label for="logo" class="block text-gray-300 text-sm font-bold mb-2">Logo</label>
            <input type="file" id="logo" name="logo" accept="image/*"
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('logo') border-red-500 @enderror">
            @error('logo')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Website -->
        <div class="mb-4">
            <label for="website" class="block text-gray-300 text-sm font-bold mb-2">Website</label>
            <input type="url" id="website" name="website" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('website') border-red-500 @enderror" 
                   value="{{ old('website') }}">
            @error('website')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button Row -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('company') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md 
                              hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md 
                           hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Submit
            </button>
        </div>
    </form>
</x-layouts>
