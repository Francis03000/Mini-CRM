
<div>
    <h2>Your company {{ $company->company_name }} was added in Mini-Crm Website</h2>
    <p>{{ $company->company_name }}:  {{ $company->website }}</p>
    <img src="{{ $message->embed('storage/'. $company->logo) }}" alt="" width="300px">
</div>