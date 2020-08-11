@component('mail::message',['commerceName'=> $data->commerceName])

# {{ $data->customerName }} tienes una cuenta por pagar

{{ $data->commerceName }}

@component(
    'mail::button',
    ['url' => config('app.url').$data->commerceName])
    Pagó en Línea
@endcomponent

@endcomponent