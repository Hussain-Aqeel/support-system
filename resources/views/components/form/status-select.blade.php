<select class="form-control  appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" id="status">
    <option value="">-- Status --</option>
    @foreach($statuses as $status_code => $status_name)
        <option value="{{ $status_code }}">{{ $status_name }}</option>
    @endforeach
</select>