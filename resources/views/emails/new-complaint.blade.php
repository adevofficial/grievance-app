@component('mail::message') 

# {{$complient['subject']}} 

{{$complient['message']}} 

@component('mail::button', ['url' =>action('ComplientController@index', ['form'=>'viewer','complaint_id'=>$complient['id']])])
Resolve Complaint
@endcomponent 
Thanks,
<br> {{ config('app.name') }} 
@endcomponent