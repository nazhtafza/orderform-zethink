<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Us!</title>
</head>
<body>

    <h2>{{ $form->title }}</h2>

    <form method="POST" action="{{ route('submit.form', ['formId' => $form->id]) }}" enctype="multipart/form-data">
        @csrf

        @foreach($form->fields as $field)
            <label>{{ $field['label'] }}</label>

            @if($field['type'] === 'text')
                <input type="text" name="answers[{{ $field['label'] }}]" required>
            @elseif($field['type'] === 'email')
                <input type="email" name="answers[{{ $field['label'] }}]" required>
                @elseif($field['type'] === 'select')
                <select name="answers[{{ $field['label'] }}]">
                @foreach($field['options'] ?? [] as $option) 
                    <option value="{{ $option['value'] }}">{{ $option['value'] }}</option>
                @endforeach
            @elseif($field['type'] === 'textarea')
                <textarea name="answers[{{ $field['label'] }}]" required></textarea>
            @endif

            <br>
        @endforeach

        <button type="submit">Kirim</button>
    </form>

</body>
</html>
