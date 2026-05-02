<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0a0a0a;
            color: #e5e5e5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #151515;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #252525;
        }
        .header {
            background: linear-gradient(135deg, #151515, #252525);
            padding: 30px;
            text-align: center;
            border-bottom: 2px solid #4a9eff;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            color: #4a9eff;
            letter-spacing: 1px;
        }
        .header p {
            margin: 8px 0 0;
            font-size: 13px;
            color: #888;
        }
        .body {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #4a9eff;
            margin-bottom: 6px;
        }
        .field-value {
            font-size: 15px;
            color: #e5e5e5;
            line-height: 1.6;
            padding: 12px 16px;
            background-color: #0a0a0a;
            border-radius: 8px;
            border: 1px solid #252525;
        }
        .footer {
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #555;
            border-top: 1px solid #252525;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 Pesan Kontak Baru</h1>
            <p>Profil Digital — Bilal Alaudin</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="field-label">Nama</div>
                <div class="field-value">{{ $contact->name }}</div>
            </div>
            <div class="field">
                <div class="field-label">Email</div>
                <div class="field-value">
                    <a href="mailto:{{ $contact->email }}" style="color: #4a9eff; text-decoration: none;">
                        {{ $contact->email }}
                    </a>
                </div>
            </div>
            @if($contact->subject)
            <div class="field">
                <div class="field-label">Subjek</div>
                <div class="field-value">{{ $contact->subject }}</div>
            </div>
            @endif
            <div class="field">
                <div class="field-label">Pesan</div>
                <div class="field-value">{!! nl2br(e($contact->message)) !!}</div>
            </div>
        </div>
        <div class="footer">
            Dikirim pada {{ $contact->created_at->format('d M Y, H:i') }} WIB
        </div>
    </div>
</body>
</html>
