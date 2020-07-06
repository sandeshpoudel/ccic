@foreach($ownershiptypes as $ownershiptype)
    { {{ 'label: "social networks",  data: '.$ownershiptype->name.', color: "#68BC31"'}} },
    @endforeach