<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta name="color-scheme" content="light dark" />
<meta name="supported-color-schemes" content="light dark" />
<title>@yield('title', 'Imperial Tuitions')</title>

<style>
html, body {
  margin:0 !important;
  padding:0 !important;
  width:100% !important;
  background:#f4f6f8;
  font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif;
}

table { border-collapse:collapse !important; }
img { border:0; outline:none; text-decoration:none; }

.email-wrapper {
  width:100%;
  background:#f4f6f8;
  padding:40px 0;
}

.email-container {
  width:600px;
  max-width:600px;
}

.email-card {
  background:#0b1220;
  border-radius:14px;
  overflow:hidden;
}

.email-header {
  padding:24px 28px;
  color:#ffffff;
}

.email-brand {
  font-size:15px;
  color:#cbd5e1;
  font-weight:600;
}

.email-title {
  margin-top:6px;
  font-size:24px;
  font-weight:700;
  color:#ffffff;
}

.email-subtitle {
  margin-top:8px;
  font-size:14px;
  color:#cbd5e1;
}

.email-body {
  background:#ffffff;
  padding:28px;
  font-size:15px;
  line-height:1.7;
  color:#0f172a;
}

.email-body p {
  margin:0 0 14px 0;
}

.email-footer-note {
  margin-top:20px;
  padding-top:16px;
  border-top:1px solid #e2e8f0;
  font-size:12px;
  color:#64748b;
}

.email-copyright {
  text-align:center;
  font-size:12px;
  color:#94a3b8;
  margin-top:20px;
}

@media (max-width:600px){
  .email-container{
    width:100% !important;
    max-width:100% !important;
  }
  .email-body{
    padding:20px !important;
  }
  .email-header{
    padding:20px !important;
  }
}
</style>
</head>

<body>

@hasSection('preheader')
<div style="display:none; font-size:1px; color:#f4f6f8; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
@yield('preheader')
</div>
@endif

<table role="presentation" width="100%" class="email-wrapper">
<tr>
<td align="center">

<table role="presentation" width="600" class="email-container">

<tr>
<td>

<table role="presentation" width="100%" class="email-card">

<!-- HEADER -->
<tr>
<td class="email-header">
<div class="email-brand">Imperial Tuitions</div>
<div class="email-title">@yield('header_title')</div>
<div class="email-subtitle">@yield('header_subtitle')</div>
</td>
</tr>

<!-- BODY -->
<tr>
<td class="email-body">
@yield('body')

@hasSection('footer_note')
<div class="email-footer-note">
@yield('footer_note')
</div>
@endif
</td>
</tr>

</table>

<div class="email-copyright">
© {{ date('Y') }} Imperial Tuitions. All rights reserved.
</div>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>