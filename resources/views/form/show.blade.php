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
                        <input type="text" name="{{ $field['label'] }}">
                    @elseif($field['type'] == 'email')
                        <input type="email" name="{{ $field['label'] }}">
                    @elseif($field['type'] == 'textarea')
                        <textarea name="{{ $field['label'] }}"></textarea>
                    @elseif($field['type'] == 'select')
                        <select name="{{ $field['label'] }}">
                            <option value="">Pilih</option>
                            <option value="ux_ui_design">UX/UI Design</option>
                            <option value="brand_identity">Brand Identity</option>
                            <option value="design_system">Design System</option>
                            <option value="web_design">Web Design</option>
                        </select>
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
