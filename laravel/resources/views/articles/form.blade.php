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

{{-- selectタグを追加追加 --}}
{{-- select タグは複数選択出来るようにする為、バインド名に括弧を付けて ‘tags[]’ とし、オプションに ‘multiple’ を入れます --}}
{{-- <div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tag_list, null, ['class' => 'form-control', 'multiple']) !!}
</div> --}}

<div class="form-group">
    {{-- submit ボタンのタイトルも $submitButton 変数が渡されることを想定しています --}}
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
