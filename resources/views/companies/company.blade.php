<x-layouts>
    <!-- Button to Add Company -->
    <div class="p-6 max-w-7xl mx-auto">


        @if(session('success'))
            <x-alert_msg msg="{{ session('success') }}" type="success" />
        @elseif(session('error'))
            <x-alert_msg msg="{{ session('error') }}" type="error" />
        @endif
        <div class="flex justify-end mb-4">
            <a href="{{ route('add_company') }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded-md 
                      hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add Company
            </a>
        </div>

        <!-- Company Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md" id="companyTable">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Company Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Logo</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Website</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $company->company_name }}</td>
                            <td class="px-4 py-2">{{ $company->email }}</td>
                            <td class="px-4 py-2">
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-16 h-16 object-cover rounded-md">
                                @else
                                    No Logo
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $company->website }}</a>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('company.edit', $company) }}" class="bg-orange-500 text-white px-2 py-1 text-xs rounded-md">Edit</a>
                                <form action="{{ route('company.destroy', $company->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-2 py-1 text-xs rounded-md hover:bg-red-600"
                                            onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</x-layouts>

<script>
    $(document).ready( function (){
        $('#companyTable').DataTable();
    });
</script>
