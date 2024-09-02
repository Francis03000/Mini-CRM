<x-layouts>
    <!-- Button to Add Company -->
    <div class="p-6 max-w-7xl mx-auto">


        @if(session('success'))
            <x-alert_msg msg="{{ session('success') }}" type="success" />
        @elseif(session('error'))
            <x-alert_msg msg="{{ session('error') }}" type="error" />
        @endif
        <div class="flex justify-end mb-4">
            <a href="{{ route('employee.create') }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded-md 
                      hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add Employee
            </a>
        </div>

       <!-- Employee Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md" id="employeeTable">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">First Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Last Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Phone</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Company</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $employee->first_name }}</td>
                            <td class="px-4 py-2">{{ $employee->last_name }}</td>
                            <td class="px-4 py-2">{{ $employee->email }}</td>
                            <td class="px-4 py-2">{{ $employee->phone }}</td>
                            <td class="px-4 py-2">
                                @if($employee->company)
                                    {{ $employee->company->company_name }}
                                @else
                                    No Company
                                @endif 
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('employee.edit', $employee) }}" 
                                class="bg-orange-500 text-white px-2 py-1 text-xs rounded-md hover:bg-orange-600">Edit</a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="inline">
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
        $('#employeeTable').DataTable();
    });
</script>
