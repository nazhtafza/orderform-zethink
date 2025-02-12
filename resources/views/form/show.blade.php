<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form ? $form->title : 'Form Tidak Ditemukan' }}</title>
</head>
<body>
    @if($form)
        <h2>{{ $form->title }}</h2>
        
        <form action="{{ route('submit.form') }}" method="POST">
            @csrf
            @foreach($form->fields as $field)
                <div>
                    <label>{{ $field['label'] }}</label>
                    
                    @if($field['type'] == 'text')
                        <input type="text" name="answers[{{ $field['label'] }}]" required>

                    @elseif($field['type'] == 'email')
                        <input type="email" name="answers[{{ $field['label'] }}]" required>

                    @elseif($field['type'] === 'select')
                        <select name="answers[{{ $field['label'] }}]" required>
                            @foreach($field['options'] ?? [] as $option) 
                                <option value="{{ $option['value'] }}">{{ $option['value'] }}</option>
                            @endforeach
                        </select>

                    @elseif($field['type'] === 'textarea')
                        <textarea name="answers[{{ $field['label'] }}]" required></textarea>
                    @elseif($field['type'] === 'file')
                        <input type="file" name="answers[{{ $field['label'] }}]">
                    @endif
                </div>
            @endforeach

            <button type="submit">Kirim</button>
        </form>
    @else
        <h2>Belum ada form tersedia.</h2>
    @endif
</body>
</html>
