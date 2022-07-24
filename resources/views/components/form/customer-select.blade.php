<select class="form-control appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
        id="customer">
    <option value="" disabled selected hidden>Select Customer</option>
    @foreach($customers as $customer_name => $customer_id)
        <option value="{{ $customer_id }}">{{ $customer_name }}</option>
    @endforeach

</select>