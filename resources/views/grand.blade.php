<h1>Salam</h1>

@foreach($grands as $brand)
    <li>{{ $brand->name[app()->getLocale()] ?? $brand->name['en'] }}</li>
@endforeach
