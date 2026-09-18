<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Cris Barber Shop' }}</title>
    <style>
        :root { font-family: Inter, ui-sans-serif, system-ui, sans-serif; color: #172033; background: #f4f6f8; }
        * { box-sizing: border-box; } body { margin: 0; } a { color: #0e7490; } .page { min-height: 100vh; display: grid; place-items: center; padding: 24px; }
        .card { width: min(100%, 520px); background: white; border-radius: 18px; padding: 34px; box-shadow: 0 14px 38px #17203316; }
        .brand { color: #0f766e; font-weight: 800; letter-spacing: .04em; text-transform: uppercase; font-size: .78rem; } h1 { margin: 8px 0; font-size: 1.8rem; } .muted { color: #64748b; line-height: 1.55; }
        label { display: block; margin-top: 16px; font-weight: 650; font-size: .9rem; } input, select { width: 100%; margin-top: 6px; padding: 11px 12px; border: 1px solid #cbd5e1; border-radius: 9px; font: inherit; }
        button, .button { display: inline-block; border: 0; border-radius: 9px; background: #0f766e; color: white; padding: 11px 16px; font: inherit; font-weight: 700; cursor: pointer; text-decoration: none; }
        button:hover, .button:hover { background: #115e59; } .actions { margin-top: 25px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap; }
        .error { color: #b91c1c; font-size: .85rem; margin: 5px 0 0; } .alert { background: #ecfdf5; color: #065f46; padding: 12px; border-radius: 9px; margin: 16px 0; }
        .dashboard { width: min(100%, 940px); } .topbar { display: flex; justify-content: space-between; gap: 20px; align-items: center; margin-bottom: 24px; } .stats { display: grid; grid-template-columns: repeat(auto-fit,minmax(200px,1fr)); gap: 16px; }
        .stat, .panel { background: white; padding: 22px; border-radius: 14px; box-shadow: 0 8px 25px #17203310; } .stat strong { display: block; font-size: 1.65rem; margin-top: 5px; } form.inline { display: inline; } .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px; margin-top:16px; } .panel { margin-top:16px; overflow:auto; } h2 { margin:0 0 12px; font-size:1.1rem; } table { width:100%; border-collapse:collapse; min-width:580px; } th,td { padding:11px 8px; border-bottom:1px solid #e2e8f0; text-align:left; font-size:.9rem; } th { color:#64748b; } .quick-form { display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px; align-items:end; } .quick-form label { margin-top:0; }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
