<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {{-- published_at の初期値は、$publishd_at 変数が渡されることを想定しています --}}
    {!! Form::input('date', 'published_at', $published_at, ['class' => 'form-control']) !!}
</div>

{{-- select タグは複数選択出来るようにする為、バインド名に括弧を付けて ‘tags[]’ とし、オプションに ‘multiple’ を入れます --}}
{{-- <div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tag_list, null, ['class' => 'form-control', 'multiple']) !!}
</div> --}}

{{-- 画像フォーム --}}
<div class="form-group">
    {!! Form::label('image1', '画像1:') !!}
    {!! Form::file('image1', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image2', '画像2:') !!}
    {!! Form::file('image2', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image3', '画像3:') !!}
    {!! Form::file('image3', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {{-- submit ボタンのタイトルも $submitButton 変数が渡されることを想定しています --}}
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
