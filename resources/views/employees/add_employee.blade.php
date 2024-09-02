<x-layouts>
    <form action="{{ route('employee.store') }}" method="POST" class="p-6 max-w-lg mx-auto bg-gray-800 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf

        <!-- Form Title -->
        <h1 class="text-2xl text-gray-300 font-bold mb-6">Add Employee</h1>

        <!-- First Name -->
        <div class="mb-4">
            <label for="first_name" class="block text-gray-300 text-sm font-bold mb-2">First Name</label>
            <input type="text" id="first_name" name="first_name" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('first_name') border-red-500 @enderror" 
                   value="{{ old('first_name') }}">
            @error('first_name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Last Name -->
        <div class="mb-4">
            <label for="last_name" class="block text-gray-300 text-sm font-bold mb-2">Last Name</label>
            <input type="text" id="last_name" name="last_name" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('last_name') border-red-500 @enderror" 
                   value="{{ old('last_name') }}">
            @error('last_name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Company -->
        <div class="mb-4">
            <label for="company_id" class="block text-gray-300 text-sm font-bold mb-2">Company</label>
            <select id="company_id" name="company_id" 
                    class="form-select w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                           focus:outline-none focus:border-blue-400 @error('company_id') border-red-500 @enderror">
                <option value="">Select a Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
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

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Phone</label>
            <input type="number" id="phone" name="phone" 
                   class="form-input w-full px-3 py-2 border rounded-md bg-gray-700 text-gray-300 
                          focus:outline-none focus:border-blue-400 @error('phone') border-red-500 @enderror" 
                   value="{{ old('phone') }}">
            @error('phone')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button Row -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('employee') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md 
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
