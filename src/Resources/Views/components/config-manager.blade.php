@if(session('status'))
    <div style="color: green;">{{ session('status') }}</div>
@endif
@if($errors->any())
    <div style="color: red;">{{ $errors->first() }}</div>
@endif

<h1>Manage Config</h1>
<form action="{{ route('config.update') }}" method="POST">
    @csrf
    <textarea name="config_content" style="width: 100%; height: 300px;">{{ $configContent }}</textarea>
    <br>
    <button type="submit">Update Config</button>
</form>

<h2>Current Config as Array:</h2>
<pre>{{ json_encode($config, JSON_PRETTY_PRINT) }}</pre>
