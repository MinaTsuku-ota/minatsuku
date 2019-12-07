@extends('minatsukulayout')

@section('content')
<form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
    @csrf
        <input id="image" type="file" name="image">
        <button type="submit">
           アップロード
        </button>
    </form>
    @foreach($images as $image)
        <div>
            <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 20%; height: auto;"/>
        </div>
    @endforeach
@endsection
