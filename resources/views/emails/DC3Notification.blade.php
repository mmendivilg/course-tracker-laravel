@component('mail::message')
# Introduction

Hi, {{ $name }}
Please download.

@component('mail::button', ['url' => 'https://youtube.com'])
Go to youtube
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
