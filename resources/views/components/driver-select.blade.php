<select
        class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none form-control focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
        id="drivers">
    <option value="" disabled selected hidden>Select Driver</option>
    @foreach($drivers as $driver)
        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
    @endforeach
</select>

