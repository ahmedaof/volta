<table cellspacing="0" cellpadding="1" border="1">
    <thead>
        <tr>
            <th>{{ $project->offer_number }}</th>
            <th>{{ $project->created_at }}</th>
            <th>{{ $project->name }}</th>
            <th>{{ $project->customer->name }}</th>
       
        </tr>
    </thead>
</table>
<table cellspacing="0" cellpadding="1" border="1">
    <thead>
        <tr>
            <th>Technical support</th>
            <th>{{ $user->name }}</th>
            <th>{{ $user->phone }}</th>
            <th>{{ $user->email }}</th>
       
        </tr>
    </thead>
</table>
<table cellspacing="0" cellpadding="1" border="1">
    <thead>
        <tr>
            <th>dddsd</th>
            <th>eee</th>
       
        </tr>
    </thead>
</table>

@if($project->type == 'Panels')


@foreach ($project->panels as $key => $panel)

item no : {{ $key + 1 }}

quantity : {{ $panel->panel_quantity }}

panel name : {{ $panel->panel_name }}

{{-- tabs --}}

@foreach ($panel->tabs as $key => $tab)

{{ $tab->name }}

@foreach ($tab->distripution_product as $product)


{{ $product->abb_description }}

{{ $product->pivot->quantity }}
    
@endforeach

@endforeach


    
@endforeach

@endif
