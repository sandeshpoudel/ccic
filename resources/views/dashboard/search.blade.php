<div class="row">
<div class="col-xs-12 input-lg form-inline" >
{!! Form::open(['url' => 'staff/members/search', 'class' => 'form-inline', 'method' =>'get' ]) !!}

<input type="text" class="input-lg col-xs-7" placeholder="Keyword" name="keyword">

<select name="column" class="input-lg col-xs-3">
    <option value="id">Member Id</option>
    <option value="name">Business Name</option>
    <option value="proprietorMobile">Proprietor Mobile</option>
    <option value="proprietorName">Proprietor Name</option>
</select>


<button type="submit" class="btn btn-info  input-lg col-xs-2">
    <i class="ace-icon fa fa-search bigger-110"></i>Search
</button>
{!! Form::close() !!}
</div>
</div>
