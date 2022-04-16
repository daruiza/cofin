@component('mail::message',['commerce'=> $data->commerce])

<div class="mail-container">
    <p>
        {{ $data->customer['name'] }} tienes una cuenta por pagar
    </p>
</div>

{{ $data->commerce['name'] }}

@component(
    'mail::button',
    ['url' => config('app.url').$data->commerce['name']])
    Pagó en Línea
@endcomponent

@endcomponent